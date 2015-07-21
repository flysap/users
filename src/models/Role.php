<?php

namespace Flysap\Users\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model {

    public $table = 'roles';

    public $timestamps = false;

    public $fillable = ['name', 'permissions'];

    /**
     * Get the list of the users .
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users() {
        return $this->belongsToMany(User::class, 'role_users', 'user_id', 'role_id');
    }
}