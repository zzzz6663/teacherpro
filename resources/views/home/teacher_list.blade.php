@extends('master.home')
@section('main_body')





<div id="maincontent" class="rows sfix">
    <div>

        <div id="sidefilter">

            <div class="sm-title">
                @if(request('_token'))
                <span style="cursor: pointer" class="remove-filter" onclick="window.location.href='{{route('home.teacher.list')}}'">
                    <i class="icon-close"></i>
                    <span>حذف فیلتر ها</span>
                </span>
                <h3>
                    @endif
                    <i class="icon-setting"></i>
                    <span>فیلتر ها</span>
                </h3>
            </div>


            <!-- Start Language -->
            <form id="s1" action="{{route('home.teacher.list')}}" method="get">
                @csrf
                @method('get')

                <div class="filter-wdiget">
                    <div class="ftitle">
                        <i class="icon-up"></i>
                        <span>انتخاب زبان</span>
                    </div>
                    <div class="f-content">

                        <div class="choose-language">
                            {{-- <div class="lang-search">--}}
                            {{-- <i class="icon-search"></i>--}}
                            {{-- <input type="text" placeholder="جست و جو زبان ...">--}}
                            {{-- </div>--}}
                            <div class="lang-select">
                                <ul>
                                    @foreach(\App\Models\Language::whereActive('1')->orderBy('sort')->get() as $lang)
                                    <li>
                                        <div class="lable-container">
                                            <input type="checkbox" {{in_array($lang->id,request('la',[]))?'checked':''}} name="la[]" class="ts" id="{{$lang->en}}" value="{{$lang->id}}">
                                            <label for="{{$lang->en}}">
                                                <div class="right">
                                                    {{-- <img src="/home/images/french.png" alt="">--}}
                                                    <img style="width:25px;height:25px" src="{{asset('/src/img/lang/'.$lang->img)}}" alt="">
                                                </div>
                                                <div class="left">
                                                    <span class="top">{{$lang->name}}</span>
                                                    <span class="bot">{{$lang->en}}</span>
                                                </div>
                                            </label>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>

                            </div>
                        </div>

                    </div>
                </div>

                <!-- End Language -->


                <!-- Start Price -->

                <div class="filter-wdiget">
                    <div class="ftitle">
                        <i class="icon-up"></i>
                        <span>محدوده قیمت</span>
                    </div>
                    <div class="f-content">

                        <div class="price">



                            <div id="slider-range"></div>
                            <p>
                                <span class="left">
                                    از
                                    <input type="text" style="border: none!important" id="amount1" name="min" value="{{request('min',0) }}" readonly>
                                    تومان
                                </span>
                                <span class="right">
                                    تا
                                    <input type="text" style="border: none!important" id="amount2" name="max" value="{{request('max',500000) }}" readonly>
                                    تومان
                                </span>
                            </p>
                            {{-- <div class="avr">--}}
                            {{-- <span> ميانگين قيمت :</span>--}}
                            {{-- <span class="pr">‏147 هزار تومان</span>--}}
                            {{-- </div>--}}

                        </div>

                    </div>
                </div>
                <script>
                    $(document).ready(function(){
                        if (jQuery) {
                            if($( "#slider-range" ).length){

                                $( function() {
                                    $( "#slider-range" ).slider({
                                        range: true,
                                        min:  0,
                                        max: 500000,
                                        values: [ {{request('min',0) }}, {{request('max',500000) }} ],
                                        slide: function( event, ui ) {
                                            $( "#amount1" ).val( ui.values[ 0 ]  );
                                            $( "#amount2" ).val( ui.values[ 1 ]   );
                                        }, stop: function( event, ui ) {
                                            console.log('stop')
                                            $('#s1').submit()
                                        }
                                    });

                                    @if(request('min'))

                                    $( "#slider-range" ).slider( "option", "values", [{{(int)request('min')}}, {{(int)request('max')}} ] );

                                    // $( "#slider-range" ).slider( "option", "values", [ 10, 25 ] );
                                    @endif

{{--                                        @if(request('min'))--}}
{{--                                        $( "#amount1" ).val(  $( "#slider-range" ).slider( "values",{{ (int)request('min') }})  );--}}
{{--                                        @endif--}}
{{--                                        @if(request('max'))--}}

{{--                                        $( "#amount2" ).val(  $( "#slider-range" ).slider( "values",{{ (int)request('max') }})  );--}}
{{--                                        @endif--}}

                                } );

                            }

                        }
                    });
                </script>

                <!-- End Price -->

                <!-- Start Show -->


                <div class="filter-wdiget">
                    <div class="ftitle">
                        <i class="icon-up"></i>
                        <span>نمایش</span>
                    </div>
                    <div class="f-content">
                        <div class="show">
                            <ul>
                                {{-- <li>--}}
                                {{-- <div class="lable-container">--}}
                                {{-- <input type="checkbox" name="show" id="discount" value="discount">--}}
                                {{-- <label for="discount">--}}
                                {{-- <div class="right">--}}
                                {{-- <i class="icon-discount"></i>--}}
                                {{-- <span>فقط دارای تخفیف</span>--}}
                                {{-- </div>--}}
                                {{-- <div class="left">--}}
                                {{-- <div class="toggle">--}}
                                {{-- <span></span>--}}
                                {{-- </div>--}}
                                {{-- </div>--}}
                                {{-- </label>--}}
                                {{-- </div>--}}
                                {{-- </li>--}}
                                <li>
                                    <div class="lable-container">
                                        <input type="checkbox" {{(request('free')?'checked':'')}} name="free" id="level" class="ts" value="level">
                                        <label for="level">
                                            <div class="right">
                                                <i class="icon-gift"></i>
                                                <span>تعیین سطح رایگان</span>
                                            </div>
                                            <div class="left">
                                                <div class="toggle">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="lable-container">
                                        <input type="checkbox" {{(request('port')?'checked':'')}} name="port" id="video" class="ts" value="1">
                                        <label for="video">
                                            <div class="right">
                                                <i class="icon-play"></i>
                                                <span>دارای ویدیو معرفی باشد</span>
                                            </div>
                                            <div class="left">
                                                <div class="toggle">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="lable-container">
                                        <input type="checkbox" {{(request('male')=='male'?'checked':'')}} name="male" id="male" class="ts" value="male">
                                        <label for="male">
                                            <div class="right">
                                                <i class="icon-male"></i>
                                                <span>جنسیت مرد</span>
                                            </div>
                                            <div class="left">
                                                <div class="toggle">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="lable-container">
                                        <input type="checkbox" {{(request('female')=='female'?'checked':'')}} name="female" class="ts" id="female" value="female">
                                        <label for="female">
                                            <div class="right">
                                                <i class="icon-female"></i>
                                                <span>جنسیت زن</span>
                                            </div>
                                            <div class="left">
                                                <div class="toggle">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- End Show -->


                <!-- Start Timing -->

                {{-- <div class="filter-wdiget">--}}
                {{-- <div class="ftitle">--}}
                {{-- <i class="icon-up"></i>--}}
                {{-- <span>زمانبندی ها</span>--}}
                {{-- </div>--}}
                {{-- <div class="f-content">--}}
                {{-- <div class="timing">--}}
                {{-- <span class="title">بر اساس زمان روز </span>--}}
                {{-- <ul>--}}
                {{-- <li>--}}
                {{-- <div class="lable-container">--}}
                {{-- <input type="checkbox" name="timing" id="morning" value="morning">--}}
                {{-- <label for="morning">--}}
                {{-- <span class="icon"><i class="icon-morning"></i></span>--}}
                {{-- <span>صبح </span>--}}
                {{-- </label>--}}
                {{-- </div>--}}
                {{-- </li>--}}
                {{-- <li>--}}
                {{-- <div class="lable-container">--}}
                {{-- <input type="checkbox" name="timing" id="noon" value="noon">--}}
                {{-- <label for="noon">--}}
                {{-- <span class="icon"><i class="icon-noon"></i></span>--}}
                {{-- <span>ظهر</span>--}}
                {{-- </label>--}}
                {{-- </div>--}}
                {{-- </li>--}}
                {{-- <li>--}}
                {{-- <div class="lable-container">--}}
                {{-- <input type="checkbox" name="timing" id="evening" value="evening">--}}
                {{-- <label for="evening">--}}
                {{-- <span class="icon"><i class="icon-evening"></i></span>--}}
                {{-- <span>عصر</span>--}}
                {{-- </label>--}}
                {{-- </div>--}}
                {{-- </li>--}}
                {{-- <li>--}}
                {{-- <div class="lable-container">--}}
                {{-- <input type="checkbox" name="timing" id="night" value="night">--}}
                {{-- <label for="night">--}}
                {{-- <span class="icon"><i class="icon-night"></i></span>--}}
                {{-- <span>شب</span>--}}
                {{-- </label>--}}
                {{-- </div>--}}
                {{-- </li>--}}
                {{-- </ul>--}}
                {{-- <span class="title">انتخاب روز هفته</span>--}}
                {{-- <select name="week" id="">--}}
                {{-- <option value="saturday">شنبه</option>--}}
                {{-- <option value="sunday">یکشنبه</option>--}}
                {{-- <option value="monday">دوشنبه</option>--}}
                {{-- <option value="tuesday">سه شنبه</option>--}}
                {{-- <option value="wednesday">چهار شنبه</option>--}}
                {{-- <option value="thursday">پنج شنبه</option>--}}
                {{-- <option value="friday">جمعه</option>--}}
                {{-- </select>--}}
                {{-- </div>--}}
                {{-- </div>--}}
                {{-- </div>--}}

                <!-- End Timing -->


                <!-- Start Country -->

                {{-- <div class="filter-wdiget">--}}
                {{-- <div class="ftitle">--}}
                {{-- <i class="icon-up"></i>--}}
                {{-- <span>مشخصات استاد</span>--}}
                {{-- </div>--}}
                {{-- <div class="f-content">--}}
                {{-- <div class="choose-country">--}}
                {{-- <div class="country-search">--}}
                {{-- <i class="icon-search"></i>--}}
                {{-- <input type="text" placeholder="...جست و جو کشور">--}}
                {{-- </div>--}}
                {{-- <div class="country-select">--}}
                {{-- <ul>--}}
                {{-- <li>--}}
                {{-- <div class="lable-container">--}}
                {{-- <input type="checkbox" name="country" id="cenglish" value="cenglish">--}}
                {{-- <label for="cenglish">--}}
                {{-- <div class="right">--}}
                {{-- <img src="/home/images/english.png" alt="">--}}
                {{-- </div>--}}
                {{-- <div class="left">--}}
                {{-- <span class="top">انگلیسی</span>--}}
                {{-- <span class="bot">English</span>--}}
                {{-- </div>--}}
                {{-- </label>--}}
                {{-- </div>--}}
                {{-- </li>--}}
                {{-- <li>--}}
                {{-- <div class="lable-container">--}}
                {{-- <input type="checkbox" name="country" id="cfrench" value="cfrench">--}}
                {{-- <label for="cfrench">--}}
                {{-- <div class="right">--}}
                {{-- <img src="/home/images/french.png" alt="">--}}
                {{-- </div>--}}
                {{-- <div class="left">--}}
                {{-- <span class="top">فرانسوی</span>--}}
                {{-- <span class="bot">French</span>--}}
                {{-- </div>--}}
                {{-- </label>--}}
                {{-- </div>--}}
                {{-- </li>--}}
                {{-- <li>--}}
                {{-- <div class="lable-container">--}}
                {{-- <input type="checkbox" name="country" id="cgermany" value="cgermany">--}}
                {{-- <label for="cgermany">--}}
                {{-- <div class="right">--}}
                {{-- <img src="/home/images/germany.png" alt="">--}}
                {{-- </div>--}}
                {{-- <div class="left">--}}
                {{-- <span class="top">آلمانی</span>--}}
                {{-- <span class="bot">Germany</span>--}}
                {{-- </div>--}}
                {{-- </label>--}}
                {{-- </div>--}}
                {{-- </li>--}}
                {{-- <li>--}}
                {{-- <div class="lable-container">--}}
                {{-- <input type="checkbox" name="country" id="crussian" value="crussian">--}}
                {{-- <label for="crussian">--}}
                {{-- <div class="right">--}}
                {{-- <img src="/home/images/russian.png" alt="">--}}
                {{-- </div>--}}
                {{-- <div class="left">--}}
                {{-- <span class="top">روسی</span>--}}
                {{-- <span class="bot">Russian</span>--}}
                {{-- </div>--}}
                {{-- </label>--}}
                {{-- </div>--}}
                {{-- </li>--}}
                {{-- </ul>--}}
                {{-- </div>--}}
                {{-- </div>--}}
                {{-- </div>--}}
                {{-- </div>--}}

                <!-- End Country -->


                <!-- Start Madrak -->

                <div class="filter-wdiget">
                    <div class="ftitle">
                        <i class="icon-up"></i>
                        <span>براساس مدرک</span>
                    </div>
                    <div class="f-content">

                        <div class="madrak">

                            {{-- <div class="madrak-search">--}}
                            {{-- <i class="icon-search"></i>--}}
                            {{-- <input type="text" placeholder="جست و جو مدرک ...">--}}
                            {{-- </div>--}}

                            <ul>
                                <li>
                                    <div class="lable-container">
                                        <input type="checkbox" {{(request('IELTS')=='IELTS'?'checked':'')}} name="IELTS" id="IELTS" value="IELTS" class="ts">
                                        <label for="IELTS">
                                            <div class="right">
                                                <span>
                                                    <i class="icon-tick"></i>
                                                </span>
                                            </div>
                                            <div class="left">
                                                <span class="top">IELTS</span>
                                                {{-- <span class="bot">Admissions test</span>--}}
                                            </div>
                                        </label>
                                    </div>
                                </li>
                                <li>

                                    <div class="lable-container">
                                        <input type="checkbox" {{(request('TOEFL')=='TOEFL'?'checked':'')}} name="TOEFL" id="TOEFL" value="TOEFL" class="ts">
                                        <label for="TOEFL">
                                            <div class="right">
                                                <span>
                                                    <i class="icon-tick"></i>
                                                </span>
                                            </div>
                                            <div class="left">
                                                <span class="top">TOEFL</span>
                                                {{-- <span class="bot">International English Language Testing System</span>--}}
                                            </div>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="lable-container">
                                        <input type="checkbox" {{(request('PTE')=='PTE'?'checked':'')}} name="PTE" id="PTE" value="PTE" class="ts">
                                        <label for="PTE">
                                            <div class="right">
                                                <span>
                                                    <i class="icon-tick"></i>
                                                </span>
                                            </div>
                                            <div class="left">
                                                <span class="top">PTE</span>
                                                {{-- <span class="bot">Pearson Language Tests</span>--}}
                                            </div>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="lable-container">
                                        <input type="checkbox" {{(request('GRE')=='GRE'?'checked':'')}} name="GRE" id="GRE" value="GRE" class="ts">
                                        <label for="GRE">
                                            <div class="right">
                                                <span>
                                                    <i class="icon-tick"></i>
                                                </span>
                                            </div>
                                            <div class="left">
                                                <span class="top">GRE</span>
                                                {{-- <span class="bot">Test of English as a Foreign Language</span>--}}
                                            </div>
                                        </label>
                                    </div>
                                </li>
                            </ul>

                        </div>

                    </div>
                </div>

                <!-- End Madrak -->


                <!-- Start Point -->

                {{-- <div class="filter-wdiget">--}}
                {{-- <div class="ftitle">--}}
                {{-- <i class="icon-up"></i>--}}
                {{-- <span>براساس امتیاز</span>--}}
                {{-- </div>--}}
                {{-- <div class="f-content">--}}
                {{-- <div class="point">--}}
                {{-- <ul>--}}

                {{-- <li>--}}
                {{-- <div class="lable-container">--}}
                {{-- <input type="checkbox" name="point" id="5star" value="5star">--}}
                {{-- <label for="5star">--}}
                {{-- <div class="right">--}}
                {{-- <span>--}}
                {{-- <i class="icon-tick"></i>--}}
                {{-- </span>--}}
                {{-- </div>--}}
                {{-- <div class="left">--}}
                {{-- <i class="icon-star"></i>--}}
                {{-- <i class="icon-star"></i>--}}
                {{-- <i class="icon-star"></i>--}}
                {{-- <i class="icon-star"></i>--}}
                {{-- <i class="icon-star"></i>--}}
                {{-- </div>--}}
                {{-- </label>--}}
                {{-- </div>--}}
                {{-- </li>--}}

                {{-- <li>--}}
                {{-- <div class="lable-container">--}}
                {{-- <input type="checkbox" name="point" id="4star" value="4star">--}}
                {{-- <label for="4star">--}}
                {{-- <div class="right">--}}
                {{-- <span>--}}
                {{-- <i class="icon-tick"></i>--}}
                {{-- </span>--}}
                {{-- </div>--}}
                {{-- <div class="left">--}}
                {{-- <i class="icon-star gray"></i>--}}
                {{-- <i class="icon-star"></i>--}}
                {{-- <i class="icon-star"></i>--}}
                {{-- <i class="icon-star"></i>--}}
                {{-- <i class="icon-star"></i>--}}
                {{-- </div>--}}
                {{-- </label>--}}
                {{-- </div>--}}
                {{-- </li>--}}

                {{-- <li>--}}
                {{-- <div class="lable-container">--}}
                {{-- <input type="checkbox" name="point" id="3star" value="3star">--}}
                {{-- <label for="3star">--}}
                {{-- <div class="right">--}}
                {{-- <span>--}}
                {{-- <i class="icon-tick"></i>--}}
                {{-- </span>--}}
                {{-- </div>--}}
                {{-- <div class="left">--}}
                {{-- <i class="icon-star gray"></i>--}}
                {{-- <i class="icon-star gray"></i>--}}
                {{-- <i class="icon-star"></i>--}}
                {{-- <i class="icon-star"></i>--}}
                {{-- <i class="icon-star"></i>--}}
                {{-- </div>--}}
                {{-- </label>--}}
                {{-- </div>--}}
                {{-- </li>--}}

                {{-- <li>--}}
                {{-- <div class="lable-container">--}}
                {{-- <input type="checkbox" name="point" id="2star" value="2star">--}}
                {{-- <label for="2star">--}}
                {{-- <div class="right">--}}
                {{-- <span>--}}
                {{-- <i class="icon-tick"></i>--}}
                {{-- </span>--}}
                {{-- </div>--}}
                {{-- <div class="left">--}}
                {{-- <i class="icon-star gray"></i>--}}
                {{-- <i class="icon-star gray"></i>--}}
                {{-- <i class="icon-star gray"></i>--}}
                {{-- <i class="icon-star"></i>--}}
                {{-- <i class="icon-star"></i>--}}
                {{-- </div>--}}
                {{-- </label>--}}
                {{-- </div>--}}
                {{-- </li>--}}

                {{-- <li>--}}
                {{-- <div class="lable-container">--}}
                {{-- <input type="checkbox" name="point" id="1star" value="1star">--}}
                {{-- <label for="1star">--}}
                {{-- <div class="right">--}}
                {{-- <span>--}}
                {{-- <i class="icon-tick"></i>--}}
                {{-- </span>--}}
                {{-- </div>--}}
                {{-- <div class="left">--}}
                {{-- <i class="icon-star gray"></i>--}}
                {{-- <i class="icon-star gray"></i>--}}
                {{-- <i class="icon-star gray"></i>--}}
                {{-- <i class="icon-star gray"></i>--}}
                {{-- <i class="icon-star"></i>--}}
                {{-- </div>--}}
                {{-- </label>--}}
                {{-- </div>--}}
                {{-- </li>--}}

                {{-- </ul>--}}
                {{-- </div>--}}
                {{-- </div>--}}
                {{-- </div>--}}

                <!-- End Point -->
                {{-- <div class="send">--}}
                {{-- <span id="s1_b" class="btn bt" >اعمال</span>--}}
                {{-- </div>--}}
            </form>

        </div>


        <div id="teachercat">

            <div id="topfilter" class="shade">
                <div class="right">

                    <form action="{{route('home.teacher.list')}}" id="s2" method="get">
                        @csrf
                        @method('post')
                        {{-- <span class="butt" ><i class="icon-search"></i></span>--}}
                        <span class="close" id="s1form"><i class="icon-search"></i></span>
                        <input class="ts1" type="text" name="tname" value="{{request('tname')}}" placeholder="جست وجو براساس زبان، نام مدرس و ...">
                    </form>

                </div>
                <div class="left">
                    <span class="title">نمایش :</span>
                    <ul class="oredering">
                        <li class="{{(request('most')=='all')?'active':''}}" onclick="window.location.href='{{request()->fullUrlWithQuery(['most'=>'all'])}}'"><span> همه</span></li>
                        <li class="{{(request('most')=='cheap')?'active':''}}" onclick="window.location.href='{{request()->fullUrlWithQuery(['most'=>'cheap'])}}'"><span> ارزانترین</span></li>
                        <li class="{{(request('most')=='expensive')?'active':''}}" onclick="window.location.href='{{request()->fullUrlWithQuery(['most'=>'expensive'])}}'"><span> گرانترین</span></li>
                        <li class="{{(request('most')=='popular')?'active':''}}" onclick="window.location.href='{{request()->fullUrlWithQuery(['most'=>'popular'])}}'"><span> محبوبترین</span></li>

                    </ul>
                </div>
            </div>


            <div id="forsat" class="shade">
                <div class="right">
                    <h4>این یک فرصت طلایی است</h4>
                    <p>
                        از ۱۲ اردیبهشت تا ۱۲ خرداد فرصت دارید <br>
                        تا با <strong>20% تخفیف کلاس زبان</strong> آنلاین<br>
                        ثبت‌نام کنید

                    </p>
                    <a href="#">اطلاعات بیشتر</a>
                </div>
                <div class="left">
                    <img src="/home/images/forsat.png" alt="">
                </div>
            </div>

            @foreach($teachers as $teacher)
            @if($teacher->languages()->count()==0)
            @continue
            @endif
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
                                                <span class="pointer" onclick="window.location.href='{{route('home.teacher.profile',$teacher->id)}}'"> {{$teacher->name}}  {{$teacher->family}}</span>
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
            <div class="more-teacher">

                {{ $teachers ->appends(Request::all())->links('home.section.pagination') }}
                {{-- <span>مشاهده بیشتر</span>--}}
            </div>

        </div>
    </div>
</div>





@endsection
