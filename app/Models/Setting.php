<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected  $fillable = ['name','value','info','image'];
    public function set($val){
        $aa=$this->whereName($val)->first();
        if ($aa){
          return $aa->value;
        }
        return false;
    }
}
