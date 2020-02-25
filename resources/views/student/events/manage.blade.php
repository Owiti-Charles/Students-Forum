@extends('student.master')
@section('content')
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h2>Manage Events</h2>
                <small>User Created Events</small>
            </div>
            <div class="card-body card-padding">
                <table id="example" class="table table-striped table-bordered table-vmiddle responsive">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Venue</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($events as $key=>$event)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$event->name}}</td>
                            <td class="center">{{$event->venue}}</td>
                            <td class="center"> {{Carbon\Carbon::parse($event->start_date)->toDayDateTimeString()}} </td>
                            <td class="center"> {{Carbon\Carbon::parse($event->end_date)->toDayDateTimeString()}} </td>
                            @if($event->approved==1)
                                <td class="center"> <button class="btn btn-success btn-xs">Approved</button> </td>
                            @elseif($event->approved==2)
                                <td class="center"> <button class="btn btn-danger btn-xs">Denied</button> </td>
                            @else
                                <td class="center"> <button class="btn btn-warning btn-xs">Pending</button> </td>
                            @endif
                            <td class="center">
                                <button style="color: #00BCD4" type="button"  class="btn btn-icon command-edit waves-effect waves-circle edit-btn" ><span class="zmdi zmdi-eye" ></span></button>
                                <button style="color: #00BCD4" type="button" onclick="return updateEvent('{{$event->id}}')" class="btn btn-icon command-edit waves-effect waves-circle edit-btn" ><span class="zmdi zmdi-edit" ></span></button>
                                <button style="color: red;" type="button" onclick="return deleteEvent('{{$event->id}}')" class="btn btn-icon command-edit waves-effect waves-circle edit-btn" ><span class="zmdi zmdi-delete" ></span></button>

                                <form action="{{route('events.destroy', $event->id)}}" style="visibility: hidden;" id="{{$event->id}}" method='POST' class="pull-left">
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
    </div>
    <div class="modal fade" id="event" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h3 class="modal-title" id="lineModalLabel">Edit Event</h3>
                </div>
                <div class="modal-body">

                    <!-- content goes here -->
                    <form id="updateform" method="POST" action="{{route('userEvents.update')}}">
                        {{csrf_field()}}
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label for="name" class="control-lable">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>

                        <div class="form-group">
                            <label for="description" class="control-lable">Description</label>
                            <textarea id="summernote" class="form-control" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="venue" class="control-lable">Venue</label>
                            <input type="text" name="venue" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="start" class="col-sm-3 control-label">Start Date</label>
                            <fieldset class="col-sm-9">
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="col-md-9 xdisplay_inputx form-group has-feedback">
                                            <input type="text" class="form-control has-feedback-left"  id="startDate" placeholder="Click here..." name="start_date" onmousedown="return dateStart()" aria-describedby="inputSuccess2Status">
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                            <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="form-group">
                            <label for="start" class="col-sm-3 control-label">End Date</label>
                            <fieldset class="col-sm-9">
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="col-md-9 xdisplay_inputx form-group has-feedback">
                                            <input type="text" class="form-control has-feedback-left"  id="endDate" placeholder="Click here..." name="end_date" onmousedown="return dateEnd()" aria-describedby="inputSuccess2Status">
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                            <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group btn-group-justified" role="group" aria-label="group button">

                        <div class="btn-group" role="group">
                            <button type="submit"   class="btn btn-primary btn-hover-green" data-action="save" role="button">Update</button>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable( {
                columnDefs: [ {
                    targets: [ 0 ],
                    orderData: [ 0, 1 ]
                }, {
                    targets: [ 1 ],
                    orderData: [ 1, 0 ]
                }, {
                    targets: [ 3],
                    orderData: [ 3, 0 ]
                } ]
            } );
        } );
        function updateEvent(id){
            // alert(id);
            swal({
                title: "Are you sure?",
                text: "You will have to wait for approval again!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Edit it!",
                closeOnConfirm: true
            }, function(isConfirm){

                if (isConfirm) {
                    var editurl="{{ URL::to('student/event')}}";
                    $.ajax({
                        url:editurl+'/'+id,
                        type:'GET',
                        data:'',
                        success: function(data){
                            $("input[name='name']").val(data.name);
                            $("input[name='venue']").val(data.venue);
                            $("textarea[name='description']").summernote('code', data.description);
                            var date= moment(data.start_date).format('YYYY-MM-DD h:mm A');
                            $("input[name='start_date']").val(date);
                            var date2=moment(data.end_date).format('YYYY-MM-DD h:mm A');
                            $("input[name='end_date']").val(date2);

                        },
                        error:function(xhr){
                            console.log("xhr=" + xhr);
                        }
                    });
                    $("input[name='id']").val(id);
                    $("#event").modal("show");

                }
            });

        }
        function deleteEvent(id){
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
        function dateStart() {
            $('#startDate').datetimepicker({
                format: 'YYYY-MM-DD h:mm A'
            });
        }
        function dateEnd() {
            $('#endDate').datetimepicker({
                format: 'YYYY-MM-DD h:mm A'
            });
        }
    </script>
@endsection