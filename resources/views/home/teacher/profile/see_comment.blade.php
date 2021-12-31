@component('home.teacher.content',['title'=>' تنظیمات  '])


    <div id="teacherpish">

        @slot('bread')


            <div id="toppish">
                <div class="right">

                    <div class="bread">
                        <ul>
                            <li><a href="#">تیچرپرو</a></li>
                            <li><span><i class="icon-left"></i></span></li>
                            <li><span>پنل استاد</span></li>
                        </ul>
                    </div>

                </div>
                <div class="left">

                    <ul class="icon-menue">

{{--                        <li><a href="#"><i class="icon-plus"></i></a></li>--}}
{{--                        <li><a href="#"><i class="icon-smile"></i></a></li>--}}
{{--                        <li><a href="#"><i class="icon-bell"></i><span class="num">3</span></a></li>--}}
                        <li class="exit"><a href="#"><i class="icon-exit"></i><span>خروج</span></a></li>
                    </ul>
                </div>
            </div>


        @endslot






    </div>

    <div id="article-from" class="shade">


        <div class="widget-content">










                <div class="clr"></div>
                <div class="row">
                    <div class="col-lg-12">
                        <div>
                            <br>
                            <br>
                            <br>
                            <br>
                            @foreach($article->comments()->whereActive('1')->orderBy('seen','desc')->get( ) as $comment)
                                @php($v=verta($comment->created_at))

                            <div class="ho-comment">
                                <div class="right">
                                    @if($comment->user_id)
                                    <img src="{{asset('/src/avatar/'.$comment->user->attr('avatar'))}}" alt="">
                                        @endif
                                </div>

                                <div class="mtexct">
                                    <div class="right">

                                        <div class="name"><span>توسط :

                                            {{$comment->name}}
                                            </span></div>

                                        <div class="date"><span>{{$v->format('%B %d، %Y')}}</span></div>
                                        <div class="text">
                                            <p>{{$comment->comment}}</p>
                                        </div>
                                    </div>
                                    <div class="buuton">

{{--                                        <span class="remove">حذف<i class="icon-trash"></i></span>--}}
                                        <a href="{{route('home.single.article',$comment->commentable)}}">
                                            <span class="reply">پاسخ<i class="icon-reply"></i></span>

                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>





        </div>


    </div>


@endcomponent
