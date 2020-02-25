    @extends('admin.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Create Users
            </h2>
        </div>
        <div class="card-body card-padding">
            <div class="form-wizard-basic fw-container">
                <ul class="tab-nav" role="tablist">
                    <li  class="active" ><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Students</a></li>
                    <li><a href="#tab2" data-toggle="tab">Lecturer</a></li>
                    <li><a href="#tab3" data-toggle="tab">Staff</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="tab1">
                        <br>
                        <form method="POST" action="{{route('student.save')}}" id="create_student_form">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="input-group fg-float">
                                        <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                                        <div class="fg-line">
                                            <input type="text" class="form-control input-mask" name="admission_staff_no">
                                            <label class="fg-label">Admission Number</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="input-group fg-float">
                                        <span class="input-group-addon"><i class="zmdi zmdi-accounts"></i></span>
                                        <div class="fg-line">
                                            <input type="text" class="form-control" name="name">
                                            <label class="fg-label">Full Names</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="input-group fg-float">
                                        <span class="input-group-addon"><i class="zmdi zmdi-local-phone"></i></span>
                                        <div class="fg-line">
                                            <input type="text" class="form-control input-mask" name="phone"  data-mask="+254700000000" value="+2547">
                                            <label class="fg-label">Phone</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <br><br>
                                    <div class="input-group fg-float">
                                        <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                                        <div class="fg-line">
                                            <input type="text" class="form-control" name="email">
                                            <label class="fg-label">Email</label>
                                        </div>

                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <br><br>
                                    <div class="input-group fg-float">

                                        <span class="input-group-addon"><i class="zmdi zmdi-layers"></i></span>
                                        <div class="fg-line">
                                            <input type="text" class="form-control input-mask" data-mask="00000000" name="id_number">
                                            <label class="fg-label">ID Number</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <br>
                                <br>
                                <div class="col-sm-4 ">
                                    <div class="input-group">
                                        <span class="input-group-addon last f-14 ">Gender</span>
                                        <select class="selectpicker" name="gender">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" name="role_id" value="3">
                                <div class="col-sm-4 ">
                                    <div class="input-group">
                                        <span class="input-group-addon last f-15 ">Faculty</span>
                                        <select class="form-control" name="faculty" id="faculty_id" required>
                                            <option value="" selected>---------------------------</option>
                                            @foreach($faculties as $faculty)
                                                <option value="{{$faculty->id}}">{{$faculty->faculty}}</option>
                                            @endforeach
                                        </select>
                                        <span class="input-group-addon last f-20 f-700" id="add_faculty"><i class="zmdi zmdi-plus-square"></i></span>
                                    </div>
                                </div>
                                <div class="col-sm-4 ">

                                    <div class="input-group">
                                        <span class="input-group-addon last f-15 ">Course</span>
                                        <select class="form-control" name="course" id="course" required>
                                            <option value="" selected>--------------------</option>

                                        </select>
                                        <span class="input-group-addon last f-20 f-700" id="add_course"><i class="zmdi zmdi-plus-square "></i></span>
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-sm-4 ">
                                    <br><br>

                                    <div class="input-group">
                                        <span class="input-group-addon last f-15 ">Year</span>
                                        <select class="selectpicker" name="year" required>
                                            <option value="1">Year 1</option>
                                            <option value="2">Year 2</option>
                                            <option value="3">Year 3</option>
                                            <option value="4">Year 4</option>
                                            <option value="5">Year 5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn btn-primary m-b-15 m-l-25 p-r-20 ">Create</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="tab2">
                        <br>
                        <form method="POST" action="{{route('lecturer.save')}}" id="create_lecturer_form">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="input-group fg-float">
                                        <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                                        <div class="fg-line">
                                            <input type="text" class="form-control input-mask" name="admission_staff_no">
                                            <label class="fg-label">Staff Number</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="input-group fg-float">
                                        <span class="input-group-addon"><i class="zmdi zmdi-accounts"></i></span>
                                        <div class="fg-line">
                                            <input type="text" class="form-control" name="name">
                                            <label class="fg-label">Full Names</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="input-group fg-float">
                                        <span class="input-group-addon"><i class="zmdi zmdi-local-phone"></i></span>
                                        <div class="fg-line">
                                            <input type="text" class="form-control input-mask" name="phone"  data-mask="+254700000000" value="+2547">
                                            <label class="fg-label">Phone</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <br><br>
                                    <div class="input-group fg-float">
                                        <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                                        <div class="fg-line">
                                            <input type="text" class="form-control" name="email">
                                           <label class="fg-label">Email</label>
                                        </div>

                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <br><br>
                                    <div class="input-group fg-float">

                                        <span class="input-group-addon"><i class="zmdi zmdi-layers"></i></span>
                                        <div class="fg-line">
                                            <input type="text" class="form-control input-mask" data-mask="00000000" name="id_number">
                                            <label class="fg-label">ID Number</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <br>
                                <br>
                                <div class="col-sm-4 ">
                                    <div class="input-group">
                                        <span class="input-group-addon last f-14 ">Gender</span>
                                        <select class="selectpicker" name="gender">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4 ">
                                    <div class="input-group">
                                        <span class="input-group-addon last f-15 ">Faculty</span>
                                        <select class="form-control" name="faculty" id="faculty_id" required>
                                            <option value="" selected>---------------------------</option>
                                            @foreach($faculties as $faculty)
                                                <option value="{{$faculty->id}}">{{$faculty->faculty}}</option>
                                            @endforeach
                                        </select>
                                        <span class="input-group-addon last f-20 f-700" id="add_faculty"><i class="zmdi zmdi-plus-square"></i></span>
                                    </div>
                                </div>
                                <input type="hidden" name="role_id" value="2">
                                {{--<div class="col-sm-4 ">--}}
                                    {{--<div class="input-group">--}}
                                        {{--<p class="f-500 m-b-15 m-l-25 p-r-20 c-black">Role</p>--}}
                                        {{--<span class="input-group-addon last f-15 ">Role</span>--}}
                                        {{--<select class="selectpicker" name="position">--}}
                                            {{--<option value="dean">Dean</option>--}}
                                            {{--<option value="chairman">COD</option>--}}
                                            {{--<option value="lecturer">Lecturer</option>--}}
                                        {{--</select>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                            </div>
                            <br>
                            <button type="submit" class="btn btn btn-primary m-b-15 m-l-25 p-r-20 ">Create</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="tab3">
                        <p>Duis eu eros vitae risus sollicitudin blandit in non nisi. Phasellus rhoncus
                            ullamcorper pretium. Etiam et viverra neque, aliquam imperdiet velit. Nam a
                            scelerisque justo, id tristique diam. Aenean ut vestibulum velit, vel ornare
                            augue. Nullam eu est malesuada, vehicula ex in, maximus massa. Sed sit amet
                            massa venenatis, tristique orci sed, eleifend arcu.</p>
                        <p>Aliquam tempus rutrum neque, a blandit dui. Proin quis elit non est
                            scelerisque pharetra nec id libero. Quisque id tincidunt elit. Maecenas non
                            mauris malesuada, interdum justo et, ullamcorper magna. Nulla libero risus,
                            vestibulum pharetra eleifend in, aliquam ac odio. Sed ligula orci, rhoncus
                            sit amet ipsum vel, vehicula interdum ligula. </p>
                    </div>

                    <ul class="fw-footer pagination wizard">
                        <li class="previous first"><a class="a-prevent" href=""><i
                                        class="zmdi zmdi-more-horiz"></i></a></li>
                        <li class="previous"><a class="a-prevent" href=""><i
                                        class="zmdi zmdi-chevron-left"></i></a></li>
                        <li class="next"><a class="a-prevent" href=""><i
                                        class="zmdi zmdi-chevron-right"></i></a></li>
                        <li class="next last"><a class="a-prevent" href=""><i
                                        class="zmdi zmdi-more-horiz"></i></a></li>
                    </ul>
                </div>
            </div>
         </div>

    </div>
    <div class="modal fade" id="addFaculty" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h3 class="modal-title" id="lineModalLabel">New Faculty</h3>
                </div>
                <div class="modal-body">

                    <!-- content goes here -->
                    <form action="{{route('addFaculty')}}" method="POST" id="new_faculty_form">

                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="title">Faculty</label>
                            <input type="text" class="form-control" name="faculty" id="faculty">
                        </div>
                        <div class="modal-footer">

                            <button type="submit"   class="btn btn-primary btn-hover-green btn-sm pull-left" data-action="save" role="button" id="saveprogram">Add</button>

                            <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="lecFaculty" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h3 class="modal-title" id="lineModalLabel">New Faculty</h3>
                </div>
                <div class="modal-body">

                    <!-- content goes here -->
                    <form action="{{route('addFaculty')}}" method="POST" id="new_lec_faculty_form">

                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="title">Faculty</label>
                            <input type="text" class="form-control" name="faculty" id="faculty">
                        </div>
                        <div class="modal-footer">

                            <button type="submit"   class="btn btn-primary btn-hover-green btn-sm pull-left" data-action="save" role="button" id="saveprogram">Add</button>

                            <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addCourse" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h3 class="modal-title" idcourse="lineModalLabel">Add Course</h3>
                </div>
                <div class="modal-body">

                    <!-- content goes here -->
                    <form action="{{route('addCourse')}}" method="POST" id="add_course_form">

                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="program_id">Faculty</label>
                            <select class=" form-control" id="faculty_id" name="faculty_id" required></select>
                        </div>
                        <div class="form-group">
                            <label for="course">Course</label>
                            <input type="text" class="form-control" name="course" id="course">
                        </div>
                        <div class="modal-footer">

                            <button type="submit"   class="btn btn-primary btn-hover-green btn-sm pull-left" data-action="save" role="button" id="saveprogram">Add</button>

                            <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
         $('#add_faculty').on('click', function () {
             $('#faculty').val('');
             $('#addFaculty').modal('show');
         })
         $('#tab2 #add_faculty').on('click', function () {
             $('#faculty').val('');
             $('#lecFaculty').modal('show');
         })
       $('#new_faculty_form').on('submit', function (e) {
           e.preventDefault();
          var faculty=$('#faculty').val();
//
           var urls=$(this).attr('action');
           var data=$(this).serialize();
           $.ajax({
               url:urls,
               type:'POST',
               data:data,
               success: function(data){
                   console.log(data.faculty)
                   $('#faculty_id').append($("<option/>", {
                       value : data.id,
                       text : data.faculty,
                   }));

                   $('#addFaculty').modal('hide');
               },
               error:function(xhr){
                   console.log("xhr=" + xhr);
               }
           });


       })
         $('#new_lec_faculty_form').on('submit', function (e) {
             e.preventDefault();
             var faculty=$('#tab2 #faculty').val();
//
             var urls=$(this).attr('action');
             var data=$(this).serialize();
             $.ajax({
                 url:urls,
                 type:'POST',
                 data:data,
                 success: function(data){
                     console.log('success')
                     $('#tab2 #faculty_id').append($("<option/>", {
                         value : data.id,
                         text : data.faculty,
                     }));

                     $('#lecFaculty').modal('hide');
                 },
                 error:function(xhr){
                     console.log("xhr=" + xhr);
                 }
             });


         })
        $('#create_student_form #faculty_id').on('change', function (e) {

            e.preventDefault();
            var course=$('#course');
            $(course).empty();

            var faculty_id=$(this).val();
            $.get("{{route('getCourses')}}", {faculty_id:faculty_id}, function (data) {
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
        $('#add_course_form').on('submit', function (e) {
            e.preventDefault();
            var data=$(this).serialize();
            $.post("{{route('addCourse')}}", data, function (data) {
               // console.log(data);
                $('#course').append($("<option/>", {
                    value :data.id,
                    text : data.course,
                }));
                $('#addCourse').modal('hide');
            })
        })


    </script>
@endsection