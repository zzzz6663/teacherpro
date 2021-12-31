@component('home.teacher.content',['title'=>' تنظیمات '])


<div id="teacherpish">

    @slot('bread')

    @include('home.teacher.profile.bread_left',['name'=>'حساب کاربری'])

    @endslot




</div>

<div class="profile-settings shade">
    <div class="dot3">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <ul class="tab-nav" id="jtab">
        <li class="taby active"><span>

                پروفایل</span></li>
        <li class="taby"><span>حوضه تخصص</span></li>
        <li class="taby"><span>رزومه</span></li>
        <li class="taby"><span>آپلود ویدیو</span></li>
        <li class="taby"><span> شماره حساب</span></li>
        {{-- <li class="taby" ><span>رمز عبور</span></li>--}}
    </ul>


    @if($errors->any())
    <div class="e_section" id="e_section">
        {!! implode('', $errors->all('<span class="text text-danger">:message</span><br>')) !!}
    </div>
    @endif
    <ul class="tab-container tabv">
        <li class="active tabv">

            <div class="profile-setting">
                <p style="color: red">
                    تغییرات در این قسمت بعد از تایید ادمین لحاظ میشود و تا تایید ادمین شما از لیست اساتید حذف میشوید
                </p>
                <div class="cover">
                    {{-- {{dd(public_path('/src/bg/'.$user->attr('bg')))}}--}}
                    @if(file_exists(public_path('/src/bg/'.$user->attr('bg'))) && !empty($user->attr('bg')))
                    <img src="{{asset('/src/bg/'.$user->attr('bg'))}}" alt="">
                    {{-- <img src="/home/images/cover.png" alt="">--}}
                    @else
                    <img src="/home/images/cover.png" alt="">
                    @endif
                    <form action="{{route('teacher.save.bg',$user->id)}}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('post')
                        <div class="lable-container">
                            <input id="cover-file" type="file">
                            <input id="profile-files" name="bg" class="avat2" type="file" accept="image/*">
                            <label for="cover-file">
                                <i class="icon-info"></i>
                                <span>کاورپروفایل</span>
                            </label>
                        </div>
                    </form>

                </div>
                <div class="profile-pic">
                    @if(auth()->user()->attr('avatar'))
                    <img src="{{asset('src/avatar/'.$user->attr('avatar'))}}" alt="">

                    @else
                    <img class="pro" src="/src/avatar/avatar.png" alt="">

                    {{-- <img src="/src/avatar/{{($user->sex=='male')?'avatar_man.png':'avatar_woman.png'}}" alt=""> --}}
                    @endif

                    <form action="{{route('teacher.save.avatar',$user->id)}}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('post')
                        <div class="lable-container">
                            <input id="profile-file" name="avatar" class=" cover-file" type="file" accept="image/*">
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




                                <form id="info" action="{{route('teacher.profile.save.info',$user->id)}}" class=" " method="post">
                                    @csrf
                                    @method('post')

                                    <div class="input-container fill">
                                        <label for="">نام </label>
                                        {{-- <i class="icon-user"></i>--}}
                                        <input name="name" type="text" value="{{old('name',$user->name)}}" placeholder="   ">
                                        @error('name')<div class="eerror">{{ $message }}</div>@enderror
                                    </div>


                                    <div class="input-container fill">
                                        <label for="">  نام خانوادگی</label>
                                        {{-- <i class="icon-user"></i>--}}
                                        <input name="family" type="text" value="{{old('family',$user->family)}}" placeholder="   ">
                                        @error('family')<div class="eerror">{{ $message }}</div>@enderror
                                    </div>
                                    {{-- <div class="input-container fill">--}}
                                    {{-- <label for="">نام کاربری</label>--}}
                                    {{-- <input name="username" type="text" readonly value="{{old('username',$user->username)}}" placeholder=" ">--}}
                                    {{-- @error('username')<div class="eerror">{{ $message }}
                            </div>@enderror--}}
                            {{-- </div>--}}

                            <div class="input-container fill">
                                <label for="">ایمیل</label>
                                <input name="email" type="email" value="{{old('email',$user->email)}}" placeholder="  ">
                                @error('email')<div class="eerror">{{ $message }}</div>@enderror

                            </div>

                            <div class="input-container fill">
                                <label for="">شماره موبایل</label>
                                <input name="mobile" type="number" value="{{old('mobile',$user->mobile)}}" placeholder=" ">
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
                                            <input {{(old('sex',$user->sex)=='female')?'checked':''}} type="radio" name="sex" id="female" value="female">
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

                            <div class="input-container fill">
                                <label for="">کشور</label>
                                <input name="country" type="text" value="{{old('country',$user->country)}}" placeholder=" ایران">
                                @error('country')<div class="eerror">{{ $message }}</div>@enderror
                            </div>

                            <div class="input-container fill">
                                <label for="">بیوگرافی </label>
                                <textarea name="bio" id="" cols="30" rows="10" placeholder="  خود را به زبان آموزانی که بیوگرافی شما را مشاهده میکنند معرفی کنید	  ">{{old('bio',$user->bio)}}</textarea>
                                @error('bio')<div class="eerror">{{ $message }}</div>@enderror
                            </div>



                            <div class="button-container  reight full">
                                <input type="submit" class="bt fln" value="ذخیره تغییرات">
                            </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
</div>


