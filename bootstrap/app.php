<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Database\QueryException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Add middleware to API routes
        $middleware->api(append: \App\Http\Middleware\ValidateHeaderMiddleware::class);
        $middleware->api(append: \App\Http\Middleware\SetHeaderMiddleware::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Handle QueryException
        $exceptions->render(fn(QueryException $e) => errorQueryException());
    })
    ->create();

function errorQueryException(): \Illuminate\Http\JsonResponse
{
    return response()->json([
        'errors' => [
            "status" => 500,
            "title" => "Error en la base de datos",
            "detail" => "La base de datos no responde"
        ]
    ], 500); // Ensure status code 500 is returned explicitly
}
