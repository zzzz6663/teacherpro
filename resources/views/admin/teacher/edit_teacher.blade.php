@extends('.master.manager')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">      پروفایل مدرس  </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
                        <li class="breadcrumb-item"><a href="/admin/teachers">لیست    مدرس ها</a></li>
                        <li class="breadcrumb-item">ویرایش مدرس   </li>
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
                                <img class="profile-user-img img-fluid img-circle" src="{{asset('/src/avatar/'.$teacher->attr('avatar'))}}" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{$teacher->name}} {{$teacher->family}}
                                <br>
                                ({{$teacher->mobile}} ) </h3>

                            <p class="text-muted text-center">
                                <span class="badge  badge-{{($teacher->active==1)?'success':'danger'}} ">{{($teacher->active==1)?'فعال':'غیر فعال'}}</span>
                                <span  >{{($teacher->sex=='male')?'مذکر':'  مونث'}}</span>

                            </p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>  تاریخ ثبت نام</b> <a class="float-left">{{\Morilog\Jalali\Jalalian::forge($teacher->created_at)->format('%B %d، %Y')}}</a>
                                </li>
{{--                                <li class="list-group-item">--}}
{{--                                    <b>  رمز عبور</b> <a class="float-left">{{\Illuminate\Support\Facades\Crypt::decryptString($teacher->password)}}</a>--}}
{{--                                </li>--}}
                                <li class="list-group-item">
                                    <b>نام کاربری</b> <a class="float-left">{{$teacher->username}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>  email</b> <a class="float-left">  {{$teacher->email}} </a>
                                </li>
                                <li class="list-group-item">
                                    <b>  موجودی</b> <a class="float-left">  {{number_format($teacher->total_cash())}} تومان </a>
                                </li>
                                <li class="list-group-item">
                                    <b>  ای دی اسکای</b> <a class="float-left">  {{$teacher->sky_id}}  </a>
                                </li>
                                <li class="list-group-item">
                                    <b>کلاس های پیش رو </b> <a class="float-left">  {{$teacher->reserved_class()}}  </a>
                                </li>
                                <li class="list-group-item">
                                    <b>کلاس های   اجرا شده </b> <a class="float-left">  {{$teacher->passed_class()}}  </a>
                                </li>
                                <li class="list-group-item">
                                    <b>کلاس های      رزرو نشده </b> <a class="float-left">  {{$teacher->unreserved_class()}}  </a>
                                </li>
                            </ul>

                            <a href="{{route('admin.teacher.active',$teacher->id)}}" class="btn btn-{{($teacher->active==1)?'danger':'primary'}} btn-block"><b>    {{($teacher->active==1)?'غیرفعال کردن':'فعال کردن'}}</b></a>
                            <a href="{{route('admin.teacher.zaro.balance',$teacher->id)}}" class="btn btn-primary btn-block"><b> ریست کردن   </b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>


                    <!-- /.card -->

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">  وضعیت پروفایل  </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong>
                                <small class="badge badge-{{$teacher->attr('price_plan')?'success':'danger'}} ">  تعیین قیمت جلسات  </small>
                            </strong>

                            <hr>
                            <strong>
                                <small class="badge badge-{{$teacher->attr('time_plan')?'success':'danger'}} ">      تعیین برنامه زمانی  </small>
                            </strong>
                            <hr>

                            <strong>
                                <small class="badge badge-{{$teacher->attr('avatar')?'success':'danger'}} ">          آپلود تصویر پروفایل  </small>
                            </strong>
                            <hr>

                            <strong>
                                <small class="badge badge-{{$teacher->languages()->count()>0?'success':'danger'}} ">       انتخاب زبان  </small>
                            </strong>
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">قیمت ها </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fa fa-book mr-1"></i> یک جلسه</strong>
                            <p class="text-muted">
                                {{number_format($teacher->meet1)}} تومان
                            </p>
                            <hr>
                            <strong><i class="fa fa-book mr-1"></i> پنج جلسه</strong>
                            <p class="text-muted">
                                {{number_format($teacher->meet5)}} تومان
                            </p>
                            <hr>
                            <strong><i class="fa fa-book mr-1"></i> ده جلسه</strong>
                            <p class="text-muted">
                                {{number_format($teacher->meet10)}} تومان
                            </p>
                            <hr>
                             <strong><i class="fa fa-book mr-1"></i>   وضعیت جلسه آزمایشی</strong>
                            <p class="text-muted">

                               {{__('arr.'.$teacher->attr('freeclass'))}}
                                @if($teacher->attr('freeclass')=='nofree')
                                @endif
                                {{number_format($teacher->attr('free_meeting_price'))}}  تومان
                            </p>
                            <hr>
                        </div>
                        <!-- /.card-body -->
                    </div>


                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">   خصوصیت ها </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{route('admin.teacher.save.attr',$teacher->id )}}"  method="post"  >
                                @csrf
                                @method('post')
                            <p class="text-muted">
                                <label for="experienced">experienced</label>
                                <input type="text"  hidden name="experienced" >
                                <input type="checkbox" {{($teacher->attr('experienced')=='experienced')?'checked':''}} id="experienced" name="experienced" value="experienced">
                            </p>
                            <hr>
                                <p class="text-muted">
                                    <label for="motivated">motivated</label>
                                    <input type="text"  hidden name="motivated" >
                                    <input type="checkbox" {{($teacher->attr('motivated')=='motivated')?'checked':''}} id="motivated" name="motivated" value="motivated">
                                </p>
                                <hr>
                                <p class="text-muted">
                                    <label for="accepted">accepted</label>
                                    <input type="text"  hidden name="accepted" >
                                    <input type="checkbox" {{($teacher->attr('accepted')=='accepted')?'checked':''}} id="accepted" name="accepted" value="accepted">
                                </p>
                                <hr>

                                <input type="submit" class="btn btn-primary" value="save">
                            </form>




                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{$teacher->meets()->where('pair','!=',null)->count()}}</h3>

                                    <p> کلاسها</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="{{route('admin.teacher.class',$teacher->id)}}" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{$teacher->articles()->count()}}</h3>

                                    <p>  نوشته ها</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="{{route('admin.teacher.article',$teacher->id)}}" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{$teacher->bills()->whereStatus('1')->count()}}</h3>

                                    <p>تراکنش ها</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="{{route('admin.teacher.bill',$teacher->id)}}" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
{{--                        <div class="col-lg-3 col-6">--}}
{{--                            <!-- small box -->--}}
{{--                            <div class="small-box bg-danger">--}}
{{--                                <div class="inner">--}}
{{--                                    <h3>۶۵</h3>--}}

