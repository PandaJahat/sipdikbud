<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapModuleRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "modules" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapModuleRoutes()
    {
        $this->moduleDashboardRoute();
        $this->moduleUserRoutes();
        $this->moduleCollectionRoutes();
        $this->moduleReferenceRoutes();
        $this->moduleIntegrationRoutes();
        $this->moduleHomeRoutes();
    }

    // Module Routes: start
    protected function moduleDashboardRoute()
    {
        $namespace = $this->namespace.'\Dashboard';

        $route = Route::middleware([
            'web', 'auth'
        ])->namespace($namespace);

        $dashboard = (clone $route)->group(base_path('routes/web/dashboard/dashboard.php'));
    }

    protected function moduleUserRoutes()
    {
        $namespace = $this->namespace.'\User';

        $route = Route::middleware([
            'web', 'auth'
        ])->namespace($namespace);

        $list = (clone $route)->group(base_path('routes/web/user/list.php'));
        $create = (clone $route)->group(base_path('routes/web/user/create.php'));
        $update = (clone $route)->group(base_path('routes/web/user/update.php'));
    }

    protected function moduleCollectionRoutes()
    {
        $namespace = $this->namespace.'\Collection';

        $route = Route::middleware([
            'web', 'auth'
        ])->namespace($namespace);

        $list = (clone $route)->group(base_path('routes/web/collection/list.php'));
        $create = (clone $route)->group(base_path('routes/web/collection/create.php'));
        $update = (clone $route)->group(base_path('routes/web/collection/update.php'));
        $download = (clone $route)->group(base_path('routes/web/collection/download.php'));
        $detail = (clone $route)->group(base_path('routes/web/collection/detail.php'));

        $mapping = (clone $route)->group(base_path('routes/web/collection/mapping.php'));
    }

    protected function moduleReferenceRoutes()
    {
        $namespace = $this->namespace.'\Reference';

        $route = Route::middleware([
            'web', 'auth'
        ])->namespace($namespace);

        $category = (clone $route)->group(base_path('routes/web/reference/category.php'));
        $language = (clone $route)->group(base_path('routes/web/reference/language.php'));
        $reason = (clone $route)->group(base_path('routes/web/reference/reason.php'));
        $institution = (clone $route)->group(base_path('routes/web/reference/institution.php'));
    }

    protected function moduleIntegrationRoutes()
    {
        $namespace = $this->namespace.'\Integration';

        $route = Route::middleware([
            'web', 'auth'
        ])->namespace($namespace);

        $ojs = (clone $route)->group(base_path('routes/web/integration/ojs.php'));
        $other = (clone $route)->group(base_path('routes/web/integration/other.php'));
    }

    protected function moduleHomeRoutes()
    {
        $namespace = $this->namespace.'\Home';

        $route = Route::middleware([
            'web'
        ])->namespace($namespace);

        $home = (clone $route)->group(base_path('routes/web/home/home.php'));
    }
    // Module Routes: end

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
