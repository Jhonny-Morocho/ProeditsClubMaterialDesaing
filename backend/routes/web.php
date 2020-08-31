<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/proveedor', function () {
    return "hola mundo";
    
});
//===============enviar parametro; en la url va el id: ejemplo:> genero/1::>/genero/1/nombre_genero/cumbia
Route::get('/genero/{idGenero}/nombre_genero/{nameGenero?}',function($idGenero,$nombreGenero=null){
 return 'Hola soy '.$idGenero." El genero es :".$nombreGenero;
});


// ===========================USANDO LAS RUTAS CON CONTROLADORES===========================
Route::get('paginaPrueba/{nombre}','pruebaControler@prueba');


// ===========================USANDO LAS RUTAS CON CONTROLADORES===========================
Route::resource('trainers','TrainerControler');//nombre del recurso