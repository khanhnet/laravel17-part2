<?php

namespace App\Providers;

use App\Product;
use App\Category;
use App\User;
use App\Policies\ProductPolicy;
use App\Policies\CategoryPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Product::class => ProductPolicy::class,
        Category::class => CategoryPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('update-product', function ($user, $product){
           return $user->id == $product->user_id;
        });
        Gate::define('detail-product', function ($user, $product){
           return $user->id == $product->user_id;
        });
        Gate::define('add-product', function ($user){
           return $user->id == 1;
        });
        
        
    }
}
