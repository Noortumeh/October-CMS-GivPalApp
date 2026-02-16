<?php

use Illuminate\Foundation\Configuration\{Exceptions, Middleware};
use Noor\Content\Middleware\SetLocale;
use October\Rain\Foundation\Application;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        // web: __DIR__.'/../routes/web.php',
        // commands: __DIR__.'/../routes/console.php',
        // health: '/up',
        api: [
            __DIR__ . '/../plugins/noor/content/routes.php'
        ],
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->validateCsrfTokens(except: [
            'api/*',
        ]);

        $middleware->api(append: [
            SetLocale::class
        ]);

        // $middleware->statefulApi();

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
