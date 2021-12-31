<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="/manager/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->

    <div class="sidebar" style="direction: ltr">
        <div style="direction: rtl">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">

                 </div>
                <div class="info">
                    <a href="{{route('admin.logout.admin' )}}" class="btn btn-danger btn-block"><b> خروج     </b></a>
                    <a href="#" class="d-block">  تیچر پرو</a>
                     <span style="color: #fff!important;">مو جودی :
                         {{number_format(\App\Models\User::find(3)->total_cash())}}
                         تومان
                     </span>
                    <a href="{{route('admin.teacher.zaro.balance',3)}}" class="btn btn-primary btn-block"><b> ریست کردن   </b></a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                         <li class="nav-item has-treeview menu-open">
                            <a href="{{route('admin.index')}}" class="nav-link {{(Route::currentRouteName()=='admin.index')?'active':''}}">
                                <i class="nav-icon fa fa-dashboard"></i>
                                <p>
                                    داشبوردها
                                </p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview menu-open">
                            <a href="{{route('admin.users')}}" class="nav-link {{(Route::currentRouteName()=='admin.users')?'active':''}} ">
                                <i class="nav-icon fa fa-user-circle"></i>
                                <p>
                                     دانش آموزان
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview menu-open">
                            <a href="{{route('admin.teachers')}}" class="nav-link {{(Route::currentRouteName()=='admin.teachers')?'active':''}} ">
                                <i class="nav-icon fa fa-user"></i>
                                <p>
                                    مدرس ها
                                </p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview menu-open">
                            <a href="{{route('languages.index')}}" class="nav-link {{(Route::currentRouteName()=='languages.index')?'active':''}} ">
                                <i class="nav-icon fa fa-language"></i>
                                <p>
                                    زبان
                                </p>
                            </a>
                        </li>


                        <li class="nav-item has-treeview menu-open">
                            <a href="{{route('admin.bills')}}" class="nav-link {{(Route::currentRouteName()=='admin.bills')?'active':''}} ">
                                <i class="nav-icon fa fa-user"></i>
                                <p>
                                   تراکنش ها
                                </p>
                            </a>
                        </li>


                        <li class="nav-item has-treeview menu-open">
                            <a href="{{route('admin.classes')}}" class="nav-link {{(Route::currentRouteName()=='admin.classes')?'active':''}} ">
                                <i class="nav-icon fa fa-user"></i>
                                <p>
                                      کلاس ها
                                </p>
                            </a>
                        </li>



                        <li class="nav-item has-treeview menu-open">
                            <a href="{{route('admin.tarticles')}}" class="nav-link {{(Route::currentRouteName()=='admin.tarticles')?'active':''}} ">
                                <i class="nav-icon fa fa-user"></i>
                                <p>
                                   مقالات
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview menu-open">
                            <a href="{{route('acats.index')}}" class="nav-link {{(Route::currentRouteName()=='acats.index')?'active':''}} ">
                                <i class="nav-icon fa fa-user"></i>
                                <p>
                                  دسته بندی مقالات
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview menu-open">
                            <a href="{{route('admin.comments')}}" class="nav-link {{(Route::currentRouteName()=='admin.comments')?'active':''}} ">
                                <i class="nav-icon fa fa-user"></i>
                                <p>
                                    نظرات
                                    اساتید
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview menu-open">
                            <a href="{{route('com.index')}}" class="nav-link {{(Route::currentRouteName()=='com.index')?'active':''}} ">
                                <i class="nav-icon fa fa-user"></i>
                                <p>
                                    نظرات سایت
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview menu-open">
                            <a href="{{route('admin.payam')}}" class="nav-link {{(Route::currentRouteName()=='admin.payam')?'active':''}} ">
                                <i class="nav-icon fa fa-user"></i>
                                <p>
                                      تماس با ما
                                </p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview menu-open">
                            <a href="{{route('admin.setting')}}" class="nav-link {{(Route::currentRouteName()=='admin.setting')?'active':''}} ">
                                <i class="nav-icon fa fa-cogs"></i>
                                <p>
                                    تنظیمات
                                </p>
                            </a>
                        </li>





                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>


