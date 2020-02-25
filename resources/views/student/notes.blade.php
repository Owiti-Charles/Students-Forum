@extends('student.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Manage Notes
            </h2>
        </div>
        <div class="card-body card-padding">
            <div class="row">
                <table id="example" class="table table-striped table-vmiddle">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Lecturer</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>File</th>
                        <th>Uploaded On</th>
                        <th >Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($notes as $key=>$note)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$note->user->name}}</td>
                            <td>{!!$note->title!!}</td>
                            <td style="width: 400px;">{!!$note->ShortContent!!}</td>
                            <td style="width: 100px"> {{$note->file}} </td>
                            <td style="width: 200px"> {{$note->created_at->toDayDateTimeString()}} </td>
                            <td style="width: 350px" class="center">
                             <a href="{{route('student.note.view', $note->id)}}">
                                 <button style="color: #00BCD4" type="button" class="btn btn-icon command-edit waves-effect waves-circle edit-btn" >
                                     <span class="zmdi zmdi-eye" ></span>
                                 </button>
                             </a>



                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
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


    </script>
@endsection