            <aside id="sidebar" class="sidebar c-overflow">
                <div class="s-profile">
                    <a href="" data-ma-action="profile-menu-toggle">
                        <div class="sp-pic">
                            <img src="{{url('img/profile-pics/1.jpg')}}" alt="">
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
                            <a href="{{route('admin.password')}}"><i class="zmdi zmdi-arrow-split"></i> Change Password</a>
                        </li>
                    </ul>
                </div>

                <ul class="main-menu">
                    <li class="active">
                        <a href="{{route('admin.index')}}"><i class="zmdi zmdi-home"></i> Home</a>
                    </li>

                    <li class="sub-menu">
                        <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-accounts"></i> Users</a>

                        <ul>
                            <li><a href="{{route('users.manage')}}">Manage</a></li>
                        </ul>
                    </li>   
                    <li class="sub-menu">
                        <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-notifications-active"></i> Add Class</a>

                        <ul>
                            <li><a href="{{route('courses.create')}}">Create</a></li>
                            <li><a href="{{route('faculty.course')}}">courses/faculty</a></li>
                            
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-comment-edit"></i> Create Discussion</a>

                        <ul>
                            <li><a href="{{route('admin.discussion.create')}}">Create</a></li>
                            <li><a href="{{route('admin.discussion.manage')}}" >Manage</a> </li>
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-comment-outline"></i> Discussions</a>

                        <ul>
                            <li><a href="{{route('admin.discussions.view.all')}}">View</a></li>
                        </ul>

                    </li>
                    <li class="sub-menu">
                        <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-settings"></i> Manage Discussions</a>

                        <ul>
                            <li><a href="{{route('admin.discussions.user.manage')}}">User Discussiions</a></li>
                        </ul>

                    </li>
                    <li class="sub-menu">
                        <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-rss"></i> News</a>

                        <ul>
                            <li><a href="{{route('admin.news.create')}}">Create</a></li>
                            <li><a href="{{route('admin.news.manage')}}">Manage</a></li>
                        </ul>

                    </li>
                    <li class="sub-menu">
                        <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-print"></i> Reports</a>

                        <ul>
                        </div>
                        <li> <a href="{{ url('pdf') }}">Print all Users</a></li>
                       <li><a href="{{ url('pdf2') }}">Print all Courses</a></li>
                        <li><a href="{{route('all.students')}}" >StudentsPDF</a></li>
                     <li><a href="{{route('all.lectures')}}" >LecturesPDF</a></li>
                    <li><a href="{{route('user.roles')}}"><i class="zmdi zmdi-donut"></i>Categories</a></li>
                       <li><a href="{{route('students.faculty')}}">students/faculty</a></li>
                       <li><a href="{{route('students.course')}}">students/course</a></li>
                       <li><a href="{{route('discussionslinegraph')}}">students/discussions</a>
                        <li class="sub-menu">
                        <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-accounts"></i> List Of students per fabulty</a>

                        <ul>
                            <li><a href="{{ route('business/students') }}">FOBE</a></li>
                            <li><a href="{{ route('cit/students') }}">CIT</a></li>
                            <li><a href="{{ route('eng/students') }}">Engineering</a></li>
                            <li><a href="{{ route('sciencetech/students') }}">Science & Tech</a></li>
                            <li><a href="{{ route('social/students') }}">Social Science</a></li>
                             <li><a href="{{ route('fameco/students') }}">FAMECO</a></li>
                             {{--<li><a href="{{ route('student.discussion') }}">most active</a></li> --}}
                        </ul>
                    </li>
                        </ul>

                    </li>

                </ul>
            </aside>