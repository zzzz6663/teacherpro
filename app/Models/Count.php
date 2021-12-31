<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Count extends Model
{
    use HasFactory;
    protected $fillable=['user_id','teacher_id','count','com','price','bill_id'];
    public $timestamps = false;
    public function count( $teacher_id,$user_id)
    {
        $co=$this->where('user_id',$user_id)->where('teacher_id',$teacher_id)->first();
        if ($co){
            return $co;
        }
        return false;
    }
    public function create_count( $teacher_id,$user_id)
    {
     return   $co = $this->create([
            'teacher_id' => $teacher_id,
            'user_id' => $user_id,
            'count' => 0,
        ]);
    }
    public function update_count($teacher_id,$user_id,$count,$type=0)
    {
        $cou= $this->where('user_id',$user_id)->where('teacher_id',$teacher_id)->first();
        if ($cou){
            if ($type==1){
                $cou->update(['count'=>($count +$cou->count)]);

            }else{
                $cou->update(['count'=>($cou->count-$count )]);
            }

        }
    }
}
