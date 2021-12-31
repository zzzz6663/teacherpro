@extends('.master.manager')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">        کلاس‌های
                        {{$user->name}}
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
                        <li class="breadcrumb-item"><a href="/admin/students">   پروفایل دانشجو</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.student.edit',$user->id)}}">   پروفایل {{$user->name}}</a></li>
                        <li class="breadcrumb-item">  لیست کلاس   </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">  لیست کلاس‌ها</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="جستجو">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tbody><tr>
                                    <th>شماره</th>
                                    <th>معلم</th>
                                    <th>قیمت</th>
                                    <th>کمسیون</th>
                                    <th>وضعیت دانشجو</th>
                                    <th>وضعیت معلم</th>
                                    <th>تاریخ برگزاری</th>
                                    <th>زمان ثبت</th>
                                </tr>
                                @foreach($class as $cl)

                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                       {{($cl->user->name)}}
                                    </td>
                                    <td> {{number_format($cl->price)}} تومان </td>
                                    <td> {{number_format($cl->com)}} تومان </td>
                                    <td>{{($cl->s_click=='0')?'وارد نشده':'وارد شده'}} </td>
                                    <td>{{($cl->t_click=='0')?'وارد نشده':'وارد شده'}} </td>
                                    <td>{{\Morilog\Jalali\Jalalian::forge($cl->start) }}</td>
                                    <td>{{\Morilog\Jalali\Jalalian::forge($cl->created_at) }}</td>
                                </tr>
                                @endforeach
                                </tbody></table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <div class="pagi">
        {{ $class->appends(Request::all())->links('home.section.pagination') }}
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">  لیست کلاس‌ها ی کنسل شده</h3>

                            {{--                            <div class="card-tools">--}}
                            {{--                                <div class="input-group input-group-sm" style="width: 150px;">--}}
                            {{--                                    <input type="text" name="table_search" class="form-control float-right" placeholder="جستجو">--}}

                            {{--                                    <div class="input-group-append">--}}
                            {{--                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tbody><tr>
                                    <th>شماره</th>
                                    <th>نام </th>
                                    <th>تاریخ </th>
                                </tr>

                                @foreach($user->cmeets()->latest()->get() as $cm)
                                    @php
                                        $meet=\App\Models\Meet::find($cm->meet_id);

                                    @endphp
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <a href="{{route('admin.teacher.edit',$meet->user->id)}}">{{$meet->user->name}}
                                            </a>

                                        </td>
                                        <td>
                                            @if($meet)

                                                {{\Morilog\Jalali\Jalalian::forge($meet->start) }}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody></table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">  لیست کلاس‌های ویرایش شده</h3>

                            {{--                            <div class="card-tools">--}}
                            {{--                                <div class="input-group input-group-sm" style="width: 150px;">--}}
                            {{--                                    <input type="text" name="table_search" class="form-control float-right" placeholder="جستجو">--}}

                            {{--                                    <div class="input-group-append">--}}
                            {{--                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tbody><tr>
                                    <th>شماره</th>
                                    <th>تاریخ </th>
                                </tr>

                                @foreach($user->emeets()->latest()->get() as $em)
                                    @php
                                        $meet=\App\Models\Meet::find($em->meet_id);
                                    @endphp
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            @if($meet)
                                                {{\Morilog\Jalali\Jalalian::forge($meet->start) }}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody></table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>



@endsection
