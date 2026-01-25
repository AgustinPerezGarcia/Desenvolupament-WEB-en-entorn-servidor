<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController
{
    public function getHome()
    {
        if (Auth::check()) {
            return redirect('/catalog');
        }

        return redirect('/login');
    }

}
