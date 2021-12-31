@component('home.teacher.content',['title'=>' تنظیمات  '])


    <div id="teacherpish">

        @slot('bread')

            @include('home.teacher.profile.bread_left',['name'=>'نوشته ها  '])

        @endslot






    </div>
    <div class="article-settings shade">
        <div class="widget-title">
            <h3>نوشته های شما</h3>

            <div class="button-container ">

                <a href="{{route('Article.create' )}}" class="butt">نوشتن مقاله جدید</a>
            </div>
            <div class="dot3">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div class="widget-content">


            <ul class="tab-nav">
                <li class="active"><span>منتشر شده</span></li>
                <li><span>پیش‌نویس‌ها</span></li>
                <li><span>نظرات</span></li>
            </ul>



            <ul class="tab-container">
                <li class="active">

                    <div class="article-lits">

                        @foreach($artices_active as $ar)


                        <div class="single-article-ad" style="border: 1px  solid #e1e1e1; border-radius: 15px">

                            <div class="left">
                                <ul>
                                    <li class="del-link">

                                        <form action="{{route('Article.destroy',['Article'=>$ar->id] )}}"  method="POST"  >
                                            @csrf
                                            @method('DELETE')
                                            <div class="buttons pointer"  >
                                                <input type="submit" class="bt3" value="حذف" >
                                            </div>
                                        </form>

                                    </li>
{{--                                    <li class="edit-link"><span>ویرایش<i class="icon-edit"></i></span></li>--}}
                                    <li class="see"><a href="{{route('Article.edit',['Article'=>$ar->id,'user'=>$user->id])}}"> ویرایش   </a></li>
                                    <li class="see" style="position: relative">

                                        <span class="cire" style="display:  {{$ar->comments()->where('active','1')->where('seen','0')->count()>0?' block':'none'}}"></span>
                                        <a href="{{route('teacher.see.comment',  $ar->id  )}}">   دیدگاه</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="right">

                                <div class="pic">
                                    <div class="elementor-post__thumbnail elementor-fit-height" style="background: url('{{asset('/src/article/images/'.$ar->image)}}') center center/cover; padding-top: 50%;">

                                    </div>
{{--                                    <img src="{{asset('/src/article/images').'/per'.$ar->image}}" alt="">--}}
                                </div>

                                <div class="text">
                                    <h3><a href="{{route('home.single.article',$ar->id)}}">
                                            {{$ar->title}}
                                        </a></h3>
                                    <div class="date">
                                        <span>
                                            {{\Morilog\Jalali\Jalalian::forge($ar->created_at)->format('%B %d، %Y')}}
                                        </span>
                                    </div>
                                </div>

                            </div>

                        </div>
                        @endforeach

                    </div>


                </li>
                <li>

                    <div class="article-lits">

                        @foreach($artices_deactive as $ar)

                            <div class="single-article-ad">

                                <div class="left">
                                    <ul>
                                        <li class="del-link">

                                            <form action="{{route('Article.destroy',['Article'=>$ar->id] )}}"  method="POST"  >
                                                @csrf
                                                @method('DELETE')
                                                <div class="buttons pointer"  >
                                                    <input type="submit" class="bt3" value="حذف" >
                                                </div>
                                            </form>

                                        </li>
                                        {{--                                    <li class="edit-link"><span>ویرایش<i class="icon-edit"></i></span></li>--}}
                                        <li class="see"><a href="{{route('Article.edit',['Article'=>$ar->id,'user'=>$user->id])}}">ویرایش</a></li>
                                    </ul>
                                </div>

                                <div class="right">

                                    <div class="pic">
                                        <img src="{{asset('/src/article/images').'/'.$ar->image}}" alt="">
                                    </div>

                                    <div class="text">
                                        <h3><a href="{{route('home.single.article',$ar->id)}}">{{$ar->title}}  </a></h3>
                                        <div class="date">
                                        <span>
                                            {{\Morilog\Jalali\Jalalian::forge($ar->created_at)->format('%B %d، %Y')}}
                                        </span>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        @endforeach

                    </div>


                </li>
                <li>

                    <div class="com-lits">


        <?php

                        $comm = \App\Models\Comment::where('active','1')->whereHas('commentable' , function($query) {
                            $query->where('user_id' , \auth()->user()->id);
                        })->latest()->get();
                        ?>









            @foreach($comm as $comment)
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
                            <a href="{{route('home.single.article',$comment->commentable).'#comment_'.$comment->id}}">
                                <span class="reply">پاسخ<i class="icon-reply"></i></span>


                            </a>
                        </div>

                    </div>
                </div>
            @endforeach


                    </div>


                </li>

            </ul>

        </div>

    </div>




    <div class="popupc" id="comm">
        <div>
            <div>
                <div>

                    <div class="popup-container mini shade">
						<span class="close close_popup">
							<i class="icon-cancel"></i>
						</span>

                        <div class="chclass-pop">
                            <div class="top">

                                <h3>
                                  پاسخ خود را وارد کنید
                                </h3>


                            </div>
                            <div class="form">
                                <div class="input-container fill">
                                    <form id="t_com" action="{{route('home.comment.article')}}">
                                    <textarea name="comment" id="" cols="30" rows="10"></textarea>
                                    <input type="text" name="id_com" hidden id="comment">
                                    </form>
                                </div>
                            </div>
                            <div class="foot">
                                <ul>
                                    <li>
                                        <div class="button-container reight border">
                                            <span class="butt close_popup">کنسل</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="button-container reight">
                                            <span id="sub_com" class="butt ">ثبت</span>
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
@endcomponent
