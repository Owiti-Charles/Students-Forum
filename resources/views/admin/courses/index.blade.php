@extends('admin.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Create Courses
                <small>By clicking on add button, the course is created automatically without reloading the page</small>
            </h2>
        </div>
        <div class="card-body card-padding">
            <div class="form-wizard-basic fw-container">
                <ul class="tab-nav" role="tablist">
                   <li  class="active" ><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab"></a></li>

                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="tab1">
                        <br>
                        <form method="POST" action="#" id="create_faculty_form">
                            {{csrf_field()}}
                            <div class="row">
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
                            <br><br>
                        </form>
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
                    <form action="{{route('admin.add.faculty')}}" method="POST" id="new_faculty_form_unique">

                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="title">Faculty</label>
                            <input type="text" class="form-control" name="faculty_name" id="new_faculty">
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
                    <form action="{{route('admin.add.course')}}" method="POST" id="add_new_course_form">

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
    <script type="text/javascript">

        $('#new_faculty_form_unique').on('submit', function (e) {
            e.preventDefault();
            var faculty=$('#new_faculty').val();
//
            var urls=$(this).attr('action');
            console.log(urls);
            var formdata=$(this).serialize();
            console.log(formdata)
            $.ajax({
                url:urls,
                type:'POST',
                data:formdata,
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
    </script>
    <script type="text/javascript">
        $('#add_new_course_form').on('submit', function (e) {
            e.preventDefault();
            var form_data=$(this).serialize();
            console.log(form_data)
            $.post("{{route('admin.add.course')}}", form_data, function (data) {
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

@section('scripts')
    <script type="text/javascript">
        $('#add_faculty').on('click', function () {
            $('#faculty').val('');
            $('#addFaculty').modal('show');
        });
        $('#create_faculty_form #faculty_id').on('change', function (e) {

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
            var faculties=$('#create_faculty_form #faculty_id option');
            var faculty=$('#add_new_course_form').find('#faculty_id');
            $('#add_new_course_form #faculty_id').empty();
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