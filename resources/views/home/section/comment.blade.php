@foreach($comments as $comment)

    @if(isset($sub))
        @php($level++)
    @endif
    @php($v=verta($comment->created_at))
    <div id="comment_{{$comment->id}}" class="comment">

        <div class="blog-post-comments">
            <div class="right">
                @if($comment->user_id)
                    <img alt="" src="{{asset('/src/avatar/'.$comment->user->attr('avatar'))}}">
                @else
                    <img src="" alt="">
                @endif
            </div>
            <div class="left">
                <div class="top">

                    <span class="blog-post-comment-name">    {{$comment->name}}    </span> <span class="date">{{$v->format('%B %d، %Y')}}</span>
{{--                    @if (\Illuminate\Support\Facades\Auth::check())--}}
                    @if(  $level<4)
                        <a data-id="{{$comment->id}}"  class="pull-left bl pointer answer_com text-gray"><i class="icon2-commenting-o"></i> پاسخ</a>
                    @endif

                    {{--                    @else--}}
{{--                        <span style="float:left;" class="pointer">--}}
{{--                                                                            برای ثبت پاسخ لطفا وارد--}}
{{--                                                                        <span  class="show_login bl" style="color: #0a8660; font-size: 18px">سایت</span>--}}
{{--                                                                        شوید--}}
{{--                                                                      </span>--}}
{{--                    @endif--}}
                </div>
                <p>
                    @if(isset($sub))
                        {{$level}}

                    @endif
                    {{$comment->comment}}
                </p>
                <div id="respond" class="par_com comment-respond"  style="display: none">

                    <h3 id="reply-title" class="comment-reply-title">ارسال پاسخ
                        برای
                        {{$comment->name}}
                        <span class="dele_com" style="float: left;border-radius: 5px; border: 1px solid #000; font-size: 12px;display: inline-block; padding: 3px 5px; cursor: pointer">لغو پاسخ</span>
                    </h3>

                    <form id="par_{{$comment->id}}"  class="comment-form par_for" action="{{route('home.comment.article',$article->id)}}" method="post">
                        @csrf
                        @method('post')
                                        <p class="comment-notes">
                            <span id="email-notes">نشانی ایمیل شما منتشر نخواهد شد.</span>
                            بخش‌های موردنیاز علامت‌گذاری شده‌اند
                            <span class="required">*</span>
                        </p>

                        <div class="comment-info row">
                            <div class="col-lg-6 col-md-12">
                                <div>


                                    <input  data-valid="لطفا نام خود را وارد کنید " placeholder="نام را وارد کنید" id="author" class="form-control" required name="name" type="text" value="" size="30" aria-required="true">



                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div>


                                    <input  data-valid="لطفا ایمیل خود را وارد کنید " placeholder="ایمیل را وارد کنید" id="email" name="email" required class="form-control" type="email" value="" size="30" aria-required="true">



                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 ">
                                <div>

                                    <input type="text" id="paretn" value="{{$comment->id}}" hidden="" name="parent_id">

                                    <textarea class="form-control msg-box" data-valid="لطفا نظر خود را وارد کنید " placeholder="نظرات را وارد کنید" required   name="comment" cols="45" rows="8" aria-required="true"></textarea>


                                </div>
                            </div>
                        </div>
                        <p class="form-submit">

                            <span data-id="{{$comment->id}}" class="bt sub_com" style="line-height: 45px; height: 45px; padding: 0 45px">ارسال نظر </span>
{{--                            <input name="submit" type="submit" id="submit" class="btn-comments btn btn-primary" style="cursor: pointer" value="ارسال sنظر">--}}

                        </p>
                    </form>
                </div>
            </div>
        </div>

        @include('home.section.comment',['comments'=>$comment->child,'sub'=>'1'])

    </div>
@endforeach
