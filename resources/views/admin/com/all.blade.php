@component('admin.section.content',['title'=>'لیست زبان ها'])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item">لیست  نظر ها</li>
    @endslot

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">  لیست نظر ها</h3>
                           <div class="card-tools">
                               <div class="btn-group-sm">
                                   <a class="btn btn-info" href="{{route('com.create')}}">create new</a>
                               </div>
                           </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th>شماره</th>
                                    <th>نام</th>
                                    <th>متن</th>
                                    <th>توضیح</th>
                                    <th>عملکرد</th>
                                </tr>
                                @foreach($com as $co)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$co->name}}</td>
                                        <td>{{$co->com}}</td>
                                        <td>{{$co->info}}</td>
                                        <td>
                                            <form action="{{route('com.destroy',$co->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <input type="submit" class="btn btn-danger" value="delete">
                                            </form>
                                            <a href="{{route('com.edit',$co->id)}}" class="btn btn-primary">edit</a>
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

