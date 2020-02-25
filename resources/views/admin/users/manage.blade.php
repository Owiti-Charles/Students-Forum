@extends('admin.master')
@section('content')
    <div class="card">
            <div class="card-header">
                <h2>Manage Users
                    <small>All System Users
                    </small>
                      
                </h2>

            </div>
            <div class="expo" style="text-align: right; padding-right:70px" >
                 <a href="{{ url('pdf') }}" ><i class="zmdi zmdi-print"></i> &nbsp;  UsersPdf</a></div>
            </div>
        <div class="card-body card-padding">
            <table class="display" id="example" style="width:100%" cellspacing="0" >
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>User Name</th>
                    <td>Faculty</td>
                    <td style="width: 5%">Course</td>
                    <th >Registered</th>
                    <th >Role</th>
                    <th >Status</th>
                    <th >Gender</th>
                    <th >Activity</th>
                    <th >Commands</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $key=>$user)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->faculty->faculty}}</td>
                        <td>{{$user->course->course}}</td>
                        <td>{{$user->created_at->toDateString()}}</td>
                        <td>{{$user->roles->name}}</td>
                        <input type="hidden" name="user_id" id="user_id" value="{{$user->id}}">
                        @if($user->status==1)
                            <td><button class="btn btn-primary btn-xs">Active</button></td>
                        @else
                            <td><button class="btn btn-warning btn-xs">Pending</button></td>
                        @endif
                        <td>{{$user->gender}}</td>
                        <td>
                            @if($user->isOnLine())
                            <li class="text-success" style="color: #01DF74">Online</li>
                        @else
                            <li class="text-muted" style="color: #070719">Offline</li>
                        @endif
                        </td>

                        <td class="center">
                            <button style="color: #00BCD4" type="button" onclick="return update('{{$user->id}}')" class="btn btn-icon command-edit waves-effect waves-circle edit-btn" ><span class="zmdi zmdi-edit" ></span></button>
                            <button style="color: red;" type="button"  class="btn btn-icon command-edit waves-effect waves-circle" onclick="return deleteUser('{{$user->id}}')" ><span class="zmdi zmdi-delete" ></span></button>
                        </td>
                        <form action="{{route('user.delete', $user->id)}}" style="visibility: hidden;" id="{{$user->id}}" method='POST' >
                            {{csrf_field()}}

                        </form>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>



    </div>
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit User</h4>
                </div>
                <div class="modal-body">
                    <!-- content goes here -->
                    <form action="{{route('users.update')}}" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control selectpicker" required="required">

                                <option value="1" selected="selected">Activate</option>
                                <option value="0">Deactivate</option>
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
                 targets: [ 8],
                 orderData: [ 8, 0 ]
             } ]
         } );
     } );
 </script>
@endsection
@section('scripts')
    <script type="text/javascript">

        function update(id){
            //alert(id);
            $("input[name='id']").val(id);
            $('#editModal').modal('show');
        }

        function deleteUser(id){
            //alert(id);
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this User!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete !",
                closeOnConfirm: false
            }, function(isConfirm){

                if (isConfirm) {

                    document.getElementById(id).submit();

                }
            });
        }
    </script>

@endsection
