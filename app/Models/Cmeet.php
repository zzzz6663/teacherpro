<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cmeet extends Model
{
    use HasFactory;
    protected $fillable=['user_id', 'meet_id', 'bill_id'];
     public function user(){
         return $this->belongsTo(User::class);
     }
    public function meet(){
        return $this->belongsTo(Meet::class);
    }
    public function smeet(){
        return $this->belongsTo(Meet::class,'student_id','id');
    }
}
