<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fave extends Model
{
    use HasFactory;
    protected $fillable=['teacher_id','user_id'];
    public $timestamps = false;

    public function users(){
        return $this->belongsTo(User::class,'id','user_id');
    }
    public function teachers(){
        return $this->belongsTo(User::class,'id','teacher_id');
    }
}
