<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\MatchRecord;
use App\Observers\MatchRecordObserver;
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
    public function boot()
    {
        MatchRecord::observe(MatchRecordObserver::class);
    }
}
