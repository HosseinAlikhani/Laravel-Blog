<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

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
        User::truncate();
        for ($i = 1; $i < 5; $i++){
            User::create([
                'name'  =>  'd3cr33'.$i,
                'email' =>  'd3cr33'.$i.'@gmail.com',
                'password'  =>  Hash::make('123'),
            ]);
        }
    }
}
