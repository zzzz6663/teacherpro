@extends('master.home')




                @section('main_body')
                    <div id="maincontent" class="rows">
                        <div>


                            <div class="popw shade">


                            </div>
                    <div class="popupc" style="display: block">
                        <div>
                            <div>
                                <div>

                                    <div class="popup-container shade">
						<span class="closse">
							<i class="icon-cancel"></i>
						</span>

                                        <div class="paypop red">
                                            <div class="icon">
                                                <img src="/home/images/unhapypay.svg" alt="" class="t">
                                                <img src="/home/images/unhapypaybg.svg" alt="" class="b">
                                            </div>
                                            <div class="title">
                                                <h3>
                                                    <img src="/home/images/card2.svg" alt="">
                                                    <span>پرداخت با خطا مواجه شد</span>
                                                </h3>
                                            </div>
                                            <div class="text">
                                                <!-- <span> پرداخت شما ناموفق بوده است  !</span> -->
                                                <span>در صورت وجود مشکل با تماس بگیرید</span>
                                            </div>
                                            <div class="button-container reight">
                                                @if($user->level=='teacher')
                                                 <span onclick="window.location.href='{{route('teacher.wallet')}}'" class="butt"><i class="icon-dashboard"></i>ورود به داشبورد</span>
                                                @else
                                                    <span onclick="window.location.href=' '" class="butt"><i class="icon-dashboard"></i>ورود به داشبورد</span>
                                                @endif
                                            </div>
                                            <div class="call">
                                                <a href="#"><i class="icon-support"></i><span>مشکلی دارید؟</span><span class="ti">تماس با پشتیبانی</span></a>
                                            </div>
                                        </div>


                                    </div>
                                    <script>
                                        $('body').css('overflow' , 'hidden')
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                        </div>
                    </div>


                @endsection







