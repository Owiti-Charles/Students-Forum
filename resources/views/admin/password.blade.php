@extends('admin.master')
@section('content')
    <div class="card">

        <form class="form-horizontal" role="form" action="{{route('admin.changePassword')}}" method="POST">
            {{csrf_field()}}
            @if(Session::has('message'))
                <p class="alert alert-danger">{{ Session::get('message') }}</p>
            @endif
            <div class="card-header">
                <h2>Change Password
                    <!-- <small>Use Bootstrap's predefined grid classes to align labels and groups of form
                        controls in a horizontal layout by adding '.form-horizontal' to the form. Doing
                        so changes '.form-groups' to behave as grid rows, so no need for '.row'.
                    </small> -->
                </h2>
            </div>

            <div class="card-body card-padding">
                <div class="form-group" >
                    <label for="old_password" class="col-sm-2 control-label">Current Password</label>
                    <div class="col-sm-10">
                        <div class="fg-line{{ $errors->has('old_password') ? ' has-error' : '' }}">
                            <input type="password" class="form-control input-sm" id="old_password"
                                   name="old_password" required>
                            @if ($errors->has('old_password'))
                                <span class="help-block">
			                                        <strong>{{ $errors->first('old_password') }}</strong>
			                                    </span>
                            @endif
                        </div>
                    </div>
                </div>
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
                    <label for="inputPassword3" class="col-sm-2 control-label">Confirm Password</label>
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
@endsection