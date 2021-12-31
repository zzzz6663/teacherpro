@extends('master.manager')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">       ویرایش نظر  </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
                        <li class="breadcrumb-item"><a href="/admin/com">لیست  نظر ها</a></li>
                        <li class="breadcrumb-item">ویرایش بان   </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="row">

        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">   ویرایش نظر جدید</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{route('com.update',$com->id)}}" method="post"  >
                    @method('patch')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="fa_name">  نام   نظر دهنده</label>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="text" class="form-control" value="{{old('name', $com->name)}}" name="name" id="name" placeholder="مثلا ناصر جعفری">
                        </div>
                        <div class="form-group">
                            <label for="info_name"> توضیح</label>
                            <input type="text" class="form-control" name="info" value="{{old('info', $com->info)}}" id="info_name" placeholder="مثلا دوره it">
                            @error('info')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>متن</label>
                            <textarea name="com"  class="form-control" rows="3" placeholder="وارد کردن اطلاعات ...">{{old('info', $com->com)}}</textarea>
                            @error('com')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>



                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">ارسال</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->


        </div>
    </div>
    <!-- /.content -->
@endsection
