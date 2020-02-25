@extends('frontend.master')
@section('content')
    <!--Page main section start-->
    <div id="educo_wrapper">
        <!--Breadcrumb start-->
        <div class="ed_pagetitle">
            <div class="ed_img_overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-4 col-sm-6">
                        <div class="page_title">
                            <h2>Log in</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8 col-sm-6">
                        <ul class="breadcrumb">
                            <li><a href="{{route('/')}}">home</a></li>
                            <li><i class="fa fa-chevron-left"></i></li>
                            <li><a href="{{url('/login')}}">Log in</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Breadcrumb end-->
        <div class="ed_transprentbg ed_toppadder80 ed_bottompadder80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-offset-3 col-md-offset-3">
                        <div class="ed_teacher_div">
                            <div class="ed_heading_top">
                                <h3>Log in </h3>
                            </div>
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form class="ed_contact_form ed_toppadder40"  action="{{route('login')}}" method="POST" >
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label class="control-label">User Name :</label>
                                    <input type="text" class="form-control" name="username" placeholder="Username" id="username" required>
                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                        <strong style="color: #F44336">{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                    @if (Session::has('deactivated'))
                                        <span class="help-block">
                                         <strong style="color: #F44336">{{ Session::get('deactivated') }}</strong>
                                     </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="control-label{{$errors->has('password') ? ' has-error' : '' }}">Password :</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password" required id="password">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong style="color: #F44336">{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn ed_btn ed_orange pull-right" type="submit"> Log in</button>
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Page main section end-->
@endsection





