@component('admin.section.content',['title'=>'لیست کاربران'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">لیست کاربران</li>
    @endslot


    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">  لیست  دانشجو ها</h3>
                            <div class="card-tools">
                                <div class="btn-group-sm">
                                    {{--                                   <a class="btn btn-info" href="{{route('languages.create')}}">create new</a>--}}
                                </div>
                            </div>
                            <div class="card-tools">
                                <form action="{{route('admin.users')}}" method="get">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        @method('get')
                                        @csrf
                                        <input type="text"  name="search" value="{{request('search')}}" class="form-control float-right" placeholder="جستجو">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
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
                                    <th>عملکرد</th>
                                </tr>
                                @foreach($students as $user)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$user->name}} {{$user->family}}</td>
                                        <td>{{$user->mobile}}</td>
                                        <td>
                                            <span class="badge  badge-{{($user->active==1)?'success':'danger'}} ">{{($user->active==1)?'فعال':'غیر فعال'}}</span>
                                        </td>
                                        <td>
                                            <a href="{{route('admin.student.edit',$user->id)}}" class="btn btn-primary">edit</a>
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
            {{ $students->appends(Request::all())->links() }}


        </div>
    </div>
@endcomponent

