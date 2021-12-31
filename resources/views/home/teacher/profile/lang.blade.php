@component('home.teacher.content',['title'=>' تنظیمات  '])


<div id="teacherpish">

    @slot('bread')


        @include('home.teacher.profile.bread_left',['name'=>'اضافه کردن زبان'])

    @endslot




</div>

<div id="lang" class="teacher-pricing shade" >
    <div class="widget-title">
        <h3>     اضافه کردن زبان </h3>

        <div class="dot3">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="widget-content">
        <div class="add-language">
            <div class="pay-form">
                @if($errors->any())
                    <div class="e_section" id="e_section">
                        {!! implode('', $errors->all('<span class="text text-danger">:message</span><br>')) !!}
                    </div>
                @endif

                <form action="{{route('teacher.save.lang',$user->id)}}" class=" " method="post"  >
                    @csrf
                    @method('post')
                <div class="left">
                    <h3>افزودن زبان‌هایی که بلد هستید</h3>

                    <div class="input-container lang-listc fill">
                        <label for="">انتخاب زبان مورد نظر</label>
                        <input  autocomplete="off" type="text" value="{{old('language_id')}}" name="language_id" class="lang_id" hidden  placeholder="Persian">
                        <input  autocomplete="off" type="text" name="la" value="{{old('la')}}"  placeholder="انگلیسی">

                        <div class="lang-list">
                            <ul>
                                @foreach($langs as $la)
                                <li>
                                    <div class="rightl">
                                        <img style="width: 25px ;height: 25px;" src="{{asset('src/img/lang').'/'.$la->img}}" alt="">
                                    </div>
                                    <div class="leftl">
                                        <span class="top">{{$la->name}}</span>
                                        <span hidden class="id">{{$la->id}}</span>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="level">
                        <div class="label">انتخاب سطح</div>
                        <ul>
                            <li class="lev1">
                                <div class="lable-container">
                                    <input type="text" readonly name="level" hidden>
                                    <input type="radio"  name="level"  {{(old('level')=='lev1')?'selected':''}}  id="lev1" value="starter" checked="">
                                    <label for="lev1">
                                        <div>
                                            <div class="cir"></div>
                                            <span class="t">‏A1</span>
                                            <span>‏Starter</span>
                                        </div>
                                    </label>
                                </div>
                            </li>
                            <li class="lev2">
                                <div class="lable-container">
                                    <input type="radio" name="level"  {{(old('level')=='lev2')?'checked':''}}  id="lev2" value="elementary">
                                    <label for="lev2">
                                        <div>
                                            <div class="cir"></div>
                                            <span class="t">‏A2</span>
                                            <span>elementary</span>
                                        </div>
                                    </label>
                                </div>
                            </li>
                            <li class="lev3">
                                <div class="lable-container">
                                    <input type="radio" name="level"  {{(old('level')=='lev3')?'checked':''}}  id="lev3" value="intermediate">
                                    <label for="lev3">
                                        <div>
                                            <div class="cir"></div>
                                            <span class="t">‏B1</span>
                                            <span>‏Intermediate</span>
                                        </div>
                                    </label>
                                </div>
                            </li>
                            <li class="lev4">
                                <div class="lable-container">
                                    <input type="radio" name="level"  {{(old('level')=='lev4')?'checked':''}}  id="lev4" value="uintermediate">
                                    <label for="lev4">
                                        <div>
                                            <div class="cir"></div>
                                            <span class="t">‏B2</span>
                                            <span>‏Upper Intermediate</span>
                                        </div>
                                    </label>
                                </div>
                            </li>
                            <li class="lev5">
                                <div class="lable-container">
                                    <input type="radio" name="level"  {{(old('level')=='lev5')?'checked':''}}  id="lev5" value="advanced">
                                    <label for="lev5">
                                        <div>
                                            <div class="cir"></div>
                                            <span class="t">‏C1</span>
                                            <span>‏Advanced</span>
                                        </div>
                                    </label>
                                </div>
                            </li>
                            <li class="lev6">
                                <div class="lable-container">
                                    <input type="radio" name="level"  {{(old('level')=='lev6')?'checked':''}}  id="lev6" value="mastery">
                                    <label for="lev6">
                                        <div>
                                            <div class="cir"></div>
                                            <span class="t">‏C2</span>
                                            <span>‏Mastery</span>
                                        </div>
                                    </label>
                                </div>
                            </li>

                        </ul>
                    </div>

                    <div class="stat">
                        <ul style="text-align: center">

                            <li>
                                <div class="lable-container">
                                    <input type="text" readonly name="status" hidden>
                                    <input type="radio" {{(old('status')=='learning')?'checked':''}}  name="status" id="learning" value="learning">
                                    <label for="learning">
                                        <div>
                                            <span class="sq"><i class="icon-tick"></i></span>
                                            <span>زبان دوم</span>
                                        </div>
                                    </label>
                                </div>
                            </li>

                            <li>
                                <div class="lable-container">
                                    <input type="radio" {{(old('status')=='vernacular')?'checked':''}}  name="status" id="vernacular" value="vernacular">
                                    <label for="vernacular">
                                        <div>
                                            <span class="sq"><i class="icon-tick"></i></span>
                                            <span>‏زبان مادری</span>
                                        </div>
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    @if($languages->count()<=1)
                    <div class="button-container reight">
                        <input type="submit" class="bt" value="افزودن زبان">
                    </div>
                    @else
                      <h3 style="text-align: center">
                          در حال حاضر بیش از دو زبان برای تدریس نمیتوان انتخاب کرد
                      </h3>
                    @endif
                </div>

                </form>

            </div>
        </div>

    </div>
</div>



<div class="etebar-table shade">
    <div class="widget-title">
        <h3> زبان‌ها</h3>
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

                    <div class="table-responsive">

                        <table>
                            <thead>
                            <tr>
                                <th><span>ردیف</span></th>
                                <th><span>نام </span></th>
                                <th><span>تصویر</span></th>
                                <th><span>سطح</span></th>
                                <th><span>وضعیت</span></th>
                                <th><span>  حذف</span></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($languages as $lang)

                            <tr>
                                <td><span>{{$loop->iteration}}    </span></td>
                                <td><span>   {{$lang->name}} </span></td>
                                <td><span>    <img style="width: 50px; height: 50px; border-radius: 100%" src="{{asset('src/img/lang/'.$lang->img)}}" alt=""></span></td>
                                <td><span> {{__('arr.'.$lang->pivot->level)}}   </span></td>
                                <td><span> {{__('arr.'.$lang->pivot->status)}}   </span></td>

                                <td>

                                    <form action="{{route('teacher.delete.lang',$lang->id)}}" class="delete_user_note" method="post"  >
                                        @csrf
                                        @method('post')
                                        <div class="buttons pointer"  >
                                            <input type="submit" class="btd" value="حذف" >

                                            {{--                    <span class="sane">ﺗﺎﯾﯿﺪ و ﺛﺒﺖ</span>--}}
                                            {{--                    <span class="cancel">لغو</span>--}}
                                        </div>
                                    </form>
                                </td>
                            </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


    @endcomponent
