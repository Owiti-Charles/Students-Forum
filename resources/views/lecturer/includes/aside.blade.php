            <aside id="sidebar" class="sidebar c-overflow">
                <div class="s-profile">
                    <a href="" data-ma-action="profile-menu-toggle">
                        <div class="sp-pic">
                            @if(Auth::user()->image!==null)
                            <img src="{{URL::to('/profile/'. Auth::user()->image)}}" alt="">
                             @else
                                @if(Auth::user()->gender=='Male')
                                    <img src="{{url('img/profile-pics/male.jpg')}}" alt="">
                                @elseif(Auth::user()->gender=='Female')
                                    <img src="{{url('img/profile-pics/female.jpg')}}" alt="">
                                 @else
                                    <img src="{{url('img/profile-pics/1.jpg')}}" alt="">
                                @endif
                            @endif
                        </div>

                        <div class="sp-info">
                            @if(Auth::check())
                            {{Auth::user()->name}}
                            @else
                                header({{URL::to('logout')}})
                            @endif
                            <i class="zmdi zmdi-caret-down"></i>
                        </div>
                    </a>

                    <ul class="main-menu">

                        <li>
                            <a href="{{route('lecturer.profile')}}"><i class="zmdi zmdi-arrow-split"></i> Profile</a>
                        </li>
                        <li>
                            <a href="{{route('lecturer.password')}}"><i class="zmdi zmdi-rotate-ccw"></i> Change Password</a>
                        </li>
                    </ul>
                </div>

                <ul class="main-menu">
                    <li class="active">
                        <a href="{{route('lecturer.index')}}"><i class="zmdi zmdi-home"></i> Home</a>
                    </li>
                    <li class="sub-menu">
                        <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-comment-edit"></i> Create Discussion</a>

                        <ul>
                            <li><a href="{{route('lecturer.discussion.create')}}">Create</a></li>
                            <li><a href="{{route('lecturer.discussion.manage')}}" >Manage</a> </li>
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-comment-outline"></i> Discussions</a>

                        <ul>
                            <li><a href="{{route('lecturer.discussions.view.all')}}">View</a></li>
                        </ul>

                    </li>
                    <li class="sub-menu">
                        <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-assignment"></i> Course Materials</a>

                        <ul>
                            <li><a href="{{route('lecturer.notes.create')}}">Create</a></li>
                            <li><a href="{{route('lecturer.notes.manage')}}">Manage</a></li>
                        </ul>

                    </li>

                </ul>
            </aside>