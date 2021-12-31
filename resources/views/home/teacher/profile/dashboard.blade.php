@component('home.teacher.content',['title'=>' تنظیمات  '])


<div id="teacherpish1">

    @slot('bread')

        @include('home.teacher.profile.bread_left',['name'=>'داشبورد'])


    @endslot



        @php($classes=\App\Models\Meet::where('user_id',$user->id)->whereNotNull('student_id')->whereNull('pair')->where('canceled','0')->where('start','>',\Carbon\Carbon::now()->subMinutes(10))->orderBy('start','asc')->paginate(5))
        @php($first=$classes->first())
        <?php
        $w=[  'شنبه' ,'یکشنبه','دوشنبه','سه شنبه','چهارشنبه','پنج شنبه','جمعه'];
        $m=['فروردین','اردیبهشت','خرداد','تیر','مرداد','شهریور','مهر','آبان','آذر','دی','بهمن','اسفند' ];

        ?>

        @if($first)

            @php($student=\App\Models\User::find($first->student_id))
            @php($v=verta($first->start))
            @php(        $room=$user->rooms()->where('student_id',$first->student_id )->first())

            <?php

            $seconds = strtotime($first->start) - strtotime(\Carbon\Carbon::now());

            $days    = floor($seconds / 86400);
            $hours   = floor(($seconds - ($days * 86400)) / 3600);
            $minutes = floor(($seconds - ($days * 86400) - ($hours * 3600))/60);


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
                                @if($student->attr('avatar'))
                                <img    src="{{asset('src/avatar/'.$student->attr('avatar'))}}" alt="">
                            @else
                                {{-- <img class="pro" src="/src/avatar/{{(auth()->user()->sex=='male')?'avatar_man.png':'avatar_woman.png'}}" alt=""> --}}
                                <img  src="/src/avatar/avatar.png" alt="">
                            @endif


                            </div>
                            <div class="detail">
                                <span>زبان آموز</span>
                                <h4>    {{$student->name}} </h4>
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
                        <a target="_blank"  class="bl start" href="{{route('home.go.class',[$first->id ])}}">

                            شروع کلاس
                        </a>

                        <div id="countdown" data-time="{{$first->start}}"></div>

                    </div>
                </div>
            </div>
        @endif
        <div class="class-list shade">
            <div class="widget-title">
                <h3>کلاس ها</h3>
                <form id="sort" action="{{route('teacher.dashboard')}}" method="get">
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
                <form id="sta" action="{{route('teacher.dashboard')}}" method="get">
                    <div class="stat-filter">
                        <span><i class="icon-stat"></i>وضعیت </span>
                        <select name="status" id="status">
                            <option {{(request()->get('status')=='reserved')?'selected':''}} value="reserved">پیش رو</option>
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
                <span>

                 {{$cc=\App\Models\Meet::where('user_id',$user->id)->whereNotNull('student_id')->whereNull('pair')->where('canceled','0')->where('start','>',\Carbon\Carbon::now()->subMinutes(15))->orderBy('start','asc')->count()}}
                    کلاس در برنامه دارید</span>
                </div>
                <div class="noclass" {{$cc==0?'':'hidden'}}>
                    <img src="/home/images/world_connection__two_color.png" alt="">

                    <h4> درسی یافت نشد!</h4>

                </div>
                <?php
                $classes=\App\Models\Meet::where('user_id',$user->id)->whereNotNull('student_id')->whereNull('pair')->where('canceled','0')->where('start','>',\Carbon\Carbon::now()->subMinutes(15)) ;

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
                    $classes=\App\Models\Meet::where('user_id',$user->id)->whereNotNull('student_id')->whereNull('pair')->where('canceled','0');
                    if(request()->get('status')=='reserved') {
                        $classes=$classes->where('status' ,'reserved' );
                    }
                    if(request()->get('status')=='passed') {
                        $classes=$classes->where('status' ,'passed' );
                    }
                    if(request()->get('status')=='canceled') {
                        $classes=$classes->where('status' ,'canceled' ) ;

                    }

                }
                $classes=$classes->orderBy('start','asc')->paginate(5);

                ?>

                @foreach($classes as $class)
                    @php($student=\App\Models\User::find($class->student_id))
                <?php
                    $seconds = strtotime($class->start) - strtotime(\Carbon\Carbon::now());

                    $days    = floor($seconds / 86400);
                    $hours   = floor(($seconds - ($days * 86400)) / 3600);
                    $minutes = floor(($seconds - ($days * 86400) - ($hours * 3600))/60);

                    ?>
                    <div class="single-class">
                        <div class="date">
                            @php($v=verta($class->start))
                          <?php
                            $min="$v->minute";
                            if ($v->minute==0){
                                $min='00';

                            }
                          ?>


                            <span class="month">    {{($m[$v->month-1])}}</span>
                            <span class="day">    {{($v->day)}}</span>
                            <span class="name">

                           {{$w[$v->dayOfWeek]}}

                         </span>

                        </div>
                        <div class="mleft">

                            <div class="right">
                                <div class="pic">

                                    @if($student->attr('avatar'))
                                    <img    src="{{asset('src/avatar/'.$student->attr('avatar'))}}" alt="">
                                @else
                                    {{-- <img class="pro" src="/src/avatar/{{(auth()->user()->sex=='male')?'avatar_man.png':'avatar_woman.png'}}" alt=""> --}}
                                    <img  src="/src/avatar/avatar.png" alt="">
                                @endif
                                </div>
                                <div class="det">
                                    <div class="job"><span>زبان آموز</span></div>
                                    <h4> {{$student->name}}</h4>
                                    <div class="date"><i class="icon-time-line"></i><span>زمان</span> <span>
                                   {{$w[$v->dayOfWeek]}}
                                            {{($v->day)}}
                                            {{($m[$v->month-1])}}
                                            {{($v->hour.':'.$min)}}
                                            {{$class->model=='free'?"(کلاس آزاد)":""}}
                                            {{$class->type=='free'?"(کلاس
 آزمایشی)":""}}

                                </span></div>
                                </div>
                            </div>
                            <div class="left" >

                            <div class="enter-class">

                                    <a target="_blank" class="bl" href="{{route('home.go.class',[$class->id])}}">
                                        <span>ورود به کلاس</span>
                                    </a>
                                </div>
                                @if( $class->model !='free')
                                <div class="class-option" {{(\Illuminate\Support\Carbon::now()->gt(\Carbon\Carbon::parse($class->start)))?'hidden':''}}>
                                    <span class="title"><i class="icon-dots"></i>گزینه ها</span>
                                    <ul>
{{--                                        <li data-id="{{$class->id}}" class="change_class"><span><i class="icon-write"></i>ویرایش کلاس</span></li>--}}
                                        <li data-id="{{$class->id}}" data-img="{{asset('/src/avatar/'.$student->attr('avatar'))}}"  data-name="{{$student->name}}"
                                            data-date="
                                                 {{$w[$v->dayOfWeek]}}
                                        {{($v->day)}}
                                        {{($m[$v->month-1])}}
                                        {{($v->hour.':'.$min)}}
                                            " class="cancel_class" > <span><i class="icon-trash"></i>لغو کلاس</span></li>

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

                            {{--                        <div class="bot">--}}
                            {{--                            <span class="right">792 Points</span>--}}
                            {{--                            <span class="left">Professional</span>--}}
                            {{--                        </div>--}}
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div>
                        <div class="singl-statis shade">
                            <div class="top">
                                <div class="numner blue">
                                    <span>{{$user->reserved_class()}} </span>
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

                            {{--                        <div class="bot">--}}
                            {{--                            <span class="right">792 Points</span>--}}
                            {{--                            <span class="left">Professional</span>--}}
                            {{--                        </div>--}}
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

                            {{--                        <div class="bot">--}}
                            {{--                            <span class="right">792 Points</span>--}}
                            {{--                            <span class="left">Professional</span>--}}
                            {{--                        </div>--}}
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="teacher-bot">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div>
                        <div class="activate-profile shade">

                            <div class="pic">
                                <img src="/home/images/profile.svg" alt="" class="bg">
                                @if(auth()->user()->attr('avatar'))
                                <img  class="pro"  src="{{asset('src/avatar/'.auth()->user()->attr('avatar'))}}" alt="">
                            @else
                            <img class="pro" src="/src/avatar/avatar.png" alt="">
                                {{-- <img class="pro" src="/src/avatar/{{(auth()->user()->sex=='male')?'avatar_man.png':'avatar_woman.png'}}" alt=""> --}}
                            @endif
                            </div>

                            <div class="percent">
                                <spna class="num">{{$user->percent()}}</spna>
                                <span> درصد تکمیل شده</span>
                            </div>

                            <div class="profilbut">
                                <div class="lable-container">
                                    <form id="activeprofile_form" action="{{route('teacher.active.profile',$user->id)}}" method="post">
                                        @csrf
                                        @method('post')
                                        <input type="checkbox" {{$user->submit=='1'?'checked':''}} name="activeprofile" id="activeprofile" value="activeprofile">
                                        <label for="activeprofile">
                                            <div class="right">

                                                <span>فعال سازی پروفایل</span>
                                            </div>
                                            <div class="left">
                                                <div class="toggle">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </label>
                                    </form>


                                </div>
                            </div>

                            <div class="profile-link">
                                <a href="{{route('home.teacher.profile',$user->id)}}">مشاهده پروفایل</a>
                            </div>

                            <div class="process">
                                <p>برای فعال سازی پروفایلتان در تیچر پرو این مراحل را انجام دهید :</p>
                                <ul>

                                    <li class="pointer" onclick="window.location.href='{{route('teacher.prices')}}'">
                                        <div class="right">
														<span class="green">
															<i class="icon-discount"></i>
														</span>
                                        </div>
                                        <div class="left">
                                            <span class="title">تعیین قیمت جلسات</span>
                                            <span class="stat {{$user->attr('price_plan')?'green':'orange'}}">  {{$user->attr('price_plan')?'تکمیل شده':'در انتظار انجام'}}<i class="icon-{{$user->attr('price_plan')?'tick2':'wait'}}"></i></span>
                                        </div>
                                    </li>

                                    <li class="pointer" onclick="window.location.href='{{route('teacher.plans')}}'">
                                        <div class="right">
														<span class="blue">
															<i class="icon-calender"></i>
														</span>
                                        </div>
                                        <div class="left">
                                            <span class="title">تعیین برنامه زمانی</span>
                                            <span class="stat {{$user->attr('time_plan')?'green':'orange'}}">{{$user->attr('time_plan')?'تکمیل شده':'در انتظار انجام'}}  <i class="icon-{{$user->attr('time_plan')?'tick2':'wait'}}"></i></span>
                                        </div>
                                    </li>

                                    <li class="pointer" onclick="window.location.href='{{route('teacher.lang')}}'">
                                        <div class="right">
														<span class="blue">
															<i class="icon-calender"></i>
														</span>
                                        </div>
                                        <div class="left">
                                            <span class="title">    انتخاب زبان</span>
                                            <span class="stat {{$user->languages()->count() !=0?'green':'orange'}}">{{$user->languages()->count() !=0?'تکمیل شده':'در انتظار انجام'}}  <i class="icon-{{$user->languages()->count() !=0?'tick2':'wait'}}"></i></span>
                                        </div>
                                    </li>

                                    <li class="pointer" onclick="window.location.href='{{route('teacher.profile')}}'">
                                        <div class="right">
														<span class="orange">
															<i class="icon-pic"></i>
														</span>
                                        </div>

                                        <div class="left">
                                            <span class="title">آپلود تصویر پروفایل</span>
                                            <span class="stat {{auth()->user()->attr('avatar')?'green':'orange'}}"> {{auth()->user()->attr('avatar')?'تکمیل شده':'در انتظار انجام'}}<i class=" icon-{{$user->attr('avatar')?'tick2':'wait'}}"></i></span>
                                        </div>
                                    </li>

                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div>

                        <div class="linkbox shade">
                            <div class="button">
                                    <span href="" style="color: #0eb582; font-size:15px;cursor: pointer"  id="show_video" class="green ar">
                                        <i class="icon-movie"></i>
                                        <span>مشاهده آموزش</span>
                                    </span>
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
                                    <h4>کانال اطلاع رسانی اساتید</h4>
                                    <span>اخبار، اطلاع رسانی و آموزش های حرفه ای</span>
                                </div>
                            </div>
                        </div>

                        <div class="make-class-banner shade">
                            <div class="right">
                                <h3>کلاس حضوریت رو آنلاین و <br>رایگان برگزار کن</h3>
                                <p>!حتی اگر پروفایل شما غیرفعال است</p>
                                <span class="hshtag"># همه_کنار_هم</span>
                                <a href="{{route('teacher.classes')}}">ایجاد کلاس</a>
                            </div>
                            <div class="left">
                                <img src="/home/images/online_presentation_two_color.png" alt="">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="teacher-diagrams">
            <div class="row">

{{--                <div class="col-lg-3 col-md-12">--}}
{{--                    <div>--}}

{{--                        <div class="teacher-stat shade">--}}

{{--                            <div class="widget-title">--}}
{{--                                <h3>آمار</h3>--}}

{{--                                <div class="dot3">--}}
{{--                                    <span></span>--}}
{{--                                    <span></span>--}}
{{--                                    <span></span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="widget-content">--}}


{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}

                <div class="col-lg-12 col-md-12">
                    <div>


                        <div class="teacher-stat shade">

                            <div class="widget-title">
                                <h3>آمار  </h3>
                                <div class="diag-filter">
                                    <form id="year_form" action="{{route('teacher.dashboard')}}" method="get">
                                        @csrf
                                        @method('get')
                                        <select name="year" id="year">
                                            <option {{request()->get('year')=='0'?'selected':''}} value="0">سال جاری</option>
                                            <option {{request()->get('year')=='1'?'selected':''}} value="1">سال قبل</option>
                                        </select>
                                    </form>

                                </div>
                                <div class="dot3">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                            <div class="widget-content" style="overflow:hidden;">
                                <div class="row">
                                    <div class="col-lg-3 col-md-12">
                                        <div>

                                            <div class="statbox">
                                                <div class="icon">
                                                    <span><i class="icon-eye"></i></span>
                                                </div>
                                                <div class="title">
                                                    <span>تعداد بازدید از پروفایل</span>
                                                </div>
                                                <div class="stat">
                                                    <span>{{$user->attr('visit_profile')}}</span>
                                                </div>
                                            </div>

                                            <div class="statbox">
                                                <div class="icon">
                                                    <span><i class="icon-hearto"></i></span>
                                                </div>
                                                <div class="title">
                                                    <span>تعداد علاقه مندی</span>
                                                </div>
                                                <div class="stat">
                                                    <span>{{$user->tfave()->count()}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-12">
                                        <div>

                                            <div class="exp"><p><i class="icon-checkout"></i> <span>درامد این سال  :</span><span>
                                           {{number_format($user->income(request()->get('year'))['income_year_total'])}}
                                        </span> <span>تومان</span></p></div>
                                            <script>
                                                window.onload = function () {

                                                    var options = {
                                                        series: [{
                                                            name: "درآمد",
                                                            data: {{json_encode($user->income(request()->get('year'))['income_year_mony'])}}
                                                        }],
                                                        chart: {
                                                            height: 350,
                                                            type: 'area',
                                                            zoom: {
                                                                enabled: false
                                                            }
                                                        },
                                                        colors:['#17b687', '#E91E63', '#9C27B0'],
                                                        fill: {
                                                            colors: ['#17b687', '#E91E63', '#9C27B0'],
                                                            type: 'gradient',
                                                            gradient: {
                                                                shadeIntensity: 1,
                                                                inverseColors: false,
                                                                opacityFrom: 0.5,
                                                                opacityTo: 0,
                                                                stops: [0, 90, 100]
                                                            },
                                                        },
                                                        dataLabels: {
                                                            enabled: false
                                                        },
                                                        stroke: {
                                                            curve: 'straight'
                                                        },
                                                        markers: {
                                                            size: 8,
                                                            colors: ["#fff"],
                                                            strokeColors: "#0eb582",
                                                            strokeWidth: 4,
                                                            hover: {
                                                                size: 8,
                                                                strokeWidth: 4,
                                                                colors: ["#0eb582"],
                                                                strokeColors: "#fff",
                                                            }
                                                        },
                                                        title: {
                                                            align: 'left'
                                                        },
                                                        grid: {
                                                            row: {
                                                                colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                                                                opacity: 0.5
                                                            },
                                                        },
                                                        xaxis: {
                                                            categories: ['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند'],
                                                        }
                                                    };

                                                    var chart = new ApexCharts(document.querySelector("#chartContainer"), options);
                                                    chart.render();

                                                }
                                            </script>
                                            <div id="chartContainer" style=""></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="teacher-diagrams">
            <div class="row">

                <div class="col-lg-7 col-md-12">
                    <div>

                        <div class="teacher-comment shade">

                            <div class="widget-title">
                                <h3>آخرین دیدگاه ها</h3>

                                <div class="dot3">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                            <div class="widget-content">
                                <div>
                                    <?php

                                    $comm = \App\Models\Comment::where('active','1')->whereHas('commentable' , function($query) {
                                        $query->where('user_id' , \auth()->user()->id);
                                    })->latest()->take(3)->get();
                                    ?>
                                    @foreach($comm as $comment)
                                        @php($v=verta($comment->created_at))
                                        <div class="ho-comment">
                                            <div class="right">
                                                @if($comment->user_id)
                                                    <img src="{{asset('/src/avatar/'.$comment->user->attr('avatar'))}}" alt="">
                                                @endif
                                            </div>

                                            <div class="mtexct">
                                                <div class="right">

                                                    <div class="name"><span>توسط :

                                            {{$comment->name}}
                                            </span></div>

                                                    <div class="date"><span>{{$v->format('%B %d، %Y')}}</span></div>
                                                    <div class="text">
                                                        <p>{{$comment->comment}}</p>
                                                    </div>
                                                </div>
                                                <div class="buuton">

                                                    {{--                                        <span class="remove">حذف<i class="icon-trash"></i></span>--}}
                                                    <a href="{{route('home.single.article',$comment->commentable).'#comment_'.$comment->id}}">
                                                        <span class="reply">پاسخ<i class="icon-reply"></i></span>


                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach

                                </div>

                                <div class="more-comment">
                                    <a href="{{route('teacher.articles')}}">مشاهده همه نظرات</a>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-5 col-md-12">
                    <div>


                        <div class="teacher-cform shade">

                            <div class="widget-title">
                                <h3>پیشنویس سریع مقاله </h3>

                                <div class="dot3">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>

                            <div class="widget-content">
                                <form action="{{route('teacher.save.draft')}}" method="post">
                                    @method('post')
                                    @csrf

                                    <div class="input-container">
                                        <label for="">عنوان مقاله</label>
                                        <input type="text" name="title" placeholder="">
                                    </div>

                                    <div class="input-container">
                                        <label for="">چه چیزی در ذهن دارید</label>
                                        <textarea name="article" id="" cols="30" rows="10"></textarea>
                                    </div>

                                    <div class="button-container">
                                        <a href="{{route('teacher.articles')}}">رفتن به بخش مقالات</a>
                                        <input type="submit" class="bt" value="ذخیره پیشنویس">
{{--                                        <span class="butt">ذخیره پیشنویس</span>--}}
                                    </div>
                                </form>
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
                                اگر بله، ضمن هماهنگی با زمان آموز خود، زمان توافق شده را از روی تقویم فقط در روز جاری انتخاب و  تایید نمایید
                            </p>

                        </div>
                        <div class="bot">
                            <div class="right">
                                <img src="/home/images/trash.png" alt="">
                            </div>
                            <div class="left">
                                <span class="day">نسیم کد خدایان</span>
                                <span class="hour">چهار شنبه 07 خرداد 12:00:00</span>
                            </div>
                        </div>
                        <div class="foot">
                            <ul>
                                <li>
                                    <div class="button-container reight border">
                                        <span class="butt">خیر</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="button-container reight">
                                        <span class="butt">تغییر زمان</span>
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
{{--                            <p>--}}
{{--                                با توجه به نزدیک بودن به زمان کلاس در صورت لغو،20 درصد مبلغ این کلاس از کیف پول شما در تیچر پرو به کیف پول زبان آموزتان منتقل خواهد شد--}}
{{--                            </p>--}}

                        </div>
                        <div class="bot">
                            <div class="right">
                                <img class=" " src="/home/images/trash.png" alt="">
                            </div>
                            <div class="left">
                                <span  class="day s_name">نسیم کد خدایان</span>
                                <span class="hour s_date">چهار شنبه 07 خرداد 12:00:00</span>
                            </div>
                        </div>
                        <div class="foot">
                            <ul>
                                <li>
                                    <div class="button-container close_popup reight border">
                                        <span id="s_cancel_yes" class="butt">انصراف</span>
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
<div class="popupc" id="video_tut">
    <div>
        <div>
            <div>

                <div class="popup-container mini shade">
						<span class="close" onclick="window.location.href='{{route('teacher.dashboard')}}'">
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
                                        <span class="butt close_popup" onclick="window.location.href='{{route('teacher.dashboard')}}'">بستن</span>
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
