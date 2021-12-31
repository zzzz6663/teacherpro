@extends('master.home')




                @section('main_body')



                    <div id="topheader" class="rows">
                        <div class="container">
                            <div>

                                <h2 >آرشیو مقالات</h2>
                            </div>
                        </div>
                    </div>

                    <div id="page" class="rows" >
                        <div class="container">

                            <div class="tablc">
                                <div class="tabler">



                                    <div id="main">
                                        <div>
                                            <div class="row">

                                                @foreach($articles as $article)
                                                    @php($v=verta($article->created_at))
                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div>
                                                            <div class="single-post">

                                                                <div class="elementor-post__card">
                                                                    <a class="elementor-post__thumbnail__link" href="#">
                                                                        <div class="elementor-post__thumbnail elementor-fit-height" style="background: url('{{asset('/src/article/images/'.$article->image)}}') center center/cover; padding-top: 60%;">
                                                                            {{--                                                                        <img src="{{asset('/src/article/images/a3'.$article->image)}}" alt="">--}}
                                                                        </div>
                                                                        {{--                                                    <div class="elementor-post__thumbnail elementor-fit-height">--}}
                                                                        {{--                                                        <img src="/home/images/blog1.jpg" alt="">--}}
                                                                        {{--                                                        <img src="{{asset('/src/article/images/a3'.$article->image)}}" alt="">--}}
                                                                        {{--                                                    </div>--}}
                                                                     </a>
                                                                    @if($article->acats()->first())
                                                                    <div class="elementor-post__badge">{{$article->acats()->first()->name}}</div>
                                                                    @endif
                                                                    <div class="elementor-post__text">
                                                                        <h3 class="elementor-post__title">
                                                                            <a href="{{route('home.single.article',$article->id)}}"> {{$article->title}} </a>
                                                                        </h3>
                                                                        <br>
                                                                        <div class="elementor-post__excerpt" style="text-align: right">
                                                                            {{--                                                        $str = substr($str, 0, 7) . '...';--}}

                                                                            {{mb_strimwidth(strip_tags(html_entity_decode(  $article->article)), 0, 70)}} ...
                                                                        </div>
                                                                    </div>
                                                                    <div class="elementor-post__meta-data">
                                                                        <span class="elementor-post-author"> {{$article->user->name}} {{$article->user->family}}</span>
                                                                        <span class="elementor-post-date">{{$v->format('%B %d، %Y')}}</span>
                                                                    </div>
                                                                    <div class="elementor-post__meta-data read-more"  >
                                                                        <a href="{{route('home.single.article',$article->id)}}"> بیشتر بخوانید</a>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div>
                                                        {{$articles->appends(request()->all())->links('home.section.pagination2')}}

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div id="sidebar">
                                        <div>

                                            @include('home.section.side_article')




                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>



                @endsection







