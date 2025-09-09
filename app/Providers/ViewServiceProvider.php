<?php

namespace App\Providers;

use App\Models\Topic;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        // Mọi view gọi 'layouts.header' sẽ tự có biến $topics
        View::composer(['layouts.header', 'layouts.footer'], function ($view) {
            $topics = Topic::where('is_published', true)
                ->orderBy('created_at', 'asc')
                ->take(5)
                ->get();
            $view->with('topics', $topics);
        });
    }
}
