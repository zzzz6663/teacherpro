@component('admin.section.content',['title'=>' تنظیمات  '])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item"> تنظیمات     </li>
    @endslot
    <?php

    $setting = new \App\Models\Setting();
//    dd($setting->set('password'));
    ?>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">  تنظیمات ورود</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
{{--                        @if($errors->any())--}}
{{--                            {!! implode('', $errors->all('<div class="text-danger">:message</div>'))  !!}--}}
{{--                        @endif--}}
                        <form role="form" method="post" action="{{route('admin.login.info')}}">
                            @method('post')
                            @csrf

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="exampleInputEmail1"> Username     </label>
                                    <input type="text" value="{{old('email',$user->email)}}"   name="email" class="form-control" id="exampleInputEmail1" placeholder="    email  ">
                                    @error('username')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password"
                                           value="{{\Illuminate\Support\Facades\Crypt::decryptString($user->password)}}"
                                           name="password" class="form-control" id="exampleInputPassword1" placeholder=" Password">
                                    @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">ارسال</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->


                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <!-- left column -->

                <!--/.col (left) -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">  حداقل و حداکثر قیمت </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        {{--                        @if($errors->any())--}}
                        {{--                            {!! implode('', $errors->all('<div class="text-danger">:message</div>'))  !!}--}}
                        {{--                        @endif--}}
                        <form role="form" method="post" action="{{route('admin.teacher.save.max.min')}}">
                            @method('post')
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="max_price"> max price teacher     </label>
                                    <input type="text" value="{{old('max_price',$setting->set('max_price'))}}"   name="max_price" class="form-control" id="max_price" placeholder="    max_price  ">
                                    @error('max_price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="min_price">min price teacher </label>
                                    <input type="text"  value="{{old('max_price',$setting->set('min_price'))}}"  name="min_price" class="form-control" id="min_price" placeholder=" min_price">
                                    @error('min_price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">ارسال</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->


                </div>
                <!-- right column -->

            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->


        <div class="row">
            <div class="col-md-12">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">بازه های قیمتی برای تعیین کمسیون</h3>
                    </div>
                    <form role="form" method="post" action="{{route('admin.teacher.save.period')}}">
                        @method('post')
                        @csrf
                    <div class="card-body">
                        @for($i=1;$i<8;$i++)
                        <div class="row">
                           <div class="col-md-12">
                               <div class="row">

                               <div class="col-6 form-group">
                                   <label for="period{{$i}}">period{{$i}}
                                   </label>
                                   <span class="tx"></span>
                                   <input type="number" name="period{{$i}}"   value="{{old('period'.$i,$setting->set('period'.$i))}}"  class="form-control money" placeholder="13000">

                                   @error('period'.$i)
                                   <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                               </div>
                                   @if($i<7)
                               <div class="col-6 form-group">
                                   <label for="wage{{$i}}">wage{{$i}}
                                   </label>
                                   <span class="tx"></span>
                                   <input type="number" name="wage{{$i}}"   value="{{old('wage'.$i,$setting->set('wage'.$i))}}"  class="form-control money" placeholder="13000">

                                   @error('wage'.$i)
                                   <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                               </div>
                                   @endif

                               </div>

                           </div>



                        </div>
                        @endfor
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">save</button>
                    </div>
                    </form>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>

@endcomponent

