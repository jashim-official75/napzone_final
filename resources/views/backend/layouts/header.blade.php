<header class="topbar" style="background: #fff;">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html">
                {{-- <!-- Logo icon --><b>
                    <!-- Dark Logo icon -->
                    <img src="{{ asset('assets/backend/images/logo-icon.png') }}" alt="homepage"
                        class="dark-logo" />
                </b>
                <!--End Logo icon -->
                <!-- Logo text --><span>
                    <!-- dark Logo text -->
                    <img src="{{ asset('assets/backend/images/logo-text.png') }}" alt="homepage"
                        class="dark-logo" />
                </span> --}}
            </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav mr-auto mt-md-0">
                <!-- This is  -->
                <li class="nav-item"> <a
                        class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark"
                        href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                <li class="nav-item m-l-10"> <a
                        class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark"
                        href="javascript:void(0)"><i class="ti-menu" style="color: #99abb4 !important;"></i></a> </li>
            </ul>
            <ul class="navbar-nav my-lg-0">
                <!-- Profile -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href=""
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                            src="{{ asset('assets/backend/images/logo.png') }}" alt="user"
                            class="profile-pic" /></a>
                    <div class="dropdown-menu dropdown-menu-right scale-up">
                        <ul class="dropdown-user">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img"><img
                                            src="{{ asset('assets/backend/images/logo.webp') }}" alt="user"></div>
                                    <div class="u-text">
                                        <h4>NapTech Labs</h4>
                                        <p class="text-muted">{{ auth()->user()->name }}</p>
                                    </div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>

                            {{-- <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li> --}}
                            {{-- <li role="separator" class="divider"></li> --}}
                            <li><a href="{{ route('admin.logout') }}"><i class="fa fa-power-off"></i> Logout</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
