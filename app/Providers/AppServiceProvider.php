<?php

namespace App\Providers;

//use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view)
        {
            $view->with([
                'admin_username' => 'Administrator',
                'admin_site_title' => 'Laravel Admin Page'
            ]);
        });
        config(['app.language_id' => 1]);

        /*Blade::directive('convert', function ($money) {
            return "<?php echo number_format($money); ?>";
        });*/
    }
}
