<div id="sidemenu">
    <div>

			<span class="close">
				<i class="icon-cancel"></i>
			</span>
        <div id="slogo">
            <a href="{{route('login')}}">
                <i class="icon-logo"></i>
                <span>Teacherpro</span>
            </a>
        </div>

        <div id="ssearch">
            <form action="{{route('home.teacher.list')}}" method="get">
                @csrf
                @method('get')
                <input type="text" placeholder="جست و جو " name="langsearch">

                <button><i class="icon-search"></i></button>
            </form>
        </div>

        <div id="scat">
            <span>
						<i class="icon-cats"></i>
						<span>زبان‌ها</span>
					</span>
            <ul>
                @foreach(\App\Models\Language::whereActive('1')->orderBy('sort')->get() as $lang)
                    <li><a href="{{route('home.teacher.list',['lang'=>$lang->id])}}">{{$lang->name}}</a></li>
                @endforeach

            </ul>
{{--				<span>--}}
{{--					<i class="icon-cats"></i>--}}
{{--					<span>دسته بندی ها</span>--}}
{{--					<i class="icon-down"></i>--}}
{{--				</span>--}}
{{--            <ul>--}}
{{--                <li><a href="#">طراحی وب سایت</a></li>--}}
{{--                <li><a href="#">علوم کامپیوتر</a></li>--}}
{{--                <li><a href="#">علوم داده</a></li>--}}
{{--                <li><a href="#">مهندسی</a></li>--}}
{{--                <li><a href="#">ریاضیات</a></li>--}}
{{--                <li><a href="#">معماری</a></li>--}}
{{--                <li><a href="#">مطالعه تجارت</a></li>--}}
{{--                <li><a href="#">طراحی و هنر</a></li>--}}
{{--            </ul>--}}
        </div>




        <div id="smenu">
            <ul>
                <li class="{{(Route::currentRouteName()=='home.teacher.list')?'active':''}}"><a href="{{route('home.teacher.list')}}">جست و جوی استاد</a></li>
                {{--                        <li class="{{(Route::currentRouteName()=='home.teacher.register.form')?'active':''}} "><a href="{{route('home.teacher.register.form')}}">  جذب استاد</a></li>--}}
                <li class="{{(Route::currentRouteName()=='home.articles')?'active':''}} "><a href="{{route('home.articles')}}">    مقالات</a></li>
                <li class="{{(Route::currentRouteName()=='home.about.us')?'active':''}}"><a href="{{route('home.about.us')}}">جذب استاد</a></li>
                <li class="{{(Route::currentRouteName()=='home.contact.us')?'active':''}}"><a href="{{route('home.contact.us')}}">تماس با ما</a></li>
            </ul>
        </div>

    </div>

</div>
