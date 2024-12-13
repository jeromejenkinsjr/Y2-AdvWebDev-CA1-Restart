<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Http\RedirectResponse;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Global middleware, if needed, like session handling
        // You can append global middleware here
        // $middleware->append(\App\Http\Middleware\CheckForMaintenanceMode::class);
        
        // Register route-specific middleware by alias
        $middleware->alias([
            'admin' => \App\Http\Middleware\CheckAdmin::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Customize the response for 404 errors
        $exceptions->respond(function ($response) {
            // Handle both RedirectResponse and Response
            if ($response instanceof RedirectResponse) {
                return $response;
            }

            // Check for the 404 error
            if ($response instanceof HttpResponse && $response->getStatusCode() === 404) {
                // Return a custom response with a view for 404 errors
                return response()->view('not-found', [], 404);
            }

            // Return the default response for other status codes
            return $response;
        });
    })
    ->create();

