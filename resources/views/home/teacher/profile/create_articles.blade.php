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

        <div class="widget-title">
            <h3>مقاله جدید</h3>
            <div class="dot3">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div class="widget-content">
{{--            @if($errors->any())--}}
{{--                {!! implode('', $errors->all('<div>:message</div>')) !!}--}}
{{--            @endif--}}

            <form action="{{route('Article.store',['user_id'=>$user->id])}}" enctype="multipart/form-data" class=" " method="post"  >
                @csrf
                @method('post')


                <div class="row">
                    <div class="col-lg-9 col-md-12">
                        <div>

                            <div class="input-container fill">
                                <label for="">عنوان مقاله  <span>(حداكثر 70 كاراكتر)</span></label>
                                <input type="text" name="title" value="{{old('title' )}}"  placeholder="‏عنوان مقاله را بنويسيد">
                                @error('title')<div class="eerror">{{ $message }}</div>@enderror

                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div>
                            <br>
                            <br>
                            <br>
                            <div class="input-container1 fill1">
                                <div id="fileuploader" class="fl">
                                    <label for="featured-pic">
                                        تصویر شاخص
                                        <span>
                                                      انتخاب فایل

                                            </span>
                                    </label>
                                    <input type="file" id="featured-pic" name="image" placeholder="انتخاب کن" accept="image/*">
                                    @error('image')<div class="eerror">{{ $message }}</div>@enderror
{{--                                    <img src="{{asset('src/article/images/').'/'.$Article->image}}" alt="">--}}

                                </div>
                            </div>
{{--                            <div class="input-container fill">--}}
{{--                                <label for="">تصویر شاخص</label>--}}
{{--                                <input type="file" name="image" placeholder="انتخاب کن" accept="image/*">--}}
{{--                                @error('image')<div class="eerror">{{ $message }}</div>@enderror--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div>


{{--                            @foreach(\App\Models\Acat::whereNull('parent_id')->latest()->get() as $ac)--}}
{{--                                @if(\App\Models\Acat::where('parent_id',$ac->id)->latest()->get()->first() )--}}
{{--                            {{dump($ac->name)}}--}}
{{--                                    {{dd(\App\Models\Acat::where('parent_id',$ac->id)->latest()->get() )}}--}}
{{--                                @else--}}

{{--                                    {{dump(1)}}--}}
{{--                                    {{dump($ac)}}--}}
{{--                                @endif--}}


{{--                            @endforeach--}}
                            <div class="input-container fill">
                                <label for="">  دسته بندی ها</label>
                                <select name="cat[]" id="" class="select2" multiple>
                                    <option >لطفا یک مورد را انتخاب کنید </option>
                                    @foreach(\App\Models\Acat::whereNull('parent_id')->latest()->get() as $ac)
                                        @if(\App\Models\Acat::where('parent_id',$ac->id)->latest()->get()->first()  )
                                            <optgroup  label="{{$ac->name}}" >
                                                <option {{(in_array($ac->id,old('cat',[] ))?'selected':'')}}  value="{{$ac->id}}">{{$ac->name}}</option>

                                            @foreach(\App\Models\Acat::where('parent_id',$ac->id)->latest()->get() as $accc)
                                                    <option {{(in_array($accc->id,old('cat',[] ))?'selected':'')}}  value="{{$accc->id}}">{{$accc->name}}</option>
                                                @endforeach
                                            </optgroup>
                                        @else
                                            <optgroup  label="{{$ac->name}}" >
                                                <option {{(in_array($ac->id,old('cat' ,[]))?'selected':'')}} value="{{$ac->id}}">{{$ac->name}}</option>
                                            </optgroup>
                                        @endif
                                    @endforeach
                                </select>
                                @error('cat')<div class="eerror">{{ $message }}</div>@enderror
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div>
                            <textarea name="article" id="mytextarea">{{old('article' )}}</textarea>
                            @error('article')<div class="eerror">{{ $message }}</div>@enderror


                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div>
                            <div class="add-tag">
                                <h4><span class="hs">#</span>افزودن تگ ها <span>(حداكثر 5 عدد)</span></h4>
                                @error('tag')<div class="eerror">{{ $message }}</div>@enderror

                                <div class="form">
                                    <input type="text" placeholder="كلمات كليدی">
                                    <span class="addt">افزودن</span>
                                </div>
                                <div class="result">
                                    @if(  old('tag'))
                                    @foreach(   old('tag') as $old)
                                        <span><input name="tag[]" hidden="" value="{{($old)}}"> {{$old}}<i class="icon-close"></i></span>
                                    @endforeach
                                        @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <div>
                            <div class="button-container reight">
                                <input type="submit" class="bt" value="انتشار پست" name="save">
                            </div>
                            <div class="button-container reight border">
                                <input type="submit" class="btr" value="  ذخیره پیشنویس" name="draft">
                            </div>

                        </div>
                    </div>
                </div>


            </form>



        </div>


    </div>


@endcomponent
