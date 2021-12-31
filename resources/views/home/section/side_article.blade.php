
<div id="search">

    <form action="{{route('home.articles')}}" method="get">
        @csrf
        @method('fet')
        <div>
            <input placeholder="جستجو..." type="search" name="search" title="جستجو" value="{{request('search')}}">
            <button> <i class="icon2-search" aria-hidden="true"></i>
            </button>
        </div>
    </form>

</div>

<h2 class="side-title">دسته‌بندی‌ها</h2>



<div class="sidebar-nav">
    <ul class="metismenu" id="menu1">

        @foreach(\App\Models\Acat::whereNull('parent_id')->latest()->get() as $ac)
            @if(\App\Models\Acat::where('parent_id',$ac->id)->latest()->get()->first()  )
                <li  class="active ">
                    <a class="has-arrow bl"  aria-expanded="false">{{$ac->name}}</a>
                    <ul class="mm-collapse">
                        <li><a  href="{{route('home.articles',$ac->id)}}"  class="bl"> {{$ac->name}}</a></li>
                        @foreach(\App\Models\Acat::where('parent_id',$ac->id)->latest()->get() as $accc)

                            <li><a  href="{{route('home.articles',$accc->id)}}"  class="bl"> {{$accc->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
            @else
                <li>
                    <a   href="{{route('home.articles',$ac->id)}}" class="bl">
                        {{$ac->name}}
                    </a>
                </li>

            @endif
        @endforeach



    </ul>
</div>



<h2 class="side-title">مطالب اخیر</h2>
@foreach(\App\Models\Article::where('submit','1')->where('active','1')->take(4)->latest()->get() as $latest)
    <div class="side-blog">
        <a class="elementor-post__thumbnail__link" href="#">
            <div class="elementor-post__thumbnail">
                <img src="{{asset('/src/article/images/a2'.$latest->image)}}" alt="">
            </div>
        </a>
        <div class="elementor-post__text">
            <h3 class="elementor-post__title">
                <a href="{{route('home.single.article',$latest->id)}}">{{$latest->title}} </a>
            </h3>
            <a class="elementor-post__read-more" href="{{route('home.single.article',$latest->id)}}">  ادامه مطلب »</a>
        </div>
    </div>
@endforeach