</li>
<li class=" tabv">

    <div class="expert-form">


        <form action="{{route('teacher.save.expert',$user->id)}}" method="post" id="teacher_ab_form">
            @csrf
            @method('post')

            <div class="expert-section">
                <h4>سطوح تدریس</h4>
                <div class="forsm">
                    <div class="ra row">

                        <div class="col-lg-4 col-md-12">
                            <div>
                                <div class="lable-container" style="line-height: 50px">
                                    <input type="text" hidden value="0" name="Starter">
                                    <input type="checkbox" {{($user->attr('Starter'))?'checked':''}} id="Starter" name="Starter">
                                    <label class="key" for="Starter">

                                        <div class="right">
                                            <span> Starter</span>
                                        </div>
                                        <div class="left">
                                            <div class="toggle">
                                                <span></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div>
                                <div class="lable-container" style="line-height: 50px">
                                    <input type="text" hidden value="0" name="Elementary">
                                    <input type="checkbox" {{($user->attr('Elementary'))?'checked':''}} id="Elementary" name="Elementary">
                                    <label class="key" for="Elementary">

                                        <div class="right">
                                            <span> Elementary</span>
                                        </div>
                                        <div class="left">
                                            <div class="toggle">
                                                <span></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div>
                                <div class="lable-container" style="line-height: 50px">
                                    <input type="text" hidden value="0" name="Intermediate">
                                    <input type="checkbox" {{($user->attr('Intermediate'))?'checked':''}} id="Intermediate" name="Intermediate">
                                    <label class="key" for="Intermediate">

                                        <div class="right">
                                            <span> Intermediate</span>
                                        </div>
                                        <div class="left">
                                            <div class="toggle">
                                                <span></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div>
                                <div class="lable-container" style="line-height: 50px">
                                    <input type="text" hidden value="0" name="Upper_intermediate">
                                    <input type="checkbox" {{($user->attr('Upper_intermediate'))?'checked':''}} id="Upper_intermediate" name="Upper_intermediate">
                                    <label class="key" for="Upper_intermediate">

                                        <div class="right">
                                            <span> Upper intermediate</span>
                                        </div>
                                        <div class="left">
                                            <div class="toggle">
                                                <span></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div>
                                <div class="lable-container" style="line-height: 50px">
                                    <input type="text" hidden value="0" name="Advanced">
                                    <input type="checkbox" {{($user->attr('Advanced'))?'checked':''}} id="Advanced" name="Advanced">
                                    <label class="key" for="Advanced">

                                        <div class="right">
                                            <span> Advanced</span>
                                        </div>
                                        <div class="left">
                                            <div class="toggle">
                                                <span></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div>
                                <div class="lable-container" style="line-height: 50px">
                                    <input type="text" hidden value="0" name="Mastery">
                                    <input type="checkbox" {{($user->attr('Mastery'))?'checked':''}} id="Mastery" name="Mastery">
                                    <label class="key" for="Mastery">

                                        <div class="right">
                                            <span> Mastery</span>
                                        </div>
                                        <div class="left">
                                            <div class="toggle">
                                                <span></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>



            <div class="expert-section">
                <h4>لهجه مدرس</h4>
                <div class="forsm">
                    <div class="ra row">
                        <div class="col-lg-4 col-md-12">
                            <div>
                                <div class="lable-container" style="line-height: 50px">
                                    <input type="text" hidden value="0" name="American_Accent">
                                    <input type="checkbox" {{($user->attr('American_Accent'))?'checked':''}} id="American_Accent" name="American_Accent">
                                    <label class="key" for="American_Accent">

                                        <div class="right">
                                            <span> American Accent</span>
                                        </div>
                                        <div class="left">
                                            <div class="toggle">
                                                <span></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div>
                                <div class="lable-container" style="line-height: 50px">
                                    <input type="text" hidden value="0" name="British_Accent">
                                    <input type="checkbox" {{($user->attr('British_Accent'))?'checked':''}} id="British_Accent" name="British_Accent">
                                    <label class="key" for="British_Accent">

                                        <div class="right">
                                            <span> British Accent</span>
                                        </div>
                                        <div class="left">
                                            <div class="toggle">
                                                <span></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div>
                                <div class="lable-container" style="line-height: 50px">
                                    <input type="text" hidden value="0" name="Australian_Accent">
                                    <input type="checkbox" {{($user->attr('Australian_Accent'))?'checked':''}} id="Australian_Accent" name="Australian_Accent">
                                    <label class="key" for="Australian_Accent">

                                        <div class="right">
                                            <span> Australian Accent</span>
                                        </div>
                                        <div class="left">
                                            <div class="toggle">
                                                <span></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div>
                                <div class="lable-container" style="line-height: 50px">
                                    <input type="text" hidden value="0" name="Indian_Accent">
                                    <input type="checkbox" {{($user->attr('Indian_Accent'))?'checked':''}} id="Indian_Accent" name="Indian_Accent">
                                    <label class="key" for="Indian_Accent">

                                        <div class="right">
                                            <span> Indian Accent</span>
                                        </div>
                                        <div class="left">
                                            <div class="toggle">
                                                <span></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div>
                                <div class="lable-container" style="line-height: 50px">
                                    <input type="text" hidden value="0" name="Irish_Accent">
                                    <input type="checkbox" {{($user->attr('Irish_Accent'))?'checked':''}} id="Irish_Accent" name="Irish_Accent">
                                    <label class="key" for="Irish_Accent">

                                        <div class="right">
                                            <span> Irish Accent</span>
                                        </div>
                                        <div class="left">
                                            <div class="toggle">
                                                <span></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div>
                                <div class="lable-container" style="line-height: 50px">
                                    <input type="text" hidden value="0" name="Scottish_Accent">
                                    <input type="checkbox" {{($user->attr('Scottish_Accent'))?'checked':''}} id="Scottish_Accent" name="Scottish_Accent">
                                    <label class="key" for="Scottish_Accent">

                                        <div class="right">
                                            <span> Scottish Accent</span>
                                        </div>
                                        <div class="left">
                                            <div class="toggle">
                                                <span></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div>
                                <div class="lable-container" style="line-height: 50px">
                                    <input type="text" hidden value="0" name="South_African_Accent">
                                    <input type="checkbox" {{($user->attr('South_African_Accent'))?'checked':''}} id="South_African_Accent" name="South_African_Accent">
                                    <label class="key" for="South_African_Accent">

                                        <div class="right">
                                            <span> South African Accent</span>
                                        </div>
                                        <div class="left">
                                            <div class="toggle">
                                                <span></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="expert-section">
                <h4>سن</h4>
                <div class="forsm">
                    <div class="ra row">
                        <div class="col-lg-4 col-md-12">
                            <div>
                                <div class="lable-container" style="line-height: 50px">
                                    <input type="text" hidden value="0" name="Children_">
                                    <input type="checkbox" {{($user->attr('Children'))?'checked':''}} id="Children_(4-11)" name="Children">
                                    <label class="key" for="Children_(4-11)">

                                        <div class="right">
                                            <span> Children (4-11)</span>
                                        </div>
                                        <div class="left">
                                            <div class="toggle">
                                                <span></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div>
                                <div class="lable-container" style="line-height: 50px">
                                    <input type="text" hidden value="0" name="Teenagers_">
                                    <input type="checkbox" {{($user->attr('Teenagers'))?'checked':''}} id="Teenagers_(12-18)" name="Teenagers">
                                    <label class="key" for="Teenagers_(12-18)">

                                        <div class="right">
                                            <span> Teenagers (12-18)</span>
                                        </div>
                                        <div class="left">
                                            <div class="toggle">
                                                <span></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div>
                                <div class="lable-container" style="line-height: 50px">
                                    <input type="text" hidden value="0" name="Adults_">
                                    <input type="checkbox" {{($user->attr('Adults'))?'checked':''}} id="Adults_(18+)" name="Adults">
                                    <label class="key" for="Adults_(18+)">

                                        <div class="right">
                                            <span> Adults (18+)</span>
                                        </div>
                                        <div class="left">
                                            <div class="toggle">
                                                <span></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="expert-section">
                <h4>کلاس شامل چه مواردی میشود</h4>
                <div class="forsm">
                    <div class="ra row">
                        <div class="col-lg-4 col-md-12">
                            <div>
                                <div class="lable-container" style="line-height: 50px">
                                    <input type="text" hidden value="0" name="Curriculum">
                                    <input type="checkbox" {{($user->attr('Curriculum'))?'checked':''}} id="Curriculum" name="Curriculum">
                                    <label class="key" for="Curriculum">

                                        <div class="right">
                                            <span> Curriculum</span>
                                        </div>
                                        <div class="left">
                                            <div class="toggle">
                                                <span></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div>
                                <div class="lable-container" style="line-height: 50px">
                                    <input type="text" hidden value="0" name="Homework">
                                    <input type="checkbox" {{($user->attr('Homework'))?'checked':''}} id="Homework" name="Homework">
                                    <label class="key" for="Homework">

                                        <div class="right">
                                            <span> Homework</span>
                                        </div>
                                        <div class="left">
                                            <div class="toggle">
                                                <span></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div>
                                <div class="lable-container" style="line-height: 50px">
                                    <input type="text" hidden value="0" name="Learning_Materials">
                                    <input type="checkbox" {{($user->attr('Learning_Materials'))?'checked':''}} id="Learning_Materials" name="Learning_Materials">
                                    <label class="key" for="Learning_Materials">

                                        <div class="right">
                                            <span> Learning Materials</span>
                                        </div>
                                        <div class="left">
                                            <div class="toggle">
                                                <span></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div>
                                <div class="lable-container" style="line-height: 50px">
                                    <input type="text" hidden value="0" name="Writing_Exercises">
                                    <input type="checkbox" {{($user->attr('Writing_Exercises'))?'checked':''}} id="Writing_Exercises" name="Writing_Exercises">
                                    <label class="key" for="Writing_Exercises">

                                        <div class="right">
                                            <span> Writing Exercises</span>
                                        </div>
                                        <div class="left">
                                            <div class="toggle">
                                                <span></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div>
                                <div class="lable-container" style="line-height: 50px">
                                    <input type="text" hidden value="0" name="Lesson_Plans">
                                    <input type="checkbox" {{($user->attr('Lesson_Plans'))?'checked':''}} id="Lesson_Plans" name="Lesson_Plans">
                                    <label class="key" for="Lesson_Plans">

                                        <div class="right">
                                            <span> Lesson Plans</span>
                                        </div>
                                        <div class="left">
                                            <div class="toggle">
                                                <span></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div>
                                <div class="lable-container" style="line-height: 50px">
                                    <input type="text" hidden value="0" name="Proficiency_Assessment">
                                    <input type="checkbox" {{($user->attr('Proficiency_Assessment'))?'checked':''}} id="Proficiency_Assessment" name="Proficiency_Assessment">
                                    <label class="key" for="Proficiency_Assessment">

                                        <div class="right">
                                            <span> Proficiency Assessment</span>
                                        </div>
                                        <div class="left">
                                            <div class="toggle">
                                                <span></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div>
                                <div class="lable-container" style="line-height: 50px">
                                    <input type="text" hidden value="0" name="Quizzes">
                                    <input type="checkbox" {{($user->attr('Quizzes'))?'checked':''}} id="Quizzes" name="Quizzes">
                                    <label class="key" for="Quizzes">

                                        <div class="right">
                                            <span> Quizzes </span>
                                        </div>
                                        <div class="left">
                                            <div class="toggle">
                                                <span></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div>
                                <div class="lable-container" style="line-height: 50px">
                                    <input type="text" hidden value="0" name="Tests">
                                    <input type="checkbox" {{($user->attr('Tests'))?'checked':''}} id="Tests" name="Tests">
                                    <label class="key" for="Tests">

                                        <div class="right">
                                            <span>   Tests</span>
                                        </div>
                                        <div class="left">
                                            <div class="toggle">
                                                <span></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div>
                                <div class="lable-container" style="line-height: 50px">
                                    <input type="text" hidden value="0" name="Reading_Exercises">
                                    <input type="checkbox" {{($user->attr('Reading_Exercises'))?'checked':''}} id="Reading_Exercises" name="Reading_Exercises">
                                    <label class="key" for="Reading_Exercises">

                                        <div class="right">
                                            <span> Reading Exercises</span>
                                        </div>
                                        <div class="left">
                                            <div class="toggle">
                                                <span></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="expert-section">
                <h4>موضوعات</h4>
                <div class="forsm">
                    <div class="ra row">
                        <div class="col-lg-4 col-md-12">
                            <div>
                                <div class="lable-container" style="line-height: 50px">
                                    <input type="text" hidden value="0" name="Business_English">
                                    <input type="checkbox" {{($user->attr('Business_English'))?'checked':''}} id="Business_English" name="Business_English">
                                    <label class="key" for="Business_English">

                                        <div class="right">
                                            <span> Business English</span>
                                        </div>
                                        <div class="left">
                                            <div class="toggle">
                                                <span></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div>
                                <div class="lable-container" style="line-height: 50px">
                                    <input type="text" hidden value="0" name="Interview_Preparation">
                                    <input type="checkbox" {{($user->attr('Interview_Preparation'))?'checked':''}} id="Interview_Preparation" name="Interview_Preparation">
                                    <label class="key" for="Interview_Preparation">

                                        <div class="right">
                                            <span> Interview Preparation</span>
                                        </div>
                                        <div class="left">
                                            <div class="toggle">
                                                <span></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div>
                                <div class="lable-container" style="line-height: 50px">
                                    <input type="text" hidden value="0" name="Reading_Comprehension">
                                    <input type="checkbox" {{($user->attr('Reading_Comprehension'))?'checked':''}} id="Reading_Comprehension" name="Reading_Comprehension">
                                    <label class="key" for="Reading_Comprehension">

                                        <div class="right">
                                            <span> Reading Comprehension</span>
                                        </div>
                                        <div class="left">
                                            <div class="toggle">
                                                <span></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div>
                                <div class="lable-container" style="line-height: 50px">
                                    <input type="text" hidden value="0" name="Listening_Comprehension">
                                    <input type="checkbox" {{($user->attr('Listening_Comprehension'))?'checked':''}} id="Listening_Comprehension" name="Listening_Comprehension">
                                    <label class="key" for="Listening_Comprehension">

                                        <div class="right">
                                            <span> Listening Comprehension</span>
                                        </div>
                                        <div class="left">
                                            <div class="toggle">
                                                <span></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div>
                                <div class="lable-container" style="line-height: 50px">
                                    <input type="text" hidden value="0" name="Speaking_Practice">
                                    <input type="checkbox" {{($user->attr('Speaking_Practice'))?'checked':''}} id="Speaking_Practice" name="Speaking_Practice">
                                    <label class="key" for="Speaking_Practice">

                                        <div class="right">
                                            <span> Speaking Practice</span>
                                        </div>
                                        <div class="left">
                                            <div class="toggle">
                                                <span></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div>
                                <div class="lable-container" style="line-height: 50px">
                                    <input type="text" hidden value="0" name="Writing_Correction">
                                    <input type="checkbox" {{($user->attr('Writing_Correction'))?'checked':''}} id="Writing_Correction" name="Writing_Correction">
                                    <label class="key" for="Writing_Correction">

                                        <div class="right">
                                            <span> Writing Correction</span>
                                        </div>
                                        <div class="left">
                                            <div class="toggle">
                                                <span></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div>
                                <div class="lable-container" style="line-height: 50px">
                                    <input type="text" hidden value="0" name="Vocabulary_Development">
                                    <input type="checkbox" {{($user->attr('Vocabulary_Development'))?'checked':''}} id="Vocabulary_Development" name="Vocabulary_Development">
                                    <label class="key" for="Vocabulary_Development">

                                        <div class="right">
                                            <span> Vocabulary Development</span>
                                        </div>
                                        <div class="left">
                                            <div class="toggle">
                                                <span></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div>
                                <div class="lable-container" style="line-height: 50px">
                                    <input type="text" hidden value="0" name="Grammar_Development">
                                    <input type="checkbox" {{($user->attr('Grammar_Development'))?'checked':''}} id="Grammar_Development" name="Grammar_Development">
                                    <label class="key" for="Grammar_Development">

                                        <div class="right">
                                            <span> Grammar Development</span>
                                        </div>
                                        <div class="left">
                                            <div class="toggle">
                                                <span></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div>
                                <div class="lable-container" style="line-height: 50px">
                                    <input type="text" hidden value="0" name="Academic_English">
                                    <input type="checkbox" {{($user->attr('Academic_English'))?'checked':''}} id="Academic_English" name="Academic_English">
                                    <label class="key" for="Academic_English">

                                        <div class="right">
                                            <span> Academic English</span>
                                        </div>
                                        <div class="left">
                                            <div class="toggle">
                                                <span></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div>
                                <div class="lable-container" style="line-height: 50px">
                                    <input type="text" hidden value="0" name="Accent_Reduction">
                                    <input type="checkbox" {{($user->attr('Accent_Reduction'))?'checked':''}} id="Accent_Reduction" name="Accent_Reduction">
                                    <label class="key" for="Accent_Reduction">

                                        <div class="right">
                                            <span> Accent Reduction</span>
                                        </div>
                                        <div class="left">
                                            <div class="toggle">
                                                <span></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div>
                                <div class="lable-container" style="line-height: 50px">
                                    <input type="text" hidden value="0" name="Phonetics">
                                    <input type="checkbox" {{($user->attr('Phonetics'))?'checked':''}} id="Phonetics" name="Phonetics">
                                    <label class="key" for="Phonetics">

                                        <div class="right">
                                            <span> Phonetics</span>
                                        </div>
                                        <div class="left">
                                            <div class="toggle">
                                                <span></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div>
                                <div class="lable-container" style="line-height: 50px">
                                    <input type="text" hidden value="0" name="Colloquial_English">
                                    <input type="checkbox" {{($user->attr('Colloquial_English'))?'checked':''}} id="Colloquial_English" name="Colloquial_English">
                                    <label class="key" for="Colloquial_English">

                                        <div class="right">
                                            <span> Colloquial English</span>
                                        </div>
                                        <div class="left">
                                            <div class="toggle">
                                                <span></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div>
                                <div class="lable-container" style="line-height: 50px">
                                    <input type="text" hidden value="0" name="Phonetics">
                                    <input type="checkbox" {{($user->attr('Phonetics'))?'checked':''}} id="Phonetics" name="Phonetics">
                                    <label class="key" for="Phonetics">

                                        <div class="right">
                                            <span> Phonetics</span>
                                        </div>
                                        <div class="left">
                                            <div class="toggle">
                                                <span></span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>






            <div class="expert-section">
                <h4>آمادگی برای آزمون</h4>
                <div class="forsm">
                    <div class="ra ">
                        <br>
                        <br>
                        <h3>انگلیسی:</h3>

                        <div class="row">


                            <div class="col-lg-4 col-md-12">
                                <div>
                                    <div class="lable-container" style="line-height: 50px">
                                        <input type="text" hidden value="0" name="TOEFL">
                                        <input type="checkbox" {{($user->attr('TOEFL'))?'checked':''}} id="TOEFL" name="TOEFL">
                                        <label class="key" for="TOEFL">

                                            <div class="right">
                                                <span> TOEFL</span>
                                            </div>
                                            <div class="left">
                                                <div class="toggle">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12">
                                <div>
                                    <div class="lable-container" style="line-height: 50px">
                                        <input type="text" hidden value="0" name="IELTS">
                                        <input type="checkbox" {{($user->attr('IELTS'))?'checked':''}} id="IELTS" name="IELTS">
                                        <label class="key" for="IELTS">

                                            <div class="right">
                                                <span> IELTS</span>
                                            </div>
                                            <div class="left">
                                                <div class="toggle">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12">
                                <div>
                                    <div class="lable-container" style="line-height: 50px">
                                        <input type="text" hidden value="0" name="PTE">
                                        <input type="checkbox" {{($user->attr('PTE'))?'checked':''}} id="PTE" name="PTE">
                                        <label class="key" for="PTE">

                                            <div class="right">
                                                <span> PTE</span>
                                            </div>
                                            <div class="left">
                                                <div class="toggle">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12">
                                <div>
                                    <div class="lable-container" style="line-height: 50px">
                                        <input type="text" hidden value="0" name="GRE">
                                        <input type="checkbox" {{($user->attr('GRE'))?'checked':''}} id="GRE" name="GRE">
                                        <label class="key" for="GRE">

                                            <div class="right">
                                                <span> GRE</span>
                                            </div>
                                            <div class="left">
                                                <div class="toggle">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12">
                                <div>
                                    <div class="lable-container" style="line-height: 50px">
                                        <input type="text" hidden value="0" name="CELPIP">
                                        <input type="checkbox" {{($user->attr('CELPIP'))?'checked':''}} id="CELPIP" name="CELPIP">
                                        <label class="key" for="CELPIP">

                                            <div class="right">
                                                <span> CELPIP</span>
                                            </div>
                                            <div class="left">
                                                <div class="toggle">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12">
                                <div>
                                    <div class="lable-container" style="line-height: 50px">
                                        <input type="text" hidden value="0" name="Duolingo">
                                        <input type="checkbox" {{($user->attr('Duolingo'))?'checked':''}} id="Duolingo" name="Duolingo">
                                        <label class="key" for="Duolingo">

                                            <div class="right">
                                                <span> Duolingo</span>
                                            </div>
                                            <div class="left">
                                                <div class="toggle">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12">
                                <div>
                                    <div class="lable-container" style="line-height: 50px">
                                        <input type="text" hidden value="0" name="TOEIC">
                                        <input type="checkbox" {{($user->attr('TOEIC'))?'checked':''}} id="TOEIC" name="TOEIC">
                                        <label class="key" for="TOEIC">

                                            <div class="right">
                                                <span> TOEIC</span>
                                            </div>
                                            <div class="left">
                                                <div class="toggle">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12">
                                <div>
                                    <div class="lable-container" style="line-height: 50px">
                                        <input type="text" hidden value="0" name="KET">
                                        <input type="checkbox" {{($user->attr('KET'))?'checked':''}} id="KET" name="KET">
                                        <label class="key" for="KET">

                                            <div class="right">
                                                <span> KET</span>
                                            </div>
                                            <div class="left">
                                                <div class="toggle">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12">
                                <div>
                                    <div class="lable-container" style="line-height: 50px">
                                        <input type="text" hidden value="0" name="PET">
                                        <input type="checkbox" {{($user->attr('PET'))?'checked':''}} id="PET" name="PET">
                                        <label class="key" for="PET">

                                            <div class="right">
                                                <span> PET</span>
                                            </div>
                                            <div class="left">
                                                <div class="toggle">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12">
                                <div>
                                    <div class="lable-container" style="line-height: 50px">
                                        <input type="text" hidden value="0" name="CAE">
                                        <input type="checkbox" {{($user->attr('CAE'))?'checked':''}} id="CAE" name="CAE">
                                        <label class="key" for="CAE">

                                            <div class="right">
                                                <span> CAE</span>
                                            </div>
                                            <div class="left">
                                                <div class="toggle">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12">
                                <div>
                                    <div class="lable-container" style="line-height: 50px">
                                        <input type="text" hidden value="0" name="FCE">
                                        <input type="checkbox" {{($user->attr('FCE'))?'checked':''}} id="FCE" name="FCE">
                                        <label class="key" for="FCE">

                                            <div class="right">
                                                <span> FCE</span>
                                            </div>
                                            <div class="left">
                                                <div class="toggle">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12">
                                <div>
                                    <div class="lable-container" style="line-height: 50px">
                                        <input type="text" hidden value="0" name="CPE">
                                        <input type="checkbox" {{($user->attr('CPE'))?'checked':''}} id="CPE" name="CPE">
                                        <label class="key" for="CPE">

                                            <div class="right">
                                                <span> CPE</span>
                                            </div>
                                            <div class="left">
                                                <div class="toggle">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12">
                                <div>
                                    <div class="lable-container" style="line-height: 50px">
                                        <input type="text" hidden value="0" name="BEC">
                                        <input type="checkbox" {{($user->attr('BEC'))?'checked':''}} id="BEC" name="BEC">
                                        <label class="key" for="BEC">

                                            <div class="right">
                                                <span> BEC</span>
                                            </div>
                                            <div class="left">
                                                <div class="toggle">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12">
                                <div>
                                    <div class="lable-container" style="line-height: 50px">
                                        <input type="text" hidden value="0" name="TOEFLPhD">
                                        <input type="checkbox" {{($user->attr('TOEFLPhD'))?'checked':''}} id="TOEFLPhD" name="TOEFLPhD">

                                        {{-- <input type="checkbox" {{r($user->att(''checkedتافل_دکت)?:'ری')}} id="تافل_دکتری" name="تافل_دکتری">--}}
                                        <label class="key" for="TOEFLPhD">

                                            <div class="right">
                                                <span> TOEFL PhD</span>
                                            </div>
                                            <div class="left">
                                                <div class="toggle">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <br>
                        </div>
                        <div class="clr"></div>
                        <h3>فرانسه:</h3>

                        <div class="row">
                            <div class="col-lg-4 col-md-12">
                                <div>
                                    <div class="lable-container" style="line-height: 50px">
                                        <input type="text" hidden value="0" name="TCF">
                                        <input type="checkbox" {{($user->attr('TCF'))?'checked':''}} id="TCF" name="TCF">
                                        <label class="key" for="TCF">

                                            <div class="right">
                                                <span> TCF</span>
                                            </div>
                                            <div class="left">
                                                <div class="toggle">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12">
                                <div>
                                    <div class="lable-container" style="line-height: 50px">
                                        <input type="text" hidden value="0" name="TEF">
                                        <input type="checkbox" {{($user->attr('TEF'))?'checked':''}} id="TEF" name="TEF">
                                        <label class="key" for="TEF">

                                            <div class="right">
                                                <span> TEF</span>
                                            </div>
                                            <div class="left">
                                                <div class="toggle">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12">
                                <div>
                                    <div class="lable-container" style="line-height: 50px">
                                        <input type="text" hidden value="0" name="DELF">
                                        <input type="checkbox" {{($user->attr('DELF'))?'checked':''}} id="DELF" name="DELF">
                                        <label class="key" for="DELF">

                                            <div class="right">
                                                <span> DELF</span>
                                            </div>
                                            <div class="left">
                                                <div class="toggle">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12">
                                <div>
                                    <div class="lable-container" style="line-height: 50px">
                                        <input type="text" hidden value="0" name="DALF">
                                        <input type="checkbox" {{($user->attr('DALF'))?'checked':''}} id="DALF" name="DALF">
                                        <label class="key" for="DALF">

                                            <div class="right">
                                                <span> DALF</span>
                                            </div>
                                            <div class="left">
                                                <div class="toggle">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <br>
                        </div>
                        <div class="clr"></div>

                        <h3>آلمانی:</h3>

                        <div class="row">
                            <div class="col-lg-4 col-md-12">
                                <div>
                                    <div class="lable-container" style="line-height: 50px">
                                        <input type="text" hidden value="0" name="Goethe">
                                        <input type="checkbox" {{($user->attr('Goethe'))?'checked':''}} id="Goethe" name="Goethe">
                                        <label class="key" for="Goethe">

                                            <div class="right">
                                                <span> Goethe</span>
                                            </div>
                                            <div class="left">
                                                <div class="toggle">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12">
                                <div>
                                    <div class="lable-container" style="line-height: 50px">
                                        <input type="text" hidden value="0" name="Telc">
                                        <input type="checkbox" {{($user->attr('Telc'))?'checked':''}} id="Telc" name="Telc">
                                        <label class="key" for="Telc">

                                            <div class="right">
                                                <span> Telc</span>
                                            </div>
                                            <div class="left">
                                                <div class="toggle">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12">
                                <div>
                                    <div class="lable-container" style="line-height: 50px">
                                        <input type="text" hidden value="0" name="Test_Daf">
                                        <input type="checkbox" {{($user->attr('Test_Daf'))?'checked':''}} id="Test_Daf" name="Test_Daf">
                                        <label class="key" for="Test_Daf">

                                            <div class="right">
                                                <span> Test Daf</span>
                                            </div>
                                            <div class="left">
                                                <div class="toggle">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12">
                                <div>
                                    <div class="lable-container" style="line-height: 50px">
                                        <input type="text" hidden value="0" name="OSD">
                                        <input type="checkbox" {{($user->attr('OSD'))?'checked':''}} id="OSD" name="OSD">
                                        <label class="key" for="OSD">

                                            <div class="right">
                                                <span> OSD</span>
                                            </div>
                                            <div class="left">
                                                <div class="toggle">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <br>
                        </div>
                        <div class="clr"></div>

                        <h3>ترکی استانبولی:</h3>

                        <div class="row">
                            <div class="col-lg-4 col-md-12">
                                <div>
                                    <div class="lable-container" style="line-height: 50px">
                                        <input type="text" hidden value="0" name="TOMER">
                                        <input type="checkbox" {{($user->attr('TOMER'))?'checked':''}} id="TOMER" name="TOMER">
                                        <label class="key" for="TOMER">

                                            <div class="right">
                                                <span> TOMER</span>
                                            </div>
                                            <div class="left">
                                                <div class="toggle">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12">
                                <div>
                                    <div class="lable-container" style="line-height: 50px">
                                        <input type="text" hidden value="0" name="TYS">
                                        <input type="checkbox" {{($user->attr('TYS'))?'checked':''}} id="TYS" name="TYS">
                                        <label class="key" for="TYS">

                                            <div class="right">
                                                <span> TYS</span>
                                            </div>
                                            <div class="left">
                                                <div class="toggle">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <br>
                        </div>
                        <div class="clr"></div>

                        <h3>اسپانیایی:</h3>

                        <div class="row">
                            <div class="col-lg-4 col-md-12">
                                <div>
                                    <div class="lable-container" style="line-height: 50px">
                                        <input type="text" hidden value="0" name="DELE">
                                        <input type="checkbox" {{($user->attr('DELE'))?'checked':''}} id="DELE" name="DELE">
                                        <label class="key" for="DELE">

                                            <div class="right">
                                                <span> DELE</span>
                                            </div>
                                            <div class="left">
                                                <div class="toggle">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12">
                                <div>
                                    <div class="lable-container" style="line-height: 50px">
                                        <input type="text" hidden value="0" name="SIELE">
                                        <input type="checkbox" {{($user->attr('SIELE'))?'checked':''}} id="SIELE" name="SIELE">
                                        <label class="key" for="SIELE">

                                            <div class="right">
                                                <span> SIELE</span>
                                            </div>
                                            <div class="left">
                                                <div class="toggle">
                                                    <span></span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <br>
                        </div>



                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <div class="button-container reight">
                            <input type="submit" value="ثبت" class="bt fln">

                        </div>

                    </div>
                </div>
            </div>
            <div class="clr"></div>
        </form>
    </div>
