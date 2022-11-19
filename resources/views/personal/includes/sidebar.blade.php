<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('personal.main.index') }}" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Personal Area</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('personal.main.index') }}" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            @can('view', auth()->user())
            <li class="nav-item">
                <a href="{{ route('admin.main.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-crown"></i>
                    <p>
                        Admin
                    </p>
                </a>
            </li>
            @endcan
            <li class="nav-item">
                <a href="{{ route('personal.user.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-solid fa-user"></i>
                    <p>
                        About Me
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('personal.user.edit') }}" class="nav-link">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                        Edit profile
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('personal.like.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-solid fa-heart"></i>
                    <p>
                        Liked
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('personal.comment.index') }}" class="nav-link">
                    <i class="fas nav-icon fa-solid fa-comment"></i>
                    <p>
                        Comments
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('post.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Blog
                    </p>
                </a>
            </li>
        </ul>

    </div>
    <!-- /.sidebar -->
</aside>

