






@extends('master.home')
@section('main_body')





    <div id="maincontent" class="rows sfix">
        <div>





                <div class="profile-settings shade">



                    <ul class="tab-container">
                        <li class="active">

                            <div class="profile-setting">

                                <br>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-lg-6 col-md-10 col-sm-12 center-block">
                                        <div>
                                            <div class="profile-form">
                                                @if($errors->any())
                                              <div class="e_section" id="e_section">
                                                      {!! implode('', $errors->all('<span class="text text-danger">:message</span><br>')) !!}
                                              </div>
                                                @endif
                                                <form action="{{route('home.teacher.register')}}" method="post" >
                                                    @csrf
                                                    @method('post')

                                                    <div class="input-container fill">
                                                        <label for="">نام و نام خانوادگی</label>
                                                        <i class="icon-user"></i>
                                                        <input type="text" name="name" value="{{old('name')}}" >


                                                    </div>



                                                    <div class="input-container fill">
                                                        <label for="">ایمیل</label>
                                                        <input type="email" name="email" value="{{old('email')}}" >

                                                    </div>

                                                    <div class="input-container fill">
                                                        <label for="">شماره موبایل</label>
                                                        <input type="number" name="mobile" value="{{old('mobile')}}" >
                                                    </div>

                                                    <div class="sex">
                                                        <div class="label"> انتخاب جنسیت</div>
                                                        <ul style="text-align: center">
                                                            <li>
                                                                <div class="lable-container">
                                                                    <input type="radio" name="sex" {{(old('sex'))?'checked':''}} id="male" value="male">
                                                                    <label for="male">
                                                                        <div>
                                                                            <span>مرد</span>
                                                                            <i class="icon-male"></i>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="lable-container">
                                                                    <input type="radio" name="sex"  {{(old('sex'))?'checked':''}} id="female" value="female">
                                                                    <label for="female">
                                                                        <div>
                                                                            <span>زن</span>
                                                                            <i class="icon-female"></i>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>

{{--                                                    <label for="">کشور</label>--}}
{{--                                                    <input type="text" name="country" value="{{old('country')}}" >
republic of)">--}}
{{--                                            </div>      <div class="input-container fill">--}}


{{--                                                    <div class="input-container fill">--}}
{{--                                                        <label for="languages">زبان هایی که بلد هستید </label>--}}
{{--                                                        <select name="languages" id="languages">--}}
{{--                                                            @foreach($languages as $lang)--}}
{{--                                                                <option style="" value="{{$lang->id}}">{{$lang->name}}</option>--}}
{{--                                                            @endforeach--}}
{{--                                                        </select>--}}
{{--                                                    </div>--}}
                                                    <div class="input-container fill">
                                                        <label for="">کلمه   عبور</label>
                                                        <i class="icon-lock"></i>
                                                        <input type="text" name="password" value="{{old('password')}}" placeholder="‏">
                                                    </div>

                                                    <div class="input-container fill">
                                                        <label for="">تکرار کلمه عبور</label>
                                                        <i class="icon-lock"></i>
                                                        <input type="text" name="password_confirmation" value="{{old('password_confirmation')}}" placeholder="‏">
                                                    </div>
                                                        @if(!\Illuminate\Support\Facades\Auth::check())
                                                    <div class="button-container reight full">
                                                        <button class="butt">  ثبت</button>
                                                    </div>
                                                            @endif

                                                </form>

                                            </div>

{{--                                            <div class="account-setting">--}}



{{--                                                <div class="row">--}}


{{--                                                  --}}

{{--                                                    <div class="col-lg-12 col-md-12">--}}
{{--                                                        <div>--}}

{{--                                                            <form action="">--}}

{{--                                                                <div class="input-container fill">--}}
{{--                                                                    <label for="">کلمه عبور فعلی</label>--}}
{{--                                                                    <i class="icon-key"></i>--}}
{{--                                                                    <input type="text" placeholder="‏">--}}
{{--                                                                </div>--}}

{{--                                                            --}}

{{--                                                                <div class="button-container reight">--}}
{{--                                                                    <span class="butt">ذخیره تغییرات</span>--}}
{{--                                                                </div>--}}
{{--                                                            </form>--}}

{{--                                                        </div>--}}
{{--                                                    </div>--}}


{{--                                                </div>--}}
{{--                                            </div>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </li>

                    </ul>

                </div>

            </div>
        </div>


@endsection

