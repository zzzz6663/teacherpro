@component('admin.section.content',['title'=>'لیست مدرس ها'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">لیست  مدرس ها</li>
    @endslot
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">  لیست مدرس ها</h3>
{{--                           <div class="card-tools">--}}
{{--                               <div class="btn-group-sm ml-5">--}}
{{--                               </div>--}}
{{--                           </div>--}}
                            <div class="card-tools">

                                <form style="display: inline-block" action="{{route('admin.teachers')}}" method="get">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        @method('get')
                                        @csrf
                                        <input type="text"  name="search" value="{{request('search')}}" class="form-control float-right" placeholder="جستجو">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>

                                        </div>

                                    </div>
                                </form>
                                <a class="btn btn-info" href="{{route('admin.teachers',['show'=>'cash'])}}">  با موجودی</a>

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tbody><tr>
                                    <th>شماره</th>
                                    <th>نام </th>
                                    <th>موبایل</th>
                                    <th>وضعیت</th>
                                    <th>درخواست نمایش</th>
                                    <th>موجودی</th>
                                    <th>عملکرد</th>
                                </tr>
                                @foreach($teachers as $teacher)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$teacher->name}} {{$teacher->family}}</td>
                                        <td>{{$teacher->mobile}}</td>
                                        <td>
                                            <span class="badge  badge-{{($teacher->active==1)?'success':'danger'}} ">{{($teacher->active==1)?'نمایش داده شود':' نمایش داده نشود'}}</span>
                                       </td>
                                       <td>
                                        <span class="badge  badge-{{($teacher->submit==1)?'success':'danger'}} ">{{($teacher->submit==1)?'    فعال بمانم':'     فعال نیستم'}}</span>
                                   </td>
                                        <td>
                                            {{number_format($teacher->cash)}}
                                            تومان
                                        </td>
                                        <td>
                                            <a href="{{route('admin.teacher.edit',$teacher->id)}}" class="btn btn-primary">edit</a>
                                            @if($teacher->cash>0)
                                                <a href="{{route('admin.teacher.pay',$teacher->id)}}" class="btn btn-success">ثبت پرداخت</a>
                                                @endif
                                        </td>
                                    </tr>
                                @endforeach



                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <div class="col-md-12">

            {{ $teachers->appends(Request::all())->links() }}

        </div>
    </div>



@endcomponent

