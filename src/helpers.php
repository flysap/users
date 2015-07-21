<?php

namespace Flysap\Users;

use Illuminate\Support\Facades\Auth;

/**
 * Have permission to .
 *
 * @param $role
 * @return bool
 */
function can($permission) {
    if(Auth::check() && Auth::user()->can($permission))
        return true;

    return false;
}

/**
 * Check if current is role .
 *
 * @param $role
 * @return bool
 */
function is($role) {
    if(Auth::check() && Auth::user()->is($role))
        return true;

    return false;
}