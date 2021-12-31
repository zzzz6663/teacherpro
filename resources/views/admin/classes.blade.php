@component('admin.section.content',['title'=>'لیست کلاس ها'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">لیست   کلاس ها</li>
    @endslot
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">  لیست کلاس ها</h3>
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
                                    <th>معلم  </th>
                                    <th>دانش اموز</th>
                                    <th>مبلغ</th>
                                    <th>کمسیون</th>
                                    <th>نوع</th>
{{--                                    <th>وضعیت</th>--}}
                                    <th>کنسلی</th>
                                    <th>  شروع کلاس</th>
                                    <th>ایدی اسکای</th>
                                    <th>تاریخ</th>
                                    <th>ورود معلم </th>
                                    <th>ورود دانشجو </th>
                                    <th>وضعیت</th>
                                </tr>
                                @foreach($classes as $class)

                                    @php
                                       $teacher= \App\Models\User::find($class->user->id);
                                       $student= \App\Models\User::find($class->student_id)
                                    @endphp
                                    <tr class="  {{((\Carbon\Carbon::parse($class->start)->addMinutes(30))->gt(\Carbon\Carbon::now()))?'pass':'not_pass'}}">

                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <a href="{{route('admin.teacher.edit',\App\Models\User::find($class->user_id)->id)}}">{{$teacher->name}}
                                            (Ca:{{$teacher->cmeets()->count()/2}}) (Ch:{{$teacher->emeets()->count() }})
                                            </a>
                                        </td>
                                        <td>
                                            @if($class->suser)
                                            <a href="{{route('admin.student.edit',$class->suser->id)}}">{{$student->name}}
                                                (Ca:{{$student->cmeets()->count()/2}}) (Ch:{{$student->emeets()->count() }})
                                            </a>

                                            @endif
                                        </td>

                                        <td>
                                            @if($class->bill)
                                            {{number_format($class->bill->amount)}}
                                            تومان

                                            @endif

                                            </td>

                                        <td>
                                             {{number_format($class->com)}}
                                            تومان
                                       </td>
                                        <td>{{__('arr.'.$class->type)}}</td>
{{--                                        <td>--}}
{{--                                            <span class="badge  badge-{{($class->active==1)?'success':'error'}} "> {{($class->active!=1)?'غیر فعال':'فعال'}}</span>--}}
{{--                                        </td>--}}
                                        <td>
                                            <span class="badge  badge-{{($class->canceled=='1')?'error':'success'}} "> {{($class->canceled!=1)?'فعال  ':'کنسل شده'}}</span>
                                        </td>
                                        <td>{{verta($class->start)}}</td>
                                        <td>{{\App\Models\Room::room_sky($class->user_id,$class->student_id)}}</td>
                                        <td>{{verta($class->created_at)}}</td>

                                        <td>
                                            <span class="badge  badge-{{($class->t_click=='1')?'success':'error'}} "> {{($class->t_click==1)?'وارد شده  ':'  وارد نشده'}}</span>
                                        </td>
                                        <td>
                                            <span class="badge  badge-{{($class->s_click=='1')?'success':'error'}} "> {{($class->s_click==1)?'وارد شده  ':'  وارد نشده'}}</span>

                                        </td>
                                        <td>
                                            @if((\Carbon\Carbon::parse($class->start)->addMinutes(30))->lt(\Carbon\Carbon::now()))
                                                @if($class->status=='reserved')
                                                    <form class="form" action="{{route('admin.teacher.class.result', [$class->id])}}" method="post">
                                                        @csrf
                                                        @method('post')
                                                        <select name="status" class="status_change" id="">
                                                            <option value="">یک مورد را انتخاب کنید </option>
                                                            <option value="down">کلاس با موفقیت برگزار شده</option>
                                                            <option value="canceled">کلاس ملغی است </option>
                                                        </select>
                                                    </form>

                                                @else
                                                    {{__('arr.'.$class->status)}}
                                                @endif
                                            @else
                                                {{__('arr.'.$class->status)}}
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

            {{ $classes->appends(Request::all())->links() }}

        </div>
    </div>



@endcomponent

