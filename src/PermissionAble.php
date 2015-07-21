<?php

namespace Flysap\Users;

interface PermissionAble {

    /**
     * Check if user are in role|s
     *
     * @param $role
     * @return mixed
     */
    public function is($role);

    /**
     * Check if current user has permissions .
     *
     * @param $permissions
     * @return mixed
     */
    public function can($permissions);
}