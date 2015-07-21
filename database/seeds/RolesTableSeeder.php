<?php

use Flysap\Users\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $roles = [
          'admin', 'moderator', 'editor', 'member'
        ];

        array_walk($roles, function($role) {
           Role::create([
               'name' => $role,
               'slug' => $role,
           ]);
        });
    }
}
