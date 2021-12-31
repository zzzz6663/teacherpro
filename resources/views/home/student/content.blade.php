@extends('master.home')
@section('main_body')

    <div id="maincontent" class="rows sfix">
        <div>



    @include('home.student.sidebar')
    <div id="teacherpish">
    {{$bread}}




        <div class="welcome">
            <span class="name"> {{auth()->user()->name}}
                {{auth()->user()->family}}
            </span>
            <span>خوش آمدید؛
            {{\Morilog\Jalali\Jalalian::forge('today')->format('%A %d %B ')}}

            </span>
        </div>





    {{$slot}}
    </div>




        </div>
   </div>

    <!-- /.content -->
    @endsection
