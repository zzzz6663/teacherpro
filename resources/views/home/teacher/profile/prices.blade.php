@component('home.teacher.content',['title'=>' تنظیمات  '])


<div id="teacherpishs">

    @slot('bread')


        @include('home.teacher.profile.bread_left',['name'=>'    قیمت ها   '])

    @endslot





            <div class="teacher-pricing shade">

                <div class="widget-title">
                    <h3> قیمت گذاری جلسات (تومان)

                    {{-- <p style="color: red">
                        تغییرات در این قسمت بعد  از تایید ادمین لحاظ میشود و تا تایید ادمین شما از لیست اساتید حذف میشوید
                    </p> --}}
                    </h3>

                    <div class="dot3">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>

                <div class="widget-content">

                    <div class="row">

                        <div class="col-lg-6 col-md-12">
                            <div>

                                @if($errors->any())
                                    <div class="e_section" id="e_section">
                                        @if($errors->any())
                                            {!! implode('', $errors->all('<span class="text text-danger">:message</span><br>')) !!}
                                        @endif
                                    </div>
                                @endif
                                <form action="{{route('teacher.save.price',$teacher->id)}}" method="post">
                                    @csrf
                                    @method('post')
                                    @php($setting=new \App\Models\Setting())
                                    <span id="min" data-min="{{$setting->set('min_price')}}"></span>

                                    @php($diff=$setting->set('max_price')-$setting->set('min_price'))
                                    <div class="input-container fill">
                                        <label for="">قیمت یک جلسه

                                        <span style="float: left; color: #00a65a" class="green">{{$teacher->meet1>0?number_format($teacher->meet1):''}} تومان</span>
                                        </label>
                                        <select name="meet1" id="s1" class="selectBox">
                                            <option value="">لطفا یک مورد را انتخاب کنید </option>
                                            @for($i=0 ;$i<$diff/5000; $i++)
                                                <option {{old('meet1',$teacher->meet1)==($i*5000 +$setting->set('min_price'))?'selected':''}} value="{{$i*5000 +$setting->set('min_price')}}">{{$i*5000 +$setting->set('min_price')}} تومان</option>
                                                @endfor
                                        </select>
{{--                                        <input type="number" value="{{old('meet1',$teacher->attr('meet1'))}}"  name="meet1" class="money" placeholder="   ">--}}
{{--                                        <div class="tx">{{old('meet1',number_format($teacher->attr('meet1')))}} ریال</div>--}}

                                    </div>

                                    <div class="input-container fill">
                                        <label for="">قیمت هر جلسه از دوره 5 جلسه ای
                                            <span style="float: left; color: #00a65a" class="green">{{$teacher->meet5>0?number_format($teacher->meet5):''}} تومان</span>

                                        </label>
                                        <select name="meet5" id="s2">
                                            @if(old('meet5',$teacher->meet5))
                                                <option value="{{old('meet5',$teacher->meet5)}}"> {{old('meet5',$teacher->meet5)}} تومان </option>
                                                @for($i=1 ;$i<($teacher->meet5-$setting->set('min_price'))/5000; $i++)
                                                    <option   value="{{$teacher->meet5-$i*5000}}">{{$teacher->meet5-$i*5000}} تومان</option>
                                                @endfor
                                            @else
                                                <option value="">لطفا یک مورد را انتخاب کنید </option>
                                            @endif
                                        </select>
{{--                                        <input type="number" value="{{old('meet5',$teacher->meet5)}}"  name="meet5" class="money" placeholder="  ">--}}


                                    </div>

                                    <div class="input-container fill">
                                        <label for="">قیمت هر جلسه از دوره 10جلسه ای
                                            <span style="float: left; color: #00a65a" class="green">{{$teacher->meet10>0?number_format($teacher->meet10):''}} تومان</span>
                                        </label>
                                        <select name="meet10" id="s3">
                                            @if(old('meet10',$teacher->meet10)))
                                                <option value="{{old('meet10',$teacher->meet10)}}"> {{old('meet10',$teacher->meet10)}} تومان</option>
                                                @for($i=1 ;$i<($teacher->meet10-$setting->set('min_price'))/5000; $i++)
                                                    <option   value="{{$teacher->meet10-$i*5000}}">{{$teacher->meet10-$i*5000}} تومان</option>
                                                @endfor
                                            @else
                                                <option value="">لطفا یک مورد را انتخاب کنید </option>
                                            @endif
                                        </select>


                                    </div>

                                    <div class="button-container reight">
                                        <input type="submit" value="ذخیره تغییرات" class="bt">
{{--                                        <span class="butt"></span>--}}
                                    </div>
                                </form>

                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div>
                                <img src="/home/images/finance_analysis_.png" alt="">
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="teacher-pricing-free shade">

                <div class="widget-title">
                    <h3>وضعیت جلسه آزمایشی</h3>

                    <div class="dot3">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>

                <div class="widget-content">

                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <p class="light-text">جلسه آزمایشی ، یک جلسه 30 دقیقه ای برای آشنایی دانشجو با شماست </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-4 col-md-12">
                            <div>
                                <img src="/home/images/maskroup.png" alt="">
                            </div>
                        </div>

                        <div class="col-lg-8 col-md-12">
                            <div>



                                @if($errors->any())
                                    <div class="e_section" id="e_section">
                                        @if($errors->any())
                                            {!! implode('', $errors->all('<span class="text text-danger">:message</span><br>')) !!}
                                        @endif
                                    </div>
                                @endif






                                <form action="{{route('teacher.save.more.price',$teacher->id)}}" method="post">
                                    @csrf
                                    @method('post')

                                    <div class="check-buttonlist">
                                        <ul>
                                            <li>
                                                <div class="lable-container">
                                                    <input type="radio" name="freeclass"   {{(old('freeclass') == 'free'  || $teacher->attr('freeclass')=='free') ? 'checked' : ''}} id="free" value="free">
                                                    <label for="free">
                                                        <div class="right">
                                                            <span>رایگان  <span class="l">( توصیه  تیچرپرو)</span></span>
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
                                                    <input type="radio" name="freeclass"   {{(old('freeclass') == 'nofree'  || $teacher->attr('freeclass')=='nofree') ? 'checked' : ''}} id="nofree" value="nofree">
                                                    <label for="nofree">
                                                        <div class="right">
                                                            <span>غیر رایگان</span>
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
                                                    <input type="radio" name="freeclass"   {{(old('freeclass') == 'noclass'  || $teacher->attr('freeclass')=='noclass') ? 'checked' : ''}} id="noclass" value="noclass">
                                                    <label for="noclass">
                                                        <div class="right">
                                                            <span>عدم اراِئه</span>
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

                                    <div class="input-container clas_sec fill" {{(old('freeclass') == 'nofree' || $teacher->attr('freeclass')=='nofree') ? '' : 'hidden'}}  >
                                        <!-- <label for="">قیمت هر جلسه از دوره 10جلسه ای</label> -->

                                            <label for=""> قیمت یک جلسه
                                                آزمایشی

                                            <span style="float: left; color: #00a65a" class="green tx">{{old('free_meeting_price',$teacher->attr('free_meeting_price'))}}تومان</span>
                                            </label>
                                            <select name="free_meeting_price" id="" class="selectBox">
                                                <option value="">لطفا یک مورد را انتخاب کنید </option>
                                                @for($i=0 ;$i<$diff/5000; $i++)
                                                    <option {{old('free_meeting_price',$teacher->attr('free_meeting_price'))==($i*5000 +$setting->set('min_price'))?'selected':''}} value="{{$i*5000 +$setting->set('min_price')}}">{{$i*5000 +$setting->set('min_price')}} تومان</option>
                                                    @endfor
                                            </select>
    {{--                                        <input type="number" value="{{old('meet1',$teacher->attr('meet1'))}}"  name="meet1" class="money" placeholder="   ">--}}
    {{--                                        <div class="tx">{{old('meet1',number_format($teacher->attr('meet1')))}} ریال</div>--}}

                                        {{-- <input type="number" class="money" value="{{old('free_meeting_price',$teacher->attr('free_meeting_price'))}}"  name="free_meeting_price" placeholder="‏650,000 تومان"> --}}
                                        {{-- <div class="tx"> تومان</div> --}}
                                    </div>

                                    <div class="button-container reight">
                                        <input type="submit" value="ذخیره تغییرات" class="bt">
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div id="faqs">
                <h2>چه قیمتی را برای کلاس هایم تعیین کنم؟</h2>

                <p class="subtitle">کلاسهای آنلاین ارزانتر از کلاس های حضوری :</p>
{{--                <div id="teacher-faq"></div>--}}

                <div class="fasqs" id="teacher-faq">

                    <div class="faq active">
                        <div class="question">
                            <a class="bl">
                                <span class="title"> کلاسهای آنلاین ارزانتر از کلاس های حضوری  </span>
                                <div class="icon">
                                    <div class="normal">
                                        <i aria-hidden="true" class="icon2-open icon2-angle-down"></i>
                                    </div>
                                    <div class="active">
                                        <i aria-hidden="true" class="icon2-closed icon2-angle-down"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="answer" style="display: block;">
                            <div class="">
                                <p>
                                    باتوجه به تکنولوژی های پیشرفته تیچرپرو، هر کلاس یک ساعته که استاد و زبان آموز هر دو به صورت صوتی-تصویری کلاس خود را برگزار کنند، تنها حدودا 200 مگابایت دیتا مصرف خواهد شد( همچون یک تماس معمولی در واتساپ یا ایمو).


                                </p>
                            </div>
                        </div>
                    </div>


                    <div class="faq  ">
                        <div class="question">
                            <a class="bl">
                                <span class="title"> کلاسهای آنلاین ارزانتر از کلاس های حضوری  </span>
                                <div class="icon">
                                    <div class="normal">
                                        <i aria-hidden="true" class="icon2-open icon2-angle-down"></i>
                                    </div>
                                    <div class="active">
                                        <i aria-hidden="true" class="icon2-closed icon2-angle-down"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="answer"  >
                            <div class="">
                                <p>
                                    باتوجه به تکنولوژی های پیشرفته تیچرپرو، هر کلاس یک ساعته که استاد و زبان آموز هر دو به صورت صوتی-تصویری کلاس خود را برگزار کنند، تنها حدودا 200 مگابایت دیتا مصرف خواهد شد( همچون یک تماس معمولی در واتساپ یا ایمو).


                                </p>
                            </div>
                        </div>
                    </div>


                    <div class="faq  ">
                        <div class="question">
                            <a class="bl">
                                <span class="title"> کلاسهای آنلاین ارزانتر از کلاس های حضوری  </span>
                                <div class="icon">
                                    <div class="normal">
                                        <i aria-hidden="true" class="icon2-open icon2-angle-down"></i>
                                    </div>
                                    <div class="active">
                                        <i aria-hidden="true" class="icon2-closed icon2-angle-down"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="answer"  >
                            <div class="">
                                <p>
                                    باتوجه به تکنولوژی های پیشرفته تیچرپرو، هر کلاس یک ساعته که استاد و زبان آموز هر دو به صورت صوتی-تصویری کلاس خود را برگزار کنند، تنها حدودا 200 مگابایت دیتا مصرف خواهد شد( همچون یک تماس معمولی در واتساپ یا ایمو).


                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="faq c">
                        <div class="question">
                            <a class="bl">
                                <span class="title"> کلاسهای آنلاین ارزانتر از کلاس های حضوری  </span>
                                <div class="icon">
                                    <div class="normal">
                                        <i aria-hidden="true" class="icon2-open icon2-angle-down"></i>
                                    </div>
                                    <div class="active">
                                        <i aria-hidden="true" class="icon2-closed icon2-angle-down"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="answer"  >
                            <div class="">
                                <p>
                                    باتوجه به تکنولوژی های پیشرفته تیچرپرو، هر کلاس یک ساعته که استاد و زبان آموز هر دو به صورت صوتی-تصویری کلاس خود را برگزار کنند، تنها حدودا 200 مگابایت دیتا مصرف خواهد شد( همچون یک تماس معمولی در واتساپ یا ایمو).


                                </p>
                            </div>
                        </div>
                    </div>
                    {{--                    <div class="faq">--}}
{{--                        <div class="question tran">--}}
{{--                            <h4> <i class="icon-question-o"></i>--}}
{{--                                کلاسهای آنلاین ارزانتر از کلاس های حضوری :--}}
{{--                            </h4>--}}
{{--                        </div>--}}
{{--                        <div class="answer">--}}

