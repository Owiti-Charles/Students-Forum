@extends('admin.master')
@section('content')
    <style type="text/css">
        .pmbb-header{
            margin-bottom:25px;
            position:relative;

        }
        .pmbb-header h2{
            margin:0;
            font-weight:100;
            font-size:20px;
        }
        #f-menu{
            display: inline-block;

            padding-left: 0;
            margin-left: -5px;
            margin-top: 5px;
            list-style: none;
        }
        #f-menu li{
            display: inline-block;
            padding-left: 5px;
            padding-right: 5px;

        }
    </style>
    <div class="timeline">
        <div class="t-view" data-tv-type="text">
            <div class="tv-header media">
                <a href="" class="tvh-user pull-left">
                    <img class="img-responsive" src="{{URL::to('profile/'. $discussion->user->image)}}" alt="">
                </a>
                <div class="media-body p-t-5">
                    <strong class="d-block">{{$discussion->user->name}}</strong>
                    <small class="c-gray">Posted on {{$discussion->created_at->toDayDateTimeString()}}</small>
                </div>
            </div>
            <div class="tv-body">
                <strong class="d-block">{{$discussion->title}}</strong> <br>
                {!! $discussion->content !!}

                <a class="tvc-more" href=""><i class="zmdi zmdi-mode-comment"></i> View all 
                    Comments</a>
            </div>

            <div class="tv-comments">
                <ul class="tvc-lists">
                    @forelse($threads as $thread)
                        <li class="media">
                            <a href="" class="tvh-user pull-left">
                                @if($thread->user->image!==null)
                                    <img class="img-responsive" src="{{URL::to('profile/'.$thread->user->image)}}" alt="">
                                @else
                                    <img class="lgi-img" src="{{URL::to('img/profile-pics/1.jpg')}}" alt="">
                                @endif
                            </a>
                            @if(Auth::user()->id==$thread->user_id)
                                <div class="pull-right">
                                    <div class="actions dropdown">
                                        <a href="" data-toggle="dropdown" aria-expanded="true">
                                            <i class="zmdi zmdi-more-vert"></i>
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li>
                                                <a href="#" onclick="return editThread('{{$thread->id}}')">Edit</a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="return threadDelete('{{Auth::user()->id}}')">Delete</a>

                                            </li>
                                        </ul>
                                        <form method="POST" action="{{route('admin.thread.delete', $thread->id)}}" id="{{Auth::user()->id}}" style="display: none">
                                            {{csrf_field()}}
                                            <input type="hidden" value="{{$thread->id}}" name="id">
                                        </form>
                                    </div>
                                </div>
                            @endif
                            <div class="media-body">
                                <strong class="d-block">{{$thread->user->name}}</strong>
                                <small class="c-gray">{{$thread->created_at->toDayDateTimeString()}}</small>

                                <div class="m-t-10">{{$thread->thread}}
                                </div>

                            </div>
                        </li>
                    @empty
                        <li class="media">
                            <div class="media-body">
                                <div class="m-t-10" style="color: #dd7b0b">No threads for this discussion at the moment</div>
                            </div>
                        </li>
                    @endforelse
                </ul>
                <div style="text-align: center">{{$threads->links()}}</div>
            </div>
        </div>
        <div class="clearfix"></div>

    </div>
    <div class="modal fade" id="editComment" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Your Posted Thread</h4>
                </div>
                <div class="modal-body">
                    <!-- content goes here -->
                    <form action="{{route('admin.thread.update')}}" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="thread_id">
                        <div class="form-group">
                            <label for="password" class="col-sm-12 control-label" style="text-align: left;"><b>Thread</b></label>
                            <div class="col-sm-12">
                                <div class="fg-line{{ $errors->has('thread') ? ' has-error' : '' }}">
                                    <textarea class="form-control" rows="7" name="thread" id="sum" required></textarea>
                                </div>
                                <br><br>
                            </div>
                            <br><br>
                        </div>
                        <br>

                        <div class="modal-footer">

                            <button type="submit"   class="btn btn-primary btn-hover-green btn-sm pull-left" data-action="save" role="button" >Update</button>

                            <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        function editThread(id) {
            var submiturl = "{{URL::to('administrator/discussion/thread/fetch/')}}";
            $.ajax({
                url: submiturl + '/' + id,
                type: 'GET',
                data: '',
                success: function (data) {
                    console.log(data)
                    $("input[name='thread_id']").val(data.id);
                    $("textarea[name='thread']").val(data.thread);
                },
                error: function (xhr) {
                    console.log("xhr=" + xhr);

                }

            })
            $('#editComment').modal('show')
        }
        function threadDelete(id) {
            swal({
                title: "Are you sure?",
                text: "You are about to delete this milestone!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Delete!",
                closeOnConfirm: true
            }, function (isConfirm) {

                if (isConfirm) {
                    document.getElementById(id).submit();
                }
            });

        }
    </script>
@endsection