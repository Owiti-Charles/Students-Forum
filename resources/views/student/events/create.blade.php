@extends('student.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Create Events
                <small>Both Payed and Free Events</small>
            </h2>
        </div>
        <div class="card-body card-padding">
            <div class="row">
                <form method="POST" action="{{route('UserEvents.save')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-6">
                            <br>
                            <div class="input-group fg-float">
                                <span class="input-group-addon"><i class="zmdi zmdi-format-color-text"></i></span>
                                <div class="fg-line">
                                    <input type="text" class="form-control" name="name" value="{{old('name')}}" required>
                                    <label class="fg-label f-14" >Event Name</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text_content">
                            <br><br>
                            <div class="input-group fg-float">
                                <span class="input-group-addon"><i class="zmdi zmdi-format-align-justify"></i></span>
                                <label>Description</label>
                                <div class="fg-line">
                                    <textarea class="form-control html-editor" name="description"  value="{{old('description')}}" required></textarea>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <br>
                            <div class="input-group fg-float">
                                <span class="input-group-addon"><i class="zmdi zmdi-file-add"></i></span>
                                <label>File<small><i style="font-size: 12px"> optional</i></small></label>
                                <div class="fg-line">
                                    <input type="file" class="form-control" name="file" value="{{old('file')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <br><br>
                            <div class="input-group fg-float">
                                <span class="input-group-addon"><i class="zmdi zmdi-pin-drop"></i></span>
                                <div class="fg-line">
                                    <input type="text" class="form-control" name="venue" required value="{{old('venue')}}">
                                    <label class="fg-label f-14" >Venue</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-7">
                            <br>
                            <label class="fg-label f-14" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Start Date</label>

                            <div class="input-group form-group">
                                <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                <fieldset class="col-sm-12">
                                    <div class="control-group">
                                        <div class="controls">
                                            <div class="col-md-12 xdisplay_inputx form-group has-feedback">
                                                <input type="text" class="form-control has-feedback-left" id="startDate" value="{{old('start_date')}}" placeholder="Click here..." name="start_date" onmousedown="return dateStart()" aria-describedby="inputSuccess2Status">
                                                @if (Session::has('dateError'))
                                                    <span class="help-block">
                                                 <strong style="color: #F44336">{{ Session::get('dateError') }}</strong>
                                             </span>
                                                @endif
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-7">
                            <label class="fg-label f-14" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;End Date</label>

                            <div class="input-group form-group">
                                <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                <fieldset class="col-sm-12">
                                    <div class="control-group">
                                        <div class="controls">
                                            <div class="col-md-12 xdisplay_inputx form-group has-feedback">
                                                <input type="text" class="form-control has-feedback-left" id="date_end" value="{{old('end_date')}}" placeholder="Click here..." name="end_date" onmousedown="return endDate()" aria-describedby="inputSuccess2Status">
                                                @if (Session::has('endError'))
                                                    <span class="help-block">
                                                 <strong style="color: #F44336">{{ Session::get('endError') }}</strong>
                                             </span>
                                                @endif
                                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn btn-primary m-b-15 m-l-25 p-r-20 ">Create</button>

                </form>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script type="text/javascript">
        function  timeChanged() {
            alert('changed');

        }
        function checkend(){
            alert('clicked');
            var selectedDate=document.getElementById('end_date').value;
            alert(selectedDate);
            console.log(selectedDate);
            // var selectedDate=$('#end_date').value;

            var date=new Date(selectedDate);
            var now = new Date();
            console.log(now);
            if (date < now) {
                console.log('not futer');z
                swal("Error", "Past Dates are not allowed :)", "error");
                document.getElementById('date').value='' ;
            }
            var end_date1=document.getElementById('date').value;
            var end_date=new Date(end_date1);
            var start_date1=document.getElementById('start_date').value;
            var start_date2=new Date(start_date1);
            if(end_date < start_date2){
                swal("Error", "End date cannot be before start date :)", "error");
                document.getElementById('date').value='' ;
            }
        }
        function checkstart(){
            alert('start_date');
            console.log('start_date');
            var selectedDate=document.getElementById('start_date').value;
            console.log(selectedDate);
            var clear= document.getElementById('start_date');
            var date=new Date(selectedDate);
            var now = new Date();
            console.log(now);
            if (date < now) {
                console.log('not futer');
                swal("Error", "Past Dates are not allowed :)", "error");
                document.getElementById('start_date').value='' ;
            }

        }
        function dateStart() {
            $('#startDate').datetimepicker({
                format: 'DD-MM-YYYY h:mm A'
            });
        }
        function endDate() {
            $('#date_end').datetimepicker({
                format: 'DD-MM-YYYY h:mm A'
            });
        }


    </script>
@endsection