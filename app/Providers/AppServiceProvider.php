<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\ViewComposer;
use App\Models\Trial;

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
        //  view()->composer(['content.apps.user.app-user-list','content.apps.user.app-user-view-account'], ViewComposer::class);
        // View::share('data', Trials::all());
    }
}
