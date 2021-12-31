@component('admin.section.content',['title'=>'لیست نوشته  ها'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">لیست   نوشته  ها</li>
    @endslot
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">  لیست نوشته  ها</h3>
                           <div class="card-tools">
                               <div class="btn-group-sm">

{{--                                   <a class="btn btn-info" href="{{route('languages.create')}}">create new</a>--}}
                               </div>
                           </div>
                            <div class="card-tools">
                                <form action="{{route('admin.classes')}}" method="get">
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
                    @if($errors->any())
                        {!! implode('', $errors->all('<span class="text text-danger">:message</span>')) !!}
                    @endif
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tbody><tr>
                                    <th>شماره</th>
                                    <th>نام</th>
                                    <th>عنوان</th>
                                    <th>وضعیت</th>
                                    <th>تایید شده</th>
                                    <th>نمایش شده</th>


                                    <th>زمان ثبت</th>
                                    <th>  صفحه نخست </th>
                                </tr>
                                @foreach($articles as $cl)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td> <a href="{{route('admin.teacher.edit',\App\Models\User::find($cl->user_id)->id)}}">{{$cl->user->name}}</td>
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
                                    <td><a class="btn btn-blsock btn-warning tn-flaیtb" href="{{route('admin.teacher.article.show',[$cl->id,$cl->user->id] )}}">مشاهده</a></td>
                                    <td><a class="btn btn-blsock btn-secondary tn-flaیtb" target="_blank" href="{{route('Article.edit',['Article'=>$cl->id,'user'=>$cl->user_id])}}">ویرایش</a></td>
                                    <td>{{\Morilog\Jalali\Jalalian::forge($cl->created_at) }}</td>
                                    <td><a class="btn btn-{{$cl->home=='0'?'primary':'danger'}}" href="{{route('admin.home.article',$cl->id)}}">{{$cl->home=='0'?'اضافه به خانه':'حذف از خانه'}}</a></td>
                                    <td>
                                        <form action="{{route('Article.destroy',['Article'=>$cl->id])}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" value="delete" class="btn-danger btn">
                                        </form>
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
        </div>
        <div class="col-md-12">

            {{ $articles->appends(Request::all())->links() }}

        </div>
    </div>



@endcomponent

