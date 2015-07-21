<?php

namespace Flysap\Users\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Role extends Model implements SluggableInterface {

    use SluggableTrait;

    public $table = 'roles';

    public $timestamps = false;

    public $fillable = ['name', 'permissions'];

    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
    ];

    /**
     * Get the list of the users .
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users() {
        return $this->belongsToMany(User::class, 'role_users', 'user_id', 'role_id');
    }
}