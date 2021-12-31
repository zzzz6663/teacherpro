@component('admin.section.content',['title'=>'لیست زبان ها'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">لیست  زبان ها</li>
    @endslot

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">  لیست زبان ها</h3>
                           <div class="card-tools">
                               <div class="btn-group-sm">
                                   <a class="btn btn-info" href="{{route('languages.create')}}">create new</a>
                               </div>
                           </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tbody><tr>
                                    <th>شماره</th>
                                    <th>نام </th>
                                    <th>عکس </th>
                                    <th>تاریخ</th>
                                    <th>وضعیت</th>
                                    <th>عملکرد</th>
                                </tr>
                                @foreach($languages as $language)
                                    <tr>
                                        <td>{{$loop->iteration }}</td>
                                        <td>{{$language->name}}</td>
                                        <td>
                                            <img src="{{asset('src/img/lang').'/'.$language->img}}" class="lang_img" alt="">
                                        </td>
                                        <td>{{\Morilog\Jalali\Jalalian::forge($language->created_at)->format('%B %d، %Y')}}</td>
                                        <td><span class="badge badge-{{($language->active=='1')?'success':'danger'}}">  {{($language->active=='1')?'active':'deactive'}}</span></td>
                                        <td>
                                            <a href="{{route('languages.edit',$language->id)}}" class="btn btn-primary">edit</a>
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
        <div class="col-md-6">

        </div>
    </div>



@endcomponent

