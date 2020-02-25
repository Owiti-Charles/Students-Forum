@extends('student.master')
@section('content')
 <div class="row">
     <div class="card">
         <div class="card-header">
             <h2>Create TimeTables
             <small>Master or Individual Course</small>
             </h2>
         </div>
         <div class="card-body card-padding">
             <div class="form-wizard-basic fw-container">
                 <ul class="tab-nav" role="tablist">
                     <li  class="active" ><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Master TimeTable</a></li>
                     <li><a href="#tab2" data-toggle="tab">Course Timetable</a></li>
                 </ul>

                 <div class="tab-content">
                     <div class="tab-pane active" role="tabpanel" id="tab1">
                         <br>

                         <div class="row">
                             <form id="masterform" method="POST" action="{{route('masters.save')}}" enctype="multipart/form-data">
                                 {{csrf_field()}}
                                 <input type="hidden" name="type" value="master">
                                 <div class="row">
                                     <div class="col-lg-6">
                                         <div class="input-group form-group">
                                             <span class="input-group-addon"><i class="zmdi zmdi-text-format"></i></span>
                                             <select class="form-control faculty_id" name="faculty"  required>
                                                 <option value="" selected>--Faculty--</option>
                                                 @foreach($faculties as $faculty)
                                                     <option value="{{$faculty->id}}">{{$faculty->faculty}}</option>
                                                 @endforeach
                                             </select>
                                             <span class="input-group-addon last f-20 f-700 " ><i class="zmdi zmdi-plus-square add_faculty"></i></span>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-lg-6">
                                         <br>
                                         <div class="input-group fg-float">
                                             <span class="input-group-addon"><i class="zmdi zmdi-text-format"></i></span>
                                             <div class="fg-line">
                                           <input type="text" class="form-control " name="academic_year" required>
                                                 <label class="fg-label f-14" >Academic Year</label>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-lg-6">
                                         <br>
                                         <div class="input-group fg-float">
                                             <span class="input-group-addon"><i class="zmdi zmdi-text-format"></i></span>
                                             <div class="fg-line">
                                                 <select class="form-control" name="semester" required>

                                                     <option value="" selected disabled="disabled">--Semester--</option>
                                                     <option value="1">1</option>
                                                     <option value="2">2</option>
                                                     <option value="3">3</option>
                                                 </select>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-lg-6">
                                         <br>
                                         <div class="input-group fg-float">
                                             <span class="input-group-addon"><i class="zmdi zmdi-file-add"></i></span>
                                             <label>File</label>
                                             <div class="fg-line">
                                                 <input type="file" class="form-control" name="file" required>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <br>
                                 <br>
                                 <button type="submit" class="btn btn btn-primary m-b-15 m-l-25 p-r-20 ">Create</button>


                             </form>
                         </div>
                     </div>
                     <div class="tab-pane fade" id="tab2">
                         <br>
                         <div class="row">
                             <form id="masterform" method="POST" action="{{route('createTimetable')}}" enctype="multipart/form-data">
                                 {{csrf_field()}}
                                 <input type="hidden" name="type" value="timetable">
                                 <div class="row">
                                     <div class="col-lg-6">
                                         <div class="input-group form-group">
                                             <span class="input-group-addon"><i class="zmdi zmdi-text-format"></i></span>
                                             <select class="form-control faculty_id" name="faculty" id="faculty_id" required>
                                                 <option value="" selected>--Faculty--</option>
                                                 @foreach($faculties as $faculty)
                                                     <option value="{{$faculty->id}}">{{$faculty->faculty}}</option>
                                                 @endforeach
                                             </select>
                                             <span class="input-group-addon last f-20 f-700" id="add_faculty"><i class="zmdi zmdi-plus-square add_faculty"></i></span>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-lg-6">
                                         <div class="input-group form-group">
                                             <span class="input-group-addon"><i class="zmdi zmdi-text-format"></i></span>
                                             <select class="form-control" name="course" id="course" required>
                                                 <option value="" selected>--Course--</option>

                                             </select>
                                             <span class="input-group-addon last f-20 f-700" id="add_course"><i class="zmdi zmdi-plus-square"></i></span>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-lg-6">
                                         <br>
                                         <div class="input-group fg-float">
                                             <span class="input-group-addon"><i class="zmdi zmdi-text-format"></i></span>
                                             <div class="fg-line">
                                                 <input type="text" class="form-control " name="academic_year" required>
                                                 <label class="fg-label f-14" >Academic Year</label>
                                             </div>
                                         </div>

                                     </div>
                                 </div>
                                 <div class="row"><br><br>
                                     <div class="col-lg-6">
                                         <div class="input-group form-group">
                                             <span class="input-group-addon"><i class="zmdi zmdi-text-format"></i></span>
                                             <select class="form-control" name="year" id="year" required>
                                                 <option value="" selected>--Year of Study--</option>
                                                 <option value="1">Year 1</option>
                                                 <option value="2">Year 2</option>
                                                 <option value="3">Year 3</option>
                                                 <option value="4">Year 4</option>
                                                 <option value="5">Year 5</option>

                                             </select>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-lg-6">
                                         <br>
                                         <div class="input-group fg-float">
                                             <span class="input-group-addon"><i class="zmdi zmdi-text-format"></i></span>
                                             <div class="fg-line">
                                                 <select class="form-control" name="semester" required>

                                                     <option value="" selected disabled="disabled">--Semester--</option>
                                                     <option value="1">1</option>
                                                     <option value="2">2</option>
                                                     <option value="3">3</option>
                                                 </select>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-lg-6">
                                         <br>
                                         <div class="input-group fg-float">
                                             <span class="input-group-addon"><i class="zmdi zmdi-file-add"></i></span>
                                             <label>File</label>
                                             <div class="fg-line">
                                                 <input type="file" class="form-control" name="file">
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <br>
                                 <br>
                                 <button type="submit" class="btn btn btn-primary m-b-15 m-l-25 p-r-20 ">Create</button>


                             </form>
                         </div>
                         </div>
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
                         <select class=" form-control faculty" id="addFaculty" name="faculty_id" required></select>
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
        $(window).on('load', function () {
            $('#masterform').trigger('reset');
        })
        $('.add_faculty').on('click', function () {
            $('#faculty').val('');
            $('#addFaculty').modal('show');
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
                    $('.faculty_id').append($("<option/>", {
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
        $('#faculty_id').on('change', function (e) {

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
            var faculties=$('#faculty_id option');
            var faculty=$('#add_course_form').find('#addFaculty');
            $('#add_course_form #addFaculty').empty();

            $.each(faculties, function (id,pro) {
                $(faculty).append($("<option/>", {
                    value: $(pro).val(),
                    text: $(pro).text(),
                }))
            })
            // $('#course').val('');
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