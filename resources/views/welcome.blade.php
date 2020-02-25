<!DOCTYPE html>
    <!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>login</title>

        <!-- Vendor CSS -->
        <link href="{{URL::to('vendors/bower_components/animate.css/animate.min.css')}}" rel="stylesheet">
        <link href="{{URL::to('vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css')}}" rel="stylesheet">

        <!-- CSS -->
        <link href="{{URL::to('css/app_1.min.css')}}" rel="stylesheet">
        <link href="{{URL::to('css/app_2.min.css')}}" rel="stylesheet">
        <link href="{{URL::to('vendors/farbtastic/farbtastic.css')}}" rel="stylesheet">
        <link href="{{URL::to('vendors/bower_components/chosen/chosen.css')}}" rel="stylesheet">
        <link href="{{URL::to('vendors/bower_components/sweetalert/dist/sweetalert.css')}}" rel="stylesheet">
        <script src="{{URL::to('vendors/bower_components/sweetalert/dist/sweetalert.min.js')}}"></script>



    <body>
    @include('sweet::alert')

        <div class="login-content">
            <div class="lc-block toggled" id="l-login">
              <form action="{{route('login')}}" method="POST">
               {{csrf_field()}}
                <!-- Login -->
                <div class="lcb-form">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        {{--@if ($errors->any())--}}
                            {{--<div class="alert alert-danger">--}}
                                {{--<ul>--}}
                                    {{--@foreach ($errors->all() as $error)--}}
                                        {{--<li>{{ $error }}</li>--}}
                                    {{--@endforeach--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--@endif--}}
                    @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                            </span>
                     @endif
                    <div class="input-group m-b-20">
                        <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                        <div class="fg-line{{$errors->has('username') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" placeholder="Username" name="username" required="required">
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                                @if (Session::has('deactivated'))
                                     <span class="help-block">
                                         <strong style="color: #F44336">{{ Session::get('deactivated') }}</strong>
                                     </span>
                                @endif
                        </div>
                    </div>

                    <div class="input-group m-b-20">
                        <span class="input-group-addon"><i class="zmdi zmdi-male"></i></span>
                        <div class="fg-line{{$errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" class="form-control" placeholder="Password" name="password" id="password" required="required">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} >
                                <i class="input-helper"></i>
                                Keep me signed in
                            </label>
                        </div>

                    <button class="btn btn-login btn-success btn-float" id="login" type="submit"><i class="zmdi zmdi-arrow-forward"></i></button>
                </div>
              </form>

                <div class="lcb-navigation">
                    <a href="" data-ma-action="login-switch" data-ma-block="#l-forget-password"><i>?</i> <span>Forgot Password</span></a>
                </div>
            </div>

            <!-- Forgot Password -->

            <div class="lc-block" id="l-forget-password">
              <form method="POST" action="{{route('password.getemail')}}">
                    {{csrf_field()}}
                <div class="lcb-form">
                    <p class="text-left">Reset Password</p>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="input-group m-b-20 ">
                        <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                        <div class="fg-line {{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email Address">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <button class="btn btn-login btn-success btn-float"  type="submit"><i class="zmdi zmdi-arrow-forward"></i></button>
                </div>
              </form>

                <div class="lcb-navigation">
                    <a href="" data-ma-action="login-switch" data-ma-block="#l-login"><i class="zmdi zmdi-long-arrow-right"></i> <span>Sign in</span></a>

                </div>

            </div>


        </div>
        <!-- Javascript Libraries -->
        <script src="{{URL::to('vendors/bower_components/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{URL::to('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

        <script src="{{URL::to('vendors/bower_components/Waves/dist/waves.min.js')}}"></script>
        <script src="{{URL::to('js/app.min.js')}}"></script>
        <script src="{{URL::to('vendors/bower_components/chosen/chosen.jquery.js')}}"></script>
        <script src="{{URL::to('vendors/fileinput/fileinput.min.js')}}"></script>
        <script src="{{URL::to('vendors/input-mask/input-mask.min.js')}}"></script>
        <script src="{{URL::to('vendors/farbtastic/farbtastic.min.js')}}"></script>
    </body>
</html>