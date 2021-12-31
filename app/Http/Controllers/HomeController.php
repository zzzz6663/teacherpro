<?php

namespace App\Http\Controllers;

use AliBayat\LaravelCategorizable\Category;
use App\Mail\SampleMail;
use App\Models\Acat;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Count;
use App\Models\Fclass;
use App\Models\Language;
use App\Models\Meet;
use App\Models\Payam;
use App\Models\Room;
use App\Models\User;
use App\Notifications\SendCodeSms;
use App\Notifications\SendKaveCode;
use App\Notifications\SendSms;
use App\Notifications\testNotification;
use Carbon\Carbon;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;
use Newsletter;
use function Composer\Autoload\includeFile;

class HomeController extends Controller
{
    public function redirect_google (Request  $request){
        return Socialite::driver('google')->redirect();
    }
    public function gcallback( ){
        try {
            $goo= Socialite::driver('google')->stateless()->user();
            $user= User::whereEmail($goo->email)->first();
            if ($user){
                Auth::loginUsingId($user->id, true);

                if ($fclass=session()->get('flink')){
                    $fclass=Fclass::find($fclass);
                    $fclass->update(['student_id'=>$user->id]);
                    $fclass->meets() ->update(['student_id'=>$user->id]);;
                    $teacher=User::find($fclass->user->id);
                    $teacher->create_ski_room($user);
                    session()->forget('flink');
                }
                return redirect()->route('student.dashboard');

            }else{
//                $user=  User::create([
//                    'email'=>$goo->email,
//                    'name'=>$goo->name,
//                    'level'=>'student',
//                    'password'=>'123456'
//                ]);

                alert()->error('        شما قبلا با این ایمیل ثبت نام نکرده اید  ');
                return back();
            }


        }catch (\Exception $e){
//
            alert()->error('ارتباط با گوگل برقرار نشد ');
            return back();
        }
    }
    public function test( ){
        $meets=Meet::where('status','down')->where('model','not_free')->whereNull('pair')->get();
        foreach ($meets as $meet){
            $teacher=User::find($meet->user_id);
            if ($meet->status=='down'){
                $bill=$meet->bill()->first();
                $amount=$bill->amount;
                $com=$bill->com;

                if ($bill->count>0){
                    $unit_price=($amount-$com)/$bill->count;
                }else{
                    $unit_price=($amount-$com);
                }
                $unit_com=$bill->com;
                $newBill_teacher = $bill->replicate();
                $newBill_teacher->user_id = $teacher->id; // the new project_id
                $newBill_teacher->com = 0; // the new project_id
                $newBill_teacher->type = 'deposit_teacher'; // the new project_id
                $newBill_teacher->remain = $unit_price+$teacher->total_cash(); // the new project_id
                $newBill_teacher->amount = $unit_price; // the new project_id
                $newBill_teacher->save();
                $teacher->change_cash(    $newBill_teacher->type,$unit_price);

                $admin=User::where('mobile','09128129745')->first();
                $newBill_admin = $bill->replicate();
                $newBill_admin->user_id = $admin->id; // the new project_id
                $newBill_admin->com = 0; // the new project_id
                $newBill_admin->type = 'site_share'; // the new project_id
                $newBill_admin->remain = $unit_com +$admin->total_cash(); // the new project_id
                $newBill_admin->amount = $unit_com; // the new project_id
                $newBill_admin->save();
                $admin->change_cash(    $newBill_admin->type, $unit_com);
            }

            $meet->update(['status'=>'passed']);
            if ($meet->type !='free'){
                $new_meet= $teacher->meets()->whereModel('not_free')->whereStart(Carbon::parse($meet->start)->addMinutes(30))->first();
                $new_meet->update(['status'=>'passed']);
            }

        }
//        $meets=Meet::where('status','down')->where('model','not_free')->whereNull('pair')->get();
//        foreach ($meets as $meet){
//            $teacher=User::find($meet->user_id);
//            if ($meet->status=='down'){
//                $bill=$meet->bill()->first();
//                $amount=$bill->amount;
//                $com=$bill->com;
//                if ($bill->count>0){
//                    $unit_price=($amount-$com)/$bill->count;
//                }
//                $unit_com=$bill->com;
//                $newBill_teacher = $bill->replicate();
//                $newBill_teacher->user_id = $teacher->id; // the new project_id
//                $newBill_teacher->com = 0; // the new project_id
//                $newBill_teacher->type = 'deposit_teacher'; // the new project_id
//                $newBill_teacher->remain = $unit_price+$teacher->total_cash(); // the new project_id
//                $newBill_teacher->amount = $unit_price; // the new project_id
//                $newBill_teacher->save();
//                $teacher->change_cash(    $newBill_teacher->type,$unit_price);
//
//                $admin=User::where('mobile','09128129745')->first();
//                $newBill_admin = $bill->replicate();
//                $newBill_admin->user_id = $admin->id; // the new project_id
//                $newBill_admin->com = 0; // the new project_id
//                $newBill_admin->type = 'site_share'; // the new project_id
//                $newBill_admin->remain = $unit_com +$admin->total_cash(); // the new project_id
//                $newBill_admin->amount = $unit_com; // the new project_id
//                $newBill_admin->save();
//                $admin->change_cash(    $newBill_admin->type, $unit_com);
//            }
//            $meet->update(['status'=>'passed']);
//            $new_meet= $teacher->meets()->whereStart(Carbon::parse($meet->start)->addMinutes(30))->first();
//            $new_meet->update(['status'=>'passed']);
//        }

    }
    public function home_payam(Request $request ){
        $data=$request->validate([
            'name'=>'required|min:3',
            'email'=>'required|email',
            'mobile'=>'required|min:11',
            'payam'=>'required|min:10',
        ]);
        Payam::create($data);
        alert()->success('پیام شما با موفقیت برای مدیریت ارسال شد  ');
        return back();

    }
    public function go_free_class(Fclass $fclass){
//       if ($fclass->student_id){
//           Auth::loginUsingId($fclass->student_id,true);
//           return \redirect(route('student.dashboard'));
//       }
        session()->put('flink',$fclass->id);
        return view('home.link',compact('fclass'));
    }
    public function index( ){

               $user=\auth()->user();

//dd($res);
//       dd($user->c    om_price(650000))
//;
        return view('home.home');
    }
    public function about_us( ){
        return view('home.about_us');
    }
    public function tag_articles(Request $request,$tag ){

        $articles=Article::where('submit','1')->where('active','1');

        $articles=$articles  ->Where( function($query) use ($tag){
            $query->Where('tag' ,'LIKE',"%{$tag}%");
        });
        $articles=$articles->latest()->paginate(6);
        return view('home.articles',compact('articles'));


    }
    public function check_sms(Request $requrest){
        $rnd=session()->get('rnd' );
        $mobile=  session()->get('mobile' );
        $level=  session()->get('level' );

        if ($requrest->code==$rnd){

            $user=User::whereMobile($mobile)->first();

            if (!$user){

                $user=User::create([
                    'mobile'=>$mobile,
                    'level'=>$level,
                    'password',substr($mobile, -4)
                ]);

                if ($fclass=session()->get('flink')){
                    $fclass=Fclass::find($fclass);
                    $fclass->update(['student_id'=>$user->id]);
                    $fclass->meets() ->update(['student_id'=>$user->id]);;
                    $teacher=User::find($fclass->user->id);
                    $teacher->create_ski_room($user);
                    session()->forget('flink');
                }
            }

            Auth::loginUsingId($user->id,true);

        //  $user->sms_code(new SendKaveCode(  ['login'=>$rnd],'57350',$mobile));
//          $user->sms_code('register',$user->name);

            $url=null;

            if ($user->level=='student'){

                $url=route('student.dashboard');
            }
            if ($user->level=='teacher'){
                $url=route('teacher.dashboard');
            }
            return response()->json([
                'status'=>'ok',
                'url'=>$url
            ]);
        }else{
            return response()->json([
                'status'=>'notok',
                'rnd'=>$requrest->code,
            ]);
        }

    }
    public function login_sms(Request $requrest){
        $new=1;
        $data=$requrest->validate([
            'mobile'=>'required|min:11|max:11',
            'level'=>'nullable|in:student,teacher' ,
        ]);
        $is_exist=User::whereMobile($data['mobile'])->first();
        if (!$is_exist && !isset($data['level'])){
            $new=0;
            return response()->json([
                'status'=>'ok',
                'new'=>$new,
            ]);
        }
        $digits = 4;
        $rnd=rand(pow(10, $digits-1), pow(10, $digits)-1);
        $invitedUser = new User;
        $invitedUser->notify(new SendKaveCode( $data['mobile'],'login',$rnd,'',''));
        session()->put('rnd',$rnd);
        session()->put('mobile',$data['mobile']);
        if ( isset( $data['level'])){
            session()->put('level',$data['level']);
        }
        $is_exist=User::whereMobile($data['mobile'])->first();
        if ($is_exist){
            $new=1;
        }
        return response()->json([
            'status'=>'ok',
            'rnd'=>$rnd,
            'new'=>$new,
        ]);
    }


