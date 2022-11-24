<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = ['name','type','price','quantity','detail','total_price'];
    protected $guarded = ['id','user_id'];
    public static $types = [
        1 => '本',
        2 => '玩具',
        3 => '日用品',
        4 => '衣類',
        5 => '家電',
        6 => 'アウトドア',
        7=> '美容',
        8 => '音楽・映像作品',
        9 => '食品',
        0 => 'その他'
    ];
}
