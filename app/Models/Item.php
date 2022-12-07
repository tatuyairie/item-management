<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function sale() {
        return $this->hasOne(Sale::class);
    }
    // public function sale()
    // {
    //     return $this->belongsTo('App\Models\Sale');
    // }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'type',
        'quantity',
        'price',
        'detail',
        'status'
    ];
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
    public static $status = [
        'active',
        'inactive'
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];

    // use SoftDeletes;
    /**
     * ソフトデリート
     *
     * @var array
     */
    // protected $dates = ['deleted_at'];
}