</li>

{{-- <li class="tabv">--}}
{{-- @if($errors->any())--}}
{{-- <div class="e_section" id="e_section">--}}
{{-- {!! implode('', $errors->all('<span class="text text-danger">:message</span><br>')) !!}--}}
{{-- </div>--}}
{{-- @endif--}}

{{-- <form action="{{route('teacher.save.expert',$user->id)}}" method="post">--}}
{{-- @csrf--}}
{{-- @method('post')--}}
{{-- <div class="expert-form">--}}

{{-- <div class="expert-section" >--}}
{{-- <h4>سطوح تدریس</h4>--}}
{{-- <h5>افزودن سطح مورد نظر</h5>--}}
{{-- <div class="form">--}}
{{-- <input type="text" placeholder="بنویسد">--}}
{{-- <span class="addt" data-name="teach_level">افزودن</span>--}}
{{-- </div>--}}
{{-- <div class="result">--}}

{{-- @php--}}
{{-- $teach_age=old('teach_level',json_decode($user->attr('teach_level')));--}}
{{-- @endphp--}}
{{-- @if($teach_age)--}}
{{-- @foreach($teach_age as $va)--}}
{{-- <span>{{$va}}<i class="icon-close"></i><input type="text" name="teach_level[]" value="{{$va}}" hidden value="0"></span>--}}
{{-- @endforeach--}}
{{-- @endif--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- <br>--}}
{{-- <br>--}}

