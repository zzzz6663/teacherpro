<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emeet extends Model
{
    use HasFactory;
    protected $fillable=['user_id', 'teacher_id','meet_id', 'bill_id', 'meet_id_after', 'reason'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function meet(){
        return $this->belongsTo(Meet::class);
    }
}
