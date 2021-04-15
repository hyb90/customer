<?php

namespace App\Providers;

use App\Models\Role;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
//         'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $rolesArr = [];
        $roles = Role::all();

        foreach ($roles as $role) {
            $rolesArr[$role->name] = $role->description;
        }

        Passport::routes();

        Passport::tokensCan($rolesArr);

        Passport::setDefaultScope([
            'admin'
        ]);
        Passport::tokensExpireIn(now()->addDays(90));

        Passport::refreshTokensExpireIn(now()->addDays(45));

        Passport::personalAccessTokensExpireIn(now()->addMonths(1));

        //
    }
}
