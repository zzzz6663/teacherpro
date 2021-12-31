@extends('.master.manager')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">          نوشته
                        {{$user->name}}
                        {{$article->title}}

                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
                        <li class="breadcrumb-item"><a href="/admin/teachers">   پروفایل معلم</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.teacher.edit',$user->id)}}">   پروفایل {{$user->name}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.teacher.article',$user->id)}}">   نوشته ها {{$user->name}}</a></li>
                        <li class="breadcrumb-item">        {{$article->title}} </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
            <!-- Box Comment -->
            <div class="card card-widget">
                <div class="card-header">
                    <div class="user-block">
                        <span class="username">{{$article->title}}</span>
                        <span class="description"> {{\Morilog\Jalali\Jalalian::forge($article->created_at)->ago()}}</span>
                    </div>
                    <!-- /.user-block -->

                    <!-- /.card-tools -->
                </div>
                <div class="card-body">
                    <img src="{{asset('/src/article/images/'.$article->image)}}" alt="">
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    {!! $article->article !!}
                </div>


                <div class="card-body">
                    <h1>دسته بندی ها</h1>
                    @php
                        $cats=$article->acats;

                    @endphp
                    @foreach($cats as $cat)
                        <small class="badge badge-info">  {{$cat->name}}  </small>
                    @endforeach
                </div>
                <div class="card-body">
                    <h1>تگ ها</h1>
                  @php
                      $tag=$article->tag;
                        $tag=explode('__',$tag);
                  @endphp
                    @for($i=0; $i<sizeof($tag); $i++)
                        <small class="badge badge-info">  {{$tag[$i]}}   </small>
                        @endfor
                </div>

            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>


    <!-- /.content -->
@endsection