{{--                                    <p>بازدید جدید</p>--}}
{{--                                </div>--}}
{{--                                <div class="icon">--}}
{{--                                    <i class="ion ion-pie-graph"></i>--}}
{{--                                </div>--}}
{{--                                <a href="#" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <!-- ./col -->
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">سطوح تدریس
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                    $expert=array('Starter','Elementary','Intermediate','Upper_intermediate','Advanced','Mastery' );
                                    ?>
                                    @foreach($expert as $ex)
                                            @if(!empty($teacher->attr($ex)))
                                                <span style="font-weight: bold">{{($teacher->attr($ex)?__('arr.'.$ex):'')}}</span>
                                            @endif
                                        @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">لهجه مدرس
                                        تدریس
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                    $expert=array('American_Accent','British_Accent','Australian_Accent','Indian_Accent','Irish_Accent','Scottish_Accent','South_African_Accent' );
                                    ?>
                                    @foreach($expert as $ex)
                                            @if(!empty($teacher->attr($ex)))
                                                <span style="font-weight: bold">{{($teacher->attr($ex)?__('arr.'.$ex):'')}}</span>
                                            @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">  سن تدریس
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                    $expert=array('Children','Teenagers','Adults'  );
                                    ?>
                                    @foreach($expert as $ex)
                                        @if(!empty($teacher->attr($ex)))
                                        <span style="font-weight: bold">{{($teacher->attr($ex)?__('arr.'.$ex):'')}}</span>
                                            @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        کلاس شامل چه مواردی میشود
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                    $expert=array('Curriculum','Homework','Learning_Materials','Writing_Exercises','Lesson_Plans','Proficiency_Assessment','Quizzes','Tests','Reading_Exercises' );
                                    ?>
                                        @foreach($expert as $ex)
                                            @if(!empty($teacher->attr($ex)))
                                                <span style="font-weight: bold">{{($teacher->attr($ex)?__('arr.'.$ex):'')}}</span>
                                            @endif
                                        @endforeach
                                </div>
                            </div>
                        </div>



                        <div class="col-md-4">
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">موضوعات
                                        کلاس
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                    $expert=array('Business_English','Interview_Preparation','Reading_Comprehension'
                                    ,'Listening_Comprehension','Speaking_Practice','Writing_Correction','Vocabulary_Development'
                                    ,'Grammar_Development','Academic_English','Accent_Reduction','Phonetics' );
                                    ?>
                                    @foreach($expert as $ex)
                                        @if(!empty($teacher->attr($ex)))
                                            <span style="font-weight: bold">{{($teacher->attr($ex)?__('arr.'.$ex):'')}}</span>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        آمادگی برای آزمون
                                        انگلیسی
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                    $expert=array('TOEFL','IELTS','PTE'
                                    ,'GRE','CELPIP','Duolingo','TOEIC'
                                    ,'KET','PET','CAE','FCE' ,'CPE' ,'BEC','TOEFLPhD' );
                                    ?>
                                    @foreach($expert as $ex)
                                        @if(!empty($teacher->attr($ex)))
                                            <span style="font-weight: bold">{{($teacher->attr($ex)?__('arr.'.$ex):'')}}</span>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        آمادگی برای آزمون
                                        فرانسه
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                    $expert=array('TCF','TEF','DELF'
                                    ,'DALF'  );
                                    ?>
                                    @foreach($expert as $ex)
                                        @if(!empty($teacher->attr($ex)))
                                            <span style="font-weight: bold">{{($teacher->attr($ex)?__('arr.'.$ex):'')}}</span>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        آمادگی برای آزمون
                                        آلمانی
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                    $expert=array('Goethe','Telc','Test_Daf','OSD'  );
                                    ?>
                                    @foreach($expert as $ex)
                                        @if(!empty($teacher->attr($ex)))
                                            <span style="font-weight: bold">{{($teacher->attr($ex)?__('arr.'.$ex):'')}}</span>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        آمادگی برای آزمون
                                        ترکی استانبولی
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                    $expert=array('TOMER','TYS'  );
                                    ?>
                                    @foreach($expert as $ex)
                                        @if(!empty($teacher->attr($ex)))
                                            <span style="font-weight: bold">{{($teacher->attr($ex)?__('arr.'.$ex):'')}}</span>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        آمادگی برای آزمون
                                        روسی
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                    $expert=array('DELE','SIELE'  );
                                    ?>
                                    @foreach($expert as $ex)
                                        @if(!empty($teacher->attr($ex)))
                                            <span style="font-weight: bold">{{($teacher->attr($ex)?__('arr.'.$ex):'')}}</span>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        زبان‌های مدرس

                                    </h3>
                                </div>

                                <div class="card-body p-0">
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <th style="width: 10px">ردیف</th>
                                            <th>نام</th>
                                            <th>عکس</th>
                                            <th>سطح</th>
                                            <th>وضعیت</th>
{{--                                            <th>{{dd($teacher->languages())}}</th>--}}


                                        </tr>
                                        @foreach($teacher->languages()->withPivot('level','status')->get() as $lang)
                                            <tr>
                                                <td><span>{{$loop->iteration}}    </span></td>
                                                <td><span>   {{$lang->name}} </span></td>
                                                <td><span>    <img style="width: 50px; height: 50px; border-radius: 100%" src="{{asset('src/img/lang/'.$lang->img)}}" alt=""></span></td>
                                                <td><span> {{__('arr.'.$lang->pivot->level)}}   </span></td>
                                                <td><span> {{__('arr.'.$lang->pivot->status)}}   </span></td>

                                            </tr>
                                        @endforeach


                                        </tbody></table>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">
                                          رزومه ها

                                    </h3>
                                </div>

                                <div class="card-body p-0">
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <th style="width: 10px">ردیف</th>
                                            <th>نوع</th>
                                            <th>عنوان</th>
                                            <th>اطلاعات</th>
                                            <th>مکان</th>
                                            <th>محدوده</th>
                                            {{--                                            <th>{{dd($teacher->languages())}}</th>--}}


                                        </tr>
                                        @foreach($teacher->resumes()->get() as $res)
                                            <tr>
                                                <td><span>{{$loop->iteration}}    </span></td>
                                                <td>{{__('arr.'.$res->type)}}</td>
                                                <td>{{$res->title}}</td>
                                                <td>{{$res->info}}</td>
                                                <td>{{$res->place}}</td>
                                                <td>{{$res->from}}-{{$res->till}}</td>
                                            </tr>
                                        @endforeach


                                        </tbody></table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        شماره شبا
                                    </h3>
                                </div>
                                <div class="card-body">
                                     {{$teacher->attr('shaba')}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        شماره کارت
                                    </h3>
                                </div>
                                <div class="card-body">
                                     {{$teacher->attr('cart')}}
                                </div>
                            </div>
                        </div>
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
                                    <video id="player" class="js-playeیr" playsinline controls data-poster="{{asset('/src/port_img/'.$teacher->attr('port_img'))}}">
                                        <source src="{{asset('/src/port_vid/'.$teacher->attr('port_vid'))}}" type="video/mp4" />
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
                                    <img class="img-circle" src="{{asset('/src/bg/'.$teacher->attr('bg'))}}" alt="User Image">
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
