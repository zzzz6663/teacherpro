<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function edit_student(Request $request,User $user){
        return view('admin.student.edit_student',compact(['user']));
    }

    public function student_class(Request $request,User $user){
        $class=$user->smeets()->orderBy('id','desc')->where('pair','!=',null)->paginate( 10);
        return view('admin.student.student_class',compact(['user','class']));
    }
    public function student_bill(Request $request,User $user){
        $bill=$user->bills()->whereStatus('1')->orderBy('id','desc')->paginate(10);
        return view('admin.student.student_blil',compact(['user','bill']));
    }
}
