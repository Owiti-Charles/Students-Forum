@extends('admin.master')
@section('content')
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h2>Manage TimeTables
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

                            <table class="table table-striped table-bordered table-vmiddle responsive">
                                <thead>
                                <tr>
                                    <th>Faculty</th>
                                    <th>Academic Year</th>
                                    <th>Semester</th>
                                    <th>Uploaded On</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($masters as $master)
                                    <tr>
                                        <td>{{$master->faculty->faculty}}</td>

                                        <td class="center">{{$master->academic_year}}</td>

                                        <td class="center"> {{$master->semester}} </td>
                                        <td class="center"> {{$master->created_at->toDayDateTimeString()}} </td>

                                        <td class="center">
                                            <button style="color: #00BCD4" type="button"  class="btn btn-icon command-edit waves-effect waves-circle edit-btn" ><span class="zmdi zmdi-edit" ></span></button>
                                            <button style="color: red;" type="button" onclick="return deleteMaster('{{$master->id}}')" class="btn btn-icon command-edit waves-effect waves-circle edit-btn" ><span class="zmdi zmdi-delete" ></span></button>

                                            <form action="{{route('master.destroy', $master->id)}}" style="visibility: hidden;" id="{{$master->id}}" method='POST' class="pull-left">
                                                &nbsp&nbsp
                                                {{csrf_field()}}

                                            </form>


                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="tab2">
                            <br>
                            <table class="table table-striped table-bordered table-vmiddle responsive">
                                <thead>
                                <tr>
                                    <th>Faculty</th>
                                    <th>Course</th>
                                    <th>Year of Study</th>
                                    <th>Academic Year</th>
                                    <th>Semester</th>
                                    <th>Uploaded On</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($timetables as $timetable)
                                    <tr>
                                        <td>{{$timetable->faculty->faculty}}</td>

                                        <td class="center">{{$timetable->course->course}}</td>

                                        <td class="center"> {{$timetable->year_of_study}} </td>
                                        <td class="center"> {{$timetable->academic_year}} </td>
                                        <td class="center">{{$timetable->semester}}</td>
                                        <td class="center"> {{$master->created_at->toDayDateTimeString()}} </td>

                                        <td class="center">

                                            <button style="color: #00BCD4" type="button"  class="btn btn-icon command-edit waves-effect waves-circle edit-btn" ><span class="zmdi zmdi-edit" ></span></button>
                                            <button style="color: red;" type="button" onclick="return deleteTimetable('{{$timetable->id}}')" class="btn btn-icon command-edit waves-effect waves-circle edit-btn" ><span class="zmdi zmdi-delete" ></span></button>

                                            <form action="{{route('timetable.destroy', $timetable->id)}}" style="visibility: hidden;" id="deleteTimetable" method='POST' class="pull-left">
                                                &nbsp&nbsp
                                                {{csrf_field()}}

                                            </form>


                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
@endsection
@section('scripts')
 <script type="text/javascript">
     function deleteTimetable(id){
         swal({
             title: "Are you sure?",
             text: "You will not be able to recover this Event!",
             type: "warning",
             showCancelButton: true,
             confirmButtonColor: "#DD6B55",
             confirmButtonText: "Yes, delete it!",
             closeOnConfirm: false
         }, function(isConfirm){

             if (isConfirm) {
                 document.getElementById('deleteTimetable').submit();

             }
         });
     }
     function deleteMaster(id){
        alert(id);
         swal({
             title: "Are you sure?",
             text: "You will not be able to recover this Event!",
             type: "warning",
             showCancelButton: true,
             confirmButtonColor: "#DD6B55",
             confirmButtonText: "Yes, delete it!",
             closeOnConfirm: false
         }, function(isConfirm){

             if (isConfirm) {
                 document.getElementById(id).submit();

             }
         });
     }
 </script>
@endsection