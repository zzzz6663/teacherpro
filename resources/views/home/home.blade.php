@extends('master.home')




                @section('main_body')



                    <div id="slide" class="rows" style="padding-top: 100px">
                        <div class="container">
                            <div class="ts-section-title title-center">
                                <h2 class="section-title "> برتریـن و بـزرگتـرین پایـگاه آموزشـی زبـان در کشـور!</h2>
                            </div>
                            <p>ما معتقدیم که همه ظرفیت خلاق بودن را دارند. اینجا مکانی است که در آن افراد پتانسیل های خود را توسعه می دهند</p>
                            <div class="turitor-course-search header-course-search">
                                <form method="get" name="search-course " class="turitor-search-course-form" action="{{route('home.teacher.list')}}">
                                    @csrf
                                    @method('get')
                                    <input type="text" name="langsearch" class="search-course-input" placeholder="چه زبانی می‌خواهی یاد بگیری؟">
{{--                                    <input type="hidden" name="ref" value="course">--}}
                                    <button class="lp-button button search-course-button">
                                        <!-- <span class="icon2-search"></span> -->
                                        <svg enable-background="new 0 0 50 50" height="20px" id="Layer_1" version="1.1" viewBox="0 0 50 50" width="20px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><rect fill="none" height="50" width="50"/><circle cx="21" cy="20" fill="none" r="16" stroke="#fff" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2"/><line fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="4" x1="32.229" x2="45.5" y1="32.229" y2="45.5"/></svg>
                                    </button>
                                </form>
                            </div>

                            <div class="links">
                                <ul>
                                    <li>
                                        <a href="{{route('home.teacher.list')}}"  rel="nofollow" class="saerch"> <span class="icon-plus-circle"></span> جستجوی استاد </a>
                                    </li>
                                    <li>
                                        @if(\Illuminate\Support\Facades\Auth::check())
                                            @if(\Illuminate\Support\Facades\Auth::user()->level=='teacher')
                                                <a href="{{route('teacher.dashboard')}}"   rel="nofollow" class="sign"> <span class="icon-user-add"></span>       ورود به پنل </a>
                                            @else
                                                <a href="{{route('student.dashboard')}}"   rel="nofollow" class="sign"> <span class="icon-user-add"></span>       ورود به پنل </a>

                                            @endif
                                        @else
                                            <a id="show_login"  rel="nofollow" class="bl pointer sign"> <span class="icon-user-add"></span> ثبت نام کاملا رایگان </a>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="anime">

                            <div class="ekit-section-parallax-mousemove ekit-section-parallax-layer elementor-repeater-item-c99f2b9 ekit-section-parallax-type-animation">
                                <img class="elementskit-parallax-graphic " src="/home/images/image13-min.png">
                            </div>

                            <div class="ekit-section-parallax-mousemove ekit-section-parallax-layer elementor-repeater-item-cf77525 ekit-section-parallax-type-animation">
                                <img class="elementskit-parallax-graphic " src="/home/images/image12-min.png">
                            </div>

                            <div class="ekit-section-parallax-mousemove ekit-section-parallax-layer elementor-repeater-item-ebc11dc ekit-section-parallax-type-animation">
                                <img class="elementskit-parallax-graphic " src="/home/images/image11-min.png">
                            </div>

                            <div class="ekit-section-parallax-mousemove ekit-section-parallax-layer elementor-repeater-item-e4e51a2 ekit-section-parallax-type-animation">
                                <img class="elementskit-parallax-graphic " src="/home/images/image10-min.png">
                            </div>

                            <div class="ekit-section-parallax-mousemove ekit-section-parallax-layer elementor-repeater-item-1326015 ekit-section-parallax-type-animation">
                                <img class="elementskit-parallax-graphic " src="/home/images/image9-min.png">
                            </div>

                            <div class="ekit-section-parallax-mousemove ekit-section-parallax-layer elementor-repeater-item-9b2f5cf ekit-section-parallax-type-animation">
                                <img class="elementskit-parallax-graphic " src="/home/images/image8-min.png">
                            </div>

                        </div>
                    </div>
                    <div id="lang" class="rows">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-11 col-md-12">
                                    <div>
                                        <div class="row">

                                            <div class="col-lg-4 col-sm-12">
                                                <div>
                                                    <div class="sectitle">
                                                        <h2 class="section-title "> <span class="sub-title">#دسته بندی های برتر</span> زبان  های محبوب</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-12">
                                                <div>
                                                    <div class="sec-text">
                                                        <p>در زیر لیستی از زبان های محبوب در تیچرپرو را مشاهده می کنید. تنها کافی است زبان مورد علاقه خود را انتخاب کرده و آن زبان را نزد بهترین اساتید فرا بگیرید.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-12">
                                                <div>
                                                    <div class="sec-link">
                                                        <a href="{{route('home.teacher.list')}}"   rel="nofollow" class="elementskit-btn "> <i aria-hidden="true" class="icon2-eye"></i> مشاهده همه </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="lang">
                                   <ul>
                                       @foreach(\App\Models\Language::whereActive('1')->orderBy('sort')->get() as $lang)
                                           <li>
                                               <div class="single-lng">
                                                   <figure>
                                                       <a href="{{route('home.teacher.list',['lang'=>$lang->id])}}">
                                                           <img src="{{asset('/src/img/lang/'.$lang->img)}}">
                                                       </a>
                                                   </figure>
                                                   <h3>
                                                       <a href="{{route('home.teacher.list',['lang'=>$lang->id])}}">{{$lang->name}}</a>
                                                   </h3>
                                               </div>
                                           </li>
                                       @endforeach
                                   </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="calto" class="rows">
                        <div class="container">
                            <h2> مسیر یادگیری مناسب را برای خود پیدا کنید</h2>
                            <p>
                                اهداف خود را با برنامه ریزی دقیق ما مطابقت دهید، گزینه  brهای خود را کاوش کنید و مسیر موفقیت خود را ترسیم کنید.</p>
                            <div class="link">

                                @if(\Illuminate\Support\Facades\Auth::check())
                                    @if(\Illuminate\Support\Facades\Auth::user()->level=='teacher')
                                        <a href="{{route('teacher.dashboard')}}">  به ما بپیوند
                                            <i aria-hidden="true" class="icon2-plus-circle"></i></a>
                                    @else
                                        <a href="{{route('student.dashboard')}}">  به ما بپیوند
                                            <i aria-hidden="true" class="icon2-plus-circle"></i></a>
                                    @endif
                                @else
                                    <a   href="#" class="bl show_login">
                                        به ما بپیوند
                                        <i aria-hidden="true" class="icon2-plus-circle"></i>
                                    </a>
                                @endif


                            </div>
                        </div>
                    </div>

                    <div id="testimonails" class="rows test">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div>
                                        <div class="sectitle">
                                            <h2 class="section-title "> <span class="sub-title"># نظرات</span> آنچه دانشجویان ما می گویند</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div>
                                        <div class="sec-text">
                                            <p>صدها نفر از تیچرپرو استفاده کرده اند تا تصمیم بگیرند که کدام دوره را طی کنند. در مورد تیچرپرو بیشتر بدانید.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div>
                                        <div class="testimonial-carousel owl-carousel">
                                            @foreach( $com=\App\Models\Com::latest()->get() as $co)
                                            <div class="testimonial-author-content">
                                                <div class="qoute-icon">
                                                    <i class="icon2-quote-left"></i>
                                                </div>
                                                <div class="testimonial-thumb" style="border: 10px solid #c1f3e6">
                                                    <img  src="/home/images/author3.png " alt="میترا پاشازاده" class="d-flex img-fluid testimonial-img">
                                                </div>
                                                <p class="testimonial-text" style="text-align: justify"> {{$co->com}}</p>
                                                <div class="testimonial-footer" style="text-align: center">
                                                    <div class="media-body">
                                                        <h4 class="author-name"> {{$co->name}}</h4> <span class="author-designation">{{$co->info}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                                @endforeach


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="home-teachers" class="rows test">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div>
                                        <div class="sectitle">
                                            <h2 class="section-title "> <span class="sub-title"># اساتید</span>مدرسان برجسته و برتر</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div>
                                        <div class="sec-text">
                                            <p>در زیر بهترین، فعال ترین و محبوب ترین اساتید تیچرپرو را مشاهده می کنید.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div>

                                        <div class="instructor-list instructor-slider owl-carousel">
{{--                                            $teachers=\App\Models\User::query();--}}
{{--                                            $teachers=$teachers->whereActive('1')->whereSubmit('1');--}}
                                        @foreach(\App\Models\User::where('level','teacher')->whereActive('1')->whereSubmit('1')->whereHas('attributes',function ($query){
                                            $query->where('name','experienced')
                                            ->where('value','experienced');
                                            })->get() as $te)
                                                @php( $languages=$te->languages()->withPivot('level','status')->pluck('name')->toArray())
                                                <div class="instructor-list-wrap">
                                                    <div class="single-instructor-item">
                                                        <div class="insturctor-img-area normal">
                                                            <div class="instructor-profile-pic round">
                                                                <img src="{{asset('/src/avatar/'.$te->attr('avatar'))}}" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="instructor-profile-content normal">
                                                            <h2 class="instructor-name">
                                                                <a href='{{route('home.teacher.profile',$te->id)}}'> {{$te->name}} {{$te->family}}</a>
                                                            </h2>
                                                            <p class="instructor-designation">   مدرس
                                                                {{implode('',$languages)}}
                                                            </p>
                                                        </div>
                                                        <div class="single-instructor-item hover-item">
                                                            <div class="insturctor-img-area">
                                                                <div class="instructor-profile-pic">
                                                                    <img src="{{asset('/src/avatar/'.$te->attr('avatar'))}}" alt="">
                                                                </div>
                                                                <div class="instructor-profile-content">
                                                                    <h2 class="instructor-name"> <a href='{{route('home.teacher.profile',$te->id)}}'>  {{$te->name}}</a></h2>
                                                                    <p class="instructor-designation">   مدرس
                                                                        {{implode('',$languages)}}
                                                                    </p>
                                                                    <div class="instructor-social"> <a href=""><i class=''> </i></a> <a href=""><i class=''> </i></a> <a href=""><i class=''> </i></a> <a href=""><i class=''> </i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            @endforeach



                                        </div>

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div id="home-blog" class="rows">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-10 col-md-12 center-block">
                                    <div>
                                        <div class="row">


                                            <div class="col-lg-6 col-sm-12">
                                                <div>
                                                    <div class="sectitle">
                                                        <h2 class="section-title "> <span class="sub-title">#اخبار</span> آخرین خبرها و مقالات</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12">
                                                <div>
                                                    <div class="sec-text">
                                                        <p>اگر می خواهید از بهترین سبک های یادگیری، منابع و تغییرات مربوط به زبان آگاه شوید، تنها کافی است اخبار تیچرپرو را دنبال کنید. </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-8 col-md-12">
                                    <div>
                                        <div class="row">
                                            @foreach($count=\App\Models\Article::whereHome('1')->get() as $cou)
                                                @php($v=verta($cou->created_at))
                                                <div class="col-lg-6 col-sm-12 col-xsm-12">
                                                    <div>
                                                        <div class="single-post">

                                                            <div class="elementor-post__card">
                                                                <a class="elementor-post__thumbnail__link" href="#">
                                                                    <div class="elementor-post__thumbnail elementor-fit-height" style="background: url('{{asset('/src/article/images/'.$cou->image)}}') center center/cover; padding-top: 60%;">
                                                                        {{--                                                                        <img src="{{asset('/src/article/images/a3'.$cou->image)}}" alt="">--}}
                                                                    </div>
                                                                    {{--                                                    <div class="elementor-post__thumbnail elementor-fit-height">--}}
                                                                    {{--                                                        <img src="/home/images/blog1.jpg" alt="">--}}
                                                                    {{--                                                        <img src="{{asset('/src/article/images/a3'.$cou->image)}}" alt="">--}}
                                                                    {{--                                                    </div>--}}
                                                                </a>
                                                                @if($cou->acats()->first())
                                                                <div class="elementor-post__badge">{{$cou->acats()->first()->name}}</div>
                                                                @endif
                                                                <div class="elementor-post__text" style="min-height:120px">
                                                                    <h3 class="elementor-post__title">
                                                                        <a href="{{route('home.single.article',$cou->id)}}"> {{$cou->title}} </a>
                                                                    </h3>
                                                                    <div class="elementor-post__excerpt" style="text-align: right">
                                                                        {{--                                                        $str = substr($str, 0, 7) . '...';--}}

                                                                        {{mb_strimwidth(strip_tags(html_entity_decode(  $cou->article)), 0, 70)}} ...
                                                                    </div>
                                                                </div>
                                                                <div class="elementor-post__meta-data">
                                                                    <span class="elementor-post-author"> {{$cou->user->name}} </span>
                                                                    <span class="elementor-post-date">{{$v->format('%B %d، %Y')}}</span>
                                                                </div>
                                                                <div class="elementor-post__meta-data read-more"  >
                                                                    <a href="{{route('home.single.article',$cou->id)}}"> بیشتر بخوانید</a>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 none">
                                    <div>
                                        <div class="sidebar">
                                            @foreach(\App\Models\Article::where('submit','1')->where('active','1')->take(4)->latest()->get() as $latest)
                                                <div class="side-blog">
                                                    <a class="elementor-post__thumbnail__link" href="#">
                                                        <div class="elementor-post__thumbnail elementor-fit-height" style="background: url('{{asset('/src/article/images/'.$latest->image)}}') center center/cover; padding-top: 13%;">

                                                        </div>
                                                    </a>
                                                    <div class="elementor-post__text">
                                                        <h3 class="elementor-post__title">
                                                            {{$latest->title}}
                                                        </h3>
                                                        <a class="elementor-post__read-more" href="{{route('home.single.article',$latest->id)}}">  ادامه مطلب »</a>

                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="home-button" class="rows">
                        <div class="fullcontainer">

                            <div class="row">

                                <div class="col-lg-6 col-sm-12">
                                    <div class="sing-button">
                                        <div class="img">
                                            <img src="/home/images/instructor_image.png" alt="">
                                        </div>
                                        <div class="left">
                                            <h2 class="section-title "> همین امروز یادگیری را شروع کنید!</h2>
                                            <p>به جمع هزاران دانشجوی ما بپیوندید و به آسانی زبان مورد نظر خود را فرا بگیرید!</p>
                                            <div class="link">
                                                <a class="bl" href="{{route('home.teacher.list')}}"   rel="nofollow"> <span class="icon2-plus-circle"></span> جستجوی استاد </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-12">
                                    <div class="sing-button">
                                        <div class="img">
                                            <img src="/home/images/partner_image.png" alt="">
                                        </div>
                                        <div class="left">
                                            <h2 class="section-title "> مدرس شوید!</h2>
                                            <p>شما هم دانسته های خود را به دیگران یاد دهید!</p>
                                            <br>
                                            <div class="link" style="margin-top: 10px">
                                                @if(\Illuminate\Support\Facades\Auth::check())
                                                    @if(\Illuminate\Support\Facades\Auth::user()->level=='teacher')
                                                        <a cl href="{{route('teacher.dashboard')}}"   rel="nofollow" class="sign">  <span class="icon2-plus-circle"></span>      ورود به پنل </a>
                                                    @else
                                                        <a href="{{route('student.dashboard')}}"   rel="nofollow" class="sign"> <span class="icon2-plus-circle"></span>       ورود به پنل </a>

                                                    @endif
                                                @else
                                                    <a id="show_login"  rel="nofollow" class="bl pointer sign">  <span class="icon2-plus-circle"></span>  ثبت نام کاملا رایگان </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>









                @endsection







