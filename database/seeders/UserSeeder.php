<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'user_name' => 'admin',
            'email' => 'admin@admin.com',
            'phone_number'=>'+962795392859',
            'gender'=>'male',
            'password' => Hash::make('123456789'),
            'age' => '1997-09-10',
            'avatar' => '/images/1643830610.png',
        ]);
    }
}
