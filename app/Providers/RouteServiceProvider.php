<?php
namespace App\Providers;
use Theme;
// use Illuminate\Support\Facades\Auth;

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

        if ( config('app.db_database') != '' ) {
    		config(['app.date_format_moment' => getDateFormatNew()]);
            config(['app.datetime_format_moment' => getDateFormatNew() . ' HH:mm:ss']);
            config(['app.date_format' => getDateFormatNew(true)]);
        }       

        if (\Cookie::get('theme')) { 
            $theme_name = \Crypt::decrypt(\Cookie::get('theme'), false);

            $parts = explode('|', $theme_name);
            if (is_array($parts) && count($parts) > 1 ) {
                $theme_name = $parts[1];
            }
            // dd($theme_name);
            if ( 'bsb' === $theme_name ) {
                //config(['app.date_format' => 'm-d-Y']);
				config(['app.date_format' => getDateFormatNew(true)]);
            } else {
				config(['app.date_format' => getDateFormatNew(true)]);
			}
            $theme_name = 'default';
            Theme::set( $theme_name );
        } else {
            Theme::set( 'default' );
        }
        
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

        //
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
