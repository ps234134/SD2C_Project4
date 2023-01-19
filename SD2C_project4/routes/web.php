<?php

use App\Http\Controllers\PizzaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/menu', [PizzaController::class, 'index']);
Route::get('/home', function() {
    return view('pizza.index');
});
Route::get('/contact', function() {
    return view('pizza.contact');
});


Route::resource('pizza', PizzaController::class);
// Route::get('/status', function() {
//     return view('pizza.status');
// });
// Route::post('/status', function() {
//     return view('pizza.status');
// });

// Route::post('/status', [PizzaController::class, 'status']);

// Route::post('/status', function(Request $request) {
//     return view('pizza.status', ['id' => $request->id]);
// });
// Route::post('/status', [pizzaController::class, 'show']);
