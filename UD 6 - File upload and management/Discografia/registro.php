<?php
$conexion = new mysqli('localhost', 'discografia', 'discografia', 'discografia');

ponerForm();

$consulta = "SELECT id FROM tabla_usuarios ORDER BY id DESC LIMIT 1";
$respuesta = $conexion->query($consulta);
$id = $respuesta->fetch_assoc();

if (isset($_POST['nombre'])) {
    $conexion->autocommit(false);

    try {
        $username = trim($_POST['nombre']);
        $passwordHash = password_hash($_POST['password'], PASSWORD_BCRYPT);

        if (!isset($_FILES['profile_image']) || $_FILES['profile_image']['error'] !== UPLOAD_ERR_OK) {
            throw new Exception("Debe subir una imagen de perfil.");
        }

        switch ($_FILES['profile_image']['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new Exception('No se ha subido ningún archivo.');
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new Exception('El archivo supera el tamaño permitido.');
            default:
                throw new Exception('Error desconocido al subir el archivo.');
        }

        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->file($_FILES['profile_image']['tmp_name']);
        if ($mime !== 'image/jpeg' && $mime !== 'image/png') {
            throw new Exception('Solo se permiten archivos JPG o PNG.');
        }

        $size = getimagesize($_FILES['profile_image']['tmp_name']);
        if ($size[0] > 360 || $size[1] > 480) {
            throw new Exception('La imagen no puede superar 360x480px.');
        }

        $userDir = "img/users/$username";
        if (!is_dir($userDir)) mkdir($userDir, 0777, true);

        $bigPath = "$userDir/idUserBig.png";
        $smallPath = "$userDir/idUserSmall.png";

        $tmpName = $_FILES['profile_image']['tmp_name'];
        $big = imagecreatefromstring(file_get_contents($tmpName));
        $small = imagecreatefromstring(file_get_contents($tmpName));

        $big = imagescale($big, 360, 480);
        $small = imagescale($small, 72, 96);

        imagepng($big, $bigPath);
        imagepng($small, $smallPath);

        imagedestroy($big);
        imagedestroy($small);

        $sql = "INSERT INTO tabla_usuarios (id, usuario, password, image_big, image_small)
                VALUES ('" . ($id['id'] + 1) . "', '$username', '$passwordHash', '$bigPath', '$smallPath')";

        $todo_bien = $conexion->query($sql);
        if (!$todo_bien) {
            throw new Exception('Error al insertar el usuario en la base de datos.');
        }

        $conexion->commit();
        header("Location: login.php");
        exit();

    } catch (Exception $e) {
        $conexion->rollback();
        echo "Error: " . $e->getMessage();
    }
}

function ponerForm() {
    print '
        <form action="#" method="post" enctype="multipart/form-data">
            <p>Usuario: <input type="text" name="nombre" id="nombre" required></p>
            <p>Contraseña: <input type="password" name="password" id="password" required></p>
            <p>Imagen de perfil: <input type="file" name="profile_image" accept="image/png, image/jpeg" required></p>
            <input type="submit" value="Registrar">
        </form>
    ';
}
?>
