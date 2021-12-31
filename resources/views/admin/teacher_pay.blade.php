@component('admin.section.content',['title'=>' ثبت پرداخت معلم  '])
    @slot('bread')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item"> ثبت پرداخت معلم     </li>
    @endslot

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">  ثبت پرداخت معلم
                            {{$user->name}}
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @if($errors->any())
                            {!! implode('', $errors->all('<div class="text-danger">:message</div>'))  !!}
                        @endif
                        <form role="form" method="post" action="{{route('admin.submit.teacher.pay',$user->id)}}">
                            @method('post')
                            @csrf

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="time"> تاریخ     </label>
                                    <input type="text" value="{{old('time')}}"   name="time" class="form-control persian2" id="time" placeholder="    تاریخ  ">
                                    @error('username')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="info">توضیحات</label>
                                    <textarea name="info" class="form-control" id="info" cols="30" rows="10">{{old('info')}}</textarea>

                                    @error('password')
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

            <!-- /.row -->
        </div><!-- /.container-fluid -->


    </section>

@endcomponent

