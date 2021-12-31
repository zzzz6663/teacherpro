@component('home.teacher.content',['title'=>' تنظیمات  '])


<div id="teacherpishs" style="display: block">

    @slot('bread')

        @include('home.teacher.profile.bread_left',['name'=>'    برنامه زمانی'])

    @endslot






        <div id="time-pannel" class="shade">

            <div class="widget-title">
                <h3>برنامه زمانی</h3>
                <div class="dot3">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>

            <div class="widget-content">

                <div class="calendar-guide">
                    <h4>راهنمای تقویم و نحوه زمان بازکردن در برنامه زمانی</h4>
                    <div class="gray-box">
                        <img src="/home/images/calendar_two_color.png" alt="">

                        <ul>
                            <li>هر سلول در داخل تقویم به نشانه‌ی ۳۰ دقیقه است.</li>
                            <li>برای اضافه کردن زمان به تقویم روی هر سلول شروع به کشیدن و رها کردن (Drag & Drop) کنید.</li>
                            <li>برای ثبت تغیرات زمانی، بعد از انجام تغیرات روی گزینه ثبت بزنید.</li>
                            <li>خانه های قرمز رنگ به معنای زمان های مورد نظر برای حذف شدن از تقویم است.</li>
                            <li>خانه های سبز رنگ به معنای زمان‌های آزاد شما می باشد.</li>
                            <li>خانه‌های سفید رنگ به معنای زمان‌های غیرفعال شما در تیچرپرو می باشد.</li>
                            <li>خانه های خاکستری رنگ به معنای زمان های رزروشده توسط زبان‌آموز هست و شما می بایست در این زمان‌ها کلاس خود را برگزار کنید.</li>
                        </ul>

                    </div>
                </div>



                <div class="teacher-guide">
                    <div class="row">
                        <div class="col-lg-12">
                            @if($errors->any())
                                <div class="e_section" id="e_section">
                                    <span class="text text-danger">حداقل یک زمان انتخاب کنید </span><br>
                                </div>
                            @endif
                        </div>
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



                <div id="teacher-clander" data-name="عرفان آماده" data-job="استاد مجرب" data-pic="images/teacher.jpg">
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
                    <div class="cond">
                        <div class="owl-nav"><button type="button" role="presentation" id="goToPrevSlide" class="owl-prev disabled">هفته قبل<i class="icon-rarrow"></i></button><button type="button" id="goToNextSlide" role="presentation" class="owl-next">هفته بعد<i class="icon-larrow"></i></button></div>

                        <form id="plan" action="{{route('teacher.save.plan',$teacher->id)}}" method="post" >
                            @csrf
                            @method('post')
                        </form>
                        <?php
                        $w=[  'شنبه' ,'یکشنبه','دوشنبه','سه شنبه','چهارشنبه','پنج شنبه','جمعه'];
                        $m=['فروردین','اردیبهشت','خرداد','تیر','مرداد','شهریور','مهر','آبان','آذر','دی','بهمن','اسفند' ];
                        ?>
                        <ul class="   ">
                            @for($i=0 ;$i<22;$i++)
                                <li data-date="{{\Morilog\Jalali\Jalalian::forge(\Carbon\Carbon::now()->addDay($i))->format('%A, %d %B %y')}}">
                                <div class="date">
                                    <?php
                                    $v=verta(\Carbon\Carbon::now()->addDay($i))
                                    ?>
                                    <span class="top"> {{ $w[$v->dayOfWeek] }} </span>
                                    <span class="bot" style="font-size: 15px; min-height: 30px">
                                        {{ $v->day }}
                                        {{ $m[$v->month-1] }}
                                    </span>
                                </div>
                                @for($p=0 ;$p<34;$p++)

                                    @php
                                        $today= \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00');
                                        $today5= \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00');
                                    @endphp




                                <div   class="hour {{($teacher->empty($today->addMinutes(($p*30))->format('Y-m-d H:i:s')))?' certain ':'    '}} {{($teacher->reserved($today5->addMinutes(($p*30))->format('Y-m-d H:i:s')))?'  reserved  ':'  '}}" data-time="{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00')->addMinutes(($p*30))}}" >
                                    <input type="checkbox" form="plan" class="op" name="reserve[]" value="{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00')->addMinutes(($p*30))}}" hidden  >
                                    <input type="checkbox" form="plan" class="can" name="can[]" value="{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Carbon\Carbon::now()->addDay($i)  ->format('Y-m-d').' 07:00:00')->addMinutes(($p*30))}}" hidden  >
                                </div>




                                @endfor

                            </li>
                            @endfor
                        </ul>
{{--                        <div class="owl-nav"><button type="button" role="presentation" class="owl-prev disabled">هفته قبل<i class="icon-rarrow"></i></button><button type="button" role="presentation" class="owl-next">هفته بعد<i class="icon-larrow"></i></button></div>--}}

                    </div>
                </div>


                <div class="button-container reight">
                    <input class="bt" type="submit" form="plan" value="ذخیره تغییرات">
{{--                    <span class="butt">ذخیره تغییرات</span>--}}
                </div>

            </div>


        </div>

</div>


    @endcomponent
