@extends('student.master')
@section('content')
        <div class="timeline">
            @if(Session::has('message'))
                <p class="alert alert-danger">{{ Session::get('message') }}</p>
            @endif
            <div class="t-view" data-tv-type="text">
                <div class="tv-header media">
                    <a href="" class="tvh-user pull-left">
                        @if($note->user->image!==null)
                            <img class="img-responsive" src="{{URL::to('profile/'. $note->user->image)}}" alt="">
                        @else
                            <img class="lgi-img" src="{{URL::to('img/profile-pics/1.jpg')}}" alt="">
                        @endif
                    </a>
                    <div class="media-body p-t-5">
                        <strong class="d-block">{{$note->user->name}}</strong>
                        <small class="c-gray">{{$note->user->email}}</small>
                    </div>
                </div>
                <div class="tv-body">
                    <div class="clearfix"></div>

                    <div class="clearfix"></div>
                    <div class="pm-body clearfix">
                        <div class="pmb-block ">
                            <div class="pmbb-header">
                                <h2><i class="zmdi zmdi-wrap-text m-r-10"></i>Study Material</h2>
                            </div>
                            <div class="pmbb-body p-l-30">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="pmbb-view">
                                    <dl class="dl-horizontal">
                                        <dt>Description</dt>
                                        <dd>{!! $note->description !!}
                                        </dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>File</dt>
                                        <dd>{{$note->file}} &nbsp;&nbsp;&nbsp;&nbsp;
                                            <a href="{{URL::to('notes/'.$note->file)}}" target="_blank">
                                                <button class="btn btn-success btn-xs"><i class="zmdi zmdi-print"></i>&nbsp; Download</button>
                                            </a>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

        </div>
@endsection