<?php

namespace App\Providers;

use App\User;
use App\Permission;
use App\UserPermission;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('permission', function ($user, $permission_name) {
            $permissions = Permission::where('slug', $permission_name)->select('id')->first();
            if ($permissions != null) {
                if (UserPermission::where('user_id', $user->id)->where('permission_id', $permissions->id)->first() != null) {
                    return true;
                }
                return false;
            }
            return false;
        });

    }
}
