<?php

namespace Database\Seeders;

use App\Models\Pelicula;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        self::seedCatalogo();
        $this->command->info('Añadido peliculas');

        self::seedUsuarios();
        $this->command->info('Usuarios añadidos');
    }

    private function seedCatalogo(){
        
        foreach ($this->arrayPeliculas as $p) {
    
            $peli = new Pelicula;

            $peli->nombre = $p['nombre'];
            $peli->year = $p['year'];
            $peli->director = $p['director'];
            $peli->foto = $p['foto'];
            $peli->alquiler = $p['alquiler'];
            $peli->descripcion = $p['descripcion'];

            $peli->save();

        }
    }

    private function seedUsuarios(){
        $user = new User();

        $user->name = "test";
        $user->email = "test@test.com";
        $user->password = Hash::make('12345678');
        $user->admin = false;

        $user->save();
        
        $admin = new User();

        $admin->name = "admin";
        $admin->email = "admin@admin.com";
        $admin->password = Hash::make('12345678');
        $admin->admin = true;

        $admin->save();

    }

    private $arrayPeliculas = [
    [
        'nombre' => 'El padrino',
        'year' => 1972,
        'director' => 'Francis Ford Coppola',
        'foto' => 'foto1.jpg',
        'alquiler' => true,
        'descripcion' => 'Don Vito Corleone (Marlon Brando) es el respetado y temido jefe de una de las cinco familias de la mafia de Nueva York. Tiene cuatro hijos: Connie (Talia Shire), el impulsivo Sonny (James Caan), el pusilánime Freddie (John Cazale) y Michael (Al Pacino), que no quiere saber nada de los negocios de su padre. Cuando Corleone se niega a intervenir en el negocio de las drogas, el jefe de otra banda ordena su asesinato.'
    ],
    [
        'nombre' => 'El Padrino. Parte II',
        'year' => 1974,
        'director' => 'Francis Ford Coppola',
        'foto' => 'foto2.jpg',
        'alquiler' => false,
        'descripcion' => 'Continuación de la historia de los Corleone por medio de dos historias paralelas: la elección de Michael Corleone como jefe de los negocios familiares y los orígenes del patriarca Don Vito, primero en Sicilia y luego en Estados Unidos.'
    ],
    [
        'nombre' => 'La lista de Schindler',
        'year' => 1993,
        'director' => 'Steven Spielberg',
        'foto' => 'foto3.jpg',
        'alquiler' => false,
        'descripcion' => 'Segunda Guerra Mundial. Oskar Schindler, un empresario alemán, organiza un ambicioso plan para ganarse la simpatía de los nazis y salvar a cientos de judíos empleándolos en su fábrica.'
    ],
    [
        'nombre' => 'Pulp Fiction',
        'year' => 1994,
        'director' => 'Quentin Tarantino',
        'foto' => 'foto4.jpg',
        'alquiler' => true,
        'descripcion' => 'Jules y Vincent, dos asesinos a sueldo, trabajan para Marsellus Wallace. Ambos se verán envueltos en una serie de situaciones violentas y surrealistas.'
    ],
    [
        'nombre' => 'Cadena perpetua',
        'year' => 1994,
        'director' => 'Frank Darabont',
        'foto' => 'foto5.jpg',
        'alquiler' => true,
        'descripcion' => 'Andrew Dufresne es condenado a cadena perpetua por el asesinato de su mujer. En prisión entablará una gran amistad con Red.'
    ],
    [
        'nombre' => 'El golpe',
        'year' => 1973,
        'director' => 'George Roy Hill',
        'foto' => 'foto6.jpg',
        'alquiler' => false,
        'descripcion' => 'Dos timadores planean una compleja estafa para vengar la muerte de un amigo.'
    ],
    [
        'nombre' => 'La vida es bella',
        'year' => 1997,
        'director' => 'Roberto Benigni',
        'foto' => 'foto7.jpg',
        'alquiler' => true,
        'descripcion' => 'Durante la Segunda Guerra Mundial, un padre utiliza su imaginación para proteger a su hijo de los horrores de un campo de concentración.'
    ],
    [
        'nombre' => 'Uno de los nuestros',
        'year' => 1990,
        'director' => 'Martin Scorsese',
        'foto' => 'foto8.jpg',
        'alquiler' => false,
        'descripcion' => 'Henry Hill se adentra desde joven en el mundo de la mafia italoamericana y asciende dentro de la organización.'
    ],
    [
        'nombre' => 'Alguien voló sobre el nido del cuco',
        'year' => 1975,
        'director' => 'Milos Forman',
        'foto' => 'foto9.jpg',
        'alquiler' => false,
        'descripcion' => 'Un hombre rebelde es internado en un hospital psiquiátrico donde desafía la autoridad del sistema.'
    ],
    [
        'nombre' => 'American History X',
        'year' => 1998,
        'director' => 'Tony Kaye',
        'foto' => 'foto10.jpg',
        'alquiler' => false,
        'descripcion' => 'Un ex neonazi intenta evitar que su hermano pequeño siga el mismo camino de odio.'
    ],
    [
        'nombre' => 'Sin perdón',
        'year' => 1992,
        'director' => 'Clint Eastwood',
        'foto' => 'foto11.jpg',
        'alquiler' => false,
        'descripcion' => 'Un pistolero retirado acepta un último trabajo para conseguir dinero.'
    ],
    [
        'nombre' => 'El precio del poder',
        'year' => 1983,
        'director' => 'Brian De Palma',
        'foto' => 'foto12.jpg',
        'alquiler' => false,
        'descripcion' => 'Tony Montana asciende en el mundo del narcotráfico de Miami.'
    ],
    [
        'nombre' => 'El pianista',
        'year' => 2002,
        'director' => 'Roman Polanski',
        'foto' => 'foto13.jpg',
        'alquiler' => true,
        'descripcion' => 'Un pianista judío lucha por sobrevivir en la Varsovia ocupada por los nazis.'
    ],
    [
        'nombre' => 'Seven',
        'year' => 1995,
        'director' => 'David Fincher',
        'foto' => 'foto14.jpg',
        'alquiler' => true,
        'descripcion' => 'Dos detectives persiguen a un asesino que basa sus crímenes en los siete pecados capitales.'
    ],
    [
        'nombre' => 'El silencio de los corderos',
        'year' => 1991,
        'director' => 'Jonathan Demme',
        'foto' => 'foto15.jpg',
        'alquiler' => false,
        'descripcion' => 'Clarice Starling recurre al brillante asesino Hannibal Lecter para atrapar a otro psicópata.'
    ],
    [
        'nombre' => 'La naranja mecánica',
        'year' => 1971,
        'director' => 'Stanley Kubrick',
        'foto' => 'foto16.jpg',
        'alquiler' => false,
        'descripcion' => 'Un joven ultraviolento se somete a un tratamiento experimental para reprimir su conducta.'
    ],
    [
        'nombre' => 'La chaqueta metálica',
        'year' => 1987,
        'director' => 'Stanley Kubrick',
        'foto' => 'foto17.jpg',
        'alquiler' => true,
        'descripcion' => 'Un grupo de reclutas vive el duro entrenamiento militar y la guerra de Vietnam.'
    ],
    [
        'nombre' => 'Blade Runner',
        'year' => 1982,
        'director' => 'Ridley Scott',
        'foto' => 'foto18.jpg',
        'alquiler' => true,
        'descripcion' => 'Un blade runner persigue a replicantes rebeldes en un futuro distópico.'
    ],
    [
        'nombre' => 'Taxi Driver',
        'year' => 1976,
        'director' => 'Martin Scorsese',
        'foto' => 'foto19.jpg',
        'alquiler' => false,
        'descripcion' => 'Un taxista solitario desarrolla una peligrosa obsesión con la violencia.'
    ],
    [
        'nombre' => 'El club de la lucha',
        'year' => 1999,
        'director' => 'David Fincher',
        'foto' => 'foto20.jpg',
        'alquiler' => true,
        'descripcion' => 'Un hombre hastiado crea junto a un carismático vendedor un club clandestino de lucha.'
    ]
];


}
