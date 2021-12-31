@component('home.student.content',['title'=>' تنظیمات  '])


<div id="teacherpish">

    @slot('bread')

        @include('home.student.profile.bread_left',['name'=>'حساب  کاربری'])

    @endslot




</div>

<div class="profile-settings shade">
    <div class="dot3">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <ul class="tab-nav" id="jtab">
        <li class="taby active"   ><span>پروفایل</span></li>
{{--        <li class="taby" ><span>رمز عبور</span></li>--}}
    </ul>




    <ul class="tab-container tabv">
        <li class="active tabv">

            <div class="profile-setting">


                <div class="profile-pic" style="margin:120px auto; margin-bottom:0;  ">
                    @if($user->attr('avatar'))
                        <img src="{{asset('src/avatar/'.$user->attr('avatar'))}}" alt="">
                    @else
                    <img class="pro" src="/src/avatar/avatar.png" alt="">
                        {{-- <img src="/src/avatar/{{($user->sex=='male')?'avatar_man.png':'avatar_woman.png'}}" alt=""> --}}
                    @endif

                    <form action="{{route('student.save.avatar',$user->id)}}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('post')
                        <div class="lable-container">
                            <input id="profile-file" name="avatar" class="cover-file " type="file" accept="image/*">
                            <label for="profile-file">
                                <i class="icon-info"></i>
                            </label>
                        </div>
                    </form>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-10 col-sm-12 center-block">
                        <div>
                            <div class="profile-form">
                                {{-- <p style="color: red; position:relative; bottom:30px; text-align:center">ابعاد عکس پروفایل باید برابر باشد</p> --}}



                                    @if($errors->any())
                                        <div class="e_section" id="e_section">
                                            {!! implode('', $errors->all('<span class="text text-danger">:message</span><br>')) !!}
                                        </div>
                                    @endif


                                    <form id="info" action="{{route('student.profile.save.info',$user->id)}}" class=" " method="post"  >
                                    @csrf
                                    @method('post')

                                    <div class="input-container fill">
                                        <label for="">نام  </label>
                                        <i class="icon-user"></i>
                                        <input name="name" type="text" value="{{old('name',$user->name)}}"   >
                                            @error('name')<div class="eerror">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="input-container fill">
                                        <label for="">  نام خانوادگی</label>
                                        {{-- <i class="icon-user"></i>--}}
                                        <input name="family" type="text" value="{{old('family',$user->family)}}" placeholder="   ">
                                        @error('family')<div class="eerror">{{ $message }}</div>@enderror
                                    </div>
                                    {{-- <div class="input-container fill">
                                        <label for="">نام کاربری</label>
                                        <input name="username" readonly type="text" value="{{old('username',$user->username)}}"  placeholder="‏cQXHR">
                                            @error('username')<div class="eerror">{{ $message }}</div>@enderror
                                    </div> --}}

                                    <div class="input-container fill">
                                        <label for="">ایمیل</label>
                                        <input name="email" type="email" value="{{old('email',$user->email)}}"  >
                                            @error('email')<div class="eerror">{{ $message }}</div>@enderror
                                    </div>

                                    <div class="input-container fill">
                                        <label for="">شماره موبایل</label>
                                        <input name="mobile" type="number" readonly value="{{old('mobile',$user->mobile)}}"   >
                                            @error('mobile')<div class="eerror">{{ $message }}</div>@enderror
                                    </div>

                                    <div class="sex">
                                        <div class="label"> انتخاب جنسیت</div>
                                        <ul style="text-align: center">
                                            <li>
                                                <div class="lable-container">
                                                    <input {{(old('sex',$user->sex)=='male')?'checked':''}} type="radio" name="sex" id="male" value="male">
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
                                                    <input  {{(old('sex',$user->sex)=='female')?'checked':''}}  type="radio" name="sex" id="female" value="female">
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

                                    {{-- <div class="input-container fill">
                                        <label for="">کشور</label>
                                        <input name="country" type="text" value="ایران" readonly placeholder="‏iran (islamic republic of)">
                                        @error('shaba')<div class="eerror">{{ $message }}</div>@enderror
                                    </div> --}}

{{--                                    <div class="input-container fill">--}}
{{--                                        <label for="">بیوگرافی </label>--}}
{{--                                        <textarea name="bio" id="" cols="30" rows="10" placeholder="‏. خود را به زبان آموزانی که بیوگرافی شما را مشاهده میکنند معرفی کنید	میتوانید مدارک صیلی، تجربیات و همچنین سبک، روش تدریس و سطح زبان مورد 	.آموزشتان را بنویسید"‏>{{old('sex',$user->bio)}}</textarea>--}}
{{--                                        @error('shaba')<div class="eerror">{{ $message }}</div>@enderror--}}
{{--                                    </div>--}}



                                    <div class="button-container reight full">
                                        <input type="submit" class="bt" value="ذخیره تغییرات">
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </li>


{{--        <li class="tabv">--}}



{{--            <div class="account-setting">--}}




{{--                <div class="row">--}}


{{--                    <div class="col-lg-6 col-md-12">--}}
{{--                        <div>--}}
{{--                            <img src="/home/images/authentication.png" alt="">--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="col-lg-6 col-md-12">--}}
{{--                        <div>--}}

{{--                            @if($errors->any())--}}
{{--                                <div class="e_section" id="e_section">--}}
{{--                                    {!! implode('', $errors->all('<span class="text text-danger">:message</span><br>')) !!}--}}
{{--                                </div>--}}
{{--                            @endif--}}

{{--                                <form id="repass" action="{{route('student.save.password',$user->id)}}" method="post">--}}
{{--                                @csrf--}}

{{--                                @method('post')--}}

{{--                                <div class="input-container fill">--}}
{{--                                    <label for="">کلمه عبور فعلی</label>--}}
{{--                                    <i class="icon-key"></i>--}}
{{--                                    {{dd($user->password)}}--}}
{{--                                    {{dd($user->password)}}--}}
{{--                                    <input type="text" value="{{\Illuminate\Support\Facades\Crypt::decryptString($user->password)}}" placeholder="‏">--}}
{{--                                </div>--}}

{{--                                <div class="input-container fill">--}}
{{--                                    <label for="">کلمه عبور جدید</label>--}}
{{--                                    <i class="icon-lock"></i>--}}
{{--                                    <input type="text" name="password" placeholder="‏">--}}
{{--                                </div>--}}

{{--                                <div class="input-container fill">--}}
{{--                                    <label for="">تکرار کلمه عبور</label>--}}
{{--                                    <i class="icon-lock"></i>--}}
{{--                                    <input type="text" name="password_confirmation" placeholder="‏">--}}
{{--                                </div>--}}

{{--                                <div class="button-container reight">--}}
{{--                                    <span  onclick="document.getElementById('repass').submit()" class="butt">ذخیره تغییرات</span>--}}
{{--                                </div>--}}
{{--                            </form>--}}

{{--                        </div>--}}
{{--                    </div>--}}


{{--                </div>--}}
{{--            </div>--}}

{{--        </li>--}}

    </ul>

</div>


    @endcomponent
