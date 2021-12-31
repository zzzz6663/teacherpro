
<div id="toppish">
    <div class="right">

        <div class="bread">
            <ul>
                <li><a href="#">تیچرپرو</a></li>
                <li><span><i class="icon-left"></i></span></li>
                <li><span>{{$name}}</span></li>
            </ul>
        </div>

    </div>
    <div class="left">

        <ul class="icon-menue">

{{--            <li><a href="#"><i class="icon-plus"></i></a></li>--}}
{{--            <li><a href="#"><i class="icon-smile"></i></a></li>--}}
{{--            <li><a href="#"><i class="icon-bell"></i><span class="num">3</span></a></li>--}}
            <li class="exit"><a href="{{route('student.logout',auth()->user()->id)}}"><i class="icon-exit"></i><span>خروج</span></a></li>
        </ul>
    </div>
</div>
