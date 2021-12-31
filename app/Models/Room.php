<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable=['user_id','student_id','name','title','guest_login','code','sky_id','error'];

    public function users()
    {
        return $this->belongsTo(User::class);
   }
    public static function room_sky($teacher_id,$student_id)
    {
        $room=Room::Where('user_id',$teacher_id)->where('student_id',$student_id)->first();
        if ($room){
            return $room->name;
        }
        return false;
    }

}
