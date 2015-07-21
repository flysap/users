<?php

namespace Flysap\ModuleManger;

use Illuminate\Support\ServiceProvider;

class UsersServiceProvider extends ServiceProvider {

    /**
     * On boot's application load package requirements .
     */
    public function boot() {
        $this->loadRoutes()
            ->loadConfiguration()
            ->loadViews();
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