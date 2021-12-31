@component('home.student.content',['title'=>' تنظیمات '])


<div id="teacherpishs" style="display: block">

    @slot('bread')

    @include('home.student.profile.bread_left',['name'=>'داشبورد'])


    @endslot

    @if($unreserved=\App\Models\Count::where('user_id',$user->id)->where('Count','>','0')->get() )

    <div id="stulist" class="shade">
        <div class="widget-title">
            <h3>انتخاب زمان برای کلاس های رزور شده</h3>
            <div class="dot3">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="widget-content">
            <ul class="stulist owl-carousel owl-theme">
                @foreach($unreserved as $count)
                @php($teacher=\App\Models\User::find($count->teacher_id))
                <li>
                    <div class="single-st">
                        <div class="pic">
                            <img src="{{asset('/src/avatar/'.$teacher->attr('avatar'))}}" alt="">
                        </div>
                        <div class="name">
                            <h4>
                                {{$teacher->name}}
                            </h4>
                        </div>
                        <div class="time">
                            <span>
                                {{$count->count}}
                                زمان رزرو نشده
                            </span>
                        </div>
                        <div class="button">
                            <span class="chtime" onclick="window.location.href='{{route('student.reserve',[$teacher->id,$count->id])}}'">
                                انتخاب زمان
                            </span>
                        </div>
                    </div>
                </li>

                @endforeach

            </ul>
        </div>
    </div>
    @endif

    @php($classes=\App\Models\Meet::where('student_id',$user->id)->whereNull('pair')->where('canceled','0')->where('start','>',\Carbon\Carbon::now()->subMinutes(15))->orderBy('start','asc')->paginate(5))
    @php($first=$classes->first())
    <?php
        $w=[  'شنبه' ,'یکشنبه','دوشنبه','سه شنبه','چهارشنبه','پنج شنبه','جمعه'];
        $m=['فروردین','اردیبهشت','خرداد','تیر','مرداد','شهریور','مهر','آبان','آذر','دی','بهمن','اسفند' ];
        ?>
    @if($first)
    @php($teacher=\App\Models\User::find($first->user_id))
    @php($v=verta($first->start))
    <?php
            $min="$v->minute";
            if ($v->minute==0){
                $min='00';

            }
            ?>
    <div id="nextclass" class="shade">
        <div class="widget-title">
            <h3>کلاس پیش رو</h3>
            <div class="dot3">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="widget-content">
            <div class="right">
                <div class="stuprofile">
                    <div class="pic">
                        <span class="num1"></span>
                        <span class="num2"></span>
                        <span class="num3"></span>
                        @if($teacher->attr('avatar'))
                        <img    src="{{asset('src/avatar/'.$teacher->attr('avatar'))}}" alt="">
                    @else
                        {{-- <img class="pro" src="/src/avatar/{{(auth()->user()->sex=='male')?'avatar_man.png':'avatar_woman.png'}}" alt=""> --}}
                        <img  src="/src/avatar/avatar.png" alt="">
                    @endif

                    </div>
                    <div class="detail">
                        <span>استاد</span>
                        <h4>
                             {{$teacher->name}}
                             {{$teacher->family}}

                        </h4>
                        <span class="date">
                            {{$w[$v->dayOfWeek]}}
                            {{($v->day)}}
                            {{($m[$v->month-1])}}
                            {{($v->hour.':'.$min)}}

                        </span>
                    </div>
                </div>
            </div>
            <div class="left">
                <a target="_blank" class="bl start" href="{{route('home.go.class',[$first->id])}}">
                    <span>شروع کلاس</span>
                </a>
                {{-- <span class="start">شروع کلاس</span>--}}
                <div id="countdown" data-time="{{$first->start}}"></div>

            </div>
        </div>
    </div>
    @endif

    <div class="class-list shade">
        <div class="widget-title">
            <h3>کلاس ها</h3>
            <form id="sort" action="{{route('student.dashboard')}}" method="get">
                @csrf
                @method('get')
                <div class="time-filter">
                    <span><i class="icon-time-line"></i>زمان </span>
                    <select name="time" id="time">
                        <option {{(request()->get('time')=='today')?'selected':''}} value="today">امروز</option>
                        <option {{(request()->get('time')=='tomorrow')?'selected':''}} value="tomorrow">فردا</option>
                        <option {{(request()->get('time')=='dtomorrow')?'selected':''}} value="dtomorrow">پس فردا</option>
                    </select>
                </div>
            </form>
            <form id="sta" action="{{route('student.dashboard')}}" method="get">
                <div class="stat-filter">
                    <span><i class="icon-stat"></i>وضعیت </span>
                    <select name="status" id="status">
                        <option {{(request()->get('status')=='reservged')?'selected':''}} value="reservged">پیش رو</option>
                        <option {{(request()->get('status')=='passed')?'selected':''}} value="passed">انجام شده</option>
                        <option {{(request()->get('status')=='canceled')?'selected':''}} value="canceled">کنسل شده</option>
                    </select>
                </div>
            </form>
            <div class="dot3">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div class="widget-content">
            <div class="class-list-title">
                <span> {{ $cc=\App\Models\Meet::where('student_id',$user->id)->whereNull('pair')->where('canceled','0')->where('start','>',\Carbon\Carbon::now()->subMinutes(15))->orderBy('start','asc')->count()}}
                    کلاس در برنامه دارید</span>
            </div>
            <div class="noclass" {{$cc==0?'':'hidden'}}>
                <img src="/home/images/world_connection__two_color.png" alt="">

                <h4> درسی یافت نشد!</h4>
                <div class="button-container reight">
                    <span onclick="window.location.href='{{route('home.teacher.list')}}'" class="butt">همین حالا استاد خود را پیدا کنید <i class="icon-search"></i></span>
                </div>
            </div>
            <?php
            $classes=\App\Models\Meet::where('student_id',$user->id)->whereNull('pair')->where('canceled','0')->where('start','>',\Carbon\Carbon::now()->subMinutes(15));
            if (request()->get('time')){
                if(request()->get('time')=='tomorrow') {
                    $classes=$classes->where( function($q){
                        $q->where('start', '>',\Carbon\Carbon::now()->addDay()->startOfDay())
                            ->where('start', '<',\Carbon\Carbon::now()->addDay()->endOfDay());
                    });
                }
                if(request()->get('time')=='today') {
                    $classes=$classes->where( function($q){
                        $q->where('start', '>',\Carbon\Carbon::now()->startOfDay())
                            ->where('start', '<',\Carbon\Carbon::now()->endOfDay());
                    });
                }
                if(request()->get('time')=='dtomorrow') {
                    $classes=$classes->where( function($q){
                        $q->where('start', '>',\Carbon\Carbon::now()->addDays(2)->startOfDay())
                            ->where('start', '<',\Carbon\Carbon::now()->addDays(2)->endOfDay());
                    });
                }

            }
            if (request()->get('status')){
                $classes=\App\Models\Meet::where('student_id',$user->id)->whereNull('pair')->where('canceled','0');
                if(request()->get('status')=='reserved') {
                    $classes=\App\Models\Meet::where('student_id',$user->id)->whereNull('pair')->where('canceled','0')->where('start','>',\Carbon\Carbon::now());
                }
                if(request()->get('status')=='down') {
                    $classes=$classes->where('status' ,'down' );
                }
                if(request()->get('status')=='canceled') {
                    $classes=$classes->where('status' ,'canceled' ) ;
                }

            }
            $classes=$classes->orderBy('start','asc')->paginate(5);
            ?>
            @foreach($classes as $class)
            @php($v=verta($class->start))
            @php($teacher=\App\Models\User::find($class->user_id))
            <?php
                $min="$v->minute";
                if ($v->minute==0){
                    $min='00';

                }

                ?>
            <div class="single-class">
                <div class="date">
                    @php($v=verta($class->start))


                    <span class="month"> {{($m[$v->month-1])}}</span>
                    <span class="day"> {{($v->day)}}</span>
                    <span class="name">

                        {{$w[$v->dayOfWeek]}}

                    </span>

                </div>
                <div class="mleft">

                    <div class="right">
                        <div class="pic">
                            @if($teacher->attr('avatar'))
                            <img    src="{{asset('src/avatar/'.$teacher->attr('avatar'))}}" alt="">
                        @else
                            {{-- <img class="pro" src="/src/avatar/{{(auth()->user()->sex=='male')?'avatar_man.png':'avatar_woman.png'}}" alt=""> --}}
                            <img  src="/src/avatar/avatar.png" alt="">
                        @endif
                        </div>
                        <div class="det">
                            <div class="job"><span>استاد</span></div>
                            <h4> {{$teacher->name}}
                                {{$teacher->family}}
                            </h4>
                            <div class="date"><i class="icon-time-line"></i><span>زمان</span> <span>
                                    {{$w[$v->dayOfWeek]}}
                                    {{($v->day)}}
                                    {{($m[$v->month-1])}}
                                    {{($v->hour.':'. $min )}}
                                    {{$class->model=='free'?"(کلاس آزاد)":""}}
                                    {{$class->type=='free'?"(کلاس آزمایشی)":""}}
                                </span></div>
                        </div>
                    </div>
                    <div class="left">
                        <div class="enter-class">
                            <a target="_blank" class="bl" href="{{route('home.go.class',[$class->id])}}">
                                <span>ورود به کلاس</span>
                            </a>
                        </div>
                        @if( $class->model !='free')
                        <div class="class-option" {{(\Illuminate\Support\Carbon::now()->gt(\Carbon\Carbon::parse($class->start)))?'hidden':''}}>
                            <span class="title"><i class="icon-dots"></i>گزینه ها</span>
                            <ul>
                                @if( $class->type !='free')
                                <li data-id="{{$class->id}}" data-img="{{asset('/src/avatar/'.$teacher->attr('avatar'))}}" data-name="{{$teacher->name}}  {{$teacher->family}}" data-date="
                                                  {{$w[$v->dayOfWeek]}}
                                    {{($v->day)}}
                                    {{($m[$v->month-1])}}
                                    {{($v->hour.':'.$min)}}
                                        " class="change_class"> <span><i class="icon-write"></i> ویرایش کلاس</span></li>
                                @endif
                                <li data-id="{{$class->id}}" data-img="{{asset('/src/avatar/'.$teacher->attr('avatar'))}}" data-name="{{$teacher->name}}  {{$teacher->family}}" data-date="
                                                 {{$w[$v->dayOfWeek]}}
                                    {{($v->day)}}
                                    {{($m[$v->month-1])}}
                                    {{($v->hour.':'.$min)}}
                                        " class="cancel_class"> <span><i class="icon-trash"></i>لغو کلاس</span></li>
                            </ul>

                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach


            {{$classes->appends(request()->all())->links('home.section.pagination')}}


        </div>
    </div>

    <div class="stat-list">
        <div class="row">

            <div class="col-lg-4 col-md-12">
                <div>
                    <div class="singl-statis shade">
                        <div class="top">
                            <div class="numner green">
                                <span>{{$user->passed_class()}}</span>
                            </div>
                            <div class="det">
                                <span class="title">کلاس های برگزارشده</span>
                                <span class="titleen">Classes held</span>
                            </div>
                            <div class="dot3">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>

                        <div class="bar">
                            <span style="width: 45%;"></span>
                        </div>

                        {{-- <div class="bot">--}}
                        {{-- <span class="right">792 Points</span>--}}
                        {{-- <span class="left">Professional</span>--}}
                        {{-- </div>--}}
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div>
                    <div class="singl-statis shade">
                        <div class="top">
                            <div class="numner blue">
                                <span>{{$user->reserved_class()}}</span>
                            </div>
                            <div class="det">
                                <span class="title">کلاس پیش رو</span>
                                <span class="titleen">Classes ahead</span>
                            </div>
                            <div class="dot3">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>

                        <div class="bar">
                            <span style="width: 57%"></span>
                        </div>

                        {{-- <div class="bot">--}}
                        {{-- <span class="right">792 Points</span>--}}
                        {{-- <span class="left">Professional</span>--}}
                        {{-- </div>--}}
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div>
                    <div class="singl-statis shade">
                        <div class="top">
                            <div class="numner orange">
                                <span>{{$user->unreserved_class()}}</span>
                            </div>
                            <div class="det">
                                <span class="title">کلاس رزرو نشده</span>
                                <span class="titleen">Unreserved classes</span>
                            </div>
                            <div class="dot3">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>

                        <div class="bar">
                            <span style="width: 70%"></span>
                        </div>

                        {{-- <div class="bot">--}}
                        {{-- <span class="right">792 Points</span>--}}
                        {{-- <span class="left">Professional</span>--}}
                        {{-- </div>--}}
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="teacher-bot">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div>

                    <div class="linkbox shade">
                        <div class="button">

                            <span href="" style="color: #0eb582; font-size:15px;cursor: pointer" id="show_video" class="green ar"><i class="icon-movie"></i><span>مشاهده آموزش</span></span>

                        </div>

                        <div class="right">
                            <div class="pic">
                                <img src="/home/images/team_presentation_two_color.png" alt="">
                            </div>
                            <div class="left">
                                <h4>ویدئو آموزشی نحوه کار با محیط کلاس</h4>
                                <span>اخبار، اطلاع رسانی و آموزش های حرفه ای</span>
                            </div>
                        </div>
                    </div>

                    <div class="linkbox shade">
                        <div class="button">
                            <a href="#" class="blue"><i class="icon-telegram"></i><span>عضویت در کانال</span></a>
                        </div>

                        <div class="right">
                            <div class="pic">
                                <img src="/home/images/new_message.png" alt="">
                            </div>
                            <div class="left">
                                <h4>کانال اطلاع رسانی تلگرام</h4>
                                <span>اخبار، اطلاع رسانی و آموزش های حرفه ای</span>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>