{{-- <div class="expert-section">--}}
{{-- <h4>لهجه مدرس</h4>--}}
{{-- <h5>افزودن لهجه تدریس</h5>--}}
{{-- <div class="form">--}}
{{-- <input type="text" placeholder="بنویسد">--}}
{{-- <span class="addt" data-name="teach_dialect">افزودن</span>--}}
{{-- </div>--}}
{{-- <div class="result">--}}
{{-- @php--}}
{{-- $teach_dialect=old('teach_dialect',json_decode($user->attr('teach_dialect')));--}}
{{-- @endphp--}}
{{-- @if($teach_dialect)--}}
{{-- @foreach($teach_dialect as $va)--}}
{{-- <span>{{$va}}<i class="icon-close"></i><input type="text" name="teach_dialect[]" value="{{$va}}" hidden value="0"></span>--}}
{{-- @endforeach--}}
{{-- @endif--}}
{{-- <span>American English<i class="icon-close"></i></span>--}}
{{-- </div>--}}
{{-- </div>--}}

{{-- <div class="expert-section">--}}
{{-- <h4>سن</h4>--}}
{{-- <h5>افزودن سن تدریس</h5>--}}
{{-- <div class="form">--}}
{{-- <input type="text" placeholder="بنویسد">--}}
{{-- <span class="addt"  data-name="teach_age">افزودن</span>--}}
{{-- </div>--}}
{{-- <div class="result">--}}
{{-- @php--}}
{{-- $teach_age=old('teach_age',json_decode($user->attr('teach_age')));--}}
{{-- @endphp--}}
{{-- @if($teach_age)--}}
{{-- @foreach($teach_age as $va)--}}
{{-- <span>{{$va}}<i class="icon-close"></i><input type="text" name="teach_age[]" value="{{$va}}" hidden value="0"></span>--}}
{{-- @endforeach--}}
{{-- @endif--}}
{{-- <span>Adults  (18+)<i class="icon-close"></i></span>--}}
{{-- </div>--}}
{{-- </div>--}}

