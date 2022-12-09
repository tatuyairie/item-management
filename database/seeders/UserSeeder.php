<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
        User::create(["name" => 'テスト太郎', "role" => "admin", "email" => 'testtest@example.com', "password" => 'testtest']);
        User::create(["name" => 'テスト花子', "role" => NULL, "email" => 'hanako@example.com', "password" => 'hanakohanako']);       
    }
    
}
