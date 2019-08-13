<?php

namespace App\Providers;

use function foo\func;
use Illuminate\Support\Facades\Blade;
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
        //
        view()->share('siteName', "哼哼哈嘿");
        view()->composer( '*', \App\Http\ViewComposer\RecentPostsComposer::class );
        Blade::directive('datetime', function ($expression){
/*            return "<?php echo {$expression}->format('m/d/Y H:i'); ?>";*/
            return "<?php echo {$expression}->format('m/d/Y H:i'); ?>";
        });
    }
}