{{-- <div class="expert-section">--}}
{{-- <h4>کلاس شامل چه  مواردی میشود</h4>--}}
{{-- <h5>افزودن موارد</h5>--}}
{{-- <div class="form">--}}
{{-- <input type="text" placeholder="بنویسد">--}}
{{-- <span class="addt" data-name="teach_class">افزودن</span>--}}
{{-- </div>--}}
{{-- <div class="result">--}}
{{-- @php--}}
{{-- $teach_class=old('teach_class',json_decode($user->attr('teach_class')));--}}
{{-- @endphp--}}
{{-- @if($teach_class)--}}
{{-- @foreach($teach_class as $va)--}}
{{-- <span>{{$va}}<i class="icon-close"></i><input type="text" name="teach_class[]" value="{{$va}}" hidden value="0"></span>--}}
{{-- @endforeach--}}
{{-- @endif--}}
{{-- <span>Reading exercises<i class="icon-close"></i></span>--}}
{{-- <span>Writing exercises<i class="icon-close"></i></span>--}}
{{-- </div>--}}
{{-- </div>--}}

{{-- <div class="expert-section">--}}
{{-- <h4>موضوعات</h4>--}}
{{-- <h5>افزودن موضوعات</h5>--}}
{{-- <div class="form">--}}
{{-- <input type="text" placeholder="بنویسد">--}}
{{-- <span class="addt" data-name="teach_sub">افزودن</span>--}}
{{-- </div>--}}
{{-- <div class="result">--}}
{{-- @php--}}
{{-- $teach_sub=old('teach_sub',json_decode($user->attr('teach_sub')));--}}
{{-- @endphp--}}
{{-- @if($teach_sub)--}}
{{-- @foreach($teach_sub as $va)--}}
{{-- <span>{{$va}}<i class="icon-close"></i><input type="text" name="teach_sub[]" value="{{$va}}" hidden value="0"></span>--}}
{{-- @endforeach--}}
{{-- @endif--}}
{{-- <span>phonetics<i class="icon-close"></i></span>--}}

