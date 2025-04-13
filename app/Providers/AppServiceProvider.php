<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        //

        view()->composer('*', function ($view) {
            if (auth()->check()) {
                $notifications = \App\Models\Notification::where('user_id', auth()->id())
                    ->where('statut', 'envoyée')
                    ->orderBy('created_at', 'desc')
                    ->take(3)
                    ->get();
                
                $view->with('Notifications', $notifications);
            }
        });
    }
}
