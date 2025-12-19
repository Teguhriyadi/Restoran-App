<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        using: function() {
            require __DIR__ . '/../routes/master-data/kategori.php';
            require __DIR__ . '/../routes/master-data/bahan.php';
            require __DIR__ . '/../routes/master-data/resep.php';
            require __DIR__ . '/../routes/master-data/resep-detail.php';
            require __DIR__ . '/../routes/app/dashboard.php';
            require __DIR__ . '/../routes/authentication/login.php';
        },
        // web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
