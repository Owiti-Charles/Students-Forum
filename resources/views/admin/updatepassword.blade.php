<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>change-password-to-proceed</title>
    <!-- Vendor CSS -->

    <link href="{{URL::to('vendors/bower_components/fullcalendar/dist/fullcalendar.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('vendors/bower_components/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('vendors/bower_components/sweetalert/dist/sweetalert.css')}}" rel="stylesheet">
    <link href="{{URL::to('vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <!-- CSS -->
    <link href="{{URL::to('vendors/bootgrid/jquery.bootgrid.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('css/app_1.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('css/app_2.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css')}}" rel="stylesheet">
    <script src="{{URL::to('vendors/bower_components/jquery/dist/jquery.min.js')}}"></script>

</head>
<body>

<section id="main">

    <section id="content" class="col-md-10 center">
        <div class="container">

            <div class="card">
                <form class="form-horizontal" role="form" action="{{route('student.firstLogin')}}" method="POST">
                    {{csrf_field()}}
                    @if(Session::has('message'))
                        <p class="alert alert-danger">{{ Session::get('message') }}</p>
                    @endif
                    <div class="card-header warning">
                        <h2 style="color: #FFC107;">You Must Change Password to Proceed</h2>
                    </div>
                    <div class="card-body card-padding">
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">New Password</label>
                            <div class="col-sm-10">

                                <div class="fg-line{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input type="password" class="form-control input-sm" id="password"
                                           name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
				                                        <strong>{{ $errors->first('password') }}</strong>
				                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Confirm</label>
                            <div class="col-sm-10">

                                <div class="fg-line{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <input type="password" class="form-control input-sm" id="password_confirmation"
                                           name="password_confirmation">
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
					                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
					                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary btn-sm" type="submit">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</section>

@yield('scripts')
<!-- Javascript Libraries -->

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
<script src="{{URL::to('vendors/input-mask/input-mask.min.js')}}"></script>
<script src="{{URL::to('vendors/bower_components/sweetalert/dist/sweetalert.min.js')}}"></script>
<script src="{{URL::to('vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{URL::to('vendors/bootgrid/jquery.bootgrid.updated.min.js')}}"></script>



<!--  -->
</body>

</html>
