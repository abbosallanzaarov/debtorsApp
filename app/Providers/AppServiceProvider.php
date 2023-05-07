<?php

namespace App\Providers;

use App\Interfaces\IDebtorHistoryRepository;
use App\Repositoryies\DebtorHistoryRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IDebtorHistoryRepository::class , DebtorHistoryRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
