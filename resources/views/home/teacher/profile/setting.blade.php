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



    <div class="welcome">
        <span class="name">سلام صبا ،</span>
        <span>خوش آمدید؛ امروز جمعه - ۲۳ خرداد ۱۳۹۹ </span>
    </div>

    <div id="nextclass" class="shade">
        <div class="widget-title">
            <h3>کلاس پیش رو</h3>
            <div class="dot3">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="widget-content">
            <div class="right">
                <div class="stuprofile">
                    <div class="pic">
                        <span class="num1"></span>
                        <span class="num2"></span>
                        <span class="num3"></span>
                        <img src="/home/images/person2.jpg" alt="">
                    </div>
                    <div class="detail">
                        <span>دانشجو</span>
                        <h4>نسیم کد خدایان</h4>
                        <span class="date">چهار شنبه 07 خرداد 12:00:00</span>
                    </div>
                </div>
            </div>
            <div class="left">
                <span class="start">شروع کلاس</span>
                <div id="countdown" data-time="2020/09/01 00:00:00"></div>

            </div>
        </div>
    </div>

    <div class="class-list shade">
        <div class="widget-title">
            <h3>کلاس ها</h3>
            <div class="time-filter">
                <span><i class="icon-time-line"></i>زمان </span>
                <select name="" id="">
                    <option value="">امروز</option>
                    <option value="">فردا</option>
                    <option value="">پس فردا</option>
                </select>
            </div>
            <div class="stat-filter">
                <span><i class="icon-stat"></i>وضعیت </span>
                <select name="" id="">
                    <option value="">پیش رو</option>
                    <option value="">انجام شده</option>
                    <option value="">کنسل شده</option>
                    <option value="">معلق شده</option>
                </select>
            </div>
            <div class="dot3">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div class="widget-content">
            <div class="class-list-title">
                <span>‏7 کلاس در برنامه دارید</span>
            </div>

            <div class="single-class">
                <div class="date">
                    <span class="month">خرداد</span>
                    <span class="day">07</span>
                    <span class="name">چهارشنبه</span>

                </div>
                <div class="mleft">

                    <div class="right">
                        <div class="pic">
                            <img src="/home/images/person5.jpg" alt="">
                        </div>
                        <div class="det">
                            <div class="job"><span>استاد</span></div>
                            <h4>نسیم کد خدایان</h4>
                            <div class="date"><i class="icon-time-line"></i><span>زمان</span> <span>چهار شنبه 07 خرداد 12:00:00</span></div>
                        </div>
                    </div>
                    <div class="left">
                        <div class="enter-class">
                            <span>ورود به کلاس</span>
                        </div>
                        <div class="class-option">
                            <span class="title"><i class="icon-dots"></i>گزینه ها</span>
                            <ul>
                                <li><span><i class="icon-write"></i>ویرایش کلاس</span></li>
                                <li><span><i class="icon-trash"></i>لغو کلاس</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="single-class">
                <div class="date">
                    <span class="month">خرداد</span>
                    <span class="day">07</span>
                    <span class="name">چهارشنبه</span>

                </div>
                <div class="mleft">

                    <div class="right">
                        <div class="pic">
                            <img src="/home/images/person5.jpg" alt="">
                        </div>
                        <div class="det">
                            <div class="job"><span>استاد</span></div>
                            <h4>نسیم کد خدایان</h4>
                            <div class="date"><i class="icon-time-line"></i><span>زمان</span> <span>چهار شنبه 07 خرداد 12:00:00</span></div>
                        </div>
                    </div>
                    <div class="left">
                        <div class="enter-class">
                            <span>ورود به کلاس</span>
                        </div>
                        <div class="class-option">
                            <span class="title"><i class="icon-dots"></i>گزینه ها</span>
                            <ul>
                                <li><span><i class="icon-write"></i>ویرایش کلاس</span></li>
                                <li><span><i class="icon-trash"></i>لغو کلاس</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="single-class">
                <div class="date">
                    <span class="month">خرداد</span>
                    <span class="day">07</span>
                    <span class="name">چهارشنبه</span>

                </div>
                <div class="mleft">

                    <div class="right">
                        <div class="pic">
                            <img src="/home/images/person5.jpg" alt="">
                        </div>
                        <div class="det">
                            <div class="job"><span>استاد</span></div>
                            <h4>نسیم کد خدایان</h4>
                            <div class="date"><i class="icon-time-line"></i><span>زمان</span> <span>چهار شنبه 07 خرداد 12:00:00</span></div>
                        </div>
                    </div>
                    <div class="left">
                        <div class="enter-class">
                            <span>ورود به کلاس</span>
                        </div>
                        <div class="class-option">
                            <span class="title"><i class="icon-dots"></i>گزینه ها</span>
                            <ul>
                                <li><span><i class="icon-write"></i>ویرایش کلاس</span></li>
                                <li><span><i class="icon-trash"></i>لغو کلاس</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pagination">
                <div class="number">
                    <ul>
                        <li><a href="#">1</a></li>
                        <li class="active"><a href="#">2</a></li>
                        <li><span>...</span></li>
                        <li><a href="#">14</a></li>
                        <li><a href="#">15</a></li>
                        <li><a href="#">16</a></li>
                    </ul>
                </div>
                <div class="result">
                    <span>صفحه 2 از 16</span>
                </div>

                <div class="next-prev">
                    <span class="next-page"><i class="icon-arrow-right-line"></i></span>
                    <span class="prev-page"><i class="icon-arrow-right-line"></i></span>
                </div>
            </div>


        </div>
    </div>

    <div class="stat-list">
        <div class="row">

            <div class="col-lg-4 col-md-12">
                <div>
                    <div class="singl-statis shade">
                        <div class="top">
                            <div class="numner green">
                                <span>150</span>
                            </div>
                            <div class="det">
                                <span class="title">کلاس های برگزارشده</span>
                                <span class="titleen">Classes held</span>
                            </div>
                            <div class="dot3">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>

                        <div class="bar">
                            <span style="width: 45%;"></span>
                        </div>

                        <div class="bot">
                            <span class="right">792 Points</span>
                            <span class="left">Professional</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div>
                    <div class="singl-statis shade">
                        <div class="top">
                            <div class="numner blue">
                                <span>45</span>
                            </div>
                            <div class="det">
                                <span class="title">کلاس پیش رو</span>
                                <span class="titleen">Classes ahead</span>
                            </div>
                            <div class="dot3">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>

                        <div class="bar">
                            <span style="width: 57%"></span>
                        </div>

                        <div class="bot">
                            <span class="right">792 Points</span>
                            <span class="left">Professional</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div>
                    <div class="singl-statis shade">
                        <div class="top">
                            <div class="numner orange">
                                <span>5</span>
                            </div>
                            <div class="det">
                                <span class="title">کلاس رزرو نشده</span>
                                <span class="titleen">Unreserved classes</span>
                            </div>
                            <div class="dot3">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>

                        <div class="bar">
                            <span style="width: 70%"></span>
                        </div>

                        <div class="bot">
                            <span class="right">792 Points</span>
                            <span class="left">Professional</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="teacher-bot">
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div>
                    <div class="activate-profile shade">

                        <div class="pic">
                            <img src="/home/images/profile.svg" alt="" class="bg">
                            <img src="/home/images/person3.jpg" alt="" class="pro">
                        </div>

                        <div class="percent">
                            <spna class="num">70</spna>
                            <span> درصد تکمیل شده</span>
                        </div>

                        <div class="profilbut">
                            <div class="lable-container">
                                <input type="checkbox" name="activeprofile" id="activeprofile" value="activeprofile">
                                <label for="activeprofile">
                                    <div class="right">

                                        <span>فعال سازی پروفایل</span>
                                    </div>
                                    <div class="left">
                                        <div class="toggle">
                                            <span></span>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="profile-link">
                            <a href="#">مشاهده پروفایل</a>
                        </div>

                        <div class="process">
                            <p>برای فعال سازی پروفایلتان در تیچر پرو این مراحل را انجام دهید :</p>
                            <ul>

                                <li>
                                    <div class="right">
														<span class="green">
															<i class="icon-discount"></i>
														</span>
                                    </div>
                                    <div class="left">
                                        <span class="title">تعیین قیمت جلسات</span>
                                        <span class="stat green">تکمیل شده<i class="icon-tick2"></i></span>
                                    </div>
                                </li>

                                <li>
                                    <div class="right">
														<span class="blue">
															<i class="icon-calender"></i>
														</span>
                                    </div>
                                    <div class="left">
                                        <span class="title">تعیین برنامه زمانی</span>
                                        <span class="stat green">تکمیل شده<i class="icon-tick2"></i></span>
                                    </div>
                                </li>

                                <li>
                                    <div class="right">
														<span class="orange">
															<i class="icon-pic"></i>
														</span>
                                    </div>
                                    <div class="left">
                                        <span class="title">آپلود تصویر پروفایل</span>
                                        <span class="stat orange">در انتظار انجام<i class=" icon-wait"></i></span>
                                    </div>
                                </li>

                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <div>

                    <div class="linkbox shade">
                        <div class="button">
                            <a href="#" class="green"><i class="icon-movie"></i><span>مشاهده آموزش</span></a>
                        </div>

                        <div class="right">
                            <div class="pic">
                                <img src="/home/images/team_presentation_two_color.png" alt="">
                            </div>
                            <div class="left">
                                <h4>ویدئو آموزشی نحوه کار با محیط کلاس</h4>
                                <span>اخبار، اطلاع رسانی و آموزش های حرفه ای</span>
                            </div>
                        </div>
                    </div>

                    <div class="linkbox shade">
                        <div class="button">
                            <a href="#" class="blue"><i class="icon-telegram"></i><span>عضویت در کانال</span></a>
                        </div>

                        <div class="right">
                            <div class="pic">
                                <img src="/home/images/new_message.png" alt="">
                            </div>
                            <div class="left">
                                <h4>کانال اطلاع رسانی اساتید</h4>
                                <span>اخبار، اطلاع رسانی و آموزش های حرفه ای</span>
                            </div>
                        </div>
                    </div>

                    <div class="make-class-banner shade">
                        <div class="right">
                            <h3>کلاس حضوریت رو آنلاین و <br>رایگان برگزار کن</h3>
                            <p>!حتی اگر پروفایل شما غیرفعال است</p>
                            <span class="hshtag"># همه_کنار_هم</span>
                            <a href="#">ایجاد کلاس</a>
                        </div>
                        <div class="left">
                            <img src="/home/images/online_presentation_two_color.png" alt="">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="teacher-diagrams">
        <div class="row">

            <div class="col-lg-3 col-md-12">
                <div>

                    <div class="teacher-stat shade">

                        <div class="widget-title">
                            <h3>آمار</h3>

                            <div class="dot3">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        <div class="widget-content">

                            <div class="statbox">
                                <div class="icon">
                                    <span><i class="icon-eye"></i></span>
                                </div>
                                <div class="title">
                                    <span>تعداد بازدید از پروفایل</span>
                                </div>
                                <div class="stat">
                                    <span>54</span>
                                </div>
                            </div>

                            <div class="statbox">
                                <div class="icon">
                                    <span><i class="icon-hearto"></i></span>
                                </div>
                                <div class="title">
                                    <span>تعداد علاقه مندی</span>
                                </div>
                                <div class="stat">
                                    <span>55</span>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-9 col-md-12">
                <div>


                    <div class="teacher-stat shade">

                        <div class="widget-title">
                            <h3>نمودار درامد</h3>
                            <div class="diag-filter">
                                <select name="" id="">
                                    <option value="">سال جاری</option>
                                    <option value="">سال قبل</option>
                                </select>
                            </div>
                            <div class="dot3">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        <div class="widget-content">
                            <div class="exp"><p><i class="icon-checkout"></i> <span>درامد این سال  :</span><span>‏44,521,454</span> <span>تومان</span></p></div>
                            <script>
                                window.onload = function () {

                                    var options = {
                                        series: [{
                                            name: "درآمد",
                                            data: [10, 41, 35, 71, 49, 62, 69, 91, 48]
                                        }],
                                        chart: {
                                            height: 350,
                                            type: 'area',
                                            zoom: {
                                                enabled: false
                                            }
                                        },
                                        colors:['#17b687', '#E91E63', '#9C27B0'],
                                        fill: {
                                            colors: ['#17b687', '#E91E63', '#9C27B0'],
                                            type: 'gradient',
                                            gradient: {
                                                shadeIntensity: 1,
                                                inverseColors: false,
                                                opacityFrom: 0.5,
                                                opacityTo: 0,
                                                stops: [0, 90, 100]
                                            },
                                        },
                                        dataLabels: {
                                            enabled: false
                                        },
                                        stroke: {
                                            curve: 'straight'
                                        },
                                        markers: {
                                            size: 8,
                                            colors: ["#fff"],
                                            strokeColors: "#0eb582",
                                            strokeWidth: 4,
                                            hover: {
                                                size: 8,
                                                strokeWidth: 4,
                                                colors: ["#0eb582"],
                                                strokeColors: "#fff",
                                            }
                                        },
                                        title: {
                                            align: 'left'
                                        },
                                        grid: {
                                            row: {
                                                colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                                                opacity: 0.5
                                            },
                                        },
                                        xaxis: {
                                            categories: ['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر'],
                                        }
                                    };

                                    var chart = new ApexCharts(document.querySelector("#chartContainer"), options);
                                    chart.render();

                                }
                            </script>
                            <div id="chartContainer" style=""></div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <div class="teacher-diagrams">
        <div class="row">

            <div class="col-lg-7 col-md-12">
                <div>

                    <div class="teacher-comment shade">

                        <div class="widget-title">
                            <h3>آخرین دیدگاه ها</h3>

                            <div class="dot3">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        <div class="widget-content">
                            <div>

                                <div class="ho-comment">
                                    <div class="right">
                                        <img src="/home/images/person5.jpg" alt="">
                                    </div>

                                    <div class="mtexct">
                                        <div class="right">
                                            <div class="name"><span>توسط : یلدا شیرازی</span></div>
                                            <div class="date"><span>3:10 PM جمعه - ۲۳ خرداد ۱۳۹۹</span></div>
                                            <div class="text">
                                                <p>سلام، این یک نوشته یک دیدگاه است. سلام، این یک نوشته یک دیدگاه است.  سلام، این یک نوشته یک دیدگاه است. </p>
                                            </div>
                                        </div>
                                        <div class="buuton">
                                            <span class="remove">حذف<i class="icon-trash"></i></span>
                                            <span class="reply">پاسخ<i class="icon-reply"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="ho-comment">
                                    <div class="right">
                                        <img src="/home/images/person5.jpg" alt="">
                                    </div>

                                    <div class="mtexct">
                                        <div class="right">
                                            <div class="name"><span>توسط : یلدا شیرازی</span></div>
                                            <div class="date"><span>3:10 PM جمعه - ۲۳ خرداد ۱۳۹۹</span></div>
                                            <div class="text">
                                                <p>سلام، این یک نوشته یک دیدگاه است. سلام، این یک نوشته یک دیدگاه است.  سلام، این یک نوشته یک دیدگاه است. </p>
                                            </div>
                                        </div>
                                        <div class="buuton">
                                            <span class="remove">حذف<i class="icon-trash"></i></span>
                                            <span class="reply">پاسخ<i class="icon-reply"></i></span>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="more-comment">
                                <a href="#">مشاهده همه نظرات</a>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-5 col-md-12">
                <div>


                    <div class="teacher-cform shade">

                        <div class="widget-title">
                            <h3>پیشنویس سریع مقاله </h3>

                            <div class="dot3">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>

                        <div class="widget-content">
                            <form action="">

                                <div class="input-container">
                                    <label for="">عنوان مقاله</label>
                                    <input type="text" placeholder="">
                                </div>

                                <div class="input-container">
                                    <label for="">چه چیزی در ذهن دارید</label>
                                    <textarea name="" id="" cols="30" rows="10"></textarea>
                                </div>

                                <div class="button-container">
                                    <a href="#">رفتن به بخش مقالات</a>
                                    <span class="butt">ذخیره پیشنویس</span>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>


</div>



    @endcomponent
