@component('home.student.content',['title'=>' تنظیمات  '])


    <div id="teacherpish">

        @slot('bread')


            @include('home.student.profile.bread_left',['name'=>'کیف پول  '])
        @endslot






    </div>
    <div class="etebar shade">
        <div class="widget-title">
            <h3>اعتبار حساب</h3>
            <div class="dot3">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="widget-content">
            <div class="row">
                <div class="col-lg-5 col-md-12">
                    <div>
                        <div class="eteb">
                            <ul>
                                <li>موجودی حساب  :</li>
                                <li>
                                    {{number_format($user->cash)}}

                                    تومان</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12">
                    <div>
                        <ul class="etmen">
{{--                            <li>--}}
{{--                                <div class="button-container reight">--}}
{{--                                    <span id="checkout" class="butt"><i class="icon-checkout"></i>تسویه حساب </span>--}}
{{--                                </div>--}}
{{--                            </li>--}}
                            <li>
                                <div class="button-container reight gray">
                                    <span id="wallet" class="butt"><i class="icon-charg" ></i>شارژ کیف پول</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="etebar-table shade">
        <div class="widget-title">
            <h3>تراکنش‌ها</h3>
            <div class="dot3">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="widget-content">
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <p><i class="icon-traconesh"></i>تمام تراکنش های شما در اینجا لیست شده اند</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <div id="topfilter" class="shade">
                            <div class="right">

                                <form action="">
                                    <span class="butt"><i class="icon-search"></i></span>
                                    <span class="close"><i class="icon-close"></i></span>
                                    <input type="text" placeholder="جست‌و‌جو در تراکنش‌ها ...">
                                </form>

                            </div>
                            <div class="left">
                                <span class="title">نمایش  :</span>
                                <ul class="oredering">
                                    <li class="{{request('type')?'':'active'}}">
                                        <span onclick="window.location.href='{{route('student.wallet')}}'">همه</span>
                                    </li>
                                    <li class="{{(request('type')=='charge_wallet')?'active':''}}" onclick="window.location.href='{{request()->fullUrlWithQuery(['type'=>'charge_wallet'])}}'"><span>شارژ کیف</span></li>
                                    <li class="{{(request('type')=='reserve_meet')?'active':''}}" onclick="window.location.href='{{request()->fullUrlWithQuery(['type'=>'reserve_meet'])}}'"><span>  رزرو</span></li>
{{--                                    <li class="{{(request('type')=='reserve_meet')?'active':''}}" onclick="window.location.href='{{request()->fullUrlWithQuery(['type'=>'reserve_meet'])}}'"><span>  رزرو</span></li>--}}

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div>

                        <div class="table-responsive">

                            <table>
                                <thead>
                                <tr>
                                    <th><span> ردیف</span></th>
                                    <th><span>شماره‌تراکنش</span></th>
                                    <th><span>نوع</span></th>
                                    <th><span>کیف</span></th>
                                    <th><span>درگاه</span></th>
                                    <th><span>تاریخ تراکنش</span></th>
                                    <th><span>مبلغ(تومان)</span></th>
                                    <th><span>مانده(تومان)</span></th>
{{--                                    <th><span></span></th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($bills as $bill)
                                    @php($ar='tup')
                                    @switch($bill->type)
                                        @case('reserve_meet')
                                        @php($ar='tup')
                                        @break
                                        @case('charge_wallet')
                                        @case('s_penalty_class_remain')
                                        @php($ar='tdown')
                                        @break
                                    @endswitch
                                <tr>
                                    <td><span>{{$loop->iteration}}</span></td>
                                    <td><span><i class="icon-{{$ar}}"></i>{{$bill->id}}</span></td>
                                    <td><span> {{__('arr.'.$bill->type) }}     </span></td>
                                    <td><span> {{number_format($bill->wallet)}}  </span></td>
                                    <td><span> {{number_format($bill->port)}}  </span></td>
                                    <td><span>{{\Morilog\Jalali\Jalalian::forge($bill->created_at)->format('%B %d، %Y')}}</span></td>

                                    <td><span>{{number_format($bill->amount)}}   </span></td>
                                    <td><span>{{number_format($bill->remain)}}</span></td>
{{--                                    <td><span class="but">جزییات</span></td>--}}
                                </tr>
                                @endforeach
                                </tbody>
                            </table>


                            {{ $bills->appends(Request::all())->links() }}

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


{{--    {{dd(\Illuminate\Support\Facades\Crypt::encryptString(0))}}--}}

    <div class="popupc" id="wallet_popup">
        <div>
            <div>
                <div>

                    <div class="popup-container shade">
						<span class="close">
							<i class="icon-cancel"></i>
						</span>
                        <form action="{{route('student.charge.wallet',$user->id)}}" class=" " method="post"  >
                            @csrf
                            @method('post')
                        <div class="pay-form">
                            <div class="right">
                                <img src="/home/images/wallet3.png" alt="">
                            </div>


                            <div class="left">
                                <h3> افزایش موجودی کیف پول :</h3>

                                <div class="input-container fill">
                                    <i class="icon-credit-card"></i>
                                    <label for=""> مبلغ را وارد کنید</label>
                                    <input  type="number" id="amount" name="amount"  placeholder="نمونه: 200000 تومان">
                                    <br>
                                    <br>
                                    <div style="font-size: 18px; color: #0eb582; font-weight: bold" class="amount"> </div>
                                </div>

                                <div class="prices">
                                    <div class="label">ویا یک گزینه را انتخاب کنید</div>
                                    <ul>

                                        <li>
                                            <div class="lable-container">
                                                <input type="radio" name="pricech" id="p50" value="p50">
                                                <label for="p50">
                                                    <div>
                                                        <span>‏50,000 تومان</span>
                                                    </div>
                                                </label>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="lable-container">
                                                <input type="radio" name="pricech" id="p100" value="p100">
                                                <label for="p100">
                                                    <div>
                                                        <span>‏100,000 تومان</span>
                                                    </div>
                                                </label>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="lable-container">
                                                <input type="radio" name="pricech" id="p200" value="p200">
                                                <label for="p200">
                                                    <div>
                                                        <span>‏200,000 تومان</span>
                                                    </div>
                                                </label>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="lable-container">
                                                <input type="radio" name="pricech" id="p250" value="p250">
                                                <label for="p250">
                                                    <div>
                                                        <span>‏250,000 تومان</span>
                                                    </div>
                                                </label>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="lable-container">
                                                <input type="radio" name="pricech" id="p500" value="p500">
                                                <label for="p500">
                                                    <div>
                                                        <span>‏500,000 تومان</span>
                                                    </div>
                                                </label>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="lable-container">
                                                <input type="radio" name="pricech" id="p1000" value="p1000">
                                                <label for="p1000">
                                                    <div>
                                                        <span>‏1,000,000 تومان</span>
                                                    </div>
                                                </label>
                                            </div>
                                        </li>

                                    </ul>
                                </div>

                                <div class="button-container reight">
                                    <input type="submit" value="تایید و ادامه" class="bt">
                                </div>
                            </div>



                        </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="popupc" id="checkout_popup">
        <div>
            <div>
                <div>

                    <div class="popup-container shade">
						<span class="close">
							<i class="icon-cancel"></i>
						</span>

                        <div class="pay-form">
                            <div class="right">
                                <img src="/home/images/wallet3.png" alt="">
                            </div>

                            <form action="" class="delete_user_note" method="post"  >
                                @csrf
                                @method('post')
                            <div class="left">
                                <h3>درخواست تسویه حساب</h3>

                                <div class="input-container fill">
                                    <i class="icon-credit-card"></i>
                                    <label for="">مبلغ را وارد کنید</label>
                                    <input type="number" value="" placeholder="مبلغ مورد نظر را وارد کنید.">
                                </div>

                                <div class="input-container ok fill">
                                    <label for="">انتخاب حساب یا کارت</label>
                                    <i class="icon-credit-card"></i>
                                    <input type="text" placeholder="شماره کارت مورد نظر را وارد کنید.">
                                </div>

                                <div class="input-container chei">
                                    <div class="lable-container">
                                        <input type="checkbox" name="remeber" id="kard" value="kard">
                                        <label for="kard" class="che">
                                            <div class="right">
												<span>
													<i class="icon-tick"></i>
												</span>
                                            </div>
                                            <div class="left">
                                                <span class="top">ذخیره شماره کارت</span>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="input-container fill">
                                    <div class="text">
                                        <span class="r">حداکثر زمان واریز</span>
                                        <span class="l">‏4 روز و 0 ساعت</span>
                                    </div>
                                </div>

                                <div class="button-container reight">
                                    <input type="submit" class="bt" value="درخواست واریز وجه">
                                </div>
                            </div>
                            </form>



                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>



@endcomponent
