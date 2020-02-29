<?php

use Illuminate\Database\Seeder;

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

        for ($i = 1; $i < 5; $i++){
            \App\User::create([
                'name'  =>  'case'.$i,
                'email' =>  'case'.$i.'@gmail.com',
                'password'  =>  '123',
            ]);
        }
    }
}
