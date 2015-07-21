<?php

namespace Flysap\Users;

trait HasPermissions {

    /**
     * Get the list of the roles .
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles() {
        return $this->belongsToMany(Role::class, 'role_users');
    }

    /**
     * Check if current user in role .
     *
     * @param $role
     * @param bool $all
     * @return bool
     */
    public function is($role, $all = true) {
        $inRoles  = [];

        if(is_array($role))
            $inRoles = $role;
        elseif( is_string($role)) {
            if( preg_match("/|/", $role)  )
                $inRoles = explode("|", $role);
            else
                $inRoles = $role;
        }

        $roles = $this->roles()
            ->lists('slug', 'id')
            ->toArray();

        $hasOne = false;

        foreach ($inRoles as $role) {
            if(! in_array($role, $roles)) {
                if( $all )
                    return false;
            } else {
                $hasOne = true;
            }
        }

        return $hasOne;
    }

    /**
     * Check if user has permissions ..
     *
     * @param $permissions
     * @param bool $all
     * @return bool
     */
    public function can($permissions, $all = true) {
        if(is_array($permissions))
            $permissions = $permissions;
        elseif( is_string($permissions)) {
            if( preg_match("/|/", $permissions)  )
                $permissions = explode("|", $permissions);
            else
                $permissions = $permissions;
        }

        $permissions = array_unique($permissions);

        $attachedPermissions = [];
        foreach( $this->roles->toArray() as $role )
            $attachedPermissions = array_merge($attachedPermissions, explode(',', $role['permissions']));

        $attachedPermissions = array_merge($attachedPermissions, explode(',', $this->permissions));

        $attachedPermissions = array_filter(array_map('trim', $attachedPermissions));

        $hasOne = false;

        foreach ($permissions as $permission) {
            if(! in_array($permission, $attachedPermissions)) {
                if( $all )
                    return false;
            } else {
                $hasOne = true;
            }
        }

        return $hasOne;
    }
}