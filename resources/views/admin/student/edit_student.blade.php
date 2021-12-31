@extends('.master.manager')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">      پروفایل دانشجو  </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
                        <li class="breadcrumb-item"><a href="/admin/students">لیست    دانشجو ها</a></li>
                        <li class="breadcrumb-item">ویرایش دانشجو   </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img loading='lazy' class="profile-user-img img-fluid img-circle" src="{{asset('/src/avatar/'.$user->attr('avatar'))}}" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{$user->name}}
                                <br>
                                ({{$user->mobile}} ) </h3>

                            <p class="text-muted text-center">
                                <span class="badge  badge-{{($user->active==1)?'success':'danger'}} ">{{($user->active==1)?'فعال':'غیر فعال'}}</span>
                                <span  >{{($user->sex=='male')?'مذکر':'  مونث'}}</span>

                            </p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>  تاریخ ثبت نام</b> <a class="float-left">{{\Morilog\Jalali\Jalalian::forge($user->created_at)->format('%B %d، %Y')}}</a>
                                </li>
{{--                                <li class="list-group-item">--}}
{{--                                    <b>  رمز عبور</b> <a class="float-left">{{\Illuminate\Support\Facades\Crypt::decryptString($user->password)}}</a>--}}
{{--                                </li>--}}
                                <li class="list-group-item">
                                    <b>نام کاربری</b> <a class="float-left">{{$user->username}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>  email</b> <a class="float-left">  {{$user->email}} </a>
                                </li>
                                <li class="list-group-item">
                                    <b>  موجودی</b> <a class="float-left">  {{number_format($user->total_cash())}} تومان </a>
                                </li>
                                <li class="list-group-item">
                                    <b>  ای دی اسکای</b> <a class="float-left">  {{$user->sky_id}}  </a>
                                </li>
                                <li class="list-group-item">
                                    <b>کلاس های پیش رو </b> <a class="float-left">  {{$user->reserved_class()}}  </a>
                                </li>
                                <li class="list-group-item">
                                    <b>کلاس های   اجرا شده </b> <a class="float-left">  {{$user->passed_class()}}  </a>
                                </li>
                                <li class="list-group-item">
                                    <b>کلاس های      رزرو نشده </b> <a class="float-left">  {{$user->unreserved_class()}}  </a>
                                </li>
                            </ul>

                            <a href="{{route('admin.teacher.active',$user->id)}}" class="btn btn-{{($user->active==1)?'danger':'primary'}} btn-block"><b>    {{($user->active==1)?'غیرفعال کردن':'فعال کردن'}}</b></a>
                            <a href="{{route('admin.teacher.zaro.balance',$user->id)}}" class="btn btn-primary btn-block"><b> ریست کردن   </b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->



                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{$user->smeets()->count()/2}}</h3>

                                    <p> کلاسها</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="{{route('admin.student.class',$user->id)}}" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
{{--                        <div class="col-lg-3 col-6">--}}
{{--                            <!-- small box -->--}}
{{--                            <div class="small-box bg-success">--}}
{{--                                <div class="inner">--}}
{{--                                    <h3>{{$user->articles()->count()}}</h3>--}}

{{--                                    <p>  نوشته ها</p>--}}
{{--                                </div>--}}
{{--                                <div class="icon">--}}
{{--                                    <i class="ion ion-stats-bars"></i>--}}
{{--                                </div>--}}
{{--                                <a href="{{route('admin.teacher.article',$user->id)}}" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{$user->bills()->whereStatus('1')->count()}}</h3>

                                    <p>تراکنش ها</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="{{route('admin.student.bill',$user->id)}}" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>۶۵</h3>

                                    <p>بازدید جدید</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>


                    <div class="row">

                        <div class="col-md-12">
                            <div class="card card-widget">
                                <div class="card-header">
                                    <div class="user-block">
                                        <span class="username">   ویدئو معرفی </span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <video id="player" class="js-playeیr" playsinline controls data-poster="{{asset('/src/port_img/'.$user->attr('port_img'))}}">
                                        <source src="{{asset('/src/port_vid/'.$user->attr('port_vid'))}}" type="video/mp4" />
                                    </video>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Box Comment -->
                            <div class="card card-widget">
                                <div class="card-header">
                                    <div class="user-block">
                                        <span class="username">کاور</span>

                                    </div>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <img class="img-circle" src="{{asset('/src/bg/'.$user->attr('bg'))}}" alt="User Image">
                                </div>

                            </div>
                            <!-- /.card -->
                        </div>

                        <!-- /.col -->

                        <!-- /.col -->
                    </div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
