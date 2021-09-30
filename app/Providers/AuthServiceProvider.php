<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
       
         $this->registerPolicies($gate);



        $gate->define('isadmin', function($user){

            return $user->role_id === 1;

        });

    



        $gate->define('isteacher', function($user){

            return $user->role_id ===2;

        });



        $gate->define('isstudent', function($user){

            return $user->role_id === 3;

        });



        //
    }
}