    public function register_form()
    {
        if (Auth::check()){
            alert()->error('شما هم  اکنون در حساب خود هستید   ');
            return back();
        }
        // dd(session()->get('key_register'));
        return view('home.register_form');
//        return view('home.teacher_register_form');
    }
    public function home_articles(Request $request,Acat $acat ){
        if ($acat->id){
            $childs=Acat::where('parent_id',$acat->id)->get();
            if ($childs->first()){
                $articles= Article::whereHas('acats',function ($query) use ($childs){
                    $query->whereIn('acat_id',$childs->pluck('id')->toArray());
                })->where('submit','1');
            }else{
                $articles=$acat->articles()->where('submit','1')->where('active','1');

            }

//
//            if ($childs){
//                foreach ($childs as $child){
//                    $articles->where(function ($query) use ($child){
//
//                        $query->orWhere()->where('submit','1')->where('active','1');
//                    });
//                }
//
//            }
            $articles=$articles->latest()->paginate(6);
            return view('home.cat',compact(['articles','acat']));
        }
        $articles=Article::query();
        if ($request->has('search')){
            $articles=$articles  ->Where( function($query) use ($request){
                $search=$request->search;
                $query->Where('title' ,'LIKE',"%{$search}%")
                ->orWhere('article' ,'LIKE',"%{$search}%");
            });
        }
        $articles=$articles->where('submit','1')->where('active','1')->latest()->paginate(9);

        return view('home.articles',compact('articles'));
    }
    public function admin_login()
    {
        return view('admin.login');
    }
    public function check_login(Request $request){
        $exist_user=User::where('email',$request->username)->first();

        if ($exist_user){
            if (Crypt::decryptString($exist_user->password)==$request->password){
                Auth::loginUsingId($exist_user->id,'true');
                return redirect()->route('admin.index');
            }


        }

        alert()->error('اطلاعات شما صحیح نیست ');
        return back();


    }
    public function single_article( Request $request ,Article $article){
       $tags=explode('__',$article->tag);
        $related=Article::query();
           for ($i=0;$i<sizeof($tags),$i++; ){
               $related=$related->Where( function($query) use ($tags,$i){
                    $query->orWhere('tag' ,'LIKE',"%{$tags[$i]}%");
               });
           }
        $related=$related->latest()->take(3)->get();





        $all=Article::where('active','1')->where('submit','1')->pluck('id')->toArray();
      $pos=  array_search($article->id,$all);
        $next=null;
        $prv=null;
        $n=$pos+1;
        $p=$pos-1;
        if ( isset($all[$n])){
            $next=Article::find($all[$n]);
        }
        if (isset($all[$p])){
            $prv=Article::find($all[$p]);
        }
        return view('home.single_article',compact(['article','next','prv','tags','related']));
    }
    public function comment_teacher( Request $request ,User $user){
        $auth=\auth()->user() ;
            if (!$auth){
                alert()->error(' ابتدا وارد حساب کاربری خود شوید سپس نظر خود را ثبت کنید ');
                return back();
            }
       $com= Comment::where('commentable_type','App\Models\User')->where('commentable_id',$user->id)->where('user_id',$auth->id)->first();
        $meet=$user->meets()->where('student_id',$auth->id)->first();
        if (!$meet){
            alert()->error('شما قبلا با این استاد کلاسی نداشته اید ');
            return back();
        }
       if ($com){
           alert()->error('شما قبلا برای این معلم نظر ثبت کرده اید  ');
           return back();
       }
        $valid=$request->validate([
            'name'=>'required',
            'comment'=>'required',
            'rate'=>'required',
        ]);
        $valid['user_id']=$auth->id;
        $comment=$user->comments()->create($valid);
        alert()->success('نظر شما با موفقیت  ثبت شد ');
        return back();
    }
    public function comment_article( Request $request ,Article $article){
        $valid=$request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'comment'=>'required',
            'parent_id'=>'required',
        ]);
       $comm= $article->comments()->where('parent_id',$valid['parent_id'])->count();
        if (Auth::check()){
            $comment=$article->comments()->create([
                'user_id'=>\auth()->user()->id,
                'name'=>\auth()->user()->name,
                'email'=>\auth()->user()->email,
                'comment' =>$valid['comment'],
                'parent_id' =>$valid['parent_id'],
            ]);
        }else{
            $comment=$article->comments()->create([
                'name'=>$valid['name'],
                'email'=>$valid['email'],
                'comment' =>$valid['comment'],
                'parent_id' =>$valid['parent_id'],
            ]);
        }

       alert()->success('نظر شما با موفقیت ثبت شد و بعد از بررسی نمایش داده خواهد شد ');
        return back();
    }
    public function contact_us( ){
        return view('home.contact_us');
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
    public function teacher_list(Request $request){
        $teachers=\App\Models\User::query()->whereIn('level', ['teacher']);
        $teachers=$teachers->whereActive('1')->whereSubmit('1');

        if ($request->tname){
            $search1=$request->tname;
             $teachers->where('name' ,'LIKE',"%{$search1}%");
        }
        if ($request->langsearch){
//            dd(1);
            $search2=$request->langsearch;
            $teachers->whereHas('languages',function ($query) use($request ,$search2){
                $query->where('name' ,'LIKE',"%{$search2}%");
            });
        }
        if ($request->lang){
//            dd(1);
            $teachers->whereHas('languages',function ($query) use($request ){
                $query->where('id',$request->lang);
            });
        }
        if ($request->la){
//            dd(2);
              $teachers->whereHas('languages',function ($query) use($request  ){
                  $query->whereIn('id',$request->la);
              });
        }

        if ($request->max){
            $teachers   ->where('meet1','>=',(int)$request->min)
                ->where('meet1','<=',(int)$request->max);
              }


        if ($request->IELTS){
                $teachers->whereHas('attributes',function ($query) use($request  ){
                    $query->where('name',$request->IELTS)
                        ->where('value','on');
                });
         }
        if ($request->GRE){
            $teachers->whereHas('attributes',function ($query) use($request  ){
                $query->where('name',$request->GRE)
                    ->where('value','on');
            });
        }
        if ($request->PTE){
            $teachers->whereHas('attributes',function ($query) use($request  ){
                $query->where('name',$request->PTE)
                    ->where('value','on');
            });
        }
        if ($request->TOEFL){
            $teachers->whereHas('attributes',function ($query) use($request  ){
                $query->where('name',$request->TOEFL)
                    ->where('value','on');
            });
        }




      if ($request->port){
//          dd(4);
            $teachers->whereHas('attributes',function ($query) use($request  ){
                $query->where('name','port')  ->where('value','1');
            });
              }
      if ($request->free){
//          dd(5);
            $teachers->whereHas('attributes',function ($query) use($request  ){
                $query->where('name','freeclass')  ->where('value','free');
            });
              }
          if ($request->male && !$request->female){
            $teachers->where('sex',$request->male);
              }
        if ($request->female && !$request->male){
            $teachers->where('sex',$request->female);
        }




//        if ($request->la){
//            $teachers->whereHas('languages',function ($query) use($request  ){
//                $query->whereIn('id',$request->la);
//            });
//        }
//        $teachers=$teachers->whereIn('level', ['teacher'])->inRandomOrder()->paginate(10);
        if ($request->most=='expensive'){
            $teachers->orderBy('meet1','desc');
        }
        if ($request->most=='cheap'){
            $teachers->orderBy('meet1','asc');
        }
        if ($request->most=='popular'){
            $teachers->withCount('meets')->orderBy('meets_count', 'asc')->whereHas('meets',function ($query){
                $query ->whereIn('status',['passed','done']);
            } );
        }
        $teachers=$teachers->paginate(10);

        return view('home.teacher_list',compact(['teachers']));
    }
    public function teacher_profile(User $user){
        // $today= \Carbon\Carbon::createFromFormat('Y-m-d H:i', \Carbon\Carbon::now()->addDay(1)  ->format('Y-m-d').' 07:00');
        // dd($today);
    //   $dd=  \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay(1)  ->format('Y-m-d').' 07:00:00')->addMinutes((1*30))->format('H:i');
    // dd($dd);
        $seen=$user->attr('visit_profile');
       if (!$seen){
           $seen=0;
       }
        if (Auth::user()) {   // Check is user logged in
            if ($user->id != \auth()->user()->id){
                $user->save_attr('visit_profile',$seen+1);
            }
        }


        return view('home.teacher.teacher_profile',compact(['user']));
    }
    public function teacher_register_form(){
        $languages=Language::whereActive(1)->get();
        return view('home.teacher_register_form',compact('languages'));
    }

    public function student_register(Request $request){
        $data=$request->validate([
            'name'=>'required|min:3',
            'email'=>'required|unique:users',
            'mobile'=>'required|unique:users',
            'password'=>'required|min:4|max:24|regex:/^[a-zA-Z0-9]+$/',

        ]);

        $message=1;
        $url=route('student.dashboard');
//        $params= [
//            'username'=>$request->username,
//            'password'=>$request->password,
//            'nickname'=>$request->name,
//            'status'=>'1',
//            "is_public"=>true
//        ] ;
//        $res=  $this->sky('createUser',$params);
//        if (!$res['ok']){
//
//            return response()->json([
//                'res'=>$res,
//                'status'=>0,
//                'message'=>$res['error_message'],
//            ]);
//        }

        $data['level']='student';
        $data['password']=Crypt::encryptString( $data['password']);
        $user=User::create($data);
        if ($fclass=session()->get('flink')){
            $fclass=Fclass::find($fclass);
            $fclass->update(['student_id'=>$user->id]);
            $fclass->meets() ->update(['student_id'=>$user->id]);;
            $teacher=User::find($fclass->user->id);
            $teacher->create_ski_room($user);
            session()->forget('flink');
        }
        Auth::loginUsingId($user->id,true);
         $user->sms_code('register',$user->name);
        return response()->json([
            'status'=>1,
            'message'=>$message,
            'url'=>$url
        ]);

    }

    public function go_class(Request $request ,Meet $meet){
        if (Carbon::now()->gt(Carbon::parse($meet->start)->addHours(2))){
            alert()->error('این کلاس برگزار شده است ');
            return back();
        }
        $now=Carbon::now();
        $start = Carbon::parse($meet->start);
       if ($start->gt($now)){
           $duration = $start->diffInMinutes($now);
            if ($duration>60){
                alert()->error('شما فقط میتوانید 60 دقیقه به شروع کلاس وارد شوید ');
                return  back();
            }
       }
//        dd($meet);
        $teacher=User::find($meet->user_id);
        $student=User::find($meet->student_id);
        $teacher->create_ski_room($student);
        $room=null;
        $new_meet= $teacher->meets()->whereModel('not_free')->whereStart(Carbon::parse($meet->start)->addMinutes(30))->first();
        $user=\auth()->user();
        if (!$user->name){
            alert()->error('لطفا ابتدا   پروفایل خود را کامل  کنید');
            return back();
        }
        if (!$user->create_sky_user()){
            alert()->error('مشکل در برقراری ارتباط با سامانه');
            return back();
        }
        if ($user->level=='teacher'){
            $meet->update(['t_click'=>'1']);
            if ($meet->type !='free'){
                $new_meet->update(['t_click'=>'1']);
            }
            $room=$user->rooms()->where('student_id',$meet->student_id)->first();
        }else{
            $meet->update(['s_click'=>'1']);
            if ($meet->type !='free'){
                $new_meet->update(['s_click'=>'1']);
            }
            $room=$user->srooms()->where('user_id',$meet->user_id)->first();
        }
        $params=[
            'room_id'=>$room->sky_id,
            'user_id'=>$user->level,
            'nickname'=>$user->name,
            'access'=>3,
            'ttl'=>'40000',
            'concurrent'=>'1',
        ];
        $resulat= $this->sky('createLoginUrl',$params);
        if (!$resulat['ok']){
            alert()->error('لطفا با پشتیبانی تماس بگیرید');
            return back();
        }
        $url  =$resulat['result'];
        if ($meet->s_click=='1' && $meet->t_click=='1'  ){
            $meet->update(['status'=>'down']);
            if ( $meet->type !='free'){
                $new_meet->update(['status'=>'down']);
            }
        }
        return \redirect($url);
    }
    public function user_login(Request $request){

        $data=$request->validate([
            'email'=>'required|exists:users',
            'password'=>'required'
        ]);
        $message=0;
        $url='';
        $user=User::whereEmail($data['email'])->first();
        if (Crypt::decryptString($user->password)==$data['password']){
            $message=1;
            Auth::loginUsingId($user->id,true);
            if ($user->level=='student'){
                if ($fclass=session()->get('flink')){
                    $fclass=Fclass::find($fclass);
                    $fclass->update(['student_id'=>$user->id]);
                    $fclass->meets() ->update(['student_id'=>$user->id]);;
                    session()->forget('flink');
                    $teacher=User::find($fclass->user);
                    $teacher->create_ski_room($user);
                }
                $url=route('student.dashboard');
            }else{
                $url=route('teacher.dashboard');
            }

        }
        return response()->json([
            'status'=>$message,
            'url'=>$url
        ]);

    }
    public function teacher_register(Request $request){
        $data=$request->validate([
            'name'=>'required|min:4',
            'email'=>'required|unique:users',
            'mobile'=>'required|unique:users|min:10',
            'sex'=>'required',
            'password'=>'required|confirmed|min:4|max:24|regex:/^[a-zA-Z0-9]+$/',
        ]);




        $data['level']='teacher';
        $data['active']='0';
        $data['password']=Crypt::encryptString($data['password']);
        $user=User::create($data);
        $user= Auth::loginUsingId($user->id, true);
            $user->sms_code('register',$user->name);
        alert()->success('  ثبت نام شما با موفقیت انجام شد ','پیام جدید');
        return redirect(route('teacher.dashboard'));
    }

    public function cancel_class(Request $request )
    {

       if ($request->has('class')){
           $user=\auth()->user();
           $meet=Meet::find($request->class);

           $bill=$meet->bill;

           if(!$bill){
            //    یعنی این کلاس رزرو آزمایشی رایگان بوده و فقط کافی است کلاس نخلیه شود و سند حسابداری ندراد
            $meet->empty_class();
            alert()->success('کلاس با موفقیت لغو شد ');
            return back();
           }

           $student=User::find($meet->student_id);
           $teacher=User::find($meet->user_id);
           $persian_date=$user->perisan_date_time($meet->start);
           $new_meet= $teacher->meets()->whereModel('not_free')->whereStart(Carbon::parse($meet->start)->addMinutes(30))->first();


           if (!($meet->start && $new_meet->start)){
            alert()->error('مشکلی پیش آمده دوباره سعی کنید');
            return back();
        }




           $count=Count::where('bill_id',$bill->id)->first();
           if (!$count){
               $count=Count::create([
                   'teacher_id'=>$teacher->id,
                   'user_id'=>$student->id,
                   'bill_id'=>$bill->id,
                   'count'=>0,
                   'price'=>$meet->price,
                   'com'=>$meet->com,
               ]);
           }
           $start=Carbon::parse($meet->start);
           $now=Carbon::now();
           $diff = $start->diffInMinutes($now);


           if ($user->level=='student'){
               if ($student->cmeets()->count()>2){
                   alert()->error('شما حد اکثر تا سه کلاس را میتوانید کنسل کنید  ');
                   return back();
               }
                if ($meet->s_click==1){
                    alert()->error('شما قبلا وارد کلاس شده اید ');
                    return back();
                }
               if ($diff<1440){
//                     ثبت کلاس به عنوان کنسلی

                 $student->cmeets()->create(
                       [
                       'meet_id'=>$meet->id,
                       'bill_id'=>$bill->id
                       ]
                   );
//                 اگر کلاس آزمایشی نبود
                    if ($bill->count>0){
                        $student->cmeets()->create([
                            'meet_id'=>$new_meet->id,
                            'bill_id'=>$bill->id
                        ]);
                    }


                   //   اگر کمتر از 24  ساعت بود 20 درصد کم و به حساب معلم واریز میشود
                  $amount=  $meet->price;
                  $penalty=($amount*20)/100;
                  $remain=$amount-$penalty;
                  $teacher->change_cash('s_penalty_class',$penalty);

                  $teacher->bills()->create([
                       'amount'=>$penalty,
                       'meet_id'=>$meet->id,
                       'com'=>0,
                       'bank'=>'',
                       'type'=>'s_penalty_class',
                       'status'=>'1',
                       'transactionId'=>$meet->bill->transactionId,
                       'count'=>'0',
                       'remain'=>$teacher->total_cash()
                   ]);



                   // الباقی به حساب دانش اموز بر میگردد


                   $student->change_cash('s_penalty_class_remain',$remain);
                    $student->bills()->create([
                       'amount'=>$remain,
                       'meet_id'=>$meet->id,
                       'com'=>0,
                       'bank'=>'',
                       'type'=>'s_penalty_class_remain',
                       'status'=>'1',
                       'transactionId'=>$meet->bill->transactionId,
                       'count'=>'0',
                       'remain'=>$student->total_cash()
                   ]);
                   $meet->empty_class();
                   if ($bill->count>0){
                       $new_meet->empty_class();
                   }
                   $student->sms_code('cancel-class-student2',$student->name??'کاربر','','',$teacher->name??'استاد','');;
                   $teacher->sms_code('cancel-class-teacher2',$teacher->name??'','','',$student->name,$persian_date);;
                   alert()->success('بیست درصد از مبلغ کلاس کسر و به حساب استاد  واریز شد . الباقی به موجودی کیف شما برگشت');
                   return back();
               }
               if ($bill->count>0){
                   $count->update([
                       'count'=>$count->count+1
                   ]);
                   $meet->empty_class();
                   $new_meet->empty_class();
               }else{
                   $student->change_cash('back_money_cancel_free_class',$meet->price);
                    $student->bills()->create([
                       'amount'=>$meet->price,
                       'meet_id'=>$meet->id,
                       'com'=>0,
                       'bank'=>'',
                       'type'=>'back_money_cancel_free_class',
                       'status'=>'1',
                       'transactionId'=>$meet->bill->transactionId,
                       'count'=>'0',
                       'remain'=>$student->total_cash()
                   ]);
                   $meet->empty_class();
               }


               alert()->success('کلاس با موفقیت لغو شد');
               return back();
           }

           if ($user->level=='teacher'){
               if ($teacher->cmeets()->count()>2){
                   alert()->error('شما حد اکثر تا سه کلاس را میتوانید کنسل کنید  ');
                   return back();
               }
               if ($meet->t_click==1){
                   alert()->error('شما قبلا وارد کلاس شده اید ');
                   return back();
               }
//               $meet->update(['canceled'=>'1']);
//               $new_meet= $teacher->meets()->whereStart(Carbon::parse($meet->start)->addMinutes(30))->first();
//               $new_meet->update(['canceled'=>'1']);
               if ($bill->count>0){
                   $count->update([
                       'count'=>$count->count+1
                   ]);
                   $teacher->cmeets()->create([
                       'meet_id'=>$new_meet->id,
                       'bill_id'=>$bill->id
                   ]);
                   $new_meet->empty_class();

               }else{
                   $student->change_cash('back_money_cancel_free_class',$meet->price);
                    $student->bills()->create([
                       'amount'=>$meet->price,
                       'meet_id'=>$meet->id,
                       'com'=>0,
                       'bank'=>'',
                       'type'=>'back_money_cancel_free_class',
                       'status'=>'1',
                       'transactionId'=>$meet->bill->transactionId,
                       'count'=>'0',
                       'remain'=>$student->total_cash()
                   ]);
               }

               $teacher->cmeets()->create([
                   'meet_id'=>$meet->id,
                     'bill_id'=>$bill->id
               ]);

               $meet->empty_class();
               $teacher->sms_code('cancel-class-teacher',$user->name??'کاربر','','',$user->name??'دانشجو','');
               $student->sms_code('cancel-class-student',$student->name??'کاربر','','',$teacher->name??'کاربر',$persian_date);;
               alert()->success('کلاس با موفقیت لغو شد');
               return \redirect()->route('teacher.dashboard');
           }

       }

    }




    }
