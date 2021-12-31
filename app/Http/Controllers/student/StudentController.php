<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Count;
use App\Models\Emeet;
use App\Models\Fave;
use App\Models\Fclass;
use App\Models\Meet;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class StudentController extends Controller
{
    public function  logout()
    {
        Auth::logout();
        alert()->success('شما با موفقیت از حساب کاربری خود خارج شدید ');
        return \redirect(route('home.teacher.list'));
    }
    public function  fave_teachers(User $user)
    {
        $teacher = $user;
        $user = \auth()->user();
        $fave =  $user->sfave()->where('teacher_id', $teacher->id)->first();
        if (!$fave) {
            $fave = $user->sfave()->create([
                'teacher_id' => $teacher->id
            ]);
            alert()->success('با موفقیت به لیست دلخواه اضافه شد ');
            return \redirect()->back();
        } else {
            $fave->delete();
            alert()->success('با موفقیت از لیست دلخواه حذف شد ');
            return \redirect()->back();
        }
    }
    public function  accept_fclass(Fclass $fclass)
    {
        $user = \auth()->user();
        foreach ($fclass->meets as $meet) {
            $meet->update([
                'student_id' => $user->id
            ]);
        }
        alert()->success('کلاس با موفقیت قبول شد');
        return \redirect()->route('student.dashboard');
    }
    public function  dashboard(Request $request)
    {
        if (session()->get('key_register')) {
            return \redirect()->route('student.charge.wallet');
        }
        $user = auth()->user();
        return view('home.student.profile.dashboard', compact(['user']));
    }
    public function  change(Request  $request)
    {

        $student = \auth()->user();
        if ($request->has('meet')) {
            $meet = Meet::find($request->meet);
            $start = Carbon::parse($meet->start);
            $now = Carbon::now();
            if ($meet->s_click == 1) {
                alert()->error('شما قبلا وارد کلاس شده اید ');
                return back();
            }
            if ($now->gt($start)) {
                alert()->error('زمان کلاس برای تغییر گذشته است ');
                return  back();
            }
        }

        if ($request->has('a_meet')) {
            $a_meet = Meet::find($request->a_meet);

            $b_meet = Meet::find($request->b_meet);


            $teacher = User::find($a_meet->user_id);
            $new_a_meet = $teacher->meets()->whereStart(\Carbon\Carbon::parse($a_meet->start)->addMinutes(30))->first();
            $new_b_meet = $teacher->meets()->whereStart(\Carbon\Carbon::parse($b_meet->start)->addMinutes(30))->first();

            $persian_old = $student->perisan_date_time($a_meet->start);
            $persian_new = $student->perisan_date_time($new_a_meet->start);
            if (!($new_a_meet->start && $a_meet->start)) {
                alert()->error('مشکلی پیش آمده دوباره سعی کنید');
                return back();
            }
            $emeet = Emeet::create([
                'user_id' => \auth()->user()->id,
                'bill_id' => $b_meet->bill_id,
                'teacher_id' => $a_meet->user->id,
                'meet_id' => $b_meet->id,
                'meet_id_after' => $a_meet->id,
                'reason' => $request->reason
            ]);
            $a_meet->update([
                'com' => $b_meet->com,
                'price' => $b_meet->price,
                'bill_id' => $b_meet->bill_id,
                'student_id' => $b_meet->student_id,
                'status' => 'reserved',
                'pair' => null

            ]);
            $new_a_meet->update([
                'com' => $b_meet->com,
                'price' => $b_meet->price,
                'bill_id' => $b_meet->bill_id,
                'student_id' => $b_meet->student_id,
                'status' => 'reserved',
                'pair' => $a_meet->id
            ]);



            $b_meet->empty_class();
            $new_b_meet->empty_class();



            $student->sms_code('change-time-student', $teacher->name ?? 'استاد', '', '', $persian_old, $persian_new);;
            $teacher->sms_code('change-time-teacher', $student->name ?? 'دانشجو', '', '', $persian_old, $persian_new);;
            alert()->success('کلاس با موفقیت تغییر کرد');

            return \redirect()->route('student.dashboard');
        }
        $reason = $request->reason;

        $teacher = User::find($meet->user_id);


        return view('home.student.profile.change', compact(['teacher', 'meet', 'reason']));
    }
    public function  reserve(User $user, Count $count, Meet $meet)
    {
        if ($count->count == 0) {
            alert()->error('کلاس برای رزرو وجود ندارد');
            return \redirect()->route('student.dashboard');
        }

        $teacher = $user;
        $bill = Bill::find($count->bill_id);
        $user = auth()->user();

        if ($meet->id) {
            //            $Count_m=new Count();
            //            $county=$Count_m->count($teacher->id,$user->id);
            if ($count->count <= 0) {
                alert()->error('شما در حال حاضر کلاسی برای رزرو ندارید ');
                return view('home.student.profile.reserve', compact(['user', 'teacher']));
            };
            if (!$count) {
                $county = $count->create_count($teacher->id, $user->id);
            }
            $meet->update([
                'student_id' => $user->id,
                'com' => $count->com,
                'price' => $count->price,
                'bill_id' => $count->bill_id,
                'status' => 'reserved'
            ]);
            $count->update([
                'count' => $count->count - 1
            ]);
            $date = Carbon::parse($meet->start);
            $new_meet = $teacher->meets()->whereModel('not_free')->whereStart($date->addMinutes(30))->first();
            $new_meet->update([
                'student_id' => $user->id,
                'com' => $count->com,
                'price' => $count->price,
                'bill_id' => $count->bill_id,
                'pair' => $meet->id,
                'status' => 'reserved'
            ]);








            alert()->success('کلاس با موفقیت رزو شد ');
            return \redirect()->route('student.dashboard');
        }


        return view('home.student.profile.reserve', compact(['user', 'count', 'teacher']));
    }

    public function  wallet(Request $request)
    {
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

        $user = auth()->user();
        $bills = $user->bills()->whereStatus('1');
        if ($request->type) {
            $bills->where('type', $request->type);
        }
        $bills = $bills->orderBy('id', 'Desc')->paginate(10);

        return view('home.student.profile.wallet', compact(['user', 'bills']));
    }
    public function  profile()
    {
        $user = auth()->user();
        $resume = $user->resumes()->orderBy('id', 'DESC')->get();
        return view('home.student.profile.profile', compact(['user', 'resume']));
    }
    public function  fave()
    {
        $user = auth()->user();
        $resume = $user->resumes()->orderBy('id', 'DESC')->get();
        return view('home.student.profile.fave', compact(['user', 'resume']));
    }
    public function  save_bg(Request  $request, User $user)
    {
        $data = $request->validate([
            'bg' => 'required|image|max:2048|dimensions:min_width=840,min_height=150',
        ]);
        $image = $request->file('bg');
        $name_img = $user->id . 'bg' . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('/src/bg'), $name_img);
        $path = public_path('/src/bg/' . $name_img);
        if (file_exists($path)) {
            Image::make($path)->crop(840, 150)->save(public_path('/src/bg/bg' . $name_img));
        }
        $user->save_attr('bg', $name_img);
        alert()->success('عکس شما با موقثیت به روز شد ');
        return back();
    }
    public function  save_avatar(Request  $request, User $user)
    {
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
    public function  save_password(Request  $request, User $user)
    {
        $data = $request->validate([
            'password' => 'required|min:4|max:24|regex:/^[a-zA-Z0-9]+$/',
        ]);

        $params = [
            'user_id' => $user->sky_id
        ];
        $sky_user =   $this->sky('getUser', $params);
        if ($sky_user['ok']) {
            $params = [
                'user_id' => $sky_user['result']['id'],
                'password' => $data['password']
            ];
            $res = $this->sky('updateUser', $params);
            if (!$res['ok']) {
                return Redirect::back()->withErrors([$res['error_message']]);
            }
        } else {
            return Redirect::back()->withErrors([$sky_user['error_message']]);
        }
        $user->update([
            'password' => Crypt::encryptString($data['password'])
        ]);
        alert()->success('رمز عبور با موفقیت ثبت شد  ');
        return back();
    }
    public function  profile_save_info(Request $request, User $user)
    {
        $data = $request->validate([
            'name'=>'required|min:3|max:10',
            'family'=>'required|min:4|max:10',
            // 'username'=>['required','min:4' ,'max:24','regex:/^[a-zA-Z0-9]+$/',Rule::unique('users', 'username')->ignore($user->id)],
            //               'required|unique:users,username|min:5',
            'email' => ['required', Rule::unique('users', 'email')->ignore($user->id)],
            //            'mobile'=>['required','min:10' ,Rule::unique('users', 'mobile')->ignore($user->id)],
            'sex' => 'required',
            // 'country'=>'required',
        ]);
        $user->update($data);
        alert()->success('اطلاعات شما با موفقیت به روز رسانی شد ');
        return back();
    }
    public function sky($action, $params = array())
    {
        try {
            $test = Http::post('https://www.skyroom.online/skyroom/api/apikey-263858-38-648406da3fbe1d295b451a0bde7427a1', [
                "action" => $action,
                'params' => $params
            ]);
            return   $test->json();
        } catch (\Exception $e) {
            return false;
        }
    }
}
