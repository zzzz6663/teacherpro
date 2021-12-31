@component('admin.section.content',['title'=>'لیست پیغام  ها'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">لیست  پیغام  ها</li>
    @endslot

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">  لیست پیغام  ها</h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tbody><tr>
                                    <th>شماره</th>
                                    <th>نام </th>
                                    <th>ایمیل </th>
                                    <th>موبایل </th>
                                    <th>پیام </th>
                                    <th>تاریخ</th>
                                </tr>
                                @foreach($payams as $payam)
                                    <tr>
                                        <td>{{$loop->iteration }}</td>
                                        <td>{{$payam->name}}</td>
                                        <td>{{$payam->email}}</td>
                                        <td>{{$payam->mobile}}</td>
                                        <td>{{$payam->payam}}</td>
                                        <td>{{\Morilog\Jalali\Jalalian::forge($payam->created_at)->format('%B %d، %Y')}}</td>

                                    </tr>
                                @endforeach


                                </tbody></table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <div class="col-md-12">

            <div class="pagi">
                {{ $payams->appends(Request::all())->links('home.section.pagination') }}
            </div>

        </div>
    </div>



@endcomponent

