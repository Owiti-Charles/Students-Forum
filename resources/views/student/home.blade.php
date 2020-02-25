!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student Dashboard</title>
        <!-- Vendor CSS -->
        
        <link href="{{URL::to('vendors/bower_components/fullcalendar/dist/fullcalendar.min.css')}}" rel="stylesheet">
        <link href="{{URL::to('vendors/bower_components/animate.css/animate.min.css')}}" rel="stylesheet">
        <link href="{{URL::to('vendors/bower_components/sweetalert/dist/sweetalert.css')}}" rel="stylesheet">
        <link href="{{URL::to('vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css')}}" rel="stylesheet">
        <link href="{{URL::to('vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css')}}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
        <!-- CSS -->

        <link href="{{URL::to('css/app_1.min.css')}}" rel="stylesheet">
        <link href="{{URL::to('css/app_2.min.css')}}" rel="stylesheet">
    </head>
    <body>
    @include('student.includes.header')

        <section id="main">
        @include('student.includes.aside')

            <aside id="chat" class="sidebar">

                <div class="chat-search">
                    <div class="fg-line">
                        <input type="text" class="form-control" placeholder="Search People">
                        <i class="zmdi zmdi-search"></i>
                    </div>
                </div>
            </aside>

            <section id="content">
                <div class="container">
                    <div class="block-header">
                        <h2>Dashboard</h2>

                        <ul class="actions">
                            <li>
                                <a href="">
                                    <i class="zmdi zmdi-trending-up"></i>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="zmdi zmdi-check-all"></i>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="" data-toggle="dropdown">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a href="">Refresh</a>
                                    </li>
                                    <li>
                                        <a href="">Manage Widgets</a>
                                    </li>
                                    <li>
                                        <a href="">Widgets Settings</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                    </div>
                    
                    @yield('content')
                </div>
            </section>
        </section>

        <footer id="footer">
            Copyright &copy; 2015 Material Admin

            <ul class="f-menu">
                <li><a href="">Home</a></li>
                <li><a href="">Dashboard</a></li>
                <li><a href="">Reports</a></li>
                <li><a href="">Support</a></li>
                <li><a href="">Contact</a></li>
            </ul>
        </footer>

        <!-- Page Loader -->
        <div class="page-loader">
            <div class="preloader pls-blue">
                <svg class="pl-circular" viewBox="25 25 50 50">
                    <circle class="plc-path" cx="50" cy="50" r="20" />
                </svg>

                <p>Please wait...</p>
            </div>
        </div>
        

        <!-- Javascript Libraries -->
        <script src="{{URL::to('vendors/bower_components/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{URL::to('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

        <script src="{{URL::to('vendors/bower_components/flot/jquery.flot.js')}}"></script>
        <script src="{{URL::to('vendors/bower_components/flot/jquery.flot.resize.js')}}"></script>
        <script src="{{URL::to('vendors/bower_components/flot.curvedlines/curvedLines.js')}}"></script>
        <script src="{{URL::to('vendors/sparklines/jquery.sparkline.min.js')}}"></script>
        <script src="{{URL::to('vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js')}}"></script>

        <script src="{{URL::to('vendors/bower_components/moment/min/moment.min.js')}}"></script>
        <script src="{{URL::to('vendors/bower_components/fullcalendar/dist/fullcalendar.min.js')}} "></script>
        <script src="vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js"></script>
        <script src="{{URL::to('vendors/bower_components/Waves/dist/waves.min.js')}}"></script>
        <script src="{{URL::to('vendors/bootstrap-growl/bootstrap-growl.min.js')}}"></script>
        <script src="{{URL::to('vendors/bower_components/sweetalert/dist/sweetalert.min.js')}}"></script>
        <script src="{{URL::to('vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>

        <script src="{{URL::to('js/app.min.js')}}"></script>
    </body>
  </html>
