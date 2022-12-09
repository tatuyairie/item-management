<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use \App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(["name" => 'テスト太郎', "role" => "admin", "email" => 'testtest@example.com', "password" => Hash::make('testtest')]);
        User::create(["name" => 'テスト花子', "role" => NULL, "email" => 'hanako@example.com', "password" => Hash::make('hanakohanako')]);       
    }
    
}
