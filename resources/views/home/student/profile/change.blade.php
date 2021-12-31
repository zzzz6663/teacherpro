@component('home.student.content',['title'=>' تنظیمات  '])



        @slot('bread')

            @include('home.student.profile.bread_left',['name'=>'داشبورد'])


        @endslot

<div class="teacher-pricing shade" id="lang">
        <div class="widget-title">
            <h3 id="res_student" data-user="{{$teacher->id}}"  >     تغییر کلاس     </h3>

            <div class="dot3">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div class="widget-content">



    <div class="time-toptext">
        <h3>

        </h3>
        <p>برای رزرو کلاس، زمان مورد نظر را از بین خانه های سبز رنگ انتخاب و تایید نمایید</p>
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

            <div id="teacher-clander" data-name="{{$teacher->name}}" data-job="{{($teacher->attr('experienced'))?'(مجرب)':''}} {{($teacher->attr('motivated'))?'(با انگیزه)':''}}  {{($teacher->attr('accepted'))?'(پذیرفته شده)':''}}" data-pic="{{asset('/src/avatar/'.$teacher->attr('avatar'))}}">
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
                    @php


                    @endphp
                    <ul class=" owl-carousel owl-theme ">
                        @for($i=0 ;$i<12;$i++)
                            <li class="par"   data-date=" {{verta(\Carbon\Carbon::now()->addDay($i))->format('Y-n-j H:i')}} ">

                                <div class="date">
                                    <span class="top"> </span>
                                    <span class="bot">
                                          {{\Morilog\Jalali\Jalalian::forge(\Carbon\Carbon::now()->addDay($i))->format('%A, %d %B  ')}}
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

                                        <div data-level="student" data-ps="sssf"

                                             data-id="{{$teacher->id}}"    class="hour {{($teacher->empty($today2->addMinutes(($p*30))->format('Y-m-d H:i:s')))?' open ':' '}}  {{($teacher->reserved($today5->addMinutes(($p*30))->format('Y-m-d H:i:s')))?'  reserved  ':'  '}}" data-cid="{{$teacher->empty($today4->addMinutes(($p*30))->format('Y-m-d H:i:s'))}}"
                                             data-da="
{{--                                            {{\Morilog\Jalali\Jalalian::forge(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00')->addMinutes(($p*30)))->format('%A, %d %B ')}}--}}
                                            {{\Morilog\Jalali\Jalalian::forge(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00')->addMinutes(($p*30)))->format('%A, %d %B ')}}
                                                 "
                                             data-time="{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00')->addMinutes(($p*30))->format('H:i:s')}}"
                                                >
                                            <input type="checkbox" form="plan" class="op" name="reserve[]" value="{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00')->addMinutes(($p*30))}}" hidden  >
                                        </div>

                                    @else
                                        <div   class="hour {{($teacher->empty($today3->addMinutes(($p*30))->format('Y-m-d H:i:s')))?'   ':''}}" data-time="{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00')->addMinutes(($p*30))->format('H:i:s')}}" >
                                            <input type="checkbox" form="plan" class="op" name=" " value="{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00')->addMinutes(($p*30))}}" hidden  >
                                        </div>
                                    @endif
                                @endfor


                            </li>
                        @endfor

                    </ul>
                </div>
            </div>


            <div id="nextstep" class="nextstep" hidden>
                <div class="left" id="nextstep2">
                    <img src="{{asset('/src/avatar/'.$teacher->attr('avatar'))}}" alt="">

                </div>
                <div class="right" >
                    <div class="eteb">
                        <ul>
                            <li>زمان انتخابی شما  :</li>
                            <li class="ico"><i class="icon-calender"></i><span id="date_e">   </span></li>
                            <li class="ico"><i class="icon-time-line"></i><span id="time_e">  </span></li>
                        </ul>
                    </div>
                    <ul class="etmen">
                        <li>
                            <div id="s_change" class="button-container reight">
                                <span class="butt">  تایید</span>
                            </div>
                        </li>
                        <form id="form_ch" action="{{route('student.change')}}" method="post">
                            @csrf
                            @method('post')
                            <input type="text" name="reason"  value="{{$reason}}" hidden>
                            <input type="text" name="a_meet" id="a_meet" hidden>
                            <input type="text" name="b_meet" value="{{$meet->id}}" hidden>

                        </form>
        {{--                <li>--}}
        {{--                    <div class="button-container reight gray">--}}
        {{--                        <span class="butt">بازگشت به عقب</span>--}}
        {{--                    </div>--}}
        {{--                </li>--}}
                    </ul>
                </div>
            </div>
        </div>
        </div>

    @endcomponent
