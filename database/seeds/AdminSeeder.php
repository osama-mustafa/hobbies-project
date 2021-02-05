<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;



class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $admin = new User([

            'name' => 'Osama',
            'email' => 'osama@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
             'role' =>'admin',
        ]);

        $admin->save();
    }
}
