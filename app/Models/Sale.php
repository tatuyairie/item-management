<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
    // public function items() {
    //     return $this->hasMany(Item::class);
    // }
    protected $fillable = ['name','type','price','quantity','amount','detail','total_price','item_id','user_id'];

    protected $guarded = ['id'];

    public static $types = [
        1 => '本',
        2 => '玩具',
        3 => '日用品',
        4 => '衣類',
        5 => '家電',
        6 => 'アウトドア',
        7 => '美容',
        8 => '音楽・映像作品',
        9 => '食品',
        0 => 'その他'
    ];
}
