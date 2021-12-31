<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'meet_id',
        'amount',
        'type',
        'status',
        'remain',
        'count',
        'com',
        'transactionId',
        'bank',
        'port',
        'wallet',
        'info',
    ];

    public function  user(){
        return $this->belongsTo(User::class);
    }

    public function  meet(){
        return $this->belongsTo(Meet::class);
    }
}
