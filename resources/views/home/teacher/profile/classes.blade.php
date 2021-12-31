@component('home.teacher.content',['title'=>' تنظیمات  '])



    @slot('bread')
        @include('home.teacher.profile.bread_left',['name'=>'کلاس ها'])
    @endslot





        <div class="makeclass shade">
            <div class="widget-title">
                <h3>ایجاد کلاس جدید</h3>
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
                            <div class="guide-class">
                                <h3>راهنمای ایجاد کلاس</h3>
                                <ul>
                                    <li>هر کلاس تا ۳۰ نفر ظرفیت دارد</li>
                                    <li>زمان جلسات بعدا هم قابل تغییر می باشد</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
{{--                    <div class="col-lg-5 col-md-12">--}}
{{--                        <div>--}}
{{--                            <div class="right">--}}
{{--                                <img src="/home/images/online_team_meeting__two_color.png" alt="">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    @if($errors->any())
                        <div class="e_section" id="e_section">
                            {!! implode('', $errors->all('<span class="text text-danger">:message</span><br>')) !!}
                        </div>
                    @endif


                    <div class="col-lg-12 col-md-12">
                        <div>

                            <form id="free" action="{{route('teacher.free.class',$user->id)}}" method="post">
                                @csrf
                                @method('post')
                                <div class="input-container fill">
                                    <label for="">نام کلاس</label>
                                    <input id="name" type="text" name="name" placeholder="‏نامی مناسب برای کلاس انتتخاب کنید">
                                </div>


{{--                                <div class="input-container">--}}
{{--                                    <div class="text">--}}

{{--                                        <input type="number" name="count" id="count_class" value="1" min="0" max="10" step="1"/>--}}

{{--                                        <span>تعداد جلسات</span>--}}

{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="input-container">--}}
{{--                                    <div class="text">--}}
{{--                                        <input type="number" name="duration" value="60" min="60" max="180" step="30" >--}}
{{--                                        <input type="number" value="1" min="0" max="20" step="1"/>--}}

{{--                                        <span>مدت زمان هر جلسه  <span class="lgray">(دقیقه)</span></span>--}}

{{--                                    </div>--}}
{{--                                </div>--}}

                                <div class=" " id="class_parent">
                                    <div class="text posrel v2" id="boxy_1">
{{--                                        <img class="posab " onclick="document.getElementById('boxy_1').remove()" src="/home/css/images/close.png" alt="">--}}
                                        <ul>
                                            <li class="num2">
                                                <input type="text"  autocomplete="off" name="ser[0][day]" class="perisan pdp-el" placeholder="انتخاب روز">
                                            </li>
                                            <li class="num2">
                                                <select class="em" name="ser[0][du]" id="">
                                                    <option value="">  مدت زمان </option>
                                                    <option value="30">30</option>
                                                    <option value="60">60</option>
                                                    <option value="90">90</option>
                                                    <option value="120">120</option>
                                                    <option value="180">180</option>

                                                </select>
                                            </li>
                                            <li class="num3">
                                                <select class="em" name="ser[0][min]" id="">
                                                    <option value="">دقیقه</option>
                                                    <option value="30">30</option>
                                                    <option value="00">00</option>

                                                </select>
                                            </li>
                                            <li class="num4">:</li>
                                            <li class="num3 ">
                                                <select class="em" name="ser[0][h]" id="">
                                                    <option value="">    ساعت </option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                </select>

                                            </li>

                                        </ul>

                                    </div>
{{--                                    <div class="text posrel v2">--}}
{{--                                        <img class="posab " src="/home/css/images/close.png" alt="">--}}

{{--                                        <ul>--}}
{{--                                            <li class="num2"><input type="text" class="perisan em" placeholder="انتخاب روز"></li>--}}
{{--                                            <li class="num2">--}}
{{--                                                <select name="" class="em" id="">--}}
{{--                                                    <option selected>مدت زمان </option>--}}
{{--                                                    <option value="30">30</option>--}}
{{--                                                    <option value="60">60</option>--}}
{{--                                                    <option value="90">90</option>--}}
{{--                                                    <option value="120">120</option>--}}
{{--                                                    <option value="180">180</option>--}}

{{--                                                </select>--}}
{{--                                            </li>--}}
{{--                                            <li class="num5">--}}
{{--                                                <select name="" class=" em" id="">--}}
{{--                                                    <option  selected>ساعت</option>--}}
{{--                                                    @for($i=7; $i<24 ;$i++)--}}
{{--                                                        <option value="{{$i}}">{{$i}}</option>--}}
{{--                                                    @endfor--}}
{{--                                                </select>--}}
{{--                                            </li>--}}
{{--                                            <li class="num4">:</li>--}}
{{--                                            <li class="num3">--}}
{{--                                                <select name="" class="em" id="">--}}
{{--                                                    <option selected>دقیقه</option>--}}
{{--                                                    <option value="30">30</option>--}}
{{--                                                    <option value="00">00</option>--}}

{{--                                                </select>--}}
{{--                                            </li>--}}

{{--                                        </ul>--}}

{{--                                    </div>--}}
                                </div>



                                <div class="button-container reight" style="">
                                    <input style="float: left" type="submit" class="bt" value="ایجاد کلاس">
                                    <span class="bt" style=" margin-left: 20px; float: left" id="new_class_row">اضافه  </span>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="teacher-class-row shade">

        <div class="widget-title">
            <h3>لیست کلاس های ایجاد شده شما</h3>

            <div class="dot3">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="widget-content">
            @php($fclasses =auth()->user()->fclasses()->latest()->paginate(10))
            @if($fclasses)

            <div class="class-rows">
                @foreach($fclasses as $fclass)
                <div class="class-row">
                    <ul>
                        <li class="name"><span>{{$fclass->name}}    </span></li>
{{--                        <li class="coacity"><span>ظرفیت کلاس</span> <span class="num">20</span></li>--}}
                        <li class="reg"><span>
                                {{$fclass->meets()->first()?$fclass->meets()->first()->suser->name:''}}

                            </span> <span class="num">{{$fclass->meets()->count()}}</span></li>
                        <li data-link="https://teacherpro.ir/go_free_class/{{$fclass->id}}" class="copy-link"><span>کپی لینک<i class="icon-copy"></i></span></li>
{{--                        <li class="share-link"><span>اشتراک گزاری<i class="icon-share"></i></span></li>--}}
                        <li class="del-link">
                            <form id="f_form_{{$fclass->id}}" action="{{route('teacher.delete.fclass',$fclass->id)}}" method="post">
                                @csrf
                                @method('post')
                                <span class="f_form" data-id="{{$fclass->id}}">حذف<i class="icon-trash"></i></span>
                            </form>
                        </li>
{{--                        <li class="edit-link"><span>ویرایش<i class="icon-edit"></i></span></li>--}}
                    </ul>
                </div>
                @endforeach

            </div>
            @endif

            {{$fclasses->appends(request()->all())->links('home.section.pagination')}}
            <div class="class-row-text">
                <h3># مسئولیت اجتماعی تیچر پرو</h3>
                <p>
                    باتوجه به مشکلات رفت و آمدی اخیر به منظور جلوگیری از شیوع کرونا و همچنین تماس های بیشماری که از جانب شما اساتید زبان عزیز و زبان آموزاتون با ما گرفته شد، تیچرپرو تصمیم گرفته تا پروفایل مدیریتی کلاس ها، پشتیبانی از 8 تا 24 و زیرساخت برگزاری کلاس های خصوصی و گروهی رو به صورت صددرصد رایگان در اختیار شما و زبان آموزاتون قرار بده.
                </p>
                <div class="gray-box">
                    <span> لذا اگر قبلآ شهریه کلاسها رو از زبان آموزاتون دریافت کردید، اما به دلیل کرونا درحال حاضر امکان برگزاری حضوری نیست، میتونین به رایگان از زیرساخت تیچرپرو استفاده کنین</span>
                </div>
                <h4> برخی از امکانات رایگان  :</h4>
                <ul>
                    <li><span>پشتیبانی فنی 24 ساعته به شما و زبان آموزانتان</span></li>
                    <li><span>تا ۳۰ نفر زبان آموز در هر کلاس</span></li>
                    <li><span>قابلیت تغییر زمان و یا لغو کلاس</span></li>
                    <li><span>تماس صوتی و تصویری</span></li>
                </ul>
            </div>
        </div>

    </div>


<script>
    let  create_new_class=(id)=>{
        return `
                 <div class="text posrel v2" id="boxy_${id}">
                                        <img  class="posab " onclick="document.getElementById('boxy_${id}').remove()" src="/home/css/images/close.png" alt="">
    <ul>
    <li class="num2">
         <input type="text" name="ser[${id}][day]"  autocomplete="off" class="perisan em pdp-el" placeholder="انتخاب روز"  >
    </li>
    <li class="num2">
        <select class="em" name="ser[${id}][du]" id="">
         <option value="">  مدت زمان </option>
            <option value="30">30</option>
            <option value="60">60</option>
            <option value="90">90</option>
            <option value="120">120</option>
            <option value="180">180</option>

        </select>
    </li>
    <li class="num5">
        </select>
            <select class="em" name="ser[${id}][min]" id="">
            <option value="" >دقیقه</option>
            <option value="30">30</option>
            <option value="00">00</option>

        </select>
    </li>
    <li class="num4">:</li>
    <li class="num3 ">
  <select class="em" name="ser[${id}][h]" id="">
            <option value="">    ساعت </option>
            @for($i=7; $i<24 ;$i++)
        <option value="{{$i}}">{{$i}}</option>
            @endfor

    </li>

</ul>

</div>

`
    }
    (function ($) {
        $(document).ready(function () {

            $('body').on('click','#new_class_row',function (e) {
                var class_parent=$('#class_parent')
                var id= class_parent.children().length
                var go= true
                $( ".em" ).each(function( index ) {
                    if ( $( this ).val() ==''){
                        noty('لطفا  همه موارد را پر کنید ')
                        go=false
                        return false

                    }
                });
                if (go){
                    class_parent.append(
                        create_new_class(id)
                    )
                    console.log('ss')
                    var p = new persianDate();
                    $(".perisan").persianDatepicker({
                        startDate: "today",
                        endDate:"1495/5/5",
                        inline: true,
                    });
                }

            })
        })
    })(jQuery);
</script>



    <div class="popupc" style="display: {{old('flass')?'block':''}}">
        <div>
            <div>
                <div>

                    <div class="popup-container shade">
						<span class="close">
							<i class="icon-cancel"></i>
						</span>

                        <div class="class-suc">

                            <div class="pic">
                                <img src="/home/images/parachute_two_color.png" alt="">
                            </div>

                            <div class="text">
                                <span class="t">کلاست با موفقیت ساخته شد !</span>
                                <span>حالا کافیه لینک عضویت کلاس رو به زبان آموزات بدی تا اونا بتونن تو کلاست به طور رایگان شرکت کنن !</span>
                            </div>

                            <div class="toshare-link">
								<span>
									https://teacherpro.ir/go_free_class/{{old('flass')}}
								</span>
                            </div>

                            <div class="nav-share">
                                <ul>
                                    <li data-link="https://teacherpro.ir/go_free_class/{{old('flass')}}" class="copy-link"><span>کپی لینک<i class="icon-copy"></i></span></li>
{{--                                    <li class="share-link"><span>اشتراک گزاری<i class="icon-share"></i></span></li>--}}
                                </ul>
                            </div>

                            <div class="link">
                                <div class="button-container reight close_popup">
                                    <span class="butt"><i class="icon-dashboard"></i>بازگشت به پنل</span>
                                </div>
                            </div>

                        </div>




                    </div>

                </div>
            </div>
        </div>
    </div>
    @endcomponent
