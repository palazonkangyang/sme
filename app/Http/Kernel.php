<?php

namespace SME\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \SME\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \SME\Http\Middleware\VerifyCsrfToken::class,
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \SME\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'guest' => \SME\Http\Middleware\RedirectIfAuthenticated::class,
        'auth.buyer' => \SME\Http\Middleware\AuthenticateBuyer::class,
        'guest.buyer' => \SME\Http\Middleware\RedirectIfAuthenticatedBuyer::class,
        "admin.role.superadmin" => \SME\Http\Middleware\Admin\SuperAdmin::class,
        "admin.role.contenteditor" => \SME\Http\Middleware\Admin\ContentEditor::class,

        'auth.supplier' => \SME\Http\Middleware\AuthenticateSupplier::class,
        'guest.supplier' => \SME\Http\Middleware\RedirectIfAuthenticatedSupplier::class,

        'auth.bus' => \SME\Http\Middleware\AuthenticateBus::class,
        'guest.bus' => \SME\Http\Middleware\RedirectIfAuthenticatedBus::class,
    ];
}
