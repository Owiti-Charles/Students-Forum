@extends('lecturer.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Upload Notes <small>Notes will be only be viewed by students of faculty {{Auth::user()->faculty->faculty}} and course {{Auth::user()->course->course}}</small></h2>
        </div>
        <div class="card-body card-padding">
            <div class="row">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{route('lecturer.notes.save')}} "  enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="type" value="file_upload">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group fg-float">
                                <span class="input-group-addon"><i class="zmdi zmdi-text-format"></i></span>
                                <div class="fg-line">
                                    <input type="text" class="form-control input-mask" name="title" required>
                                    <label class="fg-label f-14" >Title</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 description">
                            <br><br>
                            <div class="input-group fg-float">
                                <span class="input-group-addon"><i class="zmdi zmdi-file-add"></i></span>
                                <div class="fg-line">
                                    <input type="file" class="form-control input-mask" name="file" required>
                                    <label class="fg-label f-14" >File</label>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 description">
                            <br><br>
                            <div class="input-group fg-float">
                                <span class="input-group-addon"><i class="zmdi zmdi-format-align-justify"></i></span>
                                <label>Brief Description</label>
                                <div class="fg-line">
                                    <textarea class="form-control html-editor"  name="description" id="summernote" required ></textarea>

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
@endsection
@section('scripts')
    <script type="text/javascript">
        $(window).on("load", function () {
            $('#file').val('');
        })

    </script>
@endsection