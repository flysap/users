<?php

namespace Flysap\Users;

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
}