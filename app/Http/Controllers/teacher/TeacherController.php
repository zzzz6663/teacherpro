<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Fclass;
use App\Models\Language;
use App\Models\Setting;
use App\Models\User;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class TeacherController extends Controller
{
   public function  logout(){
           Auth::logout();
           alert()->success('شما با موفقیت از حساب کاربری خود خارج شدید ');
           return  \redirect(route('home.teacher.list'));
   }
   public function  dashboard(){




       $user=auth()->user();
       return view('home.teacher.profile.dashboard',compact(['user']));
   }

   public function  setting(){
       return view('home.teacher.profile.setting');

   }
   public function  classes(){
       $user=auth()->user();
       return view('home.teacher.profile.classes',compact(['user']));
   }
   public function  see_comment(Article $article){
        $user= \auth()->user()->id;
       $article->comments()->update(['seen'=>'1']);
       return view('home.teacher.profile.see_comment',compact(['article' ]));
   }
   public function  cancel_class_list(){
    $user=auth()->user();
    return view('home.teacher.profile.cancel_list',compact(['user']));
}
   public function  wallet(){
//       $comments=Comment::query();
//       $comments = $comments->where(function($query) use ($request){
//           if ($request->search){
//               $search=$request->search;
//               $query->Where('comment','LIKE',"%{$search}%")->get();
//           }
//       });
//       if ($request->search){
//           $comments->OrWhereHas('user', function($query) use ($request){
//               $search=$request->search;
//               $query->Where('name' ,$search);
//           });
//       }

       $user=auth()->user();
       $bills=$user->bills()->whereStatus('1')->orderBy('id','Desc')->paginate(10);

       return view('home.teacher.profile.wallet',compact(['user','bills']));
   }
   public function  downloads(){
       return view('home.teacher.profile.downloads');
   }
   public function  save_draft(Request $request){
       $request->validate([
           'title'=>'required',
           'article'=>'required',
       ]);
       $user=auth()->user();
      $ar= $user->articles()->create($request->except(['_method','_method']));
      alert()->success('نوشته با موفقیت اضافه شد ');
        return back();
   }
   public function  posts(){
       return view('home.teacher.profile.posts');
   }
   public function  profile_save_info(Request $request,User $user){
       $data=$request->validate([

           'name'=>'required|min:3|max:10',
           'family'=>'required|min:4|max:10',
//           'username'=>['required','min:4' ,'max:24','regex:/^[a-zA-Z0-9]+$/',
//               Rule::unique('users')->ignore($user->username, 'username')
//           ],
//               'required|unique:users,username|min:5',
           'email'=>['required' ,Rule::unique('users', 'email')->ignore($user->id)],
           'mobile'=>['required','min:10' ,Rule::unique('users', 'mobile')->ignore($user->id)],
           'sex'=>'required',
           'country'=>'required',
           'bio'=>'required|max:1000',
       ]);

//       $params=[
//           'username'=>$user->username
//       ];
//       $sky_user=   $this->sky('getUser',$params);
//       if ($sky_user['ok']){
//        $sky_id=$sky_user['result']['id'];
//           $params=[
//               'user_id'=>$sky_id,
//               'username'=>$data['username']
//           ];
//
//          $res= $this->sky('updateUser',$params);
//
//       }
//
//       $res=  $this->sky('createUser',$params);
       $user->deactive();
       $user->update($data);
       alert()->success('اطلاعات شما با موفقیت به روز رسانی شد ');
       return back();
   }
   public function  delete_fclass(Fclass $fclass){
       $fclass->delete();
       alert()->success('کلاس با موفقیت حذف شد ');
       return back();

   }
   public function  profile(){
       $user=auth()->user();
       $resume=$user->resumes()->orderBy('id','DESC')->get();
       return view('home.teacher.profile.profile',compact(['user','resume']));
   }
   public function  plans(){
       $teacher=auth()->user();
       $meets=$teacher->meets()->whereNull('student_id')->whereNotNull('start')->get();
       return view('home.teacher.profile.plans',compact(['teacher','meets']));
   }
   public function  prices(){
       $teacher=auth()->user();
       return view('home.teacher.profile.prices',compact('teacher'));
   }
   public function  tutorials(){
       return view('home.teacher.profile.tutorials');
   }
   public function  lang(){
       $user=auth()->user();
       $languages=$user->languages()->withPivot('level','status')->get();

       $langs=Language::whereActive('1')->orderBy('sort')->get();
       return view('home.teacher.profile.lang',compact(['user','langs','languages']));
   }
   public function  articles(){


       $user=auth()->user();
//       dd($user->comments()->with('articles')->get());
//
//       $article = Article::with(['user'=>function($query) use($user){
//           $query->where('id',$user->id)->get();
//       },'comments'])->get();
//
//       dd($article->comments);




        $artices_active=$user->articles()->whereActive('1')->orderBy( 'id','DESc')->get();
        $artices_deactive=$user->articles()->whereActive('0')->orderBy('id','DESc')->get();
       return view('home.teacher.profile.articles',compact(['user','artices_active','artices_deactive']));
   }
   public function  quiz(){
       return view('home.teacher.profile.quiz');
   }
   public function  delete_lang(Language $language){
      $user=auth()->user();
      $user->languages()->detach([$language->id]);
      if ($user->languages()->count()==0){
          alert()->error('شما باید حداقل یک زبان برای تدریس انتخاب کنید تا در لیست اساتید نمایش داده شوید ');

      }else{
          alert()->success('زیان مورد نظر شما با موفقیت حذف شد ');

      }
      return back();

   }
   public function  active_profile(Request  $request ,User $user){
    //    if (($user->languages()->count()==0 && $request->activeprofile )){
    //        alert()->error('شما باید حداقل یک زبان برای تدریس انتخاب کنید');
    //        return \redirect()->route('teacher.lang');
    //    }
    if(!$user->name || !$user->family){
        alert()->error('لطفا نام و نام خانوادگی خود  را کامل  کنید');
return back();
    }
       if ($user->percent()==100){
           if ($request->activeprofile){
               $user->update(['submit'=>'1']);
               alert()->success( 'پروفایل شما با موفقیت فعال شد ');
           }else{
               $user->update(['submit'=>'0']);
               alert()->success( 'پروفایل شما با موفقیت غیر فعال شد ');
           }
           $user->deactive();
       }else{
           alert()->error( 'شما هنوز پروفایل خود را کامل نکرده اید ');
       }

       return back();
   }
   public function  save_expert(Request  $request ,User $user){
       $data=$request->except(['_token','_method']);
//       $data=$request->validate([
//           'teach_level'=>"required|array|min:1",
//           'teach_dialect'=>"required|array|min:1",
//           'teach_age'=>"required|array|min:1",
//           'teach_class'=>"required|array|min:1",
//           'teach_sub'=>"required|array|min:1",
//           'teach_exam'=>"required|array|min:1",
//       ]);
      foreach ($data as $da=>$va){
          if ($va==null){
              continue;
          }
        $user->save_attr($da,$va);
      }
    //    $user->deactive();
      alert()->success('اطلاعات با موفقیت ثبت شد ');
      return back();

   }
   public function  save_bg(Request  $request ,User $user){

            $data=$request->validate([
                'bg'=>'required|image|max:8000',
            ]);
       $image=$request->file('bg');
       $name_img= $user->id.'bg'.'.'.$image->getClientOriginalExtension();
       $image->move(public_path('/src/bg'),$name_img);

       $path = public_path('/src/bg/'.$name_img);
       if(file_exists($path)){
           Image::make($path)->fit(1200, 250)->save(public_path('/src/bg/'.$name_img));
       }
       $user->save_attr('bg',$name_img);
       alert()->success('عکس شما با موقثیت به روز شد ');
        return back() ;


   }
   public function  save_avatar(Request  $request ,User $user){
    $user = \auth()->user();
    $image = $request->avatar;

    list($type, $image) = explode(';', $image);
    list(, $image) = explode(',', $image);

    $image = base64_decode($image);
    $image_name = $user->id . '_avatar' . '_' . time() . '.png';
    file_put_contents(public_path('/src/avatar/') . $image_name, $image);

    $user->save_attr('avatar', $image_name);
    return response()->json([
        'url' => asset('/src/avatar/' . $image_name),
    ]);
   }

   public function  save_account(Request  $request)  {
       $data=$request->validate([
           'shaba'=>'required|digits:24',
           'cart'=>'required|digits:16'
       ]);
       $user=auth()->user();
       foreach($data as $ke => $va){
        $user->save_attr($ke,$va);
      }
      alert()->success('اطلاعات با موفقیت ذخیره شد ');
return back();


   }
   public function  save_password(Request  $request ,User $user){
       $data=$request->validate([
           'password'=>'required|min:4|max:24|regex:/^[a-zA-Z0-9]+$/|confirmed',
       ]);
       $params=[
        'username'=>$user->username
       ];
        $sky_user=   $this->sky('getUser',$params);

       $res=  $this->sky('createUser',$params);
//       if (!$res['ok']){
//           return response()->json([
//               'status'=>0,
//               'message'=>$res['error_message'],
//           ]);
//       }

       $user->update([
           'password'=>Crypt::encryptString($data['password'])
       ]);
        alert()->success('رمز عبور با موفقیت ثبت شد  ');
        return back() ;
   }
   public function  save_port(Request  $request ,User $user){
       $data=$request->validate([
           'port_img'=>"required|file|max:2000",
           'port_vid'=>"required|file|max:8192",
       ]);


       $image=$request->file('port_img');
       $name_img= $user->id.'_port_img'.'.'.$image->getClientOriginalExtension();
       $image->move(public_path('/src/port_img'),$name_img);
       $data['port_img']=$name_img;

       $vid=$request->file('port_vid');
       $name_vid= $user->id.'_port_vid'.'.'.$vid->getClientOriginalExtension();
       $vid->move(public_path('/src/port_vid'),$name_vid);
       $data['port_vid']=$name_vid;

        foreach($data as $ke => $va){
            $user->save_attr($ke,$va);
        }

       $user->save_attr('port','1');
       $user->deactive();
    alert()->success('تصویر و ویدئو با موقثیت ثبت شد ');
        return back();

   }
   public function  save_lang(Request  $request ,User $user){

       $data=$request->validate([

           'language_id'=>"required",
           'status'=>"required",
           'level'=>"nullable",
       ]);

       $lanf= $user->languages()->get()->pluck('id')->toArray();
       if (in_array($data['language_id'],$lanf)){
           alert()->success('اطلاعات به روز شد ');
          return back();
      }
       $da=['user_id'=>$user->id,'language_id'=> $data['language_id']];
     $user->languages()->attach([$data]);
       alert()->success('اطلاعات به روز شد ');
     return back();


   }
   public function  save_plan(Request  $request ,User $user){

       $data=$request->validate([
           'reserve'=>"required_without:can|array|min:1",
           'can'=>"required_without:reserve|array|min:1",
       ]);
       $reserve=$request->reserve;
       if ($reserve){
           foreach ($reserve as $key => $va){
               $reserve=$user->meets()->whereStart($va)->whereNull('student_id')->first();
               if (!$reserve){
                   $user->meets()->create([
                       'start'=>$va,
                       'status'=>'no_reserved'
                   ]);
               }

           }
       }
       $can=$request->can;
       if ($can){
           foreach ($can as $key => $va){
               $meet=$user->meets()->whereStart($va)->whereNull('student_id')->first();
               if ($meet){
                 $meet->update([
                     'start'=>null,
                     'status'=>null
                 ])  ;
               }

           }
       }


       $user->save_attr('time_plan','time_plan');
           alert()->success(' برنامه شما با موفقیت به روز شد ' );
       return Redirect::back();
   }

   public function  save_price(Request  $request ,User $user){
        $min_price=Setting::whereName('min_price')->first()->value;
        $max_price=Setting::whereName('max_price')->first()->value;

       $data=$request->validate([
           'meet1'=>"required|numeric|min:$min_price|max:$max_price",
           'meet5'=>"required|numeric|min:$min_price|max:$max_price",
           'meet10'=>"required|numeric|min:$min_price|max:$max_price",
       ]);
       $user->update($data);
//      foreach ($data as $key=>$va){
//          $user->save_attr($key,$va);
//      }
    //    $user->deactive();
       $user->save_attr('price_plan','price_plan');
        alert()->success('قیمت ها با موفقیت به روز شد ' );
     return Redirect::back();
   }
    public function  more_price(Request  $request ,User $user){
        $min_price=Setting::whereName('min_price')->first()->value;
        $max_price=Setting::whereName('max_price')->first()->value;

        $data=$request->validate([
            'freeclass'=>"required",
            'free_meeting_price'=>"nullable|required_if:freeclass,nofree|numeric|min:$min_price|max:$max_price",
        ]);
        foreach ($data as $key=>$va){
            $user->save_attr($key,$va);
        }
        $user->deactive();
        alert()->success('قیمت ها با موفقیت به روز شد ','پیام');
        return Redirect::back();
    }

    public function sky($action,$params=array()){
        try {
            $test= Http::post('https://www.skyroom.online/skyroom/api/apikey-263858-38-648406da3fbe1d295b451a0bde7427a1',[
                "action"=>$action,
                'params'=>$params
            ]);
            return   $test->json();
        }catch (\Exception $e){
            return false;
        }

    }
    public function free_class(Request $request ,User $user ){
       $fclass= $user->fclasses()->create(['name'=>$request->name]);
        foreach ($request->ser as $ser){
           $day=explode('/',$ser['day'] );

           $geo= \Hekmatinasser\Verta\Facades\Verta::getGregorian($day[0],$day[1],$day[2]);
            $start=Carbon::parse($geo[0].'-'.$geo[1].'-'.$geo[2].' '.$ser['h'].':'.$ser['min'].':00');
            $end=$start->addMinutes($ser['du']);
            $fclass->meets()->create([
                'model'=>'free',
                'start'=>$start,
                'user_id'=>$user->id
            ]);
        }
        return back()->withInput(array('flass' => $fclass->id ));





    }


}
