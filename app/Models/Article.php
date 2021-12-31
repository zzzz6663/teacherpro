<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'title',
        'image',
        'article',
        'tag',
        'active',
        'submit',
        'acat_id',
        'home',
    ];




    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return  $this->morphMany(Comment::class,'commentable');
    }




    public function acats(){
        return $this->belongsToMany(Acat::class);
    }


    public function acat_list(){
//        dd($this->acats()->get());
    }



}
