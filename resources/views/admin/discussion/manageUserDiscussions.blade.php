@extends('admin.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Manage User Discussions
            </h2>

        
        <div class="card-body card-padding">
            <div class="row">
                <table id="example" class="table table-striped table-vmiddle">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Created By</th>
                        <th style="width: 5%">Course</th>
                        <th style="width: 14%">Title</th>
                        <th style="width: 20%">Content</th>
                        <th style="width: 80px"> Uploaded</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($discussions as $key=>$discussion)
                        <tr>
                            <td>{{++$key}}</td>
                            <th>{{$discussion->user->name}}</th>
                            <th>{{$discussion->user->course->course}}</th>
                            <td>{!!$discussion->title!!}</td>
                            <td class="center">{!!$discussion->AdminShortContent!!}</td>
                            <td class="center"> {{$discussion->created_at->toDayDateTimeString()}} </td>
                            @if($discussion->status==1)
                                <td class="center"> <button class="btn btn-success btn-xs">Approved</button> </td>
                            @elseif($discussion->status==2)
                                <td class="center"> <button class="btn btn-warning btn-xs">Closed</button> </td>
                            @elseif($discussion->status==0)
                                <td class="center"> <button class="btn btn-danger btn-xs">Banned</button> </td>
                            @endif
                            <td class="center">
                                <button style="color: #00BCD4" type="button" onclick="return editDiscu('{{$discussion->id}}')" class="btn btn-icon command-edit waves-effect waves-circle edit-btn" ><span class="zmdi zmdi-edit" ></span></button>
                                <a href="{{route('admin.discussions.view.approve', $discussion->id)}}"><button style="color: green;" type="button"  class="btn btn-icon command-edit waves-effect waves-circle" ><span class="zmdi zmdi-eye" ></span></button></a>
                                <button style="color: red;" type="button"  class="btn btn-icon command-edit waves-effect waves-circle" onclick="return deleteDiscu('{{$discussion->id}}')" ><span class="zmdi zmdi-delete" ></span></button>
                                <form action="{{route('admin.discussion.destroy', $discussion->id)}}" style="visibility: hidden;" method='POST' id="{{$discussion->id}}" class="pull-left">
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
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Manage Discussion Thread</h4>
                </div>
                <div class="modal-body">
                    <!-- content goes here -->
                    <form action="{{route('admin.user.discussion.update')}}" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control selectpicker" required="required">

                                <option value="1" selected="selected">Approve</option>
                                <option value="0">Deny</option>
                                <option value="2">Close</option>

                            </select>
                        </div>



                        <div class="modal-footer">

                            <button type="submit"   class="btn btn-primary btn-hover-green btn-sm pull-left" data-action="save" role="button" >Update</button>

                            <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
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
</script>
@endsection
@section('scripts')
    <script type="text/javascript">

        function deleteDiscu(id){
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this Thread!",
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
        function editDiscu(id){
            $("input[name='id']").val(id);
            $('#editModal').modal('show');
        }
        $(document).ready(function() {
            $('#summernote').summernote({
                height:200,
            });
            $('#summernote1').summernote({
                height:200,
            });

        });
        function getData(id){
            swal({
                title: "Are you sure?",
                text: "You are about to edit this discussion!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, edit it!",
                closeOnConfirm: true
            }, function(isConfirm){

                if (isConfirm) {
                    var submiturl = "{{URL::to('administrator/discussion/fetch')}}";
                    var content="";
                    var file="";
                    var description="";
                    $.ajax({
                        url:submiturl+ '/'+id,
                        type: 'GET',
                        data: '',
                        success: function(data){
                            console.log(data);
                            if(data.description ==null){

                                $('#div').html('<label for="content">Content</label><textarea rows="8" cols="34" class="form-control" id="summernote" name="content"></textarea>');
//                        $('#summernote').summernote({
//                            height:200,
//                        });
                            }
                            if(data.content ==null){
                                $('#div').html(' ');
                                file+='<label for="description">Decription</label><textarea rows="8" cols="34" class="form-control html-editor" id="fileUpload" name="description"></textarea>';
                                $('#div').append(file);
//                        $('#fileUpload').summernote({
//                            height:200,
//                        });

                            }
                            $("input[name='title']").val(data.title);
                            $("textarea[name='description']").summernote('code',data.description);
                            $("textarea[name='content']").summernote('code',data.content);
//                    $("textarea[name='description']").html(data.description);
//                    $("textarea[name='content']").val(data.content);
                        },
                        error: function (xhr) {
                            console.log("xhr=" + xhr);
                        }
                    });


                    $("input[name='id']").val(id);
                    $("#editdiscu").modal("show");

                }
            });

        }

        function update()
        {
            var form = $("#updateform");

        }


    </script>
@endsection