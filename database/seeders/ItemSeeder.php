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
        Item::create(["user_id" => 2, "status" => "active", "type" => 9, "quantity" => 18, "name" => "ポテトスナック", "price" => 140]);
        Item::create(["user_id" => 2, "status" => "active", "type" => 9, "quantity" => 7, "name" => "のり塩ポテト", "price" => 145]);
        Item::create(["user_id" => 2, "status" => "active", "type" => 9, "quantity" => 18, "name" => "リッチポテトWガーリック", "price" => 168]);        
        Item::create(["user_id" => 2, "status" => "active", "type" => 9, "quantity" => 11, "name" => "Bigラーメンスナック", "price" => 110]);
        Item::create(["user_id" => 3, "status" => "active", "type" => 9, "quantity" => 23, "name" => "ゴリゴリくんソーダ", "price" => 98]);
        Item::create(["user_id" => 3, "status" => "active", "type" => 9, "quantity" => 19, "name" => "チョコ最中ビッグ", "price" => 100]);
        Item::create(["user_id" => 3, "status" => "active", "type" => 9, "quantity" => 13, "name" => "PARICCOチョコ", "price" => 110]);
        Item::create(["user_id" => 4, "status" => "active", "type" => 9, "quantity" => 6, "name" => "うまいぞう", "price" => 20]);
        Item::create(["user_id" => 4, "status" => "active", "type" => 9, "quantity" => 15, "name" => "たっちゃんイカ", "price" => 40]);
        Item::create(["user_id" => 4, "status" => "active", "type" => 9, "quantity" => 25, "name" => "カボチャ太郎", "price" => 50]);
        Item::create(["user_id" => 4, "status" => "active", "type" => 9, "quantity" => 45, "name" => "ハッピーラムネ", "price" => 40]);
        Item::create(["user_id" => 4, "status" => "active", "type" => 9, "quantity" => 12, "name" => "ラーメンスナック", "price" => 50]);
        Item::create(["user_id" => 4, "status" => "active", "type" => 9, "quantity" => 14, "name" => "ラーメンスナック辛口", "price" => 50]);
        
        // for ($i = 1; $i <= 100; $i++) {
        //     Item::create([
        //         "user_id" => rand(1, 4), 
        //         "status" => "active", 
        //         "type" => 9,                
        //         "quantity" => 15,  
        //         "name" => "謎のおやつ No.". $i,
        //         "price" => rand(4, 10) * 10,
        //     ]);
        // }
    }
    
}
