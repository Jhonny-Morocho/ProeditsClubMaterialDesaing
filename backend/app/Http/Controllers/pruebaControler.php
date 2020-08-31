<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;

class PruebaControler extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function prueba ($nombreUsuario)
    {
        return "Estoy dentro de prueba controler ".$nombreUsuario;
    }
}
?>