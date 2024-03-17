{{-- @php
    $segment = request()->segment(2);
@endphp --}}
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                        <img alt="image" class="img-circle" src="{{ asset('img/profile_small.jpg') }}" />
                         </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                         </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li>
                <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Quản lý thành viên</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('user.catalogue.index') }}">Ql nhóm thành viên</a></li>
                    <li><a href="{{ route('user.index') }}">Ql thành viên</a></li>
                    <li><a href="{{ route('permission.index') }}">Ql phân quyền</a></li>
                </ul>
            </li>
            
            <li>
                <a href="#"><i class="fa fa-file"></i> <span class="nav-label">Quản lý bài viết</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('post.catalogue.index') }}">Ql nhóm bài viết</a></li>
                    {{-- <li><a href="{{ route('post.index') }}">Ql bài viết</a></li> --}}
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-gear"></i> <span class="nav-label">Cấu hình chung</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('language.index') }}">Ql ngôn ngữ</a></li>
                    <li><a href="{{ route('generate.index') }}">Ql module</a></li>
                    {{-- <li><a href="{{ route('post.index') }}">Ql ngôn ngữ</a></li> --}}
                </ul>
            </li>
            
        </div>
        
        
</nav>