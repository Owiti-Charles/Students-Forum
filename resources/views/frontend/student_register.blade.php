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
                            <h2>sign up</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8 col-sm-6">
                        <ul class="breadcrumb">
                            <li><a href="index.html">home</a></li>
                            <li><i class="fa fa-chevron-left"></i></li>
                            <li><a href="signup.html">sign up</a></li>
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
                                <h3>sign up</h3>
                            </div>
                            @if (!empty($status))
                                <div class="alert alert-success">
                                    {{ $status }}
                                </div>
                            @endif
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if (session('warning'))
                                <div class="alert alert-warning">
                                    {{ session('warning') }}
                                </div>
                            @endif
                            @if (!empty($warning))
                                <div class="alert alert-success">
                                    {{ $warning }}
                                </div>
                            @endif
                            <form class="ed_contact_form ed_toppadder40" action="{{route('user.register')}}" method="POST">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label class="control-label">Name:</label>
                                    <input type="text" id="name" class="form-control  {{ $errors->has('name') ? ' has-error' : '' }}" name="name" value="{{old('name')}}">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                       		 <strong style="color: #F44336">{{ $errors->first('name') }}</strong>
										</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="role" value="student">
                                    <label class="control-label ">User Name:</label>
                                    <input type="text" class="form-control {{ $errors->has('username') ? ' has-error' : '' }}" name="username" value="{{old('username')}}" id="username">
                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                        	<strong style="color: #F44336">{{ $errors->first('username') }}</strong>
                            			</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Email :</label>
                                    <input type="email" id="email" class="form-control" name="email" value="{{old('email')}}" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                       		 <strong style="color: #F44336" >{{ $errors->first('email') }}</strong>
                           				 </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Phone :</label>
                                    <input type="text" id="phone" class="form-control" name="phone" value="{{old('phone')}}" required placeholder="+2547xxxxxxxxx">
                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                       		 <strong style="color: #F44336">{{ $errors->first('phone') }}</strong>
                           				 </span>
                                    @endif
                                </div>
                                <div class="form-group" >
                                    <label class="control-label" for="gender">Gender:
                                    </label>
                                    <div class="radio">
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="gender" value="Male" required>
                                        &nbsp;&nbsp;Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="gender" value="Female" required>&nbsp;&nbsp;
                                        Female
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Faculty :</label>
                                    <select class="form-control" name="faculty_id" id="faculty_id">
                                        <option value="">-------------------------------Select Faculty---------------</option>
                                        @foreach($faculties as $faculty)
                                            <option value="{{$faculty->id}}">{{$faculty->faculty}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('faculty'))
                                        <span class="help-block">
                                       		 <strong style="color: #F44336">{{ $errors->first('faculty') }}</strong>
                           				 </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Course :</label>
                                    <select class="form-control" name="course_id" id="course">
                                        <option value="">-------------------------------Select Course---------------</option>
                                    </select>
                                    @if ($errors->has('faculty'))
                                        <span class="help-block">
                                       		 <strong style="color: #F44336">{{ $errors->first('faculty') }}</strong>
                           				 </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Password :</label>
                                    <input type="password" class="form-control" name="password" id="password" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                       	 <strong style="color: #F44336">{{ $errors->first('password') }}</strong>
                            			</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Confirm Password :</label>
                                    <input type="password" id="confirm_password" class="form-control"  name="password_confirmation" required >
                                </div>
                                <button class="btn ed_btn ed_orange pull-right"> Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Page main section end-->

@endsection
@section('scripts')
    <script type="text/javascript">
        $('#faculty_id').on('change', function (e) {
            e.preventDefault();
            var course=$('#course');
            $(course).empty();

            var faculty_id=$(this).val();
            $.get("{{route('getFrontCourses')}}", {faculty_id:faculty_id}, function (data) {
                console.log(data);
                $.each(data, function(i,l){
                    $(course).append($("<option/>", {
                        value :l.id,
                        text : l.course,
                    }));
                });
            })
        })
        $('#add_course').on('click', function (e) {
            e.preventDefault();
            var faculties=$('#create_student_form #faculty_id option');
            var faculty=$('#add_course_form').find('#faculty_id');
            $('#add_course_form #faculty_id').empty();
            $.each(faculties, function (id,pro) {
                $(faculty).append($("<option/>", {
                    value: $(pro).val(),
                    text: $(pro).text(),
                }))
            })
            $('#course').val('');
            $('#add_course_form #course').val('');
            $('#addCourse').modal('show');
        })


    </script>
@endsection