</div>

<div class="popupc" id="video_tut">
    <div>
        <div>
            <div>

                <div class="popup-container mini shade">
                    <span class="close" onclick="window.location.href='{{route('student.dashboard')}}'">
                        <i class="icon-cancel"></i>
                    </span>

                    <div class="chclass-pop">
                        <div class="top">

                            <h3>
                                آموزش
                            </h3>


                        </div>
                        <div class="form">
                            <video id="player" class="js-player" playsinline controls data-poster="/src/videos/test.mp4">
                                <source src="/src/videos/test.mp4" type="video/mp4" />
                            </video>

                        </div>
                        <div class="foot">
                            <ul>
                                <li>
                                    <div class="button-container reight border">
                                        <span class="butt close_popup" onclick="window.location.href='{{route('student.dashboard')}}'">بستن</span>
                                    </div>
                                </li>

                            </ul>
                        </div>

                    </div>


                </div>

            </div>
        </div>
    </div>
</div>
<div class="popupc" id="reason_change_class_popup">
    <div>
        <div>
            <div>

                <div class="popup-container mini shade">
                    <span class="close">
                        <i class="icon-cancel"></i>
                    </span>

                    <div class="chclass-pop">
                        <div class="top">

                            <h3>
                                دلیل تغییر زمان را بنویسید
                            </h3>


                        </div>
                        <div class="form">
                            <div class="input-container fill">
                                <label for="">این پیام توسط استاد خوانده میشود</label>
                                <form id="form_change" action="{{route('student.change')}}" method="post">
                                    @csrf
                                    @method('post')
                                    <input type="text" hidden name="meet" id="meet_change">
                                    <textarea name="reason" id="reason" cols="30" rows="10"></textarea>
                                </form>
                            </div>
                        </div>
                        <div class="foot">
                            <ul>
                                <li>
                                    <div class="button-container reight border">
                                        <span class="butt close_popup">انصراف</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="button-container reight">
                                        <span class="butt" id="do_change">تغییر زمان</span>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>


                </div>

            </div>
        </div>
    </div>
</div>



<div class="popupc" id="change_class_popup">
    <div>
        <div>
            <div>

                <div class="popup-container mini shade">
                    <span class="close">
                        <i class="icon-cancel"></i>
                    </span>

                    <div class="chclass-pop">
                        <div class="top">

                            <h3>
                                آیا از تغییر زمان کلاس مطمئن هستید؟
                            </h3>
                            <p>
                                اگر بله، ضمن هماهنگی با استاد خود، زمان توافق شده را از روی تقویم انتخاب و تایید نمایید
                            </p>

                        </div>
                        <div class="bot">
                            <div class="right">
                                <img src="/home/images/trash.png" alt="">
                            </div>
                            <div class="left">
                                <span class="day s_name">نسیم کد خدایان</span>
                                <span class="hour s_date">چهار شنبه 07 خرداد 12:00:00</span>
                            </div>
                        </div>
                        <div class="foot">
                            <ul>
                                <li>
                                    <div class="button-container reight border">
                                        <span class="butt close_popup" id="change_no">انصراف </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="button-container reight">
                                        <span class="butt" id="change_yes">تغییر زمان</span>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>


                </div>

            </div>
        </div>
    </div>
</div>


<div class="popupc" id="s_cancel_class_popup">
    <div>
        <div>
            <div>

                <div class="popup-container mini shade">
                    <span class="close close_popup">
                        <i class="icon-cancel"></i>
                    </span>

                    <div class="chclass-pop">
                        <div class="top">

                            <h3>
                                آیا قصد لغو کلاس را دارید ؟
                            </h3>
                            <p>

                                اگر فاصله زمانی تا شروع کلاس کمتر از 24 ساعت باشد، 20 درصد مبلغ این کلاس کسر و مابقی به کیف پول شما در تیچر پرو منتقل خواهد شد
                            </p>

                        </div>
                        <div class="bot">
                            <div class="right">
                                <img class=" " src="/home/images/trash.png" alt="">
                            </div>
                            <div class="left">
                                <span class="day s_name">نسیم کد خدایان</span>
                                <span class="hour s_date">چهار شنبه 07 خرداد 12:00:00</span>
                            </div>
                        </div>
                        <div class="foot">
                            <ul>
                                <li>
                                    <div class="button-container close_popup reight border">
                                        <span id="s_cancel_yes" class="butt">خیر</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="button-container  red reight" style="background: #fff!important;">
                                        <form id="cancel_form" action="{{route('home.cancel.class')}}" method="post">
                                            @csrf
                                            @method('post')
                                            <input id="can_id" type="text" hidden name="class" value="">
                                            <input class="butt " type="submit" value="لغو کلاس">
                                        </form>

                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>


                </div>

            </div>
        </div>
    </div>
</div>


@endcomponent
