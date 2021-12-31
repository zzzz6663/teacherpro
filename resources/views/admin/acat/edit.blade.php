@extends('.master.manager')
@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">       ویرایش دسته بندی  </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
                        <li class="breadcrumb-item"><a href="/admin/acats">لیست  دسته بندی ها</a></li>
                        <li class="breadcrumb-item">دسته بندی جدید </li>
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
                   <h3 class="card-title">  ویرایش دسته بندی دسته
                       {{$acat->name}}
                   </h3>
               </div>
               <!-- /.card-header -->
               <!-- form start -->
               <form role="form" action="{{route('acats.update',$acat->id)}}" method="post" >
                   @method('PATCH')
                   @csrf
                   @php


                   @endphp
                                      <div class="card-body">
                       <div class="form-group">
                           <label for="fa_name">  نام      </label>
                           @error('name')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                           <input type="text" class="form-control" value="{{old('name',$acat->name)}}" name="name" id="name" placeholder="مثلا  ">
                       </div>


                       <div class="form-group" id="pare"  >
                           <label for="child">  انتخاب شاخه اصلی   </label>
                           <div class="input-group">
                               <input type="text" hidden name="parent_id">
                               <select name="parent_id" id="" >
                                   <option value="">یک مورد را انتخاب کنید </option>

                               @foreach(\App\Models\Acat::whereNull('parent_id')->get() as $ac)
                                       @if($ac->id==$acat->id)
                                           @continue;
                                       @endif
                                       <option {{($ac->id==$acat->parent_id)?'selected':''}} value="{{$ac->id}}">{{$ac->name}}</option>
                                   @endforeach
                               </select>
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
