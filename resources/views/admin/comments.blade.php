@component('admin.section.content',['title'=>'لیست نظرات ها'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">لیست   نظرات ها</li>
    @endslot
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">  لیست نظرات ها</h3>
                           <div class="card-tools">
                               <div class="btn-group-sm">

{{--                                   <a class="btn btn-info" href="{{route('languages.create')}}">create new</a>--}}
                               </div>
                           </div>
                            <div class="card-tools">
                                <form action="{{route('admin.comments')}}" method="get">
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
                                    <th>پست</th>
                                    <th>متن</th>
                                    <th>وضعیت</th>
{{--                                    <th>تایید</th>--}}
                                    <th>تاریخ</th>
                                    <th>اقدام</th>
                                </tr>
                                @foreach($comments as $comment)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            @if($comment->user_id)
                                            <a href="{{route('admin.student.edit',$comment->user)}}">{{$comment->user->name}}</a>
                                            @else
                                                <a href="#">{{$comment->name}}</a>
                                            @endif
                                        </td>
                                        <td>
                                            @if(isset($comment->commentable->id))
                                            {{$comment->commentable->title}}
                                            @endif
                                        </td>

                                        <td>
                                            {{$comment->comment}}
                                       </td>
                                        <td>
                                            <span class="badge  badge-{{($comment->active=="1")?'success':'danger'}} "> {{($comment->active==1)?'نمایش':'مخفی'}}</span>
                                        </td>
{{--                                        <td>--}}
{{--                                            <span class="badge  badge-{{($comment->submit=="1")?'success':'danger'}} "> {{($comment->submit==1)?'نمایش':'مخفی'}}</span>--}}
{{--                                        </td>--}}
                                        <td>{{verta($comment->created_at)}}</td>
                                        <td>
                                            <form style="display: inline-block" action="{{route('admin.teacher.comment.active',$comment->id)}}" class=" " method="post"  >
                                                @csrf
                                                @method('post')
                                                <div class="buttons pointer"  >
                                                    <button type="submit" class="btn btn-bslock btn-{{($comment->active=='1')?'success':'danger'}} btn- ">{{($comment->active=='1')?'deactive':'active'}}</button>

                                                    {{--                    <span class="sane">ﺗﺎﯾﯿﺪ و ﺛﺒﺖ</span>--}}
                                                    {{--                    <span class="cancel">لغو</span>--}}
                                                </div>
                                            </form>

                                            <form style="display: inline-block" action="{{route('admin.teacher.comment.delete',$comment->id)}}" class=" " method="post"  >
                                                @csrf
                                                @method('post')
                                                <div class="buttons pointer"  >
                                                    <button type="submit" class="btn btn-bslock btn-primary btn- ">delete</button>

                                                    {{--                    <span class="sane">ﺗﺎﯾﯿﺪ و ﺛﺒﺖ</span>--}}
                                                    {{--                    <span class="cancel">لغو</span>--}}
                                                </div>
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

          <div class="pagi">
              {{ $comments->appends(Request::all())->links('home.section.pagination') }}
          </div>

        </div>
    </div>



@endcomponent

