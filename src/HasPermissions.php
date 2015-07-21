<?php

namespace Flysap\Users;

use Flysap\Users\Role;

trait HasPermissions {

    /**
     * Get the list of the roles .
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    public function is($role) {

    }

    public function can($permissions) {

    }
}