






@extends('master.home')
@section('main_body')




    <div id="maincontent" class="rows">
        <div>

            <div id="teacher-page">
                <div id="teacher-top">

                </div>

                <div id="teacher-sidebar">
                    <div class="teacher-inform">
                        <div class=" shade">


                            <div class="pic">
                                <img src="{{asset('/src/avatar/'.$user->attr('avatar'))}}" alt="">
                            </div>

                            <div class="name">
                                <h2> {{$user->name}}</h2>
                                <span>عضویت از
                               {{\Morilog\Jalali\Jalalian::forge($user->created_at)->ago()}}
                                </span>
                            </div>

                            <div class="free">
                                <div class="right">
                                    <i class="icon-question"></i>
                                    <span>جلسه آزمایشی</span>
                                </div>
                                <div class="left">

                                    <span>
                                        {{__('arr.'.$user->attr('freeclass'))}}


                                    </span>
                                </div>
                            </div>

                            <div class="course-price">
                                <div class="right">
                                    <i class="icon-question"></i>

                                </div>
                                <div class="left">
                                    <span class="title">رزرو کلاس آنلاین</span>
                                    <span class="text">قیمت هر جلسه (هر ساعت)</span>
                                    <div class="price">
                                        <span class="num"> {{number_format($user->com_price($user->meet1))}} </span>
                                        <span>تومان</span>
                                    </div>

                                </div>
                            </div>
{{--                            <div class="ovh">--}}
{{--									<span class="reserv-button">--}}
{{--										رزرو کلاس--}}
{{--									</span>--}}
{{--                            </div>--}}
                        </div>

                    </div>

{{--                    <div class="teacher-summerise">--}}
{{--                        <div class="title">--}}
{{--                            <h4>خلاصه اطلاعات مدرس  :</h4>--}}
{{--                        </div>--}}
{{--                        <ul>--}}
{{--                            <li>--}}
{{--                                <div>--}}
{{--										<span class="img">--}}
{{--											<img src="/home/images/surface.svg" alt="">--}}
{{--										</span>--}}
{{--                                    <span class="name">حضور در کلاس</span>--}}
{{--                                    <span class="percent">86%</span>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div>--}}
{{--										<span class="img">--}}
{{--											<img src="/home/images/star.svg" alt="">--}}
{{--										</span>--}}
{{--                                    <span class="name">امتياز</span>--}}
{{--                                    <span class="percent">{{$user->score()['per']}}%</span>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div>--}}
{{--										<span class="img">--}}
{{--											<img src="/home/images/calendar.svg" alt="">--}}
{{--										</span>--}}
{{--                                    <span class="name">تاريخ عضويت</span>--}}
{{--                                    <span class="percent">  {{\Morilog\Jalali\Jalalian::forge($user->created_at)->format('%B %d، %Y')}}</span>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div>--}}
{{--										<span class="img">--}}
{{--											<img src="/home/images/clock.svg" alt="">--}}
{{--										</span>--}}
{{--                                    <span class="name">شروع به موقع</span>--}}
{{--                                    <span class="percent">86%</span>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div>--}}
{{--										<span class="img">--}}
{{--											<img src="/home/images/surface2.svg" alt="">--}}
{{--										</span>--}}
{{--                                    <span class="name">كلاس به زبان آموز</span>--}}
{{--                                    <span class="percent">86%</span>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div>--}}
{{--										<span class="img">--}}
{{--											<img src="/home/images/surface1.svg" alt="">--}}
{{--										</span>--}}
{{--                                    <span class="name">كل كلاس ها</span>--}}
{{--                                    <span class="percent">86%</span>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                </div>
                <div id="teacher-details">

                    <div class="teacher-info">
                        <ul>
{{--                            <li class="classes">--}}
{{--                                <span class="tex">کلاس های برگزاری شده</span>--}}
{{--                                <span class="number">{{$user->down_class()}}</span>--}}
{{--                            </li>--}}

{{--                            <li class="students">--}}
{{--                                <span class="tex">زبان آموزان</span>--}}
{{--                                <span class="number">{{$user->count_student()}}</span>--}}
{{--                            </li>--}}
                            <li class="lang">
                                <span class="text">	زبان تدریس</span>
                                <ul>
                                    @foreach($user->languages()->get() as $lang )
                                        <li><img style="height: 25px;width: 25px;" src="{{asset('/src/img/lang/'.$lang->img)}}" alt=""><span>{{$lang->name}}</span></li>
                                    @endforeach
                                </ul>
                            </li>
                          <?php

                            $comm=$user->comments()->where('active','1')->latest()->get();
                            ?>
                            <li class="points">
                                <span class="tex">امتیاز</span>
                                <span class="rate">

                                       <i class="icon-star {{$user->score()['av']>=1?'':'gray'}}  "></i>
                                <i class="icon-star {{$user->score()['av']>=2?'':'gray'}}  "></i>
                                <i class="icon-star {{$user->score()['av']>=3?'':'gray'}}"></i>
                                <i class="icon-star {{$user->score()['av']>=4?'':'gray'}}"></i>
                                <i class="icon-star {{$user->score()['av']>=5?'':'gray'}}"></i>
                                <span>{{$user->score()['av']}}</span>
								    <span>از {{$comm->count()}} نظر</span>

									</span>


                            </li>



                        </ul>
                    </div>

                    <div class="teacher-info teacher-summerise">
                        <div class="title">
                            <h3>خلاصه اطلاعات مدرس  :</h3>
                        </div>
                        <ul>
{{--                            <li>--}}
{{--                                <div>--}}
{{--										<span class="img">--}}
{{--											<img class="ma" src="/home/images/surface.svg" alt="">--}}
{{--										</span>--}}
{{--                                    <span class="name">حضور در کلاس</span>--}}
{{--                                    <span class="percent">86%</span>--}}
{{--                                </div>--}}
{{--                            </li>--}}
                            <li>
                                <div>
										<span class="img">
											<img class="ma" src="/home/images/star.svg" alt="">
										</span>
                                    <span class="name">امتياز</span>
                                    <span class="percent">{{$user->score()['per']}}%</span>
                                </div>
                            </li>
                            <li>
                                <div>
										<span class="img">
											<img class="ma" src="/home/images/calendar.svg" alt="">
										</span>
                                    <span class="name">تاريخ عضويت</span>
                                    <span class="percent">  {{\Morilog\Jalali\Jalalian::forge($user->created_at)->format('%B %d، %Y')}}</span>
                                </div>
                            </li>
{{--                            <li>--}}
{{--                                <div>--}}
{{--										<span class="img">--}}
{{--											<img class="ma" src="/home/images/clock.svg" alt="">--}}
{{--										</span>--}}
{{--                                    <span class="name">شروع به موقع</span>--}}
{{--                                    <span class="percent">86%</span>--}}
{{--                                </div>--}}
{{--                            </li>--}}
                            <li>
                                <div>
										<span class="img">
											<img class="ma" src="/home/images/surface2.svg" alt="">
										</span>
                                    <span class="name"> تعداد کل دانش آموزان</span>
                                    <span class="percent"> {{$user->students()}}</span>
                                </div>
                            </li>
                            <li>
                                <div>
										<span class="img">
											<img class="ma" src="/home/images/surface1.svg" alt="">
										</span>
                                    <span class="name">كل كلاس ها</span>
                                    <span class="percent"> {{$user->passed_class()}}</span>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="teacher-about">
                        <div class="t-icon-title">
                            <span class="icon"><i class="icon-write"></i></span>
                            <h3>درباره من</h3>
                        </div>
                        <div class="about-text">
                            <div>
                                <p>
                                    {!! $user->bio !!}

                                </p>


                            </div>
                        </div>

                        @if(strlen($user->bio)>1000)
                        <div class="about-more">
                            <div>

                                <span>


                                    خواندن ادامه</span>
                                <span class="down">
										<i class="icon-down"></i>
										<i class="icon-down"></i>
									</span>
                            </div>
                        </div>
                            @endif
                    </div>

                    <div class="teacher-video">
                        <div class="t-icon-title">
                            <span class="icon"><i class="icon-play"></i></span>
                            <h3>ویدیو معرفی</h3>
                        </div>
                        <video id="player" class="js-player" playsinline controls data-poster="{{asset('src/port_img/'.$user->attr('port_img'))}}">
                            <source src="{{asset('src/port_vid/'.$user->attr('port_vid'))}}" type="video/mp4" />

                        </video>

                    </div>

                    <div class="teacher-nav">
                        <div>
                            <div>

                                <ul>
                                    <li><a class="bl" href="#teacher-scadule">زمان های آزاد استاد</a></li>
                                    <li><a class="bl" href="#teacher-expert">حوزه تخصص</a></li>
                                    <li><a class="bl" href="#teacher-resume">رزومه</a></li>
                                    <li><a class="bl" href="#teacher-course">دوره‌ها و کلاس‌ها</a></li>
                                    <li><a class="bl" href="#teacher-blog">مقالات آموزشی</a></li>
                                    <li><a class="bl" href="#teacher-comments">نظرات</a></li>
                                </ul>

                            </div>
                        </div>
                    </div>

                    <div class="tnav" id="teacher-scadule">
                        <div class="t-icon-title">
                            <span class="icon"><i class="icon-resume"></i></span>
                            <h3>زمان های آزاد استاد</h3>
                        </div>

                        <div class="teacher-guide">
                            <div class="row">
                                <div class="col-lg-3 col-md-12">
                                    <div>
                                        <div class="title">
												<span>
													راهنمای تقویم :
												</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div>
                                        <ul>
                                            <li>
                                                <span class="titl">قابل رزرو</span>
                                                <span class="color green"></span>
                                            </li>
                                            <li>
                                                <span class="titl">رزروشده</span>
                                                <span class="color gray"></span>
                                            </li>
                                            <li>
                                                <span class="titl">غیرفعال</span>
                                                <span class="color wgray"></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12">
                                    <div>
                                        <div class="time-zone">
                                            <i class="icon-timezone"></i>
                                            <span>منطقه زمانی :</span>
                                            <span>Asia/Tehran</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="teacher-clander" data-name="{{$user->name}}" data-job="{{($user->attr('experienced'))?'(مجرب)':''}} {{($user->attr('motivated'))?'(با انگیزه)':''}}  {{($user->attr('accepted'))?'(پذیرفته شده)':''}}" data-pic="{{asset('/src/avatar/'.$user->attr('avatar'))}}">
                            <div class="right">
                                <div class="hours">
                                    <ul>
                                        <li>
                                            <span>AM</span>
                                            <span>07:00</span>
                                        </li>
                                        <li>
                                            <span>AM</span>
                                            <span>08:00</span>
                                        </li>
                                        <li>
                                            <span>AM</span>
                                            <span>09:00</span>
                                        </li>
                                        <li>
                                            <span>AM</span>
                                            <span>10:00</span>
                                        </li>
                                        <li>
                                            <span>AM</span>
                                            <span>11:00</span>
                                        </li>
                                        <li>
                                            <span>AM</span>
                                            <span>12:00</span>
                                        </li>
                                        <li>
                                            <span>PM</span>
                                            <span>13:00</span>
                                        </li>
                                        <li>
                                            <span>PM</span>
                                            <span>14:00</span>
                                        </li>
                                        <li>
                                            <span>PM</span>
                                            <span>15:00</span>
                                        </li>
                                        <li>
                                            <span>PM</span>
                                            <span>16:00</span>
                                        </li>
                                        <li>
                                            <span>PM</span>
                                            <span>17:00</span>
                                        </li>
                                        <li>
                                            <span>PM</span>
                                            <span>18:00</span>
                                        </li>
                                        <li>
                                            <span>PM</span>
                                            <span>19:00</span>
                                        </li>
                                        <li>
                                            <span>PM</span>
                                            <span>20:00</span>
                                        </li>
                                        <li>
                                            <span>PM</span>
                                            <span>21:00</span>
                                        </li>
                                        <li>
                                            <span>PM</span>
                                            <span>22:00</span>
                                        </li>
                                        <li>
                                            <span>PM</span>
                                            <span>23:00</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="con">
                                <?php
                                $w=[  'شنبه' ,'یکشنبه','دوشنبه','سه شنبه','چهارشنبه','پنج شنبه','جمعه'];
                                $m=['فروردین','اردیبهشت','خرداد','تیر','مرداد','شهریور','مهر','آبان','آذر','دی','بهمن','اسفند' ];
                                ?>
                                <ul class=" owl-carousel owl-theme ">
                                    @for($i=0 ;$i<12;$i++)
                                    <li data-date=" {{\Morilog\Jalali\Jalalian::forge(\Carbon\Carbon::now()->addDay($i))->format('%A, %d %B  ')}} ">
                                        <?php
                                        $v=verta(\Carbon\Carbon::now()->addDay($i))
                                        ?>
                                        <div class="date">
                                            <span class="top"> {{$w[$v->dayOfWeek]}} </span>
                                            <span class="bot" style="font-size: 15px; min-height: 30px">
                                        {{ $v->day }}
                                                {{ $m[$v->month-1] }}
                                    </span>
                                        </div>

                                        @for($p=0 ;$p<34;$p++)

                                            @php
                                                $today= \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00');
                                                $today2= \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00');
                                                $today4= \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00');
                                                $today3= \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00');
                                                $today5= \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00');
                                            @endphp

                                               @if($today->addMinutes(($p*30))->greaterThan(\Carbon\Carbon::now() ))

{{--                                                @if (\Illuminate\Support\Facades\Auth::check())--}}
{{--                                                    <div data-id="{{$user->id}}"  data-level="{{auth()->user()->level}}" data-cid="{{$user->empty($today2->addMinutes(($p*30))->format('Y-m-d H:i:s'))}}"  data-da="{{\Morilog\Jalali\Jalalian::forge(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00')->addMinutes(($p*30)))->format('%A, %d %B ')}}"  class="hour {{($user->empty($today2->addMinutes(($p*30))->format('Y-m-d H:i:s')))?' open ':''}}" data-time="{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00')->addMinutes(($p*30))->format('H:i:s')}}" >--}}

{{--                                                    @else--}}
                                                            <div data-level="student" data-id="{{$user->id}}"    class="hour {{($user->empty($today2->addMinutes(($p*30))->format('Y-m-d H:i:s')))?' open ':' '}}  {{($user->reserved($today5->addMinutes(($p*30))->format('Y-m-d H:i:s')))?'  reserved  ':'  '}}" data-cid="{{$user->empty($today4->addMinutes(($p*30))->format('Y-m-d H:i:s'))}}"
                                                                 data-da="{{\Morilog\Jalali\Jalalian::forge(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00')->addMinutes(($p*30)))->format('%A, %d %B ')}}"  data-time="{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00')->addMinutes(($p*30))->format('H:i')}}" >

{{--                                                            @endif--}}
                                                <input type="checkbox" form="plan" class="op" name="reserve[]" value="{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00')->addMinutes(($p*30))}}" hidden  >
                                            </div>
                                                                                        @else
                                                <div   class="hour {{($user->empty($today3->addMinutes(($p*30))->format('Y-m-d H:i:s')))?'   ':''}}" data-time="{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00')->addMinutes(($p*30))->format('H:i')}}" >
                                                    <input type="checkbox" form="plan" class="op" name=" " value="{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00')->addMinutes(($p*30))}}" hidden  >
                                                </div>
                                                                                    @endif
                                        @endfor


                                    </li>
                                     @endfor

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="tnav" id="teacher-expert">
                        <div class="t-icon-title">
                            <span class="icon"><i class="icon-expertis"></i></span>
                            <h3>حوضه تخصص مدرس</h3>
                        </div>

                        <div class="expertis">
                            <ul>
                                <li class="title">
                                    <span>سطوح تدریس</span>
                                </li>
                                <li class="contn">
                                    <div class="row">
                                        <?php
                                        $expert=array('Starter','Elementary','Intermediate','Upper_intermediate','Advanced','Mastery' );
                                        ?>
                                        @foreach($expert as $ex)
                                            @if(!empty($user->attr($ex)))
                                                    <div class="col-lg-6 col-md-12">
                                                        <div>
                                                            <span>{{($user->attr($ex)?__('arr.'.$ex):'')}}</span>
                                                        </div>
                                                    </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </li>

                                <li class="title">
                                    <span>لهجه مدرس</span>
                                </li>
                                <li class="contn">
                                    <div class="row">
                                        <?php
                                        $expert=array('American_Accent','British_Accent','Australian_Accent','Indian_Accent','Irish_Accent','Scottish_Accent','South_African_Accent' );
                                        ?>
                                        @foreach($expert as $ex)
                                            @if(!empty($user->attr($ex)))
                                                <div class="col-lg-6 col-md-12">
                                                    <div>
                                                        <span>{{($user->attr($ex)?__('arr.'.$ex):'')}}</span>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach

                                    </div>
                                </li>
                                <li class="title">
                                    <span>سن</span>
                                </li>
                                <li class="contn">
                                    <div class="row">
                                        <?php
                                        $expert=array('Children','Teenagers','Adults'  );
                                        ?>
                                        @foreach($expert as $ex)
                                            @if(!empty($user->attr($ex)))
                                                <div class="col-lg-6 col-md-12">
                                                    <div>
                                                        <span>{{($user->attr($ex)?__('arr.'.$ex):'')}}</span>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </li>
                                <li class="title">
                                    <span>کلاس شامل چه  مواردی میشود</span>
                                </li>
                                <li class="contn">
                                    <div class="row">
                                        <?php
                                        $expert=array('Curriculum','Homework','Learning_Materials','Writing_Exercises','Lesson_Plans','Proficiency_Assessment','Quizzes','Tests','Reading_Exercises' );

                                        ?>
                                        @foreach($expert as $ex)
                                            @if(!empty($user->attr($ex)))
                                                <div class="col-lg-6 col-md-12">
                                                    <div>
                                                        <span>{{($user->attr($ex)?__('arr.'.$ex):'')}}</span>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </li>
                                <li class="title">
                                    <span>موضوعات</span>
                                </li>
                                <li class="contn">
                                    <div class="row">
                                        <?php
                                        $expert=array('Business_English','Interview_Preparation','Reading_Comprehension'
                                        ,'Listening_Comprehension','Speaking_Practice','Writing_Correction','Vocabulary_Development'
                                        ,'Grammar_Development','Academic_English','Accent_Reduction','Phonetics' );
                                        ?>
                                        @foreach($expert as $ex)
                                            @if(!empty($user->attr($ex)))
                                                <div class="col-lg-6 col-md-12">
                                                    <div>
                                                        <span>{{($user->attr($ex)?__('arr.'.$ex):'')}}</span>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>

                                </li>
                                <li class="title">
                                    <span>آمادگی برای آزمون</span>
                                </li>
                                <li class="contn">
                                    <div class="row">
                                        <?php
                                        $expert=array('TOEFL','IELTS','PTE'
                                        ,'GRE','CELPIP','Duolingo','TOEIC'
                                        ,'KET','PET','CAE','FCE' ,'CPE' ,'BEC','TOEFLPhD',
                                        'TCF','TEF','DELF'
                                        ,'DALF',
                                            'Goethe','Telc','Test_Daf','OSD','TOMER','TYS','DELE','SIELE'

                                        );

                                        ?>
                                        @foreach($expert as $ex)
                                            @if(!empty($user->attr($ex)))
                                                <div class="col-lg-6 col-md-12">
                                                    <div>
                                                        <span>{{($user->attr($ex)?__('arr.'.$ex):'')}}</span>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="tnav" id="teacher-resume">
                        <div class="t-icon-title">
                            <span class="icon"><i class="icon-resume"></i></span>
                            <h3>رزومه </h3>
                        </div>

                        <div class="resume-section">
                            <div class="title">
                                <h4>
                                    <i class="icon-tahsil"></i>
                                    <span>سوابق تحصیلی</span>
                                </h4>
                            </div>
                            <ul>
                                @foreach($user->resumes()->whereType('education')->get() as $resume)
                                <li>
                                    <div class="resume">
                                        <div class="right" style="text-align: center">
                                            <span>{{$resume->from}} </span>
                                            <i class="icon-time-line"></i>
                                            <br>
                                            <span>{{$resume->till}} </span>
                                        </div>
                                        <div class="left">
                                            <h5>
                                                {{$resume->place}} : {{$resume->title}}
                                            </h5>

                                            <p>
                                                {{$resume->info}}
                                            </p>
{{--                                            <span class="date">--}}
{{--													<span>    </span>--}}
{{--													--}}
{{--												</span>--}}
                                        </div>
                                    </div>
                                </li>
                                    @endforeach
                                @if(!$user->resumes()->whereType('education')->get()->first())
                                        <div class="no-vontent">
                                            <img src="/home/images/resume.svg" alt="">
                                            <span>هنوز رزومه ای  ثبت نشده</span>
                                        </div>
                                    @endif

                            </ul>
                        </div>

                        <div class="resume-section">
                            <div class="title">
                                <h4>
                                    <i class="icon-sabegh"></i>
                                    <span>سوابق کاری</span>
                                </h4>
                            </div>
                            <ul>
                                @foreach($user->resumes()->whereType('sabeghe')->get() as $resume)
                                    <li>
                                        <div class="resume">
                                            <div class="right" style="text-align: center">
                                                <span>{{$resume->from}} </span>
                                                <i class="icon-time-line"></i>
                                                <br>
                                                <span>{{$resume->till}} </span>
                                            </div>
                                            <div class="left">
                                                <h5>
                                                    {{$resume->place}} : {{$resume->title}}
                                                </h5>

                                                <p>
                                                    {{$resume->info}}
                                                </p>
{{--                                                <span class="date">--}}
{{--													<span>     {{$resume->from}}{{$resume->till}}</span>--}}
{{--													<i class="icon-time-line"></i>--}}
{{--												</span>--}}
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                                @if(!$user->resumes()->whereType('education')->get()->first())
                                    <div class="no-vontent">
                                        <img src="/home/images/resume.svg" alt="">
                                        <span>هنوز رزومه ای  ثبت نشده</span>
                                    </div>
                                @endif

                            </ul>
                        </div>

                        <div class="resume-section">
                            <div class="title">
                                <h4>
                                    <i class="icon-licence"></i>
                                    <span>گواهی‌ها</span>
                                </h4>
                            </div>
                            <ul>
                                @foreach($user->resumes()->whereType('licence')->get() as $resume)
                                    <li>
                                        <div class="resume">
                                            <div class="right" style="text-align: center">
                                                <span>{{$resume->from}} </span>
                                                <i class="icon-time-line"></i>
                                                <br>
                                                <span>{{$resume->till}} </span>
                                            </div>
                                            <div class="left">
                                                <h5>
                                                    {{$resume->place}} : {{$resume->title}}
                                                </h5>

                                                <p>
                                                    {{$resume->info}}
                                                </p>
{{--                                                <span class="date">--}}
{{--													<span>     {{$resume->from}}{{$resume->till}}</span>--}}
{{--													<i class="icon-time-line"></i>--}}
{{--												</span>--}}
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                                @if(!$user->resumes()->whereType('education')->get()->first())
                                    <div class="no-vontent">
                                        <img src="/home/images/resume.svg" alt="">
                                        <span>هنوز رزومه ای  ثبت نشده</span>
                                    </div>
                                @endif

                            </ul>
                        </div>


                    </div>

                    <div class="tnav" id="teacher-course">
                        <div class="t-icon-title">
                            <span class="icon"><i class="icon-folder"></i></span>
                            <h3>دوره‌های ویدیویی</h3>
                        </div>
                        <p>
                            این مدرس در حال حاضر دوره ویدئویی ندارد
                        </p>
{{--                        <div class="teacher-course-list">--}}
{{--                            <ul class="owl-carousel owl-theme">--}}

{{--                                <li>--}}
{{--                                    <div class="scourse">--}}
{{--                                        <div class="cats">--}}
{{--                                            <a href="#">علوم کامپیوتر</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="title">--}}
{{--                                            <h3>اموزش طراحی قالب وردپرس</h3>--}}
{{--                                        </div>--}}
{{--                                        <div class="img">--}}
{{--                                            <a href="#">--}}
{{--                                                <img src="/home/images/course.jpg" alt="">--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}

{{--                                <li>--}}
{{--                                    <div class="scourse">--}}
{{--                                        <div class="cats">--}}
{{--                                            <a href="#">علوم کامپیوتر</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="title">--}}
{{--                                            <h3>اموزش طراحی قالب وردپرس</h3>--}}
{{--                                        </div>--}}
{{--                                        <div class="img">--}}
{{--                                            <a href="#">--}}
{{--                                                <img src="/home/images/course.jpg" alt="">--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}

{{--                                <li>--}}
{{--                                    <div class="scourse">--}}
{{--                                        <div class="cats">--}}
{{--                                            <a href="#">علوم کامپیوتر</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="title">--}}
{{--                                            <h3>اموزش طراحی قالب وردپرس</h3>--}}
{{--                                        </div>--}}
{{--                                        <div class="img">--}}
{{--                                            <a href="#">--}}
{{--                                                <img src="/home/images/course.jpg" alt="">--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}

{{--                                <li>--}}
{{--                                    <div class="scourse">--}}
{{--                                        <div class="cats">--}}
{{--                                            <a href="#">علوم کامپیوتر</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="title">--}}
{{--                                            <h3>اموزش طراحی قالب وردپرس</h3>--}}
{{--                                        </div>--}}
{{--                                        <div class="img">--}}
{{--                                            <a href="#">--}}
{{--                                                <img src="/home/images/course.jpg" alt="">--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}

{{--                                <li>--}}
{{--                                    <div class="scourse">--}}
{{--                                        <div class="cats">--}}
{{--                                            <a href="#">علوم کامپیوتر</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="title">--}}
{{--                                            <h3>اموزش طراحی قالب وردپرس</h3>--}}
{{--                                        </div>--}}
{{--                                        <div class="img">--}}
{{--                                            <a href="#">--}}
{{--                                                <img src="/home/images/course.jpg" alt="">--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}

{{--                                <li>--}}
{{--                                    <div class="scourse">--}}
{{--                                        <div class="cats">--}}
{{--                                            <a href="#">علوم کامپیوتر</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="title">--}}
{{--                                            <h3>اموزش طراحی قالب وردپرس</h3>--}}
{{--                                        </div>--}}
{{--                                        <div class="img">--}}
{{--                                            <a href="#">--}}
{{--                                                <img src="/home/images/course.jpg" alt="">--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            </ul>--}}

{{--                        </div>--}}
                    </div>

                    <div class="tnav" id="teacher-course">
                        <div class="t-icon-title">
                            <span class="icon"><i class="icon-folder"></i></span>
                            <h3>کلاس‌های گروهی آنلاین</h3>
                        </div>
                        <p>
                            این مدرس در حال حاضر کلاس‌های گروهی آنلاین   ندارد
                        </p>
{{--                        <div class="teacher-course-list">--}}
{{--                            <ul class="owl-carousel owl-theme">--}}

{{--                                <li>--}}
{{--                                    <div class="scourse">--}}
{{--                                        <div class="cats">--}}
{{--                                            <a href="#">علوم کامپیوتر</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="title">--}}
{{--                                            <h3>اموزش طراحی قالب وردپرس</h3>--}}
{{--                                        </div>--}}
{{--                                        <div class="img">--}}
{{--                                            <a href="#">--}}
{{--                                                <img src="/home/images/course.jpg" alt="">--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}

{{--                                <li>--}}
{{--                                    <div class="scourse">--}}
{{--                                        <div class="cats">--}}
{{--                                            <a href="#">علوم کامپیوتر</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="title">--}}
{{--                                            <h3>اموزش طراحی قالب وردپرس</h3>--}}
{{--                                        </div>--}}
{{--                                        <div class="img">--}}
{{--                                            <a href="#">--}}
{{--                                                <img src="/home/images/course.jpg" alt="">--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}

{{--                                <li>--}}
{{--                                    <div class="scourse">--}}
{{--                                        <div class="cats">--}}
{{--                                            <a href="#">علوم کامپیوتر</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="title">--}}
{{--                                            <h3>اموزش طراحی قالب وردپرس</h3>--}}
{{--                                        </div>--}}
{{--                                        <div class="img">--}}
{{--                                            <a href="#">--}}
{{--                                                <img src="/home/images/course.jpg" alt="">--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}

{{--                                <li>--}}
{{--                                    <div class="scourse">--}}
{{--                                        <div class="cats">--}}
{{--                                            <a href="#">علوم کامپیوتر</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="title">--}}
{{--                                            <h3>اموزش طراحی قالب وردپرس</h3>--}}
{{--                                        </div>--}}
{{--                                        <div class="img">--}}
{{--                                            <a href="#">--}}
{{--                                                <img src="/home/images/course.jpg" alt="">--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}

{{--                                <li>--}}
{{--                                    <div class="scourse">--}}
{{--                                        <div class="cats">--}}
{{--                                            <a href="#">علوم کامپیوتر</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="title">--}}
{{--                                            <h3>اموزش طراحی قالب وردپرس</h3>--}}
{{--                                        </div>--}}
{{--                                        <div class="img">--}}
{{--                                            <a href="#">--}}
{{--                                                <img src="/home/images/course.jpg" alt="">--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}

{{--                                <li>--}}
{{--                                    <div class="scourse">--}}
{{--                                        <div class="cats">--}}
{{--                                            <a href="#">علوم کامپیوتر</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="title">--}}
{{--                                            <h3>اموزش طراحی قالب وردپرس</h3>--}}
{{--                                        </div>--}}
{{--                                        <div class="img">--}}
{{--                                            <a href="#">--}}
{{--                                                <img src="/home/images/course.jpg" alt="">--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            </ul>--}}

{{--                        </div>--}}
                    </div>

                    <div class="tnav" id="teacher-blog">
                        <div class="t-icon-title">
                            <span class="icon"><i class="icon-author"></i></span>
                            <h3>مقالات منتشر شده  توسط استاد</h3>
                        </div>
                        <div class="blog-list">
                            <ul class="owl-carousel owl-theme">
                                @foreach($user->articles()->whereActive('1') ->whereSubmit('1') ->latest()->get() as $article)

                                <li>
                                        @php($v=verta($article->created_at))
                                        <div class=" ">
                                            <div>
                                                <div class="single-post">

                                                    <div class="elementor-post__card">
                                                        <a class="elementor-post__thumbnail__link" href="#">
                                                            <div class="elementor-post__thumbnail elementor-fit-height" style="background: url('{{asset('/src/article/images/'.$article->image)}}') center center/cover; padding-top: 60%;">
                                                                {{--                                                                        <img src="{{asset('/src/article/images/a3'.$article->image)}}" alt="">--}}
                                                            </div>
                                                            {{--                                                    <div class="elementor-post__thumbnail elementor-fit-height">--}}
                                                            {{--                                                        <img src="/home/images/blog1.jpg" alt="">--}}
                                                            {{--                                                        <img src="{{asset('/src/article/images/a3'.$article->image)}}" alt="">--}}
                                                            {{--                                                    </div>--}}
                                                        </a>
                                                        @if($article->acats()->first())
                                                        <div class="elementor-post__badge">{{$article->acats()->first()->name}}</div>
                                                        @endif
                                                        <div class="elementor-post__text" style="min-height:120px">
                                                            <h3 class="elementor-post__title">
                                                                <a href="{{route('home.single.article',$article->id)}}"> {{$article->title}} </a>
                                                            </h3>
                                                            <div class="elementor-post__excerpt" style="text-align: right">
                                                                {{--                                                        $str = substr($str, 0, 7) . '...';--}}

                                                                {{mb_strimwidth(strip_tags(html_entity_decode(  $article->article)), 0, 100)}} ...
                                                            </div>
                                                        </div>
                                                        <div class="elementor-post__meta-data">
                                                            <span class="elementor-post-author"> {{$article->user->name}} </span>
                                                            <span class="elementor-post-date">{{$v->format('%B %d، %Y')}}</span>
                                                        </div>
                                                        <div class="elementor-post__meta-data read-more"  >
                                                            <a href="{{route('home.single.article',$article->id)}}"> بیشتر بخوانید</a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                </li>
                                    @endforeach


                            </ul>
                        </div>
                    </div>
                    @php($comm=$user->comments()->where('active','1')->latest()->get())

                    <div class="tnav" id="teacher-comments">
                        <div class="t-icon-title">
                            <span class="icon"><i class="icon-commento"></i></span>
                            <h3>دیدگاه های زبان آموزان ({{$comm->count()}} نظر)</h3>
                        </div>

                        <div class="right-avrage" style="padding: 0 30px">
                            <div class="title" style="text-align: center">
                                <h3>
                                    <span>%{{$user->score()['per']}}</span>
                                    <span>رضایت</span>
                                </h3>
                            </div>
                            <ul>
                                <li>
                                    <div class="left">
                                        <i class="icon-sohappy"></i>
                                    </div>
                                    <div class="right">
                                        <div class="bar"><span style="width: {{$user->score()['pr5']}}%"></span></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="left">
                                        <i class="icon-happy"></i>
                                    </div>
                                    <div class="right">
                                        <div class="bar"><span style="width: {{$user->score()['pr4']}}%"></span></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="left">
                                        <i class="icon-mood"></i>
                                    </div>
                                    <div class="right">
                                        <div class="bar"><span style="width: {{$user->score()['pr3']}}%"></span></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="left">
                                        <i class="icon-sad"></i>
                                    </div>
                                    <div class="right">
                                        <div class="bar"><span style="width: {{$user->score()['pr2']}}%"></span></div>
                                    </div>
                                </li>
                            </ul>
                            <div class="avr" style="text-align: center">
                                <span>امتیاز  :</span>
                                <span>از {{$comm->count()}} نظر</span>
                            </div>
                            <div class="points" style="text-align: center">
                                <i class="icon-star {{$user->score()['av']>=1?'':'gray'}}  "></i>
                                <i class="icon-star {{$user->score()['av']>=2?'':'gray'}}  "></i>
                                <i class="icon-star {{$user->score()['av']>=3?'':'gray'}}"></i>
                                <i class="icon-star {{$user->score()['av']>=4?'':'gray'}}"></i>
                                <i class="icon-star {{$user->score()['av']>=5?'':'gray'}}"></i>
                                <span>{{$user->score()['av']}}</span>
                            </div>
                        </div>

                        <div class="comment-list">
                            <ul class="owl-carousel owl-theme">

                                @foreach($comm as $com)
                                    @php($student=\App\Models\User::find($com->user_id))
                                    @php($v=verta($com->created_at))
                                    <li>
                                        <div class="single-comment">
                                            <div class="pic">
                                                <i class="icon-comment"></i>
                                                <img src="{{asset('/src/avatar/'.$student->attr('avatar'))}}" alt="">
                                            </div>
                                            <div class="name">
                                                <span>{{$student->name}}  </span>
                                            </div>
{{--                                            <div class="job">--}}
{{--                                                <span>دانشجوی نرم افزار</span>--}}
{{--                                            </div>--}}
                                            <div class="text">
                                                {{$com->comment}}
                                            </div>
                                            <div class="date">
												<span>
													{{$v->format('%B %d، %Y')}}
												</span>
                                            </div>
                                            <div class="point">
                                                @for($i=1; $i<6 ; $i++)
                                                <i class="icon-star {{$com->rate >= $i?'':'gray'}}"></i>
                                                    @endfor
                                            </div>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="teacher-cform shade">

                            <div class="widget-title">
                                <h3>نظر خود را بنویسید</h3>

                                <div class="dot3">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>

                            <div class="widget-content">
                                <?php if($errors->any()): ?>
                                <div class="e_section" id="e_section">
                                    <?php echo implode('', $errors->all('<span class="text text-danger">:message</span><br>')); ?>
                                </div>
                                <?php endif; ?>
                                <form action="{{{route('home.comment.teacher',$user->id)}}}" method="post">
                                    @csrf
                                    @method('post')

                                    <div class="input-container">
                                        <label for="">نام</label>
                                        <input type="text" hidden name="parent_id" value="0" placeholder="">
                                        <input type="text" name="name" value="{{old('name')}}" placeholder="">
                                    </div>

                                    <div class="input-container">
                                        <label for="">نظر شما</label>
                                        <textarea name="comment" id="" cols="30" rows="10">{{old('comment')}}</textarea>
                                    </div>

                                    <div class="button-container">
                                        <div class="rate">
                                            <input {{old('rate')=='5'?'checked':""}} type="radio" id="star5" name="rate" value="5">
                                            <label for="star5" title="text">5 stars</label>
                                            <input {{old('rate')=='4'?'checked':""}} type="radio" id="star4" name="rate" value="4">
                                            <label for="star4" title="text">4 stars</label>
                                            <input {{old('rate')=='3'?'checked':""}} type="radio" id="star3" name="rate" value="3">
                                            <label for="star3" title="text">3 stars</label>
                                            <input {{old('rate')=='2'?'checked':""}} type="radio" id="star2" name="rate" value="2">
                                            <label for="star2" title="text">2 stars</label>
                                            <input {{old('rate')=='1'?'checked':""}} type="radio" id="star1" name="rate" value="1">
                                            <label for="star1" title="text">1 star</label>
                                        </div>
                                        <input type="submit" value="ارسال نظر " class="bt" style="float: left">
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
















    <div class="popupc" id="level1">
        <div>
            <div>
                <div>

                    <div class="popup-container shade">
						<span class="close close_popup " style="  z-index: 999">
							<i class="icon-cancel"></i>
						</span>

                        <div class="procecss-steps level1">
                            <ul>
                                <li class="step1">
                                    <span class="left"></span>
                                    <span class="cir"><i class="icon-tick"></i></span>
                                    <h4>انتخاب جلسه</h4>
                                </li>
                                <li class="step2">
                                    <span class="left"></span>
                                    <span class="right"></span>
                                    <span class="cir"><i class="icon-tick"></i></span>
                                    <h4>انتخاب زمان</h4>
                                </li>
                                <li class="step3">
                                    <span class="left"></span>
                                    <span class="right"></span>
                                    <span class="cir"><i class="icon-tick"></i></span>
                                    <h4>قوانین کلاس ها</h4>
                                </li>
                                <li class="step4">
                                    <span class="right"></span>
                                    <span class="cir"><i class="icon-tick"></i></span>
                                    <h4>روش پرداخت</h4>
                                </li>
                            </ul>
                        </div>
                        @if($user->attr('freeclass') !='noclass')
                        <div class="class-price">
                            <div class="lable-container">
                                <input type="radio" data-count="0" data-sum="{{$user->com_price($user->free_class_price())}}"
                                       name="class_type" id="freeclass" value="freeclass">
                                <label for="freeclass">
                                    <div class="right">
                                        <h4>جلسه آزمایشی</h4>
                                        <span>‏30 دقیقه کلاس آنلاین</span>
                                    </div>
                                    <div class="left">
                                        <div class="button-container reight gray">
                                            <span class="butt">
                                            {{number_format($user->com_price($user->free_class_price()))}}
                                            تومان / ساعتی</span>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                        @endif

                        <div class="class-price">
{{--                            {{number_format()}}--}}
                            <div class="lable-container">
                                <input type="radio"   data-count="1" data-sum="{{$user->com_price($user->meet1)}}"  name="class_type" id="session1" value="meet1">
                                <label for="session1">
                                    <div class="right">
                                        <h4>‏1 جلسه</h4>
                                        <span>‏1 ساعت کلاس آنلاین</span>
                                    </div>
                                    <div class="left">
                                        <div class="button-container reight gray">
                                            <span class="butt">
                                                 {{number_format($user->com_price($user->meet1))}}

                                                تومان / ساعتی</span>
                                        </div>
                                    </div>
                                </label>
                            </div>

                        </div>

                        <div class="class-price">

                            <div class="lable-container">
                                <input type="radio"  data-count="5"   data-sum="{{$user->com_price($user->meet5)*5}}"  name="class_type" id="session5" value="meet5">
                                <label for="session5">
                                    <div class="right">
                                        <h4>‏5 جلسه</h4>
                                        <span>‏5 ساعت کلاس آنلاین</span>
                                    </div>
                                    <div class="left">
                                        <div class="button-container reight gray">
                                            <span class="butt">‏
                                                 {{number_format($user->com_price($user->meet5))}}
                                                  / ساعتی</span>
                                        </div>
                                    </div>
                                </label>
                            </div>

                        </div>

                        <div class="class-price">

                            <div class="lable-container">
                                <input type="radio"  data-count="10"  data-sum="{{$user->com_price($user->meet10)*10}}" name="class_type" id="session10" value="meet10">
                                <label for="session10" class="eco">
                                    <div class="right">
                                        <h4>‏10 جلسه<span>اقتصادی ترین</span></h4>
                                        <span>‏10 ساعت کلاس آنلاین</span>
                                    </div>
                                    <div class="left">
                                        <div class="button-container reight gray">
                                            <span class="butt">‏‏
                                                 {{number_format($user->com_price($user->meet10))}}

                                                 / ساعتی</span>
                                        </div>
                                    </div>
                                </label>
                            </div>

                        </div>

                        <div class="nextstep">
                            <div class="left">
                                <img src="{{asset('/src/avatar/'.$user->attr('avatar'))}}" alt="">
                            </div>
                            <div class="right">
                                <div class="eteb">
                                    <ul>
                                        <li>جمع پرداختی</li>
                                        <li>
                                            <span class="sum"></span>
                                            تومان
                                        </li>
                                    </ul>
                                </div>
                                <ul class="etmen">
                                    <li>
                                        <div class="button-container reight gray">
                                            <span class="butt close_popup">بازگشت به عقب</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="button-container reight">
                                            <span class="butt go_level_2" data-id="{{$user->id}}" id="">مرحله بعد</span>
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



    {{-- <div class="popupc" id="level2_{{$user->id}}">
        <div>
            <div>
                <div>

                    <div class="popup-container mini shade">
						<span class="close close_popup">
							<i class="icon-cancel"></i>
						</span>

                        <div class="session-pop">
                            <div class="top">

                                <h3>
                                    انتخاب زمان برگزاری اولین جلسه
                                </h3>
                                <p>
                                    زمان اولین کلاس را الان انتخاب میکنید، دقت کنید که زمانبندی جلسات بعدی در پنل کاربری شما انجام خواهد شد
                                </p>

                            </div>
                            <div class="bot">
                                <div class="right">
                                    <img src="/home/mages/time.png" alt="">
                                </div>
                                <div class="left">
                                    <div class="teacher-guide">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-12">
                                                <div>
                                                    <div class="title">
														<span>
															راهنمای تقویم :
														</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-12">
                                                <div>
                                                    <ul>
                                                        <li>
                                                            <span class="titl">قابل رزرو</span>
                                                            <span class="color green"></span>
                                                        </li>
                                                        <li>
                                                            <span class="titl">رزروشده</span>
                                                            <span class="color gray"></span>
                                                        </li>
                                                        <li>
                                                            <span class="titl">غیرفعال</span>
                                                            <span class="color wgray"></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="button-container reight">
                                <span   data-id="{{$user->id}}"  class="butt go_level_3">متوجه شدم</span>

                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div> --}}


    <div class="popupc" id="level3" >
        <div>
            <div>
                <div>

                    <div class="popup-container shade">
						<span class="close close_popup">
							<i class="icon-cancel"></i>
						</span>



                        <div class="nextstep" style="padding: 56px 30px !important">
                            <div class="left">
                                <img src="{{asset('/src/avatar/'.$user->attr('avatar'))}}" alt="">
                            </div>
                            <div class="right">
                                <div class="eteb">
                                    <ul>
                                        {{-- <li>زمان انتخابی شما  :</li> --}}
                                        <li>   انتخاب زمان برگزاری اولین جلسه:</li>
                                        <li class="ico"><i class="icon-calender"></i><span class="s_time">    </span></li>
{{--                                        <li class="ico"><i class="icon-time-line"></i><span class="s_houre">7:30 AM 8:30 AM</span></li>--}}
                                    </ul>
                                    <p>
                                        زمان اولین کلاس را الان انتخاب میکنید. دقت کنید که زمانبندی جلسات بعدی در پنل کاربری شما انجام خواهد شد.
                                    </p>
                                </div>
                                <ul class="etmen">

                                    <li>
                                        <div class="button-container reight gray">
                                            <span   data-id="{{$user->id}}" class="butt go_level_1">بازگشت به عقب</span>
                                        </div>
                                    </li>
                                     <li>
                                        <div class="button-container reight">
                                            <span   data-id="{{$user->id}}" class="butt go_level_4">مرحله بعد</span>
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



    <div class="popupc"  id="level4">
        <div>
            <div>
                <div>

                    <div class="popup-container shade">
						<span class="close close_popup">
							<i class="icon-cancel"></i>
						</span>

                        <div class="procecss-steps level3">
                            <ul>
                                <li class="step1">
                                    <span class="left"></span>
                                    <span class="cir"><i class="icon-tick"></i></span>
                                    <h4>انتخاب جلسه</h4>
                                </li>
                                <li class="step2">
                                    <span class="left"></span>
                                    <span class="right"></span>
                                    <span class="cir"><i class="icon-tick"></i></span>
                                    <h4>انتخاب زمان</h4>
                                </li>
                                <li class="step3">
                                    <span class="left"></span>
                                    <span class="right"></span>
                                    <span class="cir"><i class="icon-tick"></i></span>
                                    <h4>قوانین کلاس ها</h4>
                                </li>
                                <li class="step4">
                                    <span class="right"></span>
                                    <span class="cir"><i class="icon-tick"></i></span>
                                    <h4>روش پرداخت</h4>
                                </li>
                            </ul>
                        </div>


                        <div class="check-rules">
                            <div class="right">
                                <img src="/home/images/weather_two_color.png" alt="">
                            </div>
                            <div class="left">
                                <ul>
                                    {{-- <li><p>در روز کلاس جهت هماهنگی با شما تماس گرفته خواهد شد. در صورت عدم پاسخگویی پس از دو مرتبه تماس کلاس تان <strong>لغو</strong> خواهد شد</p></li> --}}
                                    <li><p> در زمان رزرو شده به موقع در کلاس تان حضور پیدا کنید. <strong> تا 15 دقیقه استاد در کلاس منتظر شما</strong> خواهد بود و در صورت عدم حضور، کلاس به عنوان برگزارشده تلقی خواهد شد.</p></li>
                                    <li><p> امکان حضور در کلاس با تمامی سیستم عامل ها و مرورگرها  <strong>به جز موبایل آیفون</strong> در حال حاضر امکان پذیر است.</p></li>
                                </ul>
                            </div>
                        </div>





                        <div class="nextstep">
                            <div class="left">
                                <img src="{{asset('/src/avatar/'.$user->attr('avatar'))}}" alt="">
                            </div>
                            <div class="right">
                                <div class="eteb">
                                    <ul>
                                        <li>زمان انتخابی شما  :</li>
                                        <li class="ico"><i class="icon-calender"></i><span class="s_time">    </span></li>
                                    </ul>
                                </div>
                                <ul class="etmen">
                                    <li>
                                        <div class="button-container reight gray">
                                            <span  data-id="{{$user->id}}" class="butt go_level_3">بازگشت به عقب</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="button-container reight">
                                            <span   data-id="{{$user->id}}" class="butt go_level_5">مرحله بعد</span>
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




    <div class="popupc"  id="level5">
        <div>
            <div>
                <div>

                    <div class="popup-container shade">
						<span class="close close_popup">
				            	<i class="icon-cancel"></i>
						</span>

                        <div class="procecss-steps level4">
                            <ul>
                                <li class="step1">
                                    <span class="left"></span>
                                    <span class="cir"><i class="icon-tick"></i></span>
                                    <h4>انتخاب جلسه</h4>
                                </li>
                                <li class="step2">
                                    <span class="left"></span>
                                    <span class="right"></span>
                                    <span class="cir"><i class="icon-tick"></i></span>
                                    <h4>انتخاب زمان</h4>
                                </li>
                                <li class="step3">
                                    <span class="left"></span>
                                    <span class="right"></span>
                                    <span class="cir"><i class="icon-tick"></i></span>
                                    <h4>قوانین کلاس ها</h4>
                                </li>
                                <li class="step4">
                                    <span class="right"></span>
                                    <span class="cir"><i class="icon-tick"></i></span>
                                    <h4>روش پرداخت</h4>
                                </li>
                            </ul>
                        </div>


                        <div class="waypoint">

                            <div class="right forde" id="for2">
                                <div class="profile">
                                    <div class="pic">
                                        <img src="{{asset('/src/avatar/'.$user->attr('avatar'))}}" alt="">
                                    </div>
                                    <div class="det">
                                        <h4>{{$user->name}}</h4>
                                        <span>‏60 دقیقه آموزش آنلاین</span>
{{--                                        <h6>--}}
{{--                                            @if(\Illuminate\Support\Facades\Auth::check())--}}
{{--                                            {{number_format(auth()->user()->total_cash()??0)}}--}}
{{--                                            تومان--}}
{{--                                            @endif--}}
{{--                                        </h6>--}}
                                    </div>
                                </div>



{{--                                <div class="discount">--}}
{{--                                    <label for="">--}}
{{--                                        <i class="icon-gift"></i>--}}
{{--                                        <span>کد تخفیف دارید؟</span>--}}
{{--                                    </label>--}}
{{--                                    <div class="discount-form">--}}
{{--                                        <input type="text" placeholder="کد تخفیف را وارد کنید">--}}
{{--                                        <span class="but">اعمال</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                <div class="payable">
                                    <ul>
                                        <li class="r">مبلغ قابل پرداخت :</li>
                                        <li class="l">
                                            <span class="sum green">    </span>
                                            <span>تومان</span></li>
                                    </ul>
                                </div>



                            </div>

                            <form action="{{route('student.charge.wallet')}}" method="post" id="pay_for_meet">

                                @csrf
                                @method('post')
                                <input type="text" name="count" id="count_meet"  >
                                <input type="text" name="time" id="time_meet"  >
                                <input type="text" name="fst" id="fst"   >
                            <div class="left">

                                <h3>روش پرداخت را انتخاب کنید
                                        {{-- <br>
                                    <span class=" " id="forp">
                                        مبلغ قابل پرداخت:
                                        <span class="sum">

                                        </span>
                                    </span> --}}
                                </h3>


                                <div class="bank">

                                    <div class="lable-container">
                                        <input type="radio" checked name="bank" id="ses1" value="bank">
                                        <label for="ses1">
                                            <div class="right">
                                                <div class="pic"><img src="/home/images/saman.png" alt=""></div>
                                                <h4>‏درگاه بانکی</h4>
                                            </div>
                                            <div class="left">
                                                <div class="button-container reight gray">
                                                    <span class="butt">
                                                                    <span class="sum"></span>
                                                        تومان / ساعتی</span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>


                                </div>


                                <div class="bank">

                                    <div class="lable-container">
                                        <input type="radio" name="bank" id="ses2" value="wallet">
                                        <label for="ses2">
                                            <div class="right">
                                                <div class="pic"><img src="/home/images/wallet.png" alt=""></div>
                                                <h4>‏ کیف پول تیچر پرو</h4>
                                            </div>
                                            <div class="left">
                                                <div class="button-container reight gray">
                                                    <span class="butt">
                                                                   <span class="sum"></span>
                                                        تومان / ساعتی</span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>

                                </div>

                                <div class="bank-text">
                                    <ul>
                                        <li>پس از پرداخت موفق خواهید توانست زمان کلاس های خود را از روی تقویم استاد به صورت یکجا و یا تدریجی انتخاب نمایید.</li>
                                        <li>پس از پرداخت موفق، در صورت عدم رضایت امکان تغییر استاد نیز وجود دارد.</li>
                                        @if(\Illuminate\Support\Facades\Auth::check())
                                            @if(auth()->user()->total_cash()>0)
                                        <li id="checkwallet">
                                            <input style=" margin-left: 20px; width: 0;height: 0; opacity: 0;"  type="checkbox" class="zoom" data-cash="{{auth()->user()->total_cash()}}" id="forwallety" name="usewallet" value="1">
                                            <label for="forwallety">
                                                <div class="right">
													<span>
														<i class="icon-tick"></i>
													</span>
                                                </div>
                                                <div class="left">
                                                    <span class="forwallet">   استفاده از موجودی کیف پول
                                            (
                                                {{number_format(auth()->user()->total_cash())}}
                                                تومان
                                                )
                                                    </span>

                                                </div>
                                            </label>
{{--                                            <label for="forwallet" id="forwalletlabel" style="font-weight: bold">      استفاده از موجودی کیف پول--}}
{{--                                            (--}}
{{--                                                {{number_format(auth()->user()->total_cash())}}--}}
{{--                                                تومان--}}
{{--                                                )--}}
{{--                                            </label>--}}
                                        </li>
                                        @endif
                                        @endif
                                    </ul>
                                </div>


{{--                                <div class="button-container reight full">--}}
{{--                                    <span class="butt" id="send_pay_for_meet2">پرداخت</span>--}}
{{--                                </div>--}}


                            </div>


                            </form>



                                    <div class="right formo" >
                                        <div class="profile">
                                            <div class="pic">
                                                <img src="{{asset('/src/avatar/'.$user->attr('avatar'))}}" alt="">
                                            </div>
                                            <div class="det">
                                                <h4>{{$user->name}}</h4>
{{--                                                <span>  دقیقه آموزش آنلاین</span>--}}
                                           </div>
                                        </div>



                                        {{--                                <div class="discount">--}}
                                        {{--                                    <label for="">--}}
                                        {{--                                        <i class="icon-gift"></i>--}}
                                        {{--                                        <span>کد تخفیف دارید؟</span>--}}
                                        {{--                                    </label>--}}
                                        {{--                                    <div class="discount-form">--}}
                                        {{--                                        <input type="text" placeholder="کد تخفیف را وارد کنید">--}}
                                        {{--                                        <span class="but">اعمال</span>--}}
                                        {{--                                    </div>--}}
                                        {{--                                </div>--}}

                                        <div class="payable" >
                                            <ul>
                                                <li class="r">مبلغ قابل پرداخت :</li>
                                                <li class="l">
                                                    <span class="sum green">    </span>
                                                    <span>تومان</span></li>
                                            </ul>
                                        </div>

                                        <div class="button-container reight full">
                                            <span class="butt" id="send_pay_for_meet">پرداخت</span>
                                        </div>

                                    </div>








                    </div>

                </div>
            </div>
        </div>
    </div>



@endsection

