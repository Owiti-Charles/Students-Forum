@extends('student.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2>View News
            </h2>
        </div>
        <div class="card-body card-padding">
            <div class="row">
                <table id="example" class="table table-striped table-vmiddle">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th style="width: 35% color=#00FF00">Title</th>&nbsp;&nbsp;
                        <th style="width: 50%">Content</th>&nbsp;&nbsp;
                        <th style="width: 30%">Uploaded On</th>
                        <th style="width: 10%">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($news as $key=>$new )
                        <tr>
                            <td>{{++$key}}</td>
                            <td  >{!!$new->title!!}</td>
                            <td class="center">{!!$new->ShortContent!!}</td>
                            <td class="center"> {{$new->created_at->toDayDateTimeString()}} </td>
                           <td style="width: 350px" class="center">
                             <a href="{{route('student.new.view', $new->id)}}">
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