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

                        <li><a href="#"><i class="icon-plus"></i></a></li>
                        <li><a href="#"><i class="icon-smile"></i></a></li>
                        <li><a href="#"><i class="icon-bell"></i><span class="num">3</span></a></li>
                        <li class="exit"><a href="#"><i class="icon-exit"></i><span>خروج</span></a></li>
                    </ul>
                </div>
            </div>


        @endslot






    </div>

    <div id="article-from" class="shade">

        <div class="widget-title">
            <h3>  ویرایش رزومه</h3>
            <div class="dot3">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div class="addresume">

            <div class="row">


                <div class="col-lg-6 col-md-12">
                    <div>
                        <img src="/home/images/mind_map_two_color.png" alt="">
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div>
                        @if($errors->any())
                            <div class="e_section" id="e_section">
                                {!! implode('', $errors->all('<span class="text text-danger">:message</span><br>')) !!}
                            </div>
                        @endif
                        <form action="{{route('Resume.update',$Resume->id)}}" method="post">
                            @csrf
                            @method('Patch')

                            <div class="label">
                                <span>انتخاب نوع</span>
                            </div>

                            <div class="check-buttonlist">
                                <ul>
                                    <li>
                                        {{--                                                    {{dump(old('type'))}}--}}
                                        <div class="lable-container">
                                            <input type="radio"   name="type" {{(old('type',$Resume->type)=='education')?'checked':""}} id="education" value="education">
                                            <label for="education">
                                                <div class="right">
                                                    <span>تحصیلی</span>
                                                </div>
                                                <div class="left">
                                                    <div class="circle">
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    </li>
                                    <li>

                                        <div class="lable-container">
                                            <input type="radio" name="type" {{(old('type',$Resume->type)=='sabeghe')?'checked':""}} id="sabeghe" value="sabeghe">
                                            <label for="sabeghe">
                                                <div class="right">
                                                    <span>سابقه کار</span>
                                                </div>
                                                <div class="left">
                                                    <div class="circle">
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="lable-container">
                                            <input type="radio" name="type" {{(old('type',$Resume->type)=='licence')?'checked':""}} id="licence" value="licence">
                                            <label for="licence">
                                                <div class="right">
                                                    <span>گواهی‌ها</span>
                                                </div>
                                                <div class="left">
                                                    <div class="circle">
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="input-container fill">
                                <label for="">عنوان</label>
                                <input type="text" name="title" value="{{old('type',$Resume->title)}}" placeholder="‏">
                            </div>

                            <div class="input-container fill">
                                <label for="">توضیحات</label>
                                <input type="text" name="info"  value="{{old('info',$Resume->info)}}" placeholder="‏">
                            </div>

                            <div class="input-container fill">
                                <label for="">محل</label>
                                <input type="text" name="place"  value="{{old('place',$Resume->place)}}" placeholder="‏">
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div>
                                        <div class="input-container fill">
                                            <label for="from">تاریخ از :</label>
                                            <select name="from" id="from">
                                                <option value="">از</option>
                                                @for($i=1340;$i<1401;$i++)
                                                    <option {{(old('from',$Resume->from)==$i)?'selected':''}} value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div>
                                        <div class="input-container fill">
                                            <label for="till">تاریخ تا :</label>
                                            <select name="till" id="till">
                                                <option value="">تا</option>
                                                @for($i=1340;$i<1401;$i++)
                                                    <option {{(old('till',$Resume->till)==$i)?'selected':''}} value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="button-container reight">
                                <input type="submit" class="bt" value="ویرایش">
                            </div>
                        </form>

                    </div>
                </div>
            </div>


        </div>


    </div>


@endcomponent
