<header id="header">
    <nav>
        <a class="navbar-brand" href="{{ route('home') }}"><img class="logo"
                src="{{ asset('assets/frontend/img/logo.webp') }}" alt=""><span>NapZone Games</span></a>

        
            <form class=" my-2 my-lg-0 search-box" action="{{ route('search') }}" method="get">
                <input class="mr-sm-2 search-input" type="search" name="keyword"
                    placeholder="Search Games.." value="{{ old('keyword') }}">
                <button class="search-button" >
                    <!--<i class="fas fa-search"></i>-->
                    <img src="{{ asset('assets/frontend/img/search-icon.png') }}" alt="">
                </button>
                <div class="mobile_searchicon" id="toggleButton">
                    <img src="{{ asset('assets/frontend/img/search-icon.png') }}" alt="">
                </div>
            </form>
            <div class="mobile_searchbar" id="searchBar">
                <form class=" my-2 my-lg-0 search-box" action="{{ route('search') }}" method="get">
                    <input class="mr-sm-2 search-bg" type="search" name="keyword"
                        placeholder="Search Games.." id="searchInput" value="{{ old('keyword') }}">
                    <button class="search-icon">
                        <!--<i class="fas fa-search"></i>-->
                        <img src="{{ asset('assets/frontend/img/search-icon.png') }}" alt="">
                    </button>
                </form>
            </div>
            @if ($logIn == 1)
                <div class="profile_icon">
                    <i class="far fa-user-circle"></i>
                    <ul class="submenu">
                        <li><a href="{{ route('user.profile') }}">Profile </a></li>
                        <li><a href="{{ route('logout') }}">LogOut </a></li>
                    </ul>
                </div>
            @else
                <a href="#" class="btn btn__primary ml-5 my-2 my-sm-0 py-2" type="button" data-toggle="modal"
                    data-target="#login">LogIn</a>
            @endif
       

    </nav>
</header>
