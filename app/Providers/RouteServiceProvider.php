<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    const HOME = '/home';

    /**
     * The controller namespace for the application.
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';
    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        $this->configureRateLimiting();
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();
        $this->map_ContractRoutes();
        $this->map_work_order_templateRoutes();
        $this->map_BusinessOpportunityRoutes();
        $this->map_employee_opportunityRoutes();
        $this->map_trackingRoutes();
        $this-> map_ContractRoutes();
        $this->mapContentRoutes();
        $this->mapGeneralRoutes();
        $this->mapCustomersRoutes();
        $this->mapEmployeesRoutes();
        $this->mapOrdersRoutes();
        $this->mapManagingRoutes();
        $this->mapWebRoutes();
    }

    /**
     * Define the "api" routes for the application.
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

    /**
     * Define the "api" routes for the application.
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function map_ContractRoutes()
    {
        Route::middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/contracts/contracts.php'));
    }
    protected function map_employee_opportunityRoutes()
    {
        Route::middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/employee_opportunity/employee_opportunity.php'));
    }
    protected function map_trackingRoutes()
    {
        Route::middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/tracking/tracking.php'));
    }


    protected function map_BusinessOpportunityRoutes()
    {
        Route::middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/business_opportunity/business_opportunity.php'));
    }
    protected function map_work_order_templateRoutes()
    {
        Route::middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/work_order_template/work_order_template.php'));
    }
    protected function mapContentRoutes()
    {



        Route::middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/Content/category.php'));


        Route::middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/General/user.php'));

    }

    /**
     * Define the "api" routes for the application.
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapGeneralRoutes()
    {
        Route::middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/General/project_file.php'));
        Route::middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/General/page.php'));
        Route::middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/General/service.php'));
        Route::middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/General/translation_language.php'));
        Route::middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/General/role.php'));
        Route::middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/General/region.php'));
        Route::middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/General/device.php'));
        Route::middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/General/auth.php'));
    }

    /**
     * Define the "api" routes for the application.
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapCustomersRoutes()
    {
        Route::middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/Customers/customer.php'));
    }

    /**
     * Define the "api" routes for the application.
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapEmployeesRoutes()
    {
        Route::middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/Employees/employee.php'));
    }
    protected function mapOrdersRoutes()
    {
        Route::middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/Orders/order.php'));
    }

    /**
     * Define the "api" routes for the application.
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapManagingRoutes()
    {
        Route::middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/Managing/managing.php'));
    }

    /**
     * Define the "api" routes for the application.
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

}
