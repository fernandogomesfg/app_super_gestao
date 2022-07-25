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
/*
Route::get('/', function () {
    return 'Ola Mundo';
});

Route::get('/sobre-nos', function () {
    return 'Sobre Nos';
});

Route::get('/contacto', function () {
    return 'Contacto';
});
*/

Route::get('/',[\App\Http\Controllers\PrincipalController::class, 'principal']);

Route::get('/sobre',[\App\Http\Controllers\SobreNosController::class, 'sobreNos']);

Route::get('/contacto',[\App\Http\Controllers\ContactoController::class, 'contacto']);

//envio de parametros nas rotas
Route::get('contacto/{nome}/{categoria}/{assunto}/{mensagem?}', function(string $nome, string $categoria, string $assunto, string $mensagem = 'Mensagem nao informada'){
    echo "Estamos aqui: $nome - $categoria - $assunto - $mensagem";
});
