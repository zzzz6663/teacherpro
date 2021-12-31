@extends('master.home')




                @section('main_body')



                    <div id="maincontent" class="rows">
                        <div>


                            <div class="short-link shade">

                                <div class="pic">
                                    <img class="bg" src="/home/images/profile.svg" alt="">

                                    <img class="pro" src="{{asset('/src/avatar/'.$fclass->user->attr('avatar'))}}" alt="">
                                </div>

                                <div class="name">
                                    <span>استاد  :</span>
                                    <span>  {{$fclass->user->name}}</span>
                                </div>

                                <div class="licence">
                                    <span>       {{$fclass->name}}    </span>
                                </div>

                                <div class="text">
                                  <p>
                                      {{$fclass->user->name}}
                                      شما را به کلاس
                                      {{$fclass->name}}
                                      را دعوت کرده است
                                  </p>
                                </div>

                                <div class="link">
                                    <div class="button-container reight">
                                        @if(\Illuminate\Support\Facades\Auth::check())
                                            @if(\Illuminate\Support\Facades\Auth::user()->level=='teacher')
                                                <a href="{{route('teacher.dashboard')}}"   rel="nofollow" class="sign bt"> <span class="icon-user-add"></span>       ورود به پنل </a>
                                            @else
                                                <a href="{{route('student.accept.fclass',$fclass->id)}}"   rel="nofollow" class="sign bt"> <span class="icon-user-add"></span>       قبول دعوت مدرس         <a>


                                            @endif
                                        @else
                                            <span id="show_login" class="butt bt">قبول دعوت</span>

                                        @endif
                                    </div>
                                </div>

                                <div class="guide">
                                    <span class="title"> راهنمای استفاده از تیچر پرو  :</span>
                                    <a  >
                                        <i class="icon-movie"></i>
                                        <span id="show_video">مشاهده آموزش</span>
                                    </a>
                                </div>


                            </div>


                        </div>
                    </div>



                    <div class="popupc" id="video_tut">
                        <div>
                            <div>
                                <div>

                                    <div class="popup-container mini shade">
                                            <span class="close" onclick="window.location.href='{{route('teacher.dashboard')}}'">
                                                <i class="icon-cancel"></i>
                                            </span>

                                        <div class="chclass-pop">
                                            <div class="top">

                                                <h3>
                                                    آموزش
                                                </h3>


                                            </div>
                                            <div class="form">
                                                <video id="player" class="js-player" playsinline controls data-poster="/src/videos/test.mp4">
                                                    <source src="/src/videos/test.mp4" type="video/mp4" />
                                                </video>

                                            </div>
                                            <div class="foot">
                                                <ul>
                                                    <li>
                                                        <div class="button-container reight border">
                                                            <span class="butt close_popup" onclick="window.location.href='{{Request::url()}}'">بستن</span>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>

                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endsection







