<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SettingController extends Controller
{

    public function save_login_info(Request $request){
      $data=  $request->validate([
            'email'=>'required|min:5',
            'password'=>'required|min:5',
        ]);
      $user=auth()->user();
        $user->update([
            'email'=>$request->email,
            'password'=>Crypt::encryptString($request->password)
        ]);
//      foreach ($data as $da=>$va){
//          $username=Setting::whereName($da)->first();
//          if ($username){
//              if ($da=='password'){
//                  $va = Crypt::encryptString($va );
//              }
//              Setting::whereName($da)->update(['value'=>$va]);
//          }else{
//              Setting::create(['name'=>$da,'value'=>$va]);
//          }
//      }
        alert()->success('نام کاربری و رمز عبور عوض شد','پیام جدید');
        return redirect()->back();
    }
    public function save_max_min(Request $request){
        $data=  $request->validate([
            'max_price'=>'required|numeric|min:25000|multiple_of:5000',
            'min_price'=>'required|numeric|min:13000|multiple_of:5000',
        ]);

        foreach ($data as $da=>$va){
            $username=Setting::whereName($da)->first();
            if ($username){

                Setting::whereName($da)->update(['value'=>$va]);
            }else{
                Setting::create(['name'=>$da,'value'=>$va]);
            }
        }
        alert()->success('    قیمت ها به روز  شد','پیام جدید');
        return redirect()->back();
    }

    public function save_period(Request $request){
        $data=  $request->validate([
            'period1'=>'required|numeric',
            'wage1'=>'required|numeric',

            'period2'=>'required|numeric',
            'wage2'=>'required|numeric',

            'period3'=>'required|numeric',
            'wage3'=>'required|numeric',

            'period4'=>'required|numeric',
            'wage4'=>'required|numeric',

            'period5'=>'required|numeric',
            'wage5'=>'required|numeric',

            'period6'=>'required|numeric',
            'wage6'=>'required|numeric',

            'period7'=>'required|numeric',
        ]);

        foreach ($data as $da=>$va){
            $username=Setting::whereName($da)->first();
            if ($username){

                Setting::whereName($da)->update(['value'=>$va]);
            }else{
                Setting::create(['name'=>$da,'value'=>$va]);
            }
        }
        alert()->success('    قیمت ها به روز  شد' );
        return redirect()->back();

    }

}
