<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student Dashboard</title>
        <!-- Vendor CSS -->
         <link href="{{URL::to('css/jquery.dataTables.min.css')}}" rel="stylesheet">
        <link href="{{URL::to('vendors/bower_components/fullcalendar/dist/fullcalendar.min.css')}}" rel="stylesheet">
        <link href="{{URL::to('vendors/bower_components/animate.css/animate.min.css')}}" rel="stylesheet">
        <link href="{{URL::to('vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
        <link href="{{URL::to('vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css')}}" rel="stylesheet">
        <link href="{{URL::to('vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css')}}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
            rel="stylesheet">
        <!-- CSS -->
         <link href="{{URL::to('vendors/bootgrid/jquery.bootgrid.min.css')}}" rel="stylesheet">
        <link href="{{URL::to('css/app_1.min.css')}}" rel="stylesheet">
        <link href="{{URL::to('css/app_2.min.css')}}" rel="stylesheet">
        <link href="{{URL::to('vendors/summernote/dist/summernote.css')}}" rel="stylesheet">
        <link href="{{URL::to('vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css')}}" rel="stylesheet">
        {{--<link href="{{URL::to('css/jquery.dataTables.min.css')}}" rel="stylesheet">--}}
         <script src="{{URL::to('vendors/bower_components/jquery/dist/jquery.min.js')}}"></script>
         <link href="{{URL::to('summernote/dist/summernote.css')}}" rel="stylesheet">
        <link href="{{URL::to('vendors/bower_components/sweetalert/dist/sweetalert.css')}}" rel="stylesheet">
        <script src="{{URL::to('vendors/bower_components/sweetalert/dist/sweetalert.min.js')}}"></script>

    </head>
    <body>
    @include('sweet::alert')
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
                    @yield('content')
                </div>
            </section>
        </section>

        <footer id="footer">
            Copyright &copy; 2018 University Virtual Classroom System
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
        
        @yield('scripts')
        <!-- Javascript Libraries -->
        <script src="{{URL::to('js/jquery.dataTables.min.js')}}"></script>
        <script src="{{URL::to('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

        <script src="{{URL::to('vendors/bower_components/flot/jquery.flot.js')}}"></script>
        <script src="{{URL::to('vendors/bower_components/flot/jquery.flot.resize.js')}}"></script>
        <script src="{{URL::to('vendors/bower_components/flot.curvedlines/curvedLines.js')}}"></script>
        <script src="{{URL::to('vendors/sparklines/jquery.sparkline.min.js')}}"></script>
        <script src="{{URL::to('vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js')}}"></script>

        <script src="{{URL::to('vendors/bower_components/moment/min/moment.min.js')}}"></script>
        <script src="{{URL::to('vendors/bower_components/fullcalendar/dist/fullcalendar.min.js')}} "></script>
        <script src="{{URL::to('vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js')}}"></script>
        <script src="{{URL::to('vendors/bower_components/Waves/dist/waves.min.js')}}"></script>
        <script src="{{URL::to('vendors/bootstrap-growl/bootstrap-growl.min.js')}}"></script>
         <script src="{{URL::to('vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.js')}}"></script>
        <script src="{{URL::to('vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>
         <script src="{{URL::to('vendors/bootgrid/jquery.bootgrid.updated.min.js')}}"></script>
        <script src="{{URL::to('js/app.min.js')}}"></script>
        <script src="{{URL::to('js/custom.js')}}"></script>
        <script src="{{URL::to('vendors/input-mask/input-mask.min.js')}} "></script>
        <script src="{{URL::to('vendors/bootstrap-wizard/jquery.bootstrap.wizard.min.js')}}"></script>
        <script src="{{URL::to('vendors/summernote/dist/summernote-updated.min.js')}}"></script>
        <script src="{{URL::to('vendors/summernote/dist/summernote-updated.min.js')}}"></script>
        <script src="{{URL::to('vendors/fileinput/fileinput.min.js')}}"></script>
        <script src="{{URL::to('vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
        <script src="{{URL::to('summernote/dist/summernote.js')}}"></script>
        <script src="{{URL::to('js/custom.js')}}"></script>
    </body>
  </html>
