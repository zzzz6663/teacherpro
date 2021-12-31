@extends('master.home')




                @section('main_body')




                    <div id="topbread" class="rows">
                        <div class="container">
                            <div>

                                <h1>  تماس با ما</h1>
                                <ol class="breadcrumb" >
                                    <li><a href="{{route('login')}}">صفحه اصلی</a></li> /
                                    <li>تماس با ما</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <div id="page" class="rows">
                        <div class="container">

                            <div id="contact-top">
                                <div class="row">
                                    <div class="col-lg-10 center-block col-md-12">
                                        <div>
                                            <div class="row">
                                                <div class="col-lg-6 col-sm-12">
                                                    <div>
                                                        <div class="sectitle">
                                                            <h2 class="section-title "> <span class="sub-title">#ارتباط</span>با ما در ارتباط باشید</h2>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-sm-12">
                                                    <div>
                                                        <div class="sec-text">
                                                            <p>در صورت نیاز میتوانید به سادگی با تیچر پرو در ارتباط باشید.</p>
                                                            <p>لطفا با ما در ارتباط باشید. ما می‌خواهیم به افراد کمک کنیم تا   یاد بگیرند، رشد کنند و به موفقیت‌های بیشتری برسند.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-4 col-sm-12">
                                                    <div>
                                                        <div class="contact-box">
                                                            <div class="icon">
                                                                <i class="icon2-building-filled"></i>
                                                            </div>
                                                            <div class="left">
                                                                <h3>آدرس:</h3>
                                                                <p>ایران، تهران</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-12">
                                                    <div>
                                                        <div class="contact-box">
                                                            <div class="icon">
                                                                <i class="icon2-mail"></i>
                                                            </div>
                                                            <div class="left">
                                                                <h3>ایمیل:</h3>
                                                                <p>info@teacherpro.ir</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-12">
                                                    <div>
                                                        <div class="contact-box">
                                                            <div class="icon">
                                                                <i class="icon2-phone"></i>
                                                            </div>
                                                            <div class="left">
                                                                <h3>تلفن:</h3>
                                                                <p>۸۰۲۳ ۴۴۶۱ ۰۲۱</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="contact-bot">
                                <div class="row">
                                    <div class="col-lg-10 col-md-12 center-block">
                                        <div>
                                            <div class="row">


                                                <div class="col-lg-7 col-sm-12">
                                                    <div>
                                                        <div class="img">
                                                            <img src="/home/images/contact_image.png" alt="">

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-5 col-sm-12">
                                                    <div>
                                                        <div class="contact-form">
                                                            <div class="title">
                                                                <h2>ارسال پیام به ما</h2>
                                                            </div>
                                                            @if($errors->any())
                                                                <div class="e_section" id="e_section">
                                                                    {!! implode('', $errors->all('<span class="text text-danger">:message</span><br>')) !!}
                                                                </div>
                                                            @endif
                                                            <form action="{{route('admin.home.payam')}}" method="post">
                                                                @csrf
                                                                @method('post')
                                                                <div class="mf-input-wrapper">
                                                                    <input type="text" name="name" value="{{old('name')}}" placeholder="نام و نام خانوادگی " >
                                                                </div>
                                                                <div class="mf-input-wrapper">
                                                                    <input type="email"  name="email" value="{{old('email')}}" placeholder="آدرس ایمیل " >
                                                                </div>
                                                                <div class="mf-input-wrapper">
                                                                    <input type="number"  name="mobile" value="{{old('mobile')}}" placeholder="شماره تماس " >
                                                                </div>
                                                                <div class="mf-input-wrapper">
                                                                    <textarea name="payam" id="" cols="30" rows="10" placeholder="پیام">{{old('payam')}}</textarea>
                                                                </div>
                                                                <div class="mf-btn-wraper" >
                                                                    <button type="submit" style="line-height: 0px">
{{--                                                                        <i class="icon2-paper-plane"></i>--}}
                                                                        <span>ارسال </span>
                                                                    </button>
                                                                </div>
                                                            </form>
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





                @endsection







