<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('todos', TodoController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/setup-database-secret-url', function () {
    try {
        Artisan::call('migrate', ['--force' => true]);
        return 'Міграції успішно виконані: <br><pre>' . Artisan::output() . '</pre>';
    } catch (\Exception $e) {
        return 'Помилка: ' . $e->getMessage();
    }
});

require __DIR__.'/auth.php';
