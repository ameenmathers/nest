<?php

use App\Http\Middleware\Admin;
use App\Http\Middleware\Agent;
use App\Http\Middleware\ApiAgent;
use App\Http\Middleware\ApiClient;
use App\Http\Middleware\Client;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        $middleware->alias([
            'admin' => Admin::class,
            'agent' => Agent::class,
            'client' => Client::class,
            'apiClient' => ApiClient::class,
            'apiAgent' => ApiAgent::class,
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
