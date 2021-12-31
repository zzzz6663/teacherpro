<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fclass extends Model
{
    use HasFactory;
    protected $fillable=['user_id','student_id','name'];
    public function meets(){
        return $this->hasMany(Meet::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }


}
