<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'name',
        'value',
        'info',
    ];
    public function users(){
        return $this->belongsToMany(User::class);
    }
}
