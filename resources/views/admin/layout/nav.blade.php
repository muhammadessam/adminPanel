<!-- Navbar -->
<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">

    <!-- Right navbar links -->
    <ul class="navbar-nav mr-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-bell-o"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="{{asset('admin/dist/img/user3-128x128.jpg')}}" alt="User Avatar" class="img-size-50 ml-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                {{auth()->user()->name}}
                                <span class="float-left text-sm text-danger"><i class="fa fa-star"></i></span>
                            </h3>
                            {{--                            <p class="text-sm"></p>--}}
                            {{--                            <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i></p>--}}
                        </div>
                    </div>
                    <!-- Message End -->
                </a>

                <div class="dropdown-divider"></div>
                <form action="{{route('admin.logout')}}" method="post">
                    @csrf
                    <button class="dropdown-item dropdown-footer" type="submit"><i class="fa fa-sign-in"></i> تسجيل الخروج</button>
                </form>
            </div>
        </li>

        {{--        <li class="nav-item">--}}
        {{--            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i--}}
        {{--                        class="fa fa-th-large"></i></a>--}}
        {{--        </li>--}}
    </ul>
</nav>
<!-- /.navbar -->