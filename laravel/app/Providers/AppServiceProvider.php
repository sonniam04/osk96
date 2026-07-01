<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('partials.right-sidebar', function ($view) {
            $randomMembers = DB::table('data')
                ->where('st', 1)
                ->whereRaw("TRIM(fname) <> ''")
                ->inRandomOrder()
                ->limit(15)
                ->select('name', 'fname')
                ->get();
            $view->with('randomMembers', $randomMembers);
        });
    }
}
