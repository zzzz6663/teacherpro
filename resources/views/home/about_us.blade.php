@extends('master.home')




                @section('main_body')

                    <div id="teacher-top1" class="rows">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div>
                                        <h2> هدف ما ایجاد آموزش آنلاین برای همه است</h2>
                                        <div class="text">
                                            <p>ما پلتفرمی بسیار ساده و جذاب برای آموزش آنلاین زبان در اختیار شما قرار می‌دهیم. به عنوان یک عضو تیم ما، شما حرفه خود را بالا می برید، به یک جامعه فراگیر می پیوندید و زندگی خود را از طریق دسترسی به یکی از بهترین پلتفرم‌های آموزش آنلاین زبان تغییر می‌دهید.</p>
                                        </div>

                                        <div class=" btn-wraper">
                                            <a  href="{{route('home.teacher.register.form')}}" rel="nofollow" class="bl pointer sign">
                                                <span class="icon2-plus-circle"></span> همین امروز ثبت ‌نام کنید </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div>
                                        <div class="img">
                                            <img src="/home/images/intro_image.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div id="teacher-why" class="rows">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-10 col-md-12 center-block">
                                    <div>
                                        <div class="row">


                                            <div class="col-lg-6 col-sm-12">
                                                <div>
                                                    <div class="sectitle">
                                                        <h2 class="section-title "> <span class="sub-title">#فواید</span>چرا تدریس آنلاین؟</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12">
                                                <div>
                                                    <div class="sec-text">
                                                        <p>با تدریس زبانی که در آن حرفه‌ای هستید، کسب درآمد کنید. هر جا، هر زمان!</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="whyboxes">
                                <div class="row">

                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div>
                                            <div class="whybox">
                                                <div class="img">
                                                    <img src="/home/images/feature-icon4.png" alt="">
                                                </div>
                                                <div class="content">
                                                    <h3>کسب درآمد کنید</h3>
                                                    <p>نرخ جلسات خودتان را خودتان تنظیم کنید و درآمد خود را هر زمانی که خواستید نقد کنید.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div>
                                            <div class="whybox">
                                                <div class="img">
                                                    <img src="/home/images/icon3.png" alt="">
                                                </div>
                                                <div class="content">
                                                    <h3>از هر جاکه می‌خواهید کار کنید</h3>
                                                    <p>از خانه یا هر کجا که راحتید تدریس کنید.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div>
                                            <div class="whybox">
                                                <div class="img">
                                                    <img src="/home/images/feature-icon8.png" alt="">
                                                </div>
                                                <div class="content">
                                                    <h3>هر زمان که می‌خواهید تدریس کنید</h3>
                                                    <p>به راحتی ساعاتی که مایل به تدریس هستید را در تقویم خود انتخاب کنید.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div>
                                            <div class="whybox">
                                                <div class="img">
                                                    <img src="/home/images/feature-icon2.png" alt="">
                                                </div>
                                                <div class="content">
                                                    <h3>انعطاف پذیری را تجربه کنید</h3>
                                                    <p>شما می‌توانید به هر صورت که مایلید تدریس کنید: تمام وقت، پاره وقت و یا گاه به گاه.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div>
                                            <div class="whybox">
                                                <div class="img">
                                                    <img src="/home/images/feature-icon3.png" alt="">
                                                </div>
                                                <div class="content">
                                                    <h3>به جامعه جهانی بپیوندید</h3>
                                                    <p>به زبان آموزانی از سراسر جهان تدریس کنید.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div>
                                            <div class="whybox">
                                                <div class="img">
                                                    <img src="/home/images/feature-icon6.png" alt="">
                                                </div>
                                                <div class="content">
                                                    <h3>خود را به جامعه زبانی معرفی کنید</h3>
                                                    <p>شما می‌توانید خود را به جامعه زبانی بهتر بشناسانید.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div id="teacher-faq" class="rows">
                        <div class="container">

                            <div class="col-lg-6 col-md-12">
                                <div>
                                    <h2 class="section-title "> <span class="sub-title">#پرسشهای متداول</span> چند سوال متداول</h2>
                                    <div class="text">
                                        <p>
                                            پاسخ اکثر سوالات خود در رابطه با تدریس آنلاین را می‌توانید در این قسمت پیدا کنید.
                                        </p>
                                    </div>
                                    <div class="img">
                                        <img src="/home/images/contact_image.png" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div>

                                    <div class="faq active">
                                        <div class="question">
                                            <a  class="bl">
                                                <span class="title">پروفایل اختصاصی</span>
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
                                        <div  class="answer" style="display: block;">
                                            <div class="">
                                                <p>با این امکان دیگر نیازی به هماهنگی زمان کلاس‌ها به صورت دستی و آموزش به صورت پراکنده در نرم‌افزارهای مختلف را ندارید.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="faq">
                                        <div class="question">
                                            <a  class="bl">
                                                <span class="title">تدریس با قیمت دلخواه و بدون کمیسیون</span>
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
                                        <div  class="answer" >
                                            <div class="">
                                                <p>شما می‌توانید با قیمت دلخواه خود و بدون کسر کمیسیون توسط تیچرپرو تدریس کنید. برای عضویت در تیچرپرو نیاز به پرداخت هیچگونه هزینه‌ای نیست.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="faq">
                                        <div class="question">
                                            <a  class="bl">
                                                <span class="title">پشتیبانی از ۸ تا ۲۴ به اساتید و زبان‌آموزان</span>
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
                                        <div  class="answer" >
                                            <div class="">
                                                <p>به عنوان یک استاد، فقط کافیست روی آموزش تمرکز کنید. تیچرپرو به شما و زبان‌آموزانتان به صورت ۲۴ ساعته از طریق تماس، ایمیل و چت زنده پشتیانی ارائه خواهد کرد.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="faq">
                                        <div class="question">
                                            <a  class="bl">
                                                <span class="title">محیط برگزاری کلاس طراحی شده برای آموزش آنلاین</span>
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
                                        <div  class="answer" >
                                            <div class="">
                                                <p>کلاس‌های آنلاین خود را از طریق سایت تیچرپرو بدون نیاز به نصب برنامه خاصی برگزاری نمایید. محیط کلاس دارای امکانات لازم برای آموزش آنلای همچون تماس صوتی/تصویری، چت متنی، تخته وایت برد مجازی، آموزش از روی فیلم، صدا، پاورپوینت و ... می‌باشد.</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                @endsection







