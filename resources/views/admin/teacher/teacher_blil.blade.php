@extends('.master.manager')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">          تراکنش های
                        {{$user->name}}
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
                        <li class="breadcrumb-item"><a href="/admin/teachers">   پروفایل معلم</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.teacher.edit',$user->id)}}">   پروفایل {{$user->name}}</a></li>
                        <li class="breadcrumb-item">  لیست تراکنش ها   </li>
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
                            <h3 class="card-title">  لیست تراکنش ها</h3>

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
                                    <th>مقدار</th>
                                    <th>نوع</th>
                                    <th>  وضعیت</th>
                                    <th>پیگیری</th>
                                    <th>باقیمانده</th>
                                    <th>زمان ثبت</th>
                                </tr>
                                @foreach($bill as $cl)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{number_format($cl->amount)}} تومان </td>
                                    <td>{{__('arr.'.$cl->type)}}</td>
                                    <td><small class="badge badge-{{($cl->status=='1')?'success':'danger'}}">{{($cl->status=='1')?'تایید شده':'تایید  نشده'}} </small></td>
                                    <td>{{$cl->id}}</td>
                                    <td>{{number_format($cl->remain)}} تومان </td>

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
    <section>
        {{ $bill->appends(Request::all())->links() }}
    </section>

    <!-- /.content -->
@endsection
