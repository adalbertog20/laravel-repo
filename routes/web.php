<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/suma/{n1}/{n2}', function (string $n1, string $n2): string {
    return $n1 + $n2;
})->where(['n1' => '[0-9]+', 'n2' => '[0-9]+']);

Route::get('/resta/{n1}/{n2}', function (string $n1, string $n2): string {
    return $n1 - $n2;
})->where(['n1' => '[0-9]+', 'n2' => '[0-9]+']);

Route::get('/multplicacion/{n1}/{n2}', function (string $n1, string $n2): string {
    return $n1 * $n2;
})->where(['n1' => '[0-9]+', 'n2' => '[0-9]+']);

Route::get('/division/{n1}/{n2}', function (string $n1, string $n2): string {
    return $n1 / $n2;
})->where(['n1' => '[0-9]+', 'n2' => '[0-9]+']);

Route::get('/saludar/{name}', function(string $name) {
    return 'Hola ' . $name;
})->where('name', '[A-Za-z]+');

Route::get('/saludarVista/{name}', function(string $name) {
    return view('saludar', ['name' => $name]);
})->where('name', '[A-Za-z]+');

require __DIR__ . '/auth.php';
