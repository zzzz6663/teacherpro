<?php

namespace App\Models;

use App\Models\Attribute;
use App\Notifications\SendKaveCode;
use Hekmatinasser\Verta\Verta;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Morilog\Jalali\Jalalian;

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'family',
        'email',
        'username',
        'mobile',
        'password',
        'sex',
        'level',
        'active',
        'submit',
        'cash',
        'bio',
        'lang',
        'country',
        'sky_id',
        'count',
        'meet1',
        'meet5',
        'meet10',
    ];

    public function articles(){
        return $this->hasMany(Article::class);
    }
    public function comments()
    {
        return  $this->morphMany(Comment::class,'commentable');
    }
    public function scomments()
    {
        return  $this->morphMany(Comment::class,'commentable','','user_id');
    }



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function languages(){
        return $this->belongsToMany(Language::class);
    }
    public function fclasses(){
        return $this->hasMany(Fclass::class);
    }
    public function cmeets(){
        return $this->hasMany(Cmeet::class);
    }
    public function emeets(){
        return $this->hasMany(Emeet::class);
    }
    public function tmeets( ){
     return    $this->hasMany(Emeet::class , 'teacher_id');
    }

    public function sfave(){
        return $this->hasMany(Fave::class,'user_id','id');
    }
    public function tfave(){
        return $this->hasMany(Fave::class,'teacher_id','id');
    }
    public function has_fave($id){
        return $this->sfave()->where('teacher_id',$id)->first();
    }
    public function attributes(){
        return $this->hasMany(Attribute::class);
    }
    public function resumes(){
        return $this->hasMany(Resume::class);
    }
    public function meets(){
        return $this->hasMany(Meet::class);
    }
    public function smeets(){
        return $this->hasMany(Meet::class,'student_id');
    }

    public function bills(){
        return $this->hasMany(Bill::class);
    }






    public function rooms()
    {
        return $this->hasMany(Room::class );
    }
    public function srooms()
    {
        return $this->hasMany(Room::class,'student_id');
    }
    public function  empty($data){
        $res=$this->meets()->where('start','=',$data)->whereModel('not_free')->whereNull('student_id')->first();
        if ($res){
            return $res->id;
        }
        return false;
    }
    public function  reserved($data){
        $res=$this->meets()->where('start','=',$data)->whereModel('not_free')->whereNotNull('student_id')->first();
        if ( $res  ){
                   return true;
        }
        return false;
    }
    public function attr($name){
        $name=trim($name);
        $atr=  $this->hasMany(Attribute::class)->whereName($name)->first();
        if ($atr){
            return $atr->value;
        }
        return  false;
    }

    public function save_attr($key,$val){
        $atr=  $this->hasMany(Attribute::class)->whereName($key)->first();

        if ($atr){
            $atr->update([
                'name'=>$key,
                'value'=>$val,
            ]);
            return false;
        }else{
            $this->attributes()->create([
                'name'=>$key,
                'value'=>$val,
            ]);
            return true;
        }
    }
    public function total_cash(){
        return $this->cash;
    }
    public function create_ski_room($student){
        $exist=$this->rooms()->where('student_id',$student->id)->first();

        $params=[
            'title'=>   ' کلاس خصوصی استاد '.$this->name.'  و دانشجو  '.$student->name  ,
            'name'=>$this->id.'-'.$student->id,
            'student_id'=>$student->id,
            "guest_login"=>false,
            "max_users"=>2,
        ];

//                   $sky_room= $this->sky('createRoom',$params);
        if (!$exist){
            $sky_room= $this->sky('createRoom',$params);
            $error='';
            $key_id='';
            if ($sky_room['ok']){
                $key_id=$sky_room['result'];
            }else{
                $error=$sky_room['error_message'];
            }
            $room= $this->rooms()->create([
                'title'=>   ' کلاس خصوصی استاد '.$this->name.'  و دانشجو  '.$student->name  ,
                'name'=>$this->id.'-'.$student->id,
                'student_id'=>$student->id,
                'code'=>$this->id.'-'.$student->id,
                'error'=>$error,
                'sky_id'=>$key_id
            ]);
        }else{
//            $sky_room_check= $this->sky('createRoom',['room_id'=>$exist->sky_id]);
//            $error='';
//            $key_id='';
//            if (!$sky_room_check['ok']){
//                $sky_room= $this->sky('createRoom',$params);
//
//                if ($sky_room['ok']){
//                    $key_id=$sky_room['result'];
//                }else{
//                    $error=$sky_room['error_message'];
//                }
//            }
//            $exist->update([
//                'error'=>$error,
//                'sky_id'=>$key_id
//            ]);
        }
    }
    public function create_sky_user(){
        if ($this->sky_id){
            return true;
        }
        $params= [
            'username'=> $this->level.'_'.$this->id,
            'password'=>$this->mobile,
            'nickname'=>$this->name??$this->level.'_'.$this->id,
            'status'=>'1',
            "is_public"=>true
        ] ;
        $res=  $this->sky('createUser',$params);
        if ($res['ok']){
            $this->update([
                'sky_id'=>$res['result']
            ]);
            return  true;

        }
        return  true;
    }
    public function change_cash($type,$amount ){
        $cash=   $this->total_cash();
        $cash=(int)$cash;
        switch ($type){
            case 'site_share':
            case 'deposit_teacher':
            case 's_penalty_class':
            case 's_penalty_class_remain':
            case 'charge_wallet':
            case 'back_money_cancel_free_class':
                $amount= $cash +$amount;
                $this->update([
                    'cash'=>$amount
                ]);
                break;

            case 'reserve_meet_by_charge':
            case 'reserve_meet':
            $amount= $cash -$amount;
            $this->update([
                'cash'=>$amount
            ]);
            break;




        }
    }
    public function  free_class_price(){
        $atr=  $this->hasMany(Attribute::class)->whereName('freeclass')->first();
        if ($atr){
            if ($atr->value=='free'){
                return 0;
            }
            if ($atr->value=='nofree'){
              return  $this->attr('free_meeting_price');
            }

        }
        return '';
    }

    public function count_class($count,$type=1)
    {
        if ($type==1){
            $this->update(['count',$this->count+$count ]);
        }
        else{
            $this->update(['count',$this->count-$count ]);
        }

    }

    public function com_price($a)
    {
        $setting = new \App\Models\Setting();
        $c=0;
        for ($i=1;$i<8; $i++){
            ${'ba'.$i}=$setting->set('period'.$i);
            ${'ba'.$i}=(int)${'ba'.$i};
        }
        for ($i=1;$i<7; $i++){
            ${'wage'.$i}=$setting->set('wage'.$i);
            ${'wage'.$i}=(int)${'wage'.$i};
        }
        if ($ba1<=$a && $ba2>$a){$c=$a+$wage1;}
        if ($ba2<=$a && $ba3>$a){$c=$a+$wage2;}
        if ($ba3<=$a && $ba4>$a){$c=$a+$wage3;}
        if ($ba4<=$a && $ba5>$a){$c=$a+$wage4;}
        if ($ba5<=$a && $ba6>$a){$c=$a+$wage5;}
        if ($ba6<=$a && $ba7>$a){$c=$a+$wage6;}
        return $c;

    }
    public function count_student(){
        if ($this->level=='teacher'){
//            return  $this->meets()->where('status','down')->select('student_id')->groupBy('student_id')- ->count();

            return   $this->meets()->where('status','down')-> distinct('student_id') ->count() ;
//            return $this->meets()->where('status','down')->select('student_id')->distinct()->count()/2;
        }  else{
            return 0;
        }
    }
    public function down_class(){
        if ($this->level=='teacher'){
            return $this->meets()->where('status','down')->count();
        }  else{
            return 0;
        }
    }
    public function unreserved_class(){
        if ($this->level=='student'){
            return Count::where('user_id',$this->id)->sum('count');
        }
        if ($this->level=='teacher'){
            return Count::where('teacher_id',$this->id)->sum('count');
        }


    }
    public function passed_class()
    {
        if ($this->level=='student'){
            return Meet::where('student_id',$this->id)->whereNull('pair')->where('status','passed')->count();
        }
        if ($this->level=='teacher'){
            return Meet::where('user_id',$this->id)->whereNull('pair')->where('status','passed')->count();
        }


    }
    public function reserved_class()
    {


        if ($this->level=='student'){
           return    \App\Models\Meet::where('student_id',$this->id)->whereNull('pair')->where('status','reserved')->count();

        }
        if ($this->level=='teacher'){

            return    \App\Models\Meet::where('user_id',$this->id)->whereNull('pair')->where('status','reserved')->count();

        }


    }
    public function  income($int=0){
        $v1 = verta();
        $v = Verta::parse(($v1->year-$int).'-01-01');
        $geo=null;
        $income_year=null;
        $income_year_mony=null;
        for ($i=0;$i<12; $i++){
            $m= $v->addMonths($i);
            $g=Verta::getGregorian($m->year,$m->month,$m->day);
            $geo[]= Carbon::parse($g[0].'-'.$g[1].'-'.$g[2])->toDateTimeString();

        }
        for ($i=0;$i<sizeof($geo); $i++){
            $start=$geo[$i];
            $end=Carbon::parse($geo[$i])->addMonth()->toDateTimeString();
            $income_year[]= $this->bills() ->where('type','deposit_teacher')->whereBetween('created_at',[$start,$end])->get();
        }
        $incomes= $this->bills()->select('amount')->where('type','deposit_teacher')->get();
        $income=0;
        foreach ($income_year as $in){
              $sum=0;
            if ($in->first()){
                foreach ($in as  $i){
                    $sum  +=(int)$i->amount;
                }
            }
        $income_year_mony[]=$sum;
        }
        foreach ($incomes as $in){
            $income  +=(int)$in->amount;
        }


        return ['income_year_mony'=>$income_year_mony, 'income_total'=>$income, 'income_year_total'=>array_sum($income_year_mony),'int'=>$int];
    }
    public function percent(){
        $per=0;
        if ($this->attr('price_plan')){$per+=25;}
        if ($this->attr('time_plan')){$per+=25;}
        if ($this->attr('avatar')){$per+=25;}
        if ($this->languages()->count()>0){$per+=25;}
        return $per;
    }


    public function deactive( ){
        $this->update([
            'active'=>'0'
        ]);
    }
    public function perisan_date($date){
        $persian_date= \Carbon\Carbon::parse($date);
        $persian_date= \Hekmatinasser\Verta\Facades\Verta::getJalali($persian_date->format('Y'),$persian_date->format('m'),$persian_date->format('d'));
       return implode('-',$persian_date);
    }
    public function perisan_date_time($date){

       return  Jalalian::forge($date)->format('Y-m-d H:i:s ');
    }
    public function sms_code($temp,$code1=null,$code2=null,$code3=null,$code4=null,$code5=null){
        if ($this->mobile){
            $this->notify(new SendKaveCode( $this->mobile ,$temp,$code1,$code2,$code3,$code4,$code5));
        }
    }
    public function score(){
     $comments=   $this->comments()->where('active','1')->latest()->get();
     $sum=0;
     $ar['per']=0;
     $ar['av']=0;
     $ar['r1']=0;
     $ar['r2']=0;
     $ar['r3']=0;
     $ar['r4']=0;
     $ar['r5']=0;
     $ar['pr1']=0;
     $ar['pr2']=0;
     $ar['pr3']=0;
     $ar['pr4']=0;
     $ar['pr5']=0;
     if ($comments){
         foreach ($comments as $comment){
             $ar['r'.$comment->rate]++;
             $sum+=$comment->rate;
         }
         if ($comments->count()>0){
             for ($i=1;$i<6;$i++){
                 $ar['pr'.$i] =($ar['r'.$i]*100)/$comments->count();
             }
             $ar['av']=$sum/$comments->count();

         }

         $ar['per']= ($ar['av']*100)/5;
     }
    return $ar;

    }

    public function students( ){
        return $this->meets() ->distinct()->count('student_id');
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




}
