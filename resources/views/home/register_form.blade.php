





@extends('master.home')
@section('main_body')



    <div id="maincontent" class="rows sfix">
        <div>





            <div class="profile-settings shade">



                <ul class="tab-container" id="loginf">
                    <li class="active">

                        <div class="profile-setting">

                            <br>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-lg-6 col-md-10 col-sm-12 center-block">
                                    <div>
                                        <div class="profile-form">
                                            <form data-url="{{route('login.sms')}}" id="register_form"   method="post" >
                                                @method('post')
                                                @csrf

                                                <h2 style="text-align: center">
                                                    برای ادامه وارد حساب کاربری شوید و یا حساب جدید بسازید
                                                </h2>

                                                <div class="input-container fill">
                                                    <label for="mobile">شماره موبایل</label>
                                                    <input type="number" name="mobile" id="mobile" value="">
                                                </div>

                                                <div class="sex">
                                                    <ul style="text-align: center">
                                                        <li>
                                                            <div class="lable-container">
                                                                <input type="radio" name="login_type" id="register" value="register">
                                                                <label for="register">
                                                                    <div>
                                                                        <span>ثبت نام </span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="lable-container">
                                                                <input  type="radio" name="login_type" id="logins" value="login">
                                                                <label for="logins">
                                                                    <div>
                                                                        <span>ورود</span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div id="mobile_section">
                                                    <div class="sex" id="login_t_sec" hidden>
                                                        <ul style="text-align: center">
                                                            <li>
                                                                <div class="lable-container">
                                                                    <input type="radio" name="level" id="student" value="student">
                                                                    <label for="student">
                                                                        <div>
                                                                            <span>  زبان آموز</span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="lable-container">
                                                                    <input type="radio" name="level" id="teacher" value="teacher">
                                                                    <label for="teacher">
                                                                        <div>
                                                                            <span>مدرس</span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>





                                                <div id="code_section" hidden="">
                                                    <div class="input-container fill ">
                                                        <label for="code">کد پیامک شده  </label>
                                                        <input type="number" name="code" id="code" value="">
                                                    </div>
                                                    <span id="resend_sms" data-url="{{route('login.sms')}}" style="font-size: 18px; display: block; color: #00a65a; cursor: pointer">    ارسال مجدد  کد  تایید </span>
                                                    <span id="cdown" style="font-size: 18px; display: block">       </span>
                                                    <span id="nmobile" style="font-size: 18px; display: block; color: red">       </span>
                                                </div>

                                                <div class="button-container reight full">
                                                    <div id="registerbt_p">

                                                        <button  id="registerbt" style="line-height: 60px" class=" butt send">  ورود</button>
                                                    </div>
                                                    <div id="check_sms_p" hidden="">
                                                        <a id="check_sms" data-url="{{route('check.sms')}}" style="line-height: 60px; cursor: pointer" class="butt send">ثبت  </a>
                                                    </div>
                                                </div>



                                            </form>

                                        </div>


































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

