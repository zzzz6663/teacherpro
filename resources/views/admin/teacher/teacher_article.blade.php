@extends('.master.manager')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">          نوشته های
                        {{$user->name}}
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
                        <li class="breadcrumb-item"><a href="/admin/teachers">   پروفایل معلم</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.teacher.edit',$user->id)}}">   پروفایل {{$user->name}}</a></li>
                        <li class="breadcrumb-item">  لیست نوشته ها   </li>
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
                            <h3 class="card-title">  لیست نوشته ها</h3>

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
                                    <th>عنوان</th>
                                    <th>وضعیت</th>
                                    <th>تایید شده</th>
                                    <th>نمایش شده</th>


                                    <th>زمان ثبت</th>
                                </tr>
                                @foreach($article as $cl)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$cl->title}}</td>
                                    <td><small class="badge badge-{{($cl->active=='1')?'success':'danger'}}">{{($cl->active=='1')?'ثبت شده':'ثبت نشده'}} </small></td>
                                    <td>
                                        <form action="{{route('admin.teacher.article.active',$cl->id)}}" class=" " method="post"  >
                                            @csrf
                                            @method('post')
                                            <div class="buttons pointer"  >
                                                <button type="submit" class="btn btn-bslock btn-{{($cl->submit=='1')?'success':'danger'}} btn- ">{{($cl->submit=='1')?'deactive':'active'}}</button>

                                                {{--                    <span class="sane">ﺗﺎﯾﯿﺪ و ﺛﺒﺖ</span>--}}
                                                {{--                    <span class="cancel">لغو</span>--}}
                                            </div>
                                        </form>

                                    </td>
                                    <td><a class="btn btn-blsock btn-warning tn-flaیtb" href="{{route('admin.teacher.article.show',[$cl->id,$user->id] )}}">مشاهده</a></td>
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
        {{ $article->appends(Request::all())->links() }}
    </section>

    <!-- /.content -->
@endsection
