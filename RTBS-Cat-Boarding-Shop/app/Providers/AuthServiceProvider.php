<?php

namespace App\Providers;

 
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('isAdmin', function (User $user) {
    return $user->role === 'admin';
});

Gate::define('isSubscriber', function (User $user) {
    return $user->role === 'subscriber';
}); 

Gate::define('isUser', function (User $user) {
    return $user->role === 'user';
}); 
        
    }
}
