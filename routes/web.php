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

Route::get('/login', function(){ return 'Login';});

Route::get('/clientes', function(){ return 'Clientes';});

Route::get('/fornecedores', function(){ return 'Fornecedores';});

Route::get('/produtos', function(){ return 'Produtos';});



//envio de parametros nas rotas
/*
Route::get('contacto/{nome}/{categoria}/{assunto}/{mensagem?}', function(string $nome, string $categoria, string $assunto, string $mensagem = 'Mensagem nao informada'){
    echo "Estamos aqui: $nome - $categoria - $assunto - $mensagem";
});
*/

//tratando parametros de rotas com expressoes regulares
Route::get('contacto/{nome}/{categoria}',
function(
    string $nome = 'Desconhecido',
    int $categoria_id = 1,
    ) {
    echo "Estamos aqui: $nome - $categoria_id";
    }
)->where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]+');
