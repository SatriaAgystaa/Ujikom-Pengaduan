<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Daftarkan alias middleware role
        $middleware->alias([
            'role' => \App\Http\Middleware\RoleMiddleware::class, // Pastikan middleware RoleMiddleware di sini
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Penanganan exception dapat disesuaikan di sini jika diperlukan
    })
    ->create();