{{--                        </div>--}}

{{--                    </div>--}}

{{--                    <div class="faq">--}}
{{--                        <div class="question tran">--}}
{{--                            <h4> <i class="icon-question-o"></i>--}}
{{--                                کلاسهای 60 دقیقه ای :--}}
{{--                            </h4>--}}
{{--                        </div>--}}
{{--                        <div class="answer">--}}
{{--                            <p>--}}
{{--                                باتوجه به تکنولوژی های پیشرفته تیچرپرو، هر کلاس یک ساعته که استاد و زبان آموز هر دو به صورت صوتی-تصویری کلاس خود را برگزار کنند، تنها حدودا 200 مگابایت دیتا مصرف خواهد شد( همچون یک تماس معمولی در واتساپ یا ایمو).--}}


{{--                            </p>--}}
{{--                        </div>--}}

{{--                    </div>--}}

{{--                    <div class="faq">--}}
{{--                        <div class="question tran">--}}
{{--                            <h4> <i class="icon-question-o"></i>--}}
{{--                                کلاسهای آنلاین ارزانتر از کلاس های حضوری :--}}
{{--                            </h4>--}}
{{--                        </div>--}}
{{--                        <div class="answer">--}}
{{--                            <p>--}}
{{--                                باتوجه به تکنولوژی های پیشرفته تیچرپرو، هر کلاس یک ساعته که استاد و زبان آموز هر دو به صورت صوتی-تصویری کلاس خود را برگزار کنند، تنها حدودا 200 مگابایت دیتا مصرف خواهد شد( همچون یک تماس معمولی در واتساپ یا ایمو).--}}