{{-- </div>--}}
{{-- </div>--}}

{{-- <div class="expert-section">--}}
{{-- <h4>آمادگی برای آزمون</h4>--}}
{{-- <h5>افزودن آزمون</h5>--}}
{{-- <div class="form">--}}
{{-- <input type="text" placeholder="بنویسد">--}}
{{-- <span class="addt" data-name="teach_exam">افزودن</span>--}}
{{-- </div>--}}
{{-- <div class="result">--}}
{{-- @php--}}
{{-- $teach_exam =old('teach_exam',json_decode($user->attr('teach_exam')));--}}
{{-- @endphp--}}
{{-- @if($teach_exam)--}}
{{-- @foreach($teach_exam as $va)--}}
{{-- <span>{{$va}}<i class="icon-close"></i><input type="text" name="teach_exam[]" value="{{$va}}" hidden value="0"></span>--}}
{{-- @endforeach--}}
{{-- @endif--}}
{{-- <span>TOFEL<i class="icon-close"></i></span>--}}
{{-- </div>--}}
{{-- </div>--}}


{{-- <div class="expert-section">--}}
{{-- <input type="submit" class="bt" value="ثبت">--}}
{{-- </div>--}}
{{-- </div>--}}
{{-- </form>--}}
{{-- </li>--}}
<li class="tabv">

    <div class="resume-setting">
        @foreach($resume as $re)
        <div class="resume-section-edit">
            <div class="right">
                <ul>
                    {{-- <li class="del-link" ><span>حذف<i class="icon-trash"></i></span></li>--}}
                    {{-- <li class="edit-link"><span>ویرایش<i class="icon-edit"></i></span></li>--}}


                    <li class="del-link">
                        <form id="ff_{{$re->id}}" action="{{route('Resume.destroy',$re->id)}}" class="delete_user_note" method="post">
                            @csrf
                            @method('DELETE')
                            <span onclick="document.getElementById('ff_{{$re->id}}').submit()">
                                حذف<i class="icon-trash"></i></span>
                            {{-- <span class="sane">ﺗﺎﯾﯿﺪ و ﺛﺒﺖ</span>--}}
                            {{-- <span class="cancel">لغو</span>--}}
                        </form>
                    </li>
                    <li class="edit-link">
                        <form id="dd_{{$re->id}}" action="{{route('Resume.edit',$re->id)}}" class="delete_user_note" method="get">
                            @csrf
                            @method('get')
                            <span onclick="document.getElementById('dd_{{$re->id}}').submit()">
                                ویرایش<i class="icon-trash"></i></span>
                            {{-- <span class="sane">ﺗﺎﯾﯿﺪ و ﺛﺒﺖ</span>--}}
                            {{-- <span class="cancel">لغو</span>--}}
                        </form>
                    </li>
                </ul>
            </div>
            <div class="left">
                <h5>{{__('arr.'.$re->type)}}: {{$re->place}} </h5>
                <p>{{$re->title}} : {{$re->info}} </p>
                <span class="date">
                    <span>
                        {{$re->from}} - {{$re->till}}
                    </span>
                    <i class="icon-time-line"></i>
                </span>

            </div>
        </div>
        @endforeach



        <div class="addresume">

            <div class="row">


                <div class="col-lg-5 col-md-12">
                    <div>
                        <img src="/home/images/mind_map_two_color.png" alt="">
                    </div>
                </div>

                <div class="col-lg-7 col-md-12">
                    <div>

                        <form action="{{route('Resume.store',$user->id)}}" method="post">
                            @csrf
                            @method('post')

                            <div class="label">
                                <span>انتخاب نوع</span>
                            </div>

                            <div class="check-buttonlist">
                                <ul>
                                    <li>
                                        {{-- {{dump(old('type'))}}--}}
                                        <div class="lable-container">
                                            <input type="radio" name="type" {{(old('type')=='education')?'checked':""}} id="education" value="education">
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
                                            <input type="radio" name="type" {{(old('type')=='sabeghe')?'checked':""}} id="sabeghe" value="sabeghe">
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
                                            <input type="radio" name="type" {{(old('type')=='licence')?'checked':""}} id="licence" value="licence">
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
                                <input type="text" name="title" value="{{old('title')}}" placeholder="‏">
                            </div>

                            <div class="input-container fill">
                                <label for="">توضیحات</label>
                                <input type="text" name="info" value="{{old('info')}}" placeholder="‏">
                            </div>

                            <div class="input-container fill">
                                <label for="">محل</label>
                                <input type="text" name="place" value="{{old('place')}}" placeholder="‏">
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div>
                                        <div class="input-container fill">
                                            <label for="from">تاریخ از :</label>
                                            <select name="from" id="from">
                                                <option value="">از</option>
                                                @for($i=1340;$i<1401;$i++) <option {{(old('from')==$i)?'selected':''}} value="{{$i}}">{{$i}}</option>
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
                                                @for($i=1340;$i<1401;$i++) <option {{(old('till')==$i)?'selected':''}} value="{{$i}}">{{$i}}</option>
                                                    @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="button-container reight">

                                <input type="submit" class="bt fln" value="افزودن">
                            </div>
                        </form>

                    </div>
                </div>
            </div>


        </div>
    </div>


