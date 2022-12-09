<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::create(["user_id" => 1, "status" => "active", "type" => 9, "quantity" => 19, "name" => "ミルクチョコレート", "price" => 120]);
        Item::create(["user_id" => 1, "status" => "active", "type" => 9, "quantity" => 24, "name" => "キャラメルチョコ", "price" => 90]);
        Item::create(["user_id" => 1, "status" => "active", "type" => 9, "quantity" => 10, "name" => "Rocky", "price" => 140]);
        Item::create(["user_id" => 1, "status" => "active", "type" => 9, "quantity" => 13, "name" => "GABAチョコレート", "price" => 130]);        
        
    }
    
}
