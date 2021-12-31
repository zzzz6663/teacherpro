@component('home.student.content',['title'=>' تنظیمات  '])



        @slot('bread')

            @include('home.student.profile.bread_left',['name'=>'داشبورد'])


        @endslot

<div class="teacher-pricing shade" id="lang">
        <div class="widget-title">
            <h3 id="res_student" >معلم های برگزیده</h3>

            <div class="dot3">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div class="widget-content">
{{--            ->whereActive('1')->whereIn('level', ['teacher'])--}}
            @if( !auth()->user()->sfave()->get()->first() )
                <div style="text-align: center">
                    <a href="{{route('home.teacher.list')}}" class="bt">انتخاب استاد</a>
                </div>
            @endif
            @foreach(auth()->user()->sfave()->get() as  $fave)
                @php($teacher=\App\Models\User::find($fave->teacher_id))

                <div class="teachers-list">

                    <div class="single-teacher shade">
                        <div class="rowd">
                            <div class="teacher-right">
                                <div>

                                    <div class="teacher-det">


                                        <div class="det-r">

                                            <div class="tlinks">
                                                <a href="{{route('home.teacher.profile',$teacher->id)}}" class="reserv">رزرو جلسه آزمایشی</a>
                                            </div>

                                            <div class="img">
                                                @if(\Illuminate\Support\Facades\Auth::check())
                                                @if(auth()->user()->level=='student')
                                                <form id="form_save_{{$teacher->id}}" action="{{route('student.fave.teachers',$teacher->id)}}" method="post">
                                                    @csrf
                                                    @method('post')
                                                    <input type="text" hidden name="teacher" value="{{$teacher->id}}">

                                                </form>

                                                <span data-id="{{$teacher->id}}" class="like fave_teacher"><i style="color: {{(auth()->user()->has_fave($teacher->id))?'red':''}}" class="icon-heart"></i></span>
                                                @endif
                                                @endif
                                                <img src="{{asset('/src/avatar/'.$teacher->attr('avatar'))}}" alt="">
                                            </div>
                                            <ul>
                                                <li class="name">
                                                    <span class="pointer" onclick="window.location.href='{{route('home.teacher.profile',$teacher->id)}}'"> {{$teacher->name}}</span>
                                                </li>
                                                <li class="ti">
                                                    <span> {{($teacher->attr('experienced'))?'مجرب':''}}</span>
                                                    <span> {{($teacher->attr('motivated'))?'با انگیزه':''}}</span>
                                                    <span> {{($teacher->attr('accepted'))?'پذیرفته شده':''}}</span>
                                                </li>
                                                <?php

                                                    $comm=$teacher->comments()->where('active','1')->latest()->get();
                                                    ?>

                                                <li class="rate">

                                                    <span class="rate">

                                                        <i class="icon-star {{$teacher->score()['av']>=1?'':'gray'}}  "></i>
                                                        <i class="icon-star {{$teacher->score()['av']>=2?'':'gray'}}  "></i>
                                                        <i class="icon-star {{$teacher->score()['av']>=3?'':'gray'}}"></i>
                                                        <i class="icon-star {{$teacher->score()['av']>=4?'':'gray'}}"></i>
                                                        <i class="icon-star {{$teacher->score()['av']>=5?'':'gray'}}"></i>
                                                        {{-- <span>{{$teacher->score()['av']}}</span>--}}
                                                    {{-- <span>از {{$comm->count()}} نظر</span>--}}

                                                    </span>
                                                </li>

                                            </ul>

                                        </div>


                                        <div class="det-l">

                                            <div class="teaching-lng">
                                                <span class="title">
                                                    زبان تدریس :
                                                </span>
                                                <ul>
                                                    @foreach($teacher->languages()->get() as $lang )
                                                    <li><img style="height: 25px;width: 25px;" src="{{asset('/src/img/lang/'.$lang->img)}}" alt=""><span>{{$lang->name}}</span></li>
                                                    @endforeach
                                                </ul>

                                            </div>
                                            <ul>
                                                <li class="classes">
                                                    <span class="num">{{$teacher->down_class()}}</span>
                                                    <span class="nam">
                                                        <i class="icon-training"></i>
                                                        <span>کلاس ها</span>
                                                    </span>
                                                </li>
                                                <li class="student">
                                                    <span class="num">{{$teacher->count_student()}}</span>
                                                    <span class="nam">
                                                        <i class="icon-cap"></i>
                                                        <span>زبان‌آموزان</span>
                                                    </span>
                                                </li>
                                            </ul>

                                            <ul>
                                                <li class="price">
                                                    <span>قیمت هر جلسه (هر ساعت)</span>
                                                </li>
                                                <li class="mprice">
                                                    <span class="num">{{number_format($teacher->com_price($teacher->meet1))}}</span>
                                                    <span class="cur">تومان</span>
                                                    {{-- <span class="lable">تخفیف</span>--}}
                                                </li>

                                                {{-- <li class="disc">--}}
                                                {{-- <span class="num">{{number_format($teacher->meet1)}}</span>--}}
                                                {{-- <span class="cur">تومان</span>--}}
                                                {{-- </li>--}}
                                            </ul>
                                        </div>
                                    </div>



                                </div>
                            </div>
                            <div class="teacher-left">
                                <div>
                                    <div class="tabs">
                                        <ul class="tab-nav">
                                            <li class="active"><span><span>ویدیو </span><i class="icon-video-on"></i></span></li>
                                            <li><span><span>درباره </span><i class="icon-about"></i></span></li>
                                        </ul>
                                        <ul class="tab-container">
                                            <li class="active">
                                                <div>



                                                    <video class="js-player" playsinline data-poster="{{asset('/src/port_img/'.$teacher->attr('port_img'))}}">
                                                        <source src="{{asset('/src/port_vid/'.$teacher->attr('port_vid'))}}" type="video/mp4" />
                                                    </video>

                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <p style="text-align: justify">

                                                        @if(strlen($teacher-> bio) > 150)
                                                        {!! substr($teacher-> bio, 0, 130) . '...'; !!}
                                                        @else
                                                        {!!$teacher-> bio!!}
                                                        @endif
                                                        <a href="{{route('home.teacher.profile',$teacher->id)}}"> خواندن ادامه <i class="icon-left"></i><i class="icon-left"></i></a>

                                                    </p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach

        </div>



</div>

    @endcomponent
