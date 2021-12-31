@extends('.master.manager')
@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">       ساخت زبان جدید</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
                        <li class="breadcrumb-item"><a href="/admin/languages">لیست  زبان‌ها</a></li>
                        <li class="breadcrumb-item">زبان جدید </li>
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
                   <h3 class="card-title">  تعریف زبان جدید</h3>
               </div>
               <!-- /.card-header -->
               <!-- form start -->
               <form role="form" action="{{route('languages.store')}}" method="post" enctype="multipart/form-data">
                   @method('post')
                   @csrf
                   <div class="card-body">
                       <div class="form-group">
                           <label for="fa_name">  نام فارسی زبان</label>
                           @error('name')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                           <input type="text" class="form-control" value="{{old('name')}}" name="name" id="name" placeholder="مثلا روسی">
                       </div>
                   <div class="form-group">
                       <label for="en_name">  نام لاتین  زبان</label>
                       <input type="text" class="form-control" name="en" value="{{old('en')}}" id="en_name" placeholder="مثلا ros">
                       @error('en')
                       <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                   </div>
                       <div class="form-group">
                           <label for="exampleInputFile">ارسال عکس</label>
                           <div class="input-group">
                               <br>
                               @error('img')
                               <div class="alert alert-danger">{{ $message }}</div>
                               @enderror
                               <div class="custom-file">

                                   <input type="file" name="img"  accept="image/*" class="custom-file-input" id="exampleInputFile">
                                   <label class="custom-file-label" for="exampleInputFile">انتخاب فایل</label>

                               </div>
                           </div>
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
