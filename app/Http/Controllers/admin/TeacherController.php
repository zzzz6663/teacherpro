<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Count;
use App\Models\Meet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class TeacherController extends Controller
{

    public function teacher_class(Request $request,User $user){
        $class=$user->meets()->orderBy('id','desc')->where('pair','!=',null)->paginate(10);
        return view('admin.teacher.teacher_class',compact(['user','class']));
    }
    public function teacher_bill(Request $request,User $user){
        $bill=$user->bills()->whereStatus('1')->orderBy('id','desc')->paginate(10);
        return view('admin.teacher.teacher_blil',compact(['user','bill']));
    }
    public function teacher_article(Request $request,User $user){
        $article=$user->articles()->orderBy('id','desc')->paginate(10);;
        return view('admin.teacher.teacher_article',compact(['user','article']));
    }
    public function teacher_article_show(Article $article ,User  $user){
        return view('admin.teacher.teacher_article_show',compact([ 'article','user']));
    }
    public function teacher_article_active(Article $article){
        if ($article->submit==1){
            $article->update([
                'submit'=>'0'
            ]);
            alert()->error('نوشته با موفقیت برای نمایش رد شد ');
        }else{
            $article->update([
                'submit'=>'1'
            ]);
            alert()->success('نوشته با موفقیت برای نمایش تایید شد ');
        }
        return back();

    }
    public function edit_teacher(Request $request,User $user){
        $teacher=$user;
        return view('admin.teacher.edit_teacher',compact(['teacher']));
    }
    public function active_teacher(Request $request,User $user){
        if ($user->active==1){
            $user->update(['active'=>'0']);
            alert()->error('مدرس با موفقیت غیر فعال شد ' ,'پیام  جدید');
        }else{
            $user->update(['active'=>'1']);
            alert()->success('مدرس با موفقیت   فعال شد ' ,'پیام  جدید');
        }
        return Redirect::back() ;
    }
    public function teacher_comment_active(Request $request,Comment $comment){
        if ($comment->active==1){
            $comment->update(['active'=>'0']);
            alert()->error('نظر با موفقیت غیر فعال شد ' ,'پیام  جدید');
        }else{
            $comment->update(['active'=>'1']);
            alert()->success('نظر با موفقیت   فعال شد ' ,'پیام  جدید');
        }
        return Redirect::back() ;
    }
    public function teacher_comment_delete(Request $request,Comment $comment){
        $comment->delete();
        alert()->error(' نظر با موفقیت حذف شد  ' ,'پیام  جدید');
        return Redirect::back() ;
    }

    public function  save_attr(Request  $request ,User $user){
        $data=$request->except(['_token','_method']);
       foreach ($data as $da =>$va){
          $user->save_attr($da ,$va);
       }
       alert()->success('اطلاعات با موفقیت به روز شد ');
       return back();
    }
    public function  class_result (Request  $request ,Meet $meet){
        $data=$request->validate([
            'status'=>'required'
        ]);
        $teacher=User::find($meet->user_id);
        $student=User::find($meet->student_id);
        $meet->update([
            'status'=>$data['status']
        ]);
        if ($data['status']=='down'){
            alert()->success('اطلاعات با موفقیت به روز شد ');
        }
         if ($data['status']=='canceled'){
             $count=Count::where('bill_id',$meet->bill_id)->first();
             $count->update([
                 'count'=>$count->count+1
             ]);
            alert()->success('یک کلاس  به کلاس های معلم اضافه شد ');
        }

        return back();
    }



    }
