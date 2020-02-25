<header id="ed_header_wrapper">
    <div class="ed_header_bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2">
                    <div class="educo_logo"> <a href="{{route('/')}}"><img src="{{URL::to('images/header/Logo.png')}}" alt="logo" /></a> </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <div class="edoco_menu_toggle navbar-toggle" data-toggle="collapse" data-target="#ed_menu">Menu <i class="fa fa-bars"></i>
                    </div>
                    <div class="edoco_menu">
                        <ul class="collapse navbar-collapse" id="ed_menu">
                            <li><a href="{{route('/')}}">Home</a></li>
                            <li><a href="{{url('/')}}">News</a>
                            </li>
                            <li><a href="#">Register</a>
                                <ul class="sub-menu">
                                    <li><a href="{{url('/register/lecturer')}}">Lecturer</a></li>
                                    <li><a href="{{url('/register/student')}}">Student</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

                <a href="{{url('/login')}}">
                    <div class="col-lg-2 col-md-2 col-sm-2">
                        <a href="{{url('/login')}}" ><div class="educo_call"><i class="fa fa-arrow-circle-o-right"></i><a href="{{url('/login')}}">Log In</a></div></a>
                    </div>
                </a>
            </div>
        </div>
    </div>
</header>