<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
<<<<<<< HEAD
     * O conjunto de middlewares globais do aplicativo.
=======
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
>>>>>>> parent of 4b99b0f (Revert "pog")
     *
     * @var array
     */
    protected $middleware = [
        \App\Http\Middleware\TrustProxies::class,
<<<<<<< HEAD
        \App\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\VerifyCsrfToken::class,
=======
        \Illuminate\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\LoadConfiguration::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
>>>>>>> parent of 4b99b0f (Revert "pog")
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
    ];

    /**
<<<<<<< HEAD
     * O conjunto de grupos de middlewares do aplicativo.
=======
     * The application's route middleware groups.
>>>>>>> parent of 4b99b0f (Revert "pog")
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
<<<<<<< HEAD
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
=======
            \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\Auth\Middleware\Authenticate::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            
        ],

        'api' => [
            \App\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
>>>>>>> parent of 4b99b0f (Revert "pog")
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
<<<<<<< HEAD
     * O conjunto de middlewares de rota do aplicativo.
=======
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
>>>>>>> parent of 4b99b0f (Revert "pog")
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
<<<<<<< HEAD
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \App\Http\Middleware\EnsureEmailIsVerified::class,
    ];
}
=======
        'auth.basic' => \I
>>>>>>> parent of 4b99b0f (Revert "pog")
