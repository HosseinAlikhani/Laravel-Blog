<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Role::truncate();
        Permission::truncate();
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        for ($i = 1; $i < 5; $i++){
            User::create([
                'name'  =>  'd3cr33'.$i,
                'email' =>  'd3cr33'.$i.'@gmail.com',
                'password'  =>  Hash::make('123'),
            ]);
        }

        $role = [
            0   =>  [
                'name'  =>  'admin',
                'guard_name'    =>  'web',
            ],
            1   =>  [
                'name'  =>  'user',
                'guard_name'    =>  'web',
            ],
        ];
        $permission = [
            0   =>  [
                'name'  =>  'create_role',
                'guard_name'    =>  'web',
            ],
            1   =>  [
                'name'  =>  'read_role',
                'guard_name'    =>  'web',
            ],
            2   =>  [
                'name'  =>  'update_role',
                'guard_name'    =>  'web',
            ],
            3   =>  [
                'name'  =>  'delete_role',
                'guard_name'    =>  'web',
            ],
            4   =>  [
                'name'  =>  'create_permission',
                'guard_name'    =>  'web',
            ],
            5   =>  [
                'name'  =>  'read_permission',
                'guard_name'    =>  'web',
            ],
            6   =>  [
                'name'  =>  'update_permission',
                'guard_name'    =>  'web',
            ],
            7   =>  [
                'name'  =>  'delete_permission',
                'guard_name'    =>  'web',
            ],
        ];
        Role::insert($role);
        Permission::insert($permission);
    }
}
