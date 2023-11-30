<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChatsController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\IntegrationController;
use App\Http\Controllers\ResponderController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\CampanhasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/permissoes', function () {
    return view('permissoes');
})->middleware(['auth', 'verified'])->name('permissoes');



Route::get('/nuevoOperador', function () {
    return view('nuevoOperador');
})->middleware(['auth', 'verified'])->name('nuevoOperador');



Route::middleware('auth')->group(function () {
    Route::resource('responders', ResponderController::class);
    
    Route::get('/operadores', [OperatorController::class, 'index'])->name('operadores');
    Route::post('/operadores', [OperatorController::class, 'store']);
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Chat Route
    Route::get('/chats/{id}', [ViewController::class, 'whatsappChats'])->name('chats');
    Route::get('/templates/{id}', [ViewController::class, 'whatsappTemplate'])->name('templates');

    
    // Paymet Route
    Route::get('/pagamento', [ViewController::class, 'payments'])->name('pagamento');
    Route::get('/pagamento/{id}', [PaymentController::class, 'payment'])->name('payment');
    Route::delete('/pagamento/{id}', [PaymentController::class, 'destroy'])->name('pagamento.destroy');
    


    // User Route
    Route::get('/listaDeUsuarios', [ViewController::class, 'users'])->name('listaDeUsuarios');
    Route::get('/listaDeUsuarios/{id}', [ViewController::class, 'user'])->name('listaDeUsuario');

    Route::get('/create-user', [UserController::class, 'create'])->name('users.create');
    Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/user', [UserController::class, 'store'])->name('users.store');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/user/{id}', [UserController::class, 'delete'])->name('users.delete');

    
    // Inegracao
    Route::get('/Integração', [ViewController::class, 'Integracao'])->name('Integracao');
    Route::get('/Integração/{id}', [ViewController::class, 'Integracao2'])->name('Integracao2');
    
    Route::post('/Integração', [IntegrationController::class, 'store'])->name('Integracao.store');
    Route::get('/Integracao/{id}', [IntegrationController::class, 'editIntegration'])->name('Integracao.edit');
    Route::put('/Integracao/{id}', [IntegrationController::class, 'update'])->name('Integracao.update');
    Route::delete('/Integração/{id}', [IntegrationController::class, 'delete'])->name('Integracao.delete');
    
    // Instances
    Route::get('/instances', [ChatsController::class, 'instances'])->name('instances');
    Route::get('/get-instances', [ChatsController::class, 'getInstances'])->name('get-instances');
    Route::get('/createSession/{id}', [ChatsController::class, 'createSession'])->name('createSession');
    Route::post('/add-instance', [ChatsController::class, 'add_instance'])->name('add-instance');
    Route::delete('/delete-instance/{id}', [ChatsController::class, 'delete_instance'])->name('delete-instance');
    Route::post('/get-session-messages', [ChatsController::class, 'get_session_messages'])->name('get-session-messages');
    Route::post('/remove_notification', [ChatsController::class, 'remove_notification'])->name('remove_notification');
    Route::get('/unplug/{id}', [ChatsController::class, 'unplug'])->name('unplug');
    
    // Campanhas
    Route::get('/campanhas', [CampanhasController::class, 'index'])->name('campanhas');
    Route::get('/nueva-campanha-configuracion', [CampanhasController::class, 'create'])->name('nueva-campanha-configuracion');
    Route::get('/editar-campanha-configuracion/{id}', [CampanhasController::class, 'edit'])->name('editar-campanha-configuracion');
    Route::get('/campanhas/{id}', [CampanhasController::class, 'show'])->name('campanha');
});

require __DIR__.'/auth.php';