</li>
<li class="tabv">
    <div class="video-setting">

        <div class="upload-section">


            <p style="color: red">
                تغییرات در این قسمت بعد از تایید ادمین لحاظ میشود و تا تایید ادمین شما از لیست اساتید حذف میشوید
            </p>
            <form id="port_form" action="{{route('teacher.save.port',$user->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="row">
                    <div class="col-lg-7 col-md-10 col-sm-12 center-block">
                        <div>

                            <div class="featured-pic">
                                <h4>تصویر شاخص</h4>
                                <div id="fileuploader" class="fl">
                                    <label for="featured-pic">
                                        عکس ابتدای ویدیو را آپلود کنید
                                        <span>
                                            انتخاب فایل

                                        </span>
                                    </label>
                                    <input type="file" id="featured-pic" accept="image/*" name="port_img">
                                    {{-- <br>--}}
                                    {{-- <p style="text-align: center" id="img_name"></p>--}}
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>

                            <div class="featured-video">
                                <h4>آپلود ویدیوی معرفی <span>با آپلود ویدئو معرفی، فروشتان در تیچر پرو را تا ۹۰٪ افزایش دهید</span></h4>
                                <div id="fileuploader2" class="draggable fl">
                                    <div class="vup">

                                        {{-- <div class="drag">--}}
                                        {{-- <div class="upv"><i class="icon-cloud"></i><span>فایل را بکشید و در اینجا رها کنید</span><span class="or">یا</span></div>--}}
                                        {{-- </div>--}}
                                        <label for="featured-video">
                                            فایل ویدئو معرفی خود را انتخاب کنید
                                            <span>انتخاب فایل </span>
                                        </label>
                                        <input type="file" accept="video/mp4" id="featured-video" name="port_vid">
                                        {{-- <br>--}}
                                        {{-- <p style="text-align: center" id="vid_name"></p>--}}
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <div class="video-op">
                                <ul>
                                    <li> حجم ویدئو حداکثر ۲۵ مگابایت باشد</li>
                                    <li>‏MP4 فرمت قابل قبول</li>
                                </ul>
                            </div>
                            <div class="button-container reight full">
                                <span onclick="document.getElementById('port_form').submit()" class="butt fln">ذخیره تغییرات</span>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
            <br>
            <br>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <div>

                        <div class="instruction">
                            <h3>دستور العمل ضبط ویدئو معرفی</h3>

                            <div class="about-text">
                                <div>
                                    <p> به عنوان یک استاد جدید در سایت: ویدئو مهمترین و اصلی ترین فاکتور برای جذب زبان آموز میباشد. اگر به هر دلیلی نتوانید خودتان را به شکلی مناسب معرفی نمایید، زبان آموزان شما را انتخاب نخواهند کرد</p>
                                    <p> به عنوان یک استاد جدید در سایت: ویدئو مهمترین و اصلی ترین فاکتور برای جذب زبان آموز میباشد. اگر به هر دلیلی نتوانید خودتان را به شکلی مناسب معرفی نمایید، زبان آموزان شما را انتخاب نخواهند کرد</p>
                                </div>
                            </div>

                            <div class="about-more ">
                                <div>

                                    <span> خواندن ادامه</span>
                                    <span class="down">
                                        <i class="icon-down"></i>
                                        <i class="icon-down"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="more-video">
                            <h3>تعدادی از ویدیو های مناسب از دید اُتیچر</h3>
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div>

                                        <div class="jquery_videoplayer">
                                            <div class="video_play_icon"></div>
                                            <video controls="">
                                                <source src="/home/images/video.mp4" type="video/mp4">
                                            </video>
                                            <div class="controller">
                                                <div class="fullscreen">FullScreen</div>
                                                <div class="volume horizontal slider">
                                                    <div class="slider_bar"></div>
                                                    <div class="handle"></div>
                                                </div>
                                                <div class="audio">Mute</div>
                                                <div class="timing">
                                                    <span class="time">00:00</span> / <span class="duration">00:00</span>
                                                </div>
                                                <div class="playpause">Play/Pause</div>
                                                <div class="progressbar_wrapper">
                                                    <div class="pbar"></div>
                                                    <div class="buffer"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div>

                                        <div class="jquery_videoplayer">
                                            <div class="video_play_icon"></div>
                                            <video controls="">
                                                <source src="/home/images/video.mp4" type="video/mp4">
                                            </video>
                                            <div class="controller">
                                                <div class="fullscreen">FullScreen</div>
                                                <div class="volume horizontal slider">
                                                    <div class="slider_bar"></div>
                                                    <div class="handle"></div>
                                                </div>
                                                <div class="audio">Mute</div>
                                                <div class="timing">
                                                    <span class="time">00:00</span> / <span class="duration">00:00</span>
                                                </div>
                                                <div class="playpause">Play/Pause</div>
                                                <div class="progressbar_wrapper">
                                                    <div class="pbar"></div>
                                                    <div class="buffer"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="cover">


        </div>
    </div>
</li>
<li class="tabv">

    <div class="row">
        <div class="col-lg-12 col-md-10 col-sm-12 center-block">
            <div>
                <div class="profile-form">
                    <form id="info" action="{{route('teacher.save.account')}}" class=" " method="post">
                        @csrf
                        @method('post')



                        <div class="input-container fill">
                            <label for="">شماره شبا</label>
                            <span class="ir">
                                IR
                            </span>
                            <input name="shaba" style="text-align: left" type="tell" maxlength="" value="{{old('shaba',$user->attr('shaba'))}}" placeholder="  ">

                        </div>

                        <div class="input-container fill">
                            <label for="">شماره کارت</label>
                            <input name="cart" type="tell" value="{{old('cart',$user->attr('cart'))}}" placeholder="  ">
                        </div>




                        <div class="button-container  reight full">
                            <input type="submit" class="bt fln" value="ذخیره تغییرات">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</li>

</ul>

</div>


@endcomponent
