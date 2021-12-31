<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;

    protected $fillable=[
        'type',
        'title',
        'info',
        'place',
        'from',
        'till',
        'ex',
    ];
    public function user(){
        return $this->belongsTo(Resume::class);
    }
}
