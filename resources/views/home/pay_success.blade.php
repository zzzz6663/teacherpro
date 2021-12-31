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


                                <div class="paypop green">
                                    <div class="icon">
                                        <img style="max-width: 30%" src="/home/images/hapypay.svg" alt="" class="t">
                                        <img  src="/home/images/hapypaybg.svg" alt="" class="b">
                                    </div>
                                    <div class="title">
                                        <h3>
                                            <img src="/home/images/card.svg" alt="">
                                            <span>پرداخت با موفقیت انجام شد</span>
                                        </h3>
                                    </div>
                                    <div class="text" style="margin-bottom:0">
                                        <span>شماره سریال پرداختی شما  : </span>
                                        <span>{{$bill->id}}</span>
                                    </div>
                                    {{--                                    <div class="button-container reight">--}}
                                    {{--                                        <span class="butt"><i class="icon-dashboard"></i>ورود به داشبورد</span>--}}
                                    {{--                                    </div>--}}
                                    <div class="button-container reight">
                                        <span onclick="window.location.href='{{route('student.wallet')}}'" class="butt"><i class="icon-dashboard"></i>ورود به داشبورد</span>

                                        {{--                                        @if($user->level=='teacher')--}}
{{--                                            <span onclick="window.location.href='{{route('teacher.wallet')}}'" class="butt"><i class="icon-dashboard"></i>ورود به داشبورد</span>--}}
{{--                                        @else--}}
{{--                                            <span onclick="window.location.href='{{route('student.wallet')}}'" class="butt"><i class="icon-dashboard"></i>ورود به داشبورد</span>--}}
{{--                                        @endif--}}
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
