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

Route::get('/',[\App\Http\Controllers\PrincipalController::class, 'principal'])->name('site.index');
Route::get('/sobre',[\App\Http\Controllers\SobreNosController::class, 'sobreNos'])->name('site.sobrenos');
Route::get('/contacto',[\App\Http\Controllers\ContactoController::class, 'contacto'])->name('site.contacto');
Route::get('/login', function(){ return 'Login';})->name('site.logi');

Route::prefix('/app')->group(function() {
    Route::get('/clientes', function(){ return 'Clientes';})->name('app.clientes');
    Route::get('/fornecedores', function(){ return 'Fornecedores';})->name('app.fornecedores');
    Route::get('/produtos', function(){ return 'Produtos';})->name('app.produtos');
});

Route::get('/rota1', function() {
    echo 'Rota 1';
})->name('site.rota1');


Route::get('/rota2', function() {
    return redirect()->route('site.rota1');
})->name('site.rota2');


// Rota de contingência (fallback)
Route::fallback(function() {
    echo 'A rota acessada nao existe. Clique <a href="'.route('site.index').'"> aqui </a> para voltar!';
});


//Route::redirect('/rota2', '/rota1');


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
