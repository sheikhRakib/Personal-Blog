<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/adminlte.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    @yield('style')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="{{ route('dashboard.index') }}" class="brand-link">
                <i class="ml-5 fas fa-tachometer-alt"></i>
                <span class="brand-text font-weight-light">Dashboard</span>
            </a>

            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li></li>
                        <li class="nav-header"><b>Dashboard</b></li>

                        <li class="nav-item mt-auto">
                            <a href="{{ route('dashboard.category.index') }}"
                                class="nav-link {{ (request()->is('dashboard/category*')) ? 'active': '' }}">
                                <i class="nav-icon fas fa-box"></i>
                                <p>Category</p>
                            </a>
                        </li>

                        <li class="nav-item mt-auto">
                            <a href="{{ route('dashboard.tag.index') }}"
                                class="nav-link {{ (request()->is('dashboard/tag*')) ? 'active': '' }}">
                                <i class="nav-icon fas fa-tags"></i>
                                <p>Tag</p>
                            </a>
                        </li>

                        <li class="nav-item mt-auto">
                            <a href="{{ route('dashboard.post.index') }}"
                                class="nav-link {{ (request()->is('dashboard/post*')) ? 'active': '' }}">
                                <i class="nav-icon fas fa-pen-square"></i>
                                <p>Post</p>
                            </a>
                        </li>

                        <li class="nav-header"><b>Account</b></li>

                        <li class="nav-item mt-auto">
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>Logout</p>
                            </a>
                        </li>


                        {{-- <li class="nav-item mt-auto">
                            <a href="{{ route('contact.index') }}"
                                class="nav-link {{ (request()->is('admin/contact*')) ? 'active': '' }}">
                                <i class="nav-icon fas fa-envelope"></i>
                                <p>
                                    Messages
                                </p>
                            </a>
                        </li> --}}
                        {{-- <li class="nav-item mt-auto">
                            <a href="{{ route('setting.index') }}"
                                class="nav-link {{ (request()->is('admin/setting')) ? 'active': '' }}">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Setting
                                </p>
                            </a>
                        </li> --}}


                        {{-- <li class="nav-item mt-auto">
                            <a href="{{ route('user.profile') }}"
                        class="nav-link {{ (request()->is('admin/profile')) ? 'active': '' }}">
                        <i class="nav-icon far fa-user"></i>
                        <p>
                            Your Profile
                        </p>
                        </a>
                        </li>

                        <li class="text-center mt-5">
                            <a href="{{ route('website') }}" class="btn btn-primary text-white" target="_blank">
                                <p class="mb-0">
                                    View Website
                                </p>
                            </a>
                        </li> --}}
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            @yield('content')
        </div>

        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">
                <div class="mb-0">
                    <span>Theme: </span>
                    <a href="https://adminlte.io">AdminLTE</a>
                </div>
            </div>
            <strong>Copyright &copy; 2022 | RI</strong>
        </footer>
    </div>


    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>


    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('admin/js/bs-custom-file-input.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @yield('script')
    <script>
        @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
        @endif
        $(document).ready(function () {
            bsCustomFileInput.init()
        })

    </script>
</body>

</html>
