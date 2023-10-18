<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile">
            <!-- User profile image -->
            <div class="profile-img"> <img src="{{ asset('assets/backend/images/logo.png') }}" alt="user" />
            </div>
            <!-- User profile text-->
            <div class="profile-text">
                <h5>{{ auth()->user()->name }}</h5>
                {{-- <a href="#" class="" data-toggle="tooltip" title="Settings"><i
                        class="mdi mdi-settings"></i></a>
                <a href="#" class="" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a> --}}
                <a href="{{ route('admin.logout') }}" class="" data-toggle="tooltip" title="Logout"><i
                        class="mdi mdi-power"></i></a>

            </div>
        </div>
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>
                <li class="nav-small-cap">ANALYTICS</li>
                <li> <a class="waves-effect waves-dark" href="{{ route('dashboard') }}" aria-expanded="false"><i
                            class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard </span></a>
                </li>
                <li class="nav-small-cap">GAMES</li>
                <li> <a class="waves-effect waves-dark" href="{{ route('dashboard.game.show') }}"
                        aria-expanded="false"><i class="mdi mdi-gamepad-variant"></i><span class="hide-menu">Games
                        </span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="{{ route('dashboard.game.add') }}"
                        aria-expanded="false"><i class="mdi mdi-plus"></i><span class="hide-menu">Add New Game
                        </span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="{{ route('dashboard.category') }}"
                        aria-expanded="false"><i class="mdi mdi-widgets"></i><span class="hide-menu">Add Category
                        </span></a>
                </li>
                <li class="nav-small-cap">SUBSCRIBERS</li>
                <li> <a class="waves-effect waves-dark" href="{{ route('dashboard.subscribers') }}"
                        aria-expanded="false"><i class="mdi mdi-book-multiple"></i><span
                            class="hide-menu">Subscribers </span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="{{ route('dashboard.subscribers.gamePlayed') }}"
                        aria-expanded="false"><i class="mdi mdi-book-multiple"></i><span class="hide-menu">All
                            Played Games
                        </span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="{{ route('dashboard.subscribers.purchasePlans') }}"
                        aria-expanded="false"><i class="mdi mdi-book-multiple"></i><span class="hide-menu">Purchase
                            Plans </span></a>
                </li>
                <li class="nav-small-cap">SUPPORT CENTER</li>
                <li> <a class="waves-effect waves-dark" href="{{ route('dashboard.support') }}"
                        aria-expanded="false"><i class="mdi mdi-book-multiple"></i><span class="hide-menu">All
                            Support Messages</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="{{ route('dashboard.support.unread') }}"
                        aria-expanded="false"><i class="mdi mdi-book-multiple"></i><span class="hide-menu">Unread
                            Messages</span></a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