{{--                            </p>--}}
{{--                        </div>--}}

{{--                    </div>--}}


{{--                    <div class="faq">--}}
{{--                        <div class="question tran">--}}
{{--                            <h4> <i class="icon-question-o"></i>--}}
{{--                                نگران مصرف بالای دیتای اینترنت نباشید :--}}
{{--                            </h4>--}}
{{--                        </div>--}}
{{--                        <div class="answer">--}}
{{--                            <p>--}}
{{--                                باتوجه به تکنولوژی های پیشرفته تیچرپرو، هر کلاس یک ساعته که استاد و زبان آموز هر دو به صورت صوتی-تصویری کلاس خود را برگزار کنند، تنها حدودا 200 مگابایت دیتا مصرف خواهد شد( همچون یک تماس معمولی در واتساپ یا ایمو).--}}


{{--                            </p>--}}
{{--                        </div>--}}

{{--                    </div>--}}

{{--                    <div class="faq">--}}
{{--                        <div class="question tran">--}}
{{--                            <h4> <i class="icon-question-o"></i>--}}
{{--                                کلاسهای آنلاین ارزانتر از کلاس های حضوری :--}}
{{--                            </h4>--}}
{{--                        </div>--}}
{{--                        <div class="answer">--}}
{{--                            <p>--}}
{{--                                باتوجه به تکنولوژی های پیشرفته تیچرپرو، هر کلاس یک ساعته که استاد و زبان آموز هر دو به صورت صوتی-تصویری کلاس خود را برگزار کنند، تنها حدودا 200 مگابایت دیتا مصرف خواهد شد( همچون یک تماس معمولی در واتساپ یا ایمو).--}}


{{--                            </p>--}}
{{--                        </div>--}}

{{--                    </div>--}}


                </div>
            </div>





</div>



    @endcomponent
