<?php

namespace App\Providers;

use App\Enums\GateEnum;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
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
        Gate::define(GateEnum::EDIT_SETTINGS, function (User $user) {
            return $user->isAdmin()
                ? Response::allow()
                : Response::deny("Yetkiniz yok.");
        });

    }
}
