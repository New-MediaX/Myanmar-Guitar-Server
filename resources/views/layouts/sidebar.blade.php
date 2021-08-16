<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
        <img src="{{asset('public/dist/img/Logo.png')}}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a class="nav-link {{ set_active(['home']) }}" href="{{ route('home') }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ set_active(['albums*']) }}" href="{{ route('albums') }}">
                        <i class="nav-icon fas fa-compact-disc"></i>
                        <p>
                            Albums
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ set_active(['authors*']) }}" href="{{ route('authors') }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Authors
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ set_active(['songs*']) }}" href="{{ route('songs') }}">
                        <i class="nav-icon fas fa-music"></i>
                        <p>
                            Songs
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a class="nav-link {{ set_active(['token*']) }}" href="{{ route('token') }}">
                                <i class="nav-icon fas fa-key"></i>
                                <p>
                                    API Token
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>