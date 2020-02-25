@extends('student.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2>System Discussions</h2>
        </div>
        <div class="card-body card-padding">
            @foreach($discusions as $discusion)
            @if($discusion->user->faculty->id==$faculty_id)
             @if($discusion->user->course->id==$course_id)
            <div class="card w-item">
                <div class="card-header">
                    <div class="media">
                        <div class="pull-left">
                            @if($discusion->user->image==null)
                                <img class="avatar-img" src="{{URL::to('img/profile-pics/3.jpg')}}" alt="">
                            @else
                                <img class="lgi-img" src="{{URL::to('profile/'.$discusion->user->image)}}" alt="">
                            @endif

                        </div>

                        <div class="media-body">
                            <h2>{{$discusion->user->name}}
                                <small>Posted on {{$discusion->created_at->toDayDateTimeString()}}</small>
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="card-body card-padding">
                  
                    <a href="{{route('discussions.view.more', $discusion->id)}}">
                          {!! $discusion->FrontContent !!}
                    </a>

                    <div class="wi-stats clearfix">
                        <div class="wis-numbers">
                           
                        </div>
                    </div>
                </div>
            </div>
             @endif
            @endif
            @endforeach
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