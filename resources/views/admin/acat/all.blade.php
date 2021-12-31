@component('admin.section.content',['title'=>'لیست کاربران'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">لیست دسته بندی ها</li>
    @endslot


    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">  لیست  دسته بندی ها</h3>
                            <div class="card-tools">
                                <div class="btn-group-sm">
                                    {{--                                   <a class="btn btn-info" href="{{route('languages.create')}}">create new</a>--}}
                                </div>
                            </div>
                            <div class="card-tools">
                                <div class="btn-group-sm">
                                    <a class="btn btn-info" href="{{route('acats.create')}}">create new</a>
                                </div>
                            </div>
{{--                            <div class="card-tools">--}}
{{--                                <form action="{{route('acats.create')}}" method="get">--}}
{{--                                    <div class="input-group input-group-sm" style="width: 150px;">--}}
{{--                                        @method('get')--}}
{{--                                        @csrf--}}
{{--                                        <input type="text"  name="search" value="{{request('search')}}" class="form-control float-right" placeholder="جستجو">--}}
{{--                                        <div class="input-group-append">--}}
{{--                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div>--}}
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tbody><tr>
                                    <th>شماره</th>
                                    <th>نام </th>
                                    <th>  سرشاخه</th>
                                    <th>  ویرایش</th>
                                </tr>
                                @foreach(\App\Models\Acat::latest()->get() as $acat)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$acat->name}}</td>
                                        <td>
                                            {{(\App\Models\Acat::find($acat->parent_id))?\App\Models\Acat::find($acat->parent_id)->name:''}}</td>
                                        <td>
                                            <a  href="{{route('acats.edit',$acat->id)}}" class="btn btn-primary">edit</a>
                                            <form style="display: inline-block" action="{{route('acats.destroy',$acat->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <input  type="submit" class="btn btn-danger" value="delete">
                                            </form>
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
{{--            {{ $students->appends(Request::all())->links() }}--}}


        </div>
    </div>
@endcomponent

