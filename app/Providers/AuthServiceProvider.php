<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;

class AuthServiceProvider extends ServiceProvider
{

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [//        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //  посада Администратора
        Gate::define('posit-admin-role', function ($user) {
            return $user->hasRolePos('admin');
        });

        // посада начальника и зама
        Gate::define('posit-chief', function ($user){
            return $user->hasChiefDepart(['chief','deputy']);
        });

        //  отдел учебного отдела
        Gate::define('depart-ucheb', function ($user) {
            return $user->hasRoleDep('ucheb');
        });

        //  отдел Звита
        Gate::define('depart-zvit-role', function ($user) {
            return $user->hasRoleDep('zvit');
        });

        // Обыкновенный пользователь (без прав)
        Gate::define('posit-user-role', function ($user) {
            return $user->hasRolePos('user');
        });

        /*     * *********************  GATE for ADD|EDIT|DELETE or OTHER  ******************* */

        Gate::define('all_function', function ($user) {
            return $user->hasRoleSuccess([
                'add',
                'edit',
                'delete',
                'confirmation',
                'comment'
            ]);
        });
        Gate::define('add', function ($user) {
            return $user->hasRoleSuccess(['add']);
        });
        Gate::define('edit', function ($user) {
            return $user->hasRoleSuccess(['edit']);
        });
        Gate::define('delete', function ($user) {
            return $user->hasRoleSuccess(['delete']);
        });
        Gate::define('comment', function ($user) {
            return $user->hasRoleSuccess(['comment']);
        });
    }

}
