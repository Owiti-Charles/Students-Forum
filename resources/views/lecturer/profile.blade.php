@extends('lecturer.master')
@section('content')
    <style type="text/css">
        #profile-main{
            min-height: 450px;
            max-height: inherit;
        }
        #clearfix{
            min-width: 700px;
        }

        #center{
            min-height: 400px;
            max-height: 400px;
            max-width: 400px;
            min-width: 400px;
        }
        #pic{
            min-height: 300px;
            max-height: 300px;
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
    <div class="container container-alt ">

        <div class="block-header">
            <h2>{{$user->name}}
                <small>{{$user->admission_staff_no}}</small>
            </h2>
        </div>

        <div class="card col-md-3 profile pull-left" id="profile-main" >
            <div class="pm-overview c-overflow">
                <div class="pmo-pic" >
                    <div class="p-relative"  >
                        <a href="#">

                            @if(Auth::user()->image===null)
                                @if(Auth::user()->gender=='Male')
                                    <img src="{{url('img/profile-pics/male.jpg')}}" alt="">
                                @elseif(Auth::user()->gender=='Female')
                                    <img src="{{url('img/profile-pics/male.jpg')}}" alt="">
                                @endif
                            @elseif(Auth::user()->image!==null)
                                <img id="pic" class="img-responsive" src="{{URL::to('/profile/'. $user->image)}}" alt="">
                            @endif
                        </a>

                        <a href="#" id="photo"   class="pmop-edit"  >
                            <i class="zmdi zmdi-camera"></i> <span   class="hidden-xs">Update Profile Picture</span>
                        </a>
                    </div>

                </div>
            </div>

        </div>
        <div class="pm-body clearfix col-md-8 pull-right" id="clearfix">
            <div class="">
                <div class="card" id="profile-main"  >

                    <div class="pm-body clearfix">

                        <div class="pmb-block ">
                            <div class="pmbb-header">
                                <h2><i class="zmdi zmdi-account m-r-10"></i> Basic Information</h2>

                                <ul class="actions">
                                    <li class="dropdown">
                                        <a href="" data-ma-action="profile-edit" >
                                            <button class="btn btn-success btn-icon"><i class="zmdi zmdi-edit"></i></button>
                                        </a>

                                    </li>
                                </ul>
                            </div>
                            <div class="pmbb-body p-l-30">

                                <div class="pmbb-view">
                                    <dl class="dl-horizontal">
                                        <dt>Full Names</dt>
                                        <dd>{{$user->name}}</dd>
                                    </dl>

                                    <dl class="dl-horizontal">
                                        <dt>Gender</dt>
                                        <dd>{{$user->gender}}</dd>
                                    </dl>
                                </div>
                                <form method="POST" action="{{route('lecturer.updateBasic')}}">
                                    {{csrf_field()}}
                                    <div class="pmbb-edit">
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Full Names</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" name="name" class="form-control"
                                                           value="{{$user->name}}">
                                                </div>

                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Gender</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <select class="form-control selectpicker" name="gender">
                                                        @if($user->gender=='Male')
                                                            <option selected="selected" value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        @elseif($user->gender=='Female')
                                                            <option selected="selected" value="Female">Female</option>
                                                            <option value="Male"> Male</option>
                                                        @else
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        @endif

                                                    </select>
                                                </div>
                                            </dd>
                                        </dl>



                                        <div class="m-t-30">
                                            <button class="btn btn-primary btn-sm" type="submit">Save</button>
                                            <button data-ma-action="profile-edit-cancel" class="btn btn-link btn-sm">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="pmb-block">
                            <div class="pmbb-header">
                                <h2><i class="zmdi zmdi-phone m-r-10"></i> Contact Information</h2>

                                <ul class="actions">
                                    <li class="dropdown">
                                        <a href="" data-ma-action="profile-edit">
                                            <button class="btn btn-xs btn-success  btn-icon"><i class="zmdi zmdi-edit"></i></button>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="pmbb-body p-l-30">
                                <div class="pmbb-view">
                                    <dl class="dl-horizontal">
                                        <dt>Mobile Phone</dt>
                                        <dd>{{$user->phone}}</dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Email Address</dt>
                                        <dd>{{$user->email}}</dd>
                                    </dl>

                                </div>
                                <form method="POST" action="{{route('lecturer.updateContact')}}">
                                    {{csrf_field()}}
                                    <div class="pmbb-edit">
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Mobile Phone</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control input-mask" name="phone"
                                                           value="{{$user->phone}}" data-mask="+254700000000">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Email Address</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="email" class="form-control" name="email"
                                                           value="{{$user->email}}">
                                                </div>
                                            </dd>
                                        </dl>

                                        <div class="m-t-30">
                                            <button class="btn btn-primary btn-sm" type="submit">Save</button>
                                            <button data-ma-action="profile-edit-cancel" class="btn btn-link btn-sm">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="updatePhoto" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h3 class="modal-title" id="lineModalLabel">Edit Photo</h3>
                </div>
                <div class="modal-body">

                    <!-- content goes here -->
                    <form id="updateform" method="POST" action="{{route('lecturer.updatePhoto')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div  class="center" style="text-align: center">
                            <input type="file" name="image">
                        </div>

                </div>
                <div class="modal-footer">
                    <div class="btn-group btn-group-justified" role="group" aria-label="group button">

                        <div class="btn-group" role="group">
                            <button type="submit"   class="btn btn-primary btn-hover-green" data-action="save" role="button">Update</button>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        $('#photo').on('click', function (e) {
            e.preventDefault()
            $('#updatePhoto').modal('show');


        })
    </script>
@endsection
@section('scripts')

@endsection