<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

if (isset($_ENV['VERCEL'])) {
    // Вказуємо Laravel використовувати /tmp для всіх тимчасових файлів
    $app->useStoragePath('/tmp/storage');
    
    // Створюємо необхідну структуру папок у /tmp, якщо її ще немає
    $storagePath = '/tmp/storage';
    $directories = [
        "{$storagePath}/app",
        "{$storagePath}/bootstrap/cache",
        "{$storagePath}/framework/cache",
        "{$storagePath}/framework/views",
        "{$storagePath}/framework/sessions",
        "{$storagePath}/logs",
    ];

    foreach ($directories as $directory) {
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }
    }
}

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
