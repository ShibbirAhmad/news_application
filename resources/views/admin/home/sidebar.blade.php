 <nav class="page-sidebar" id="sidebar">
            <div id="sidebar-collapse">
                <div class="admin-block d-flex">
                    <div>
                        <img src="{{asset('public/admin/assets/')}}/img/admin-avatar.png" width="45px" />
                    </div>
                    <div class="admin-info">
                        <div class="font-strong"> {{ Auth::user()->name }}</div><small>Administrator</small></div>
                </div>
                <ul class="side-menu metismenu">
                    <li>
                        <a class="active" href="{{route('home')}}"><i class="sidebar-item-icon fa fa-th-large"></i>
                            <span class="nav-label">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a class="active" href="{{route('advertisement_list')}}"><i class="sidebar-item-icon fa fa-list-alt"></i>
                            <span class="nav-label">Advertisement</span>
                    </a>
                    </li>
                    <li class="heading">CATEGORY</li>

                    <li class = "{{ set_active(['categorys', Request::is('sub-categorys')]) }}">

                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                            <span class="nav-label">Category</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">

                            <li>
                                <a class = "{{ set_active('categorys') }}" href="{{route('categorys')}}">Category List</a>
                            </li>

                        <li>
                             <a class = "{{ set_active('sub-categorys') }}" href="{{  route('sub_category_list') }}">Sub-Categorys</a>
                        </li>

                        </ul>
                    </li>

                    <li class="{{ set_active(['posts'])}}">

                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-table"></i>
                            <span class="nav-label">Post</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a class="{{ set_active('posts') }}" href="{{route('posts')}}">Post List</a>
                            </li>

                        </ul>
                    </li>

                    <li class="{{ set_active(['slider-list'])}}">
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Slider Option</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a class="{{ set_active('slider-list') }}" href="{{route('slider-list')}}">Slider List</a>
                            </li>

                        </ul>
                    </li>


                    <li class="heading">PAGES</li>
                    <li class="{{ set_active(['gallery-list'])}}">
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-envelope"></i>
                            <span class="nav-label">Image Gallery</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                     <a class="{{ set_active(['gallery-list'])}}" href="{{route('gallery-list')}}">Gallery-List</a>
                            </li>

                        </ul>
                    </li>

                    <li class="{{ set_active(['video-list '])}}">
                        <a href="{{route('video-list')}}"><i class="sidebar-item-icon fa fa-calendar"></i>
                            <span class="nav-label">Video</span>
                        </a>
                    </li>
                    <?php
                      if (Auth::user()->user_type == 1) { ?>

                    <li class="{{ set_active(['user-list'])}}">
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">User Option</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a class="{{ set_active(['user-list'])}}" href="{{route('user-list')}}">User List</a>
                            </li>


                        </ul>
                    </li>
                <?php } ?>


                </ul>
            </div>
        </nav>