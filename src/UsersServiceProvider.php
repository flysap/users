<?php

namespace Flysap\Users;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class UsersServiceProvider extends ServiceProvider {

    /**
     * On boot's application load package requirements .
     */
    public function boot() {
        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations'),
            __DIR__.'/../database/seeds/' => database_path('seeds'),
            __DIR__.'/models' => app_path()
        ]);

        $this->registerBlade();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {

    }

    /**
     * Load routes .
     *
     * @return $this
     */
    protected function loadRoutes() {
        return $this;
    }

    /**
     * Load configuration .
     *
     * @return $this
     */
    protected function loadConfiguration() {
        return $this;
    }

    /**
     * Load views .
     */
    protected function loadViews() {
        return $this;
    }

    /**
     * Register blade extensions ..
     *
     */
    protected function registerBlade() {
        Blade::directive('role', function($role) {
            return "<?php @if(Auth::check() && Auth::user()->is('{$role}')) ?>";
        });

        Blade::directive('endrole', function () {
            return "<?php endif; ?>";
        });

        Blade::directive('permission', function($permission) {
            return "<?php @if(Auth::check() && Auth::user()->can('{$permission}')) ?>";
        });

        Blade::directive('endpermission', function () {
            return "<?php endif; ?>";
        });
    }
}