<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\ProfileController;
<<<<<<< HEAD
use App\Models\Order;
use App\Models\OrderPizza;
use Illuminate\Http\Request;
<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;
=======
use Illuminate\Http\Request;
>>>>>>> origin/test
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';
=======
use Illuminate\Support\Facades\Route;

>>>>>>> 0ce7272ef7e43b8735fa9f430253e3794cabe934


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


Route::get('/menu', [PizzaController::class, 'index']);
Route::get('/home', function() {
    return view('pizza.index');
});
Route::get('/contact', function() {
    return view('pizza.contact');
});


Route::resource('pizza', PizzaController::class);
<<<<<<< HEAD
// Route::get('/status', function() {
//     return view('pizza.status');
// });
Route::post('/status', function() {
    return view('pizza.status');
});
=======
Route::resource('order', OrderController::class);

// this route is a intermidiate step for the store method and doesn't have an acutal page!
Route::post('/order', [OrderController::class, 'store'])->name('pizza.order');

Route::get('/status', [OrderController::class, 'status'])->name('order.show');

>>>>>>> 0ce7272ef7e43b8735fa9f430253e3794cabe934

require __DIR__.'/auth.php';

<<<<<<< HEAD
// Route::post('/status', function(Request $request) {
//     return view('pizza.status', ['id' => $request->id]);
// });
// Route::post('/status', [pizzaController::class, 'show']);
=======
>>>>>>> 0ce7272ef7e43b8735fa9f430253e3794cabe934
