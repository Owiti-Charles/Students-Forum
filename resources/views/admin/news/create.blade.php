@extends('admin.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Create News</h2>
        </div>
        <div class="card-body card-padding">
            <div class="row">
                <form method="POST" action="{{route('admin.news.save')}} "  enctype="multipart/form-data">
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
                                <span class="input-group-addon"><i class="zmdi zmdi-format-align-justify"></i></span>
                                <label>Content</label>
                                <div class="fg-line">
                                    <textarea class="form-control html-editor" name="content" id="summernote" required ></textarea>

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