<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Model\User;

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
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        User::create([
            'name'  =>  'd3cr33',
            'email' =>  'd3cr33@gmail.com',
            'pic'   =>  '/storage/user/avatar.png',
            'password'  =>  Hash::make('123456789'),
        ]);
    }
}
