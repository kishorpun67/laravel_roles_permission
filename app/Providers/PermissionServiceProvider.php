<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Models\{Permission, Role, Post};



class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Gate::define('edit', function (User $user, Post $post) {
        //     return $user->id === $post->user_id;
        // });
        try{
            Permission::get()->map(function ($permission) {
                Gate::define($permission->slug, function($user) use ($permission) {
                    return $user->hasPermissionTo($permission);
                });
 
            });
        }catch(\Exception $e){
            report($e);
            // return false;
        }

        // create blade directive 
        Blade::directive('role', function($role){
            return "<?php if(auth()->check() &&  auth()->user()->hasRole({$role})) { ?>";
        });

        // end blade directive 
        Blade::directive('endrole', function($role){
            return "<?php } ?>";
        });
    }
}
