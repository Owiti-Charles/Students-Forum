@extends('student.master')
@section('content')
        <div class="timeline">
            @if(Session::has('message'))
                <p class="alert alert-danger">{{ Session::get('message') }}</p>
            @endif
            <div class="t-view" data-tv-type="text">
                <div class="tv-header media">
                    <a href="" class="tvh-user pull-left">
                        @if($new->user->image!==null)
                            <img class="img-responsive" src="{{URL::to('profile/'. $new->user->image)}}" alt="">
                        @else
                            <img class="lgi-img" src="{{URL::to('img/profile-pics/1.jpg')}}" alt="">
                        @endif
                    </a>
                    <div class="media-body p-t-5">
                        <strong class="d-block">{{$new->user->name}}</strong>
                    </div>
                </div>
                <div class="tv-body">
                    <div class="clearfix"></div>

                    <div class="clearfix"></div>
                    <div class="pm-body clearfix">
                        <div class="pmb-block ">
                            <div class="pmbb-header">
                                <h2><i class="zmdi zmdi-wrap-text m-r-10"></i>News</h2>
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
                                        <dt>Tittle</dt>
                                        <dd style="color: #00BCD4">{!! $new->title !!}
                                        </dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Description</dt>
                                        <dd style="color: #008000">{!!$new->content!!} 
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