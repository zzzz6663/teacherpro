<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meet extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'student_id',
        'price',
        'com',
        't_click',
        'type',
        's_click',
        'active',
        'model',
        'canceled',
        'start',
        'pair',
        'bill_id',
        'status',
        'down',
    ];
    public function  user(){
        return $this->belongsTo(User::class);
    }
    public function  suser(){
        return $this->belongsTo(User::class,'student_id');
    }

    public function  student(){
        return $this->belongsTo(User::class)->whereLevel('student');
    }

    public function bill(){
        return $this->belongsTo(Bill::class);
    }
   public function fclass(){
        return $this->belongsTo(Fclass::class);
    }

    public function cmeets(){
        return $this->hasMany(Cmeet::class);
    }
    public function emeets(){
        return $this->hasMany(Emeet::class);
    }


    public function empty_class()
    {
        $this->update([
            'com'=>'0',
            'price'=>null,
            'type'=>'pay',
            'bill_id'=>null,
            'student_id'=>null,
            'status'=>'no_reserved',
            'pair'=>null
        ]);
        return true;

    }
}
