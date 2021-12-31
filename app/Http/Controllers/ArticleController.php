<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $user=auth()->user();

        return view('home.teacher.profile.create_articles',compact(['user']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        $valid=$request->validate([
            'title'=>'required|string|min:1',
            'image' => 'required|max:2048',
            'article' => 'required|string|min:1',
            'tag' => 'required|array',
            'cat' => 'required|array',
        ]);
        $image=$request->file('image');

        $name_img= 's'.time().'.'.$image->getClientOriginalExtension();

        $image->move(public_path('/src/article/images/'),$name_img);

        $path = public_path('/src/article/images/'.$name_img);
        if(file_exists($path)){
            Image::make($path)->crop(103, 81)->save(public_path('/src/article/images/per'.$name_img));
            Image::make($path)->crop(214, 240)->save(public_path('/src/article/images/articles'.$name_img));
            Image::make($path)->crop(958, 514)->save(public_path('/src/article/images/a1'.$name_img));
            Image::make($path)->crop(99, 65)->save(public_path('/src/article/images/a2'.$name_img));
            Image::make($path)->crop(387, 216)->save(public_path('/src/article/images/a3'.$name_img));
        }
        $valid['image']=$name_img;
        $valid['active']='0';

        if ($request->has('save')){
            $valid['active']='1';
        }

        $valid['tag']=implode('__',$valid['tag']);
        $user=auth()->user();
        $ar=$user->articles()->create($valid);
        $ar->update($valid);
        $ar->acats()->sync($valid['cat']);
        return \redirect( route('teacher.articles'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $Article )
    {
        $auth=auth()->user();
        if ($auth->id != $Article->user_id){
            if ($auth->level !='admin'){
                alert()->error('شما قادر به ویرایش نیستید');
                return back();
            }
        }
        if ($Article->user_id)
        $user=User::find($Article->user_id);
        return view('home.teacher.profile.edit_articles',compact(['Article','user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $Article)
    {

        $valid=$request->validate([
            'title'=>'required|string|min:1',
            'article' => 'required|string|min:1',
            'tag' => 'required|array',
            'cat' => 'required|array',

        ]);
        if ($request->hasFile('image')){


        $image=$request->file('image');

        $name_img= 's'.time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('/src/article/images/'),$name_img);
            $path = public_path('/src/article/images/'.$name_img);
//            if(file_exists($path)){
//                Image::make($path)->crop(103, 81)->save(public_path('/src/article/images/per'.$name_img));
//                Image::make($path)->crop(214, 240)->save(public_path('/src/article/images/articles'.$name_img));
//                Image::make($path)->crop(958, 514)->save(public_path('/src/article/images/a1'.$name_img));
//                Image::make($path)->crop(99, 65)->save(public_path('/src/article/images/a2'.$name_img));
//                Image::make($path)->crop(387, 216)->save(public_path('/src/article/images/a3'.$name_img));
//            }

        $valid['image']=$name_img;
        }
        $valid['active']='0';
        if ($request->has('save')){
            $valid['active']='1';
        }

        $valid['tag']=implode('__',$valid['tag']);
        $user=auth()->user();
        $Article->update($valid);
        $Article->update(['submit'=>'0']);


        $Article->acats()->sync($valid['cat']);
        alert()->success(' نوشته شما با موفقیت  به روز شد ');
        return \redirect(route('teacher.articles'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $Article)
    {
        //
        $Article->comments()->delete();
        $Article->delete();
        alert()->success(' نوشته شما با موفقیت حذف شد ');
        return  back();

    }
}
