<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\{Exceptions, Middleware};

use App\Http\Middleware\{CheckUser, auth};

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
        'checkauth' => \App\Http\Middleware\CheckAuth::class,
        'checkuser'=>CheckUser::class
    ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
