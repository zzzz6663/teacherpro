<div id="footer" class="rows">
    <div>
        <div class="row">

            <div class="col-lg-3 col-md-6 col-sm-12">
                <div>
                    <h4>  درباره ما </h4>
                   <p style="text-align: justify; color:#A5B7D9; margin-top::40px ">
                       موسسه‌ی تیچرپرو از سال 1399 فعالیت خود را در زمینه‌ی آموزش تخصصی زبان   و ارائه کلاس‌های آنلاین زبان شروع کرد.

                   </p>
                </div>
            </div>
{{--            <div class="col-lg-3 col-md-6 col-sm-12">--}}
{{--                <div>--}}
{{--                    <h4>دسترسی سریع</h4>--}}
{{--                    <ul class="nav">--}}
{{--                        <li><a href="{{route('home.about.us')}}">درباره ما</a></li>--}}
{{--                        <li><a href="{{route('home.teacher.register.form')}}">جذب استاد</a></li>--}}
{{--                        <li><a href="{{route('home.contact.us')}}">تماس با ما</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}

            <div class="col-lg-3 col-md-6 col-sm-12">
                <div>
                    <h4>زبان‌ها</h4>
                    <ul class="nav">
                        @foreach(\App\Models\Language::whereActive('1')->orderBy('sort')->get() as $lang)
                            <li><a href="{{route('home.teacher.list',['lang'=>$lang->id])}}">{{$lang->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
                <div>
                    <h4>دسترسی سریع  </h4>
                    <ul class="nav">
                        <li class=" "><a href="{{route('home.teacher.list')}}">جست و جوی استاد</a></li>
                        {{--                        <li class="{{(Route::currentRouteName()=='home.teacher.register.form')?'active':''}} "><a href="{{route('home.teacher.register.form')}}">  جذب استاد</a></li>--}}
                        <li class="  "><a href="{{route('home.articles')}}">    مقالات</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
                <div>
                    <h4>تماس با ما</h4>
                    <ul class="nav">
                        <li><a  href="{{route('home.contact.us')}}">                        تماس با ما
                            </a></li>

                    </ul>
                    <p style="text-align: justify; color:#A5B7D9 ">

                        ایران، تهران
                        44618023-021
                        info@teacherpro.ir
                    </p>
{{--                    <ul class="namd">--}}
{{--                        <li class="enam"></li>--}}
{{--                        <li class="saman"></li>--}}
{{--                    </ul>--}}
                </div>
            </div>

        </div>
    </div>
</div>

<div id="copyright" class="rows">
    <div>
        <span class="backtop"><i class="icon-up"></i></span>

        <div class="right">
            <div class="foot-log">
                <a href="#">
                    <i class="icon-logo"></i>
                    <span>Teacherpro</span>
                </a>
            </div>
            <p>کلیه حقوق این وب سایت برای تیچر پرو محفوظ می‌باشد .</p>
        </div>
        <div class="left">
            <ul class="social">
{{--                <li><a href="#"><i class="icon-aparat"></i></a></li>--}}
{{--                <li><a href="#"><i class="icon-twitter"></i></a></li>--}}
                <li><a href="#"><i class="icon-insta"></i></a></li>
                <li><a href="#"><i class="icon-telegram"></i></a></li>
                <li><a href="#"><i class="icon-in"></i></a></li>
            </ul>
        </div>
    </div>
</div>
