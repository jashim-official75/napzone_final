<header id="header">
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="{{ route('home') }}"><img class="logo"
                src="{{ asset('assets/frontend/img/logo.webp') }}" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            </ul>

            <form class="form-inline my-2 my-lg-0 search-box" action="{{ route('search') }}" method="get">
                <input class="form-control mr-sm-2 search-input" type="search" name="keyword"
                    placeholder="Search Games.." value="{{ old('keyword') }}">
                <button class="search-button">
                    <!--<i class="fas fa-search"></i>-->
                    <img 
                src="{{ asset('assets/frontend/img/search-icon.png') }}" alt="">
                </button>
            </form>
            @if(!empty($purchasePlanDetail) && $logIn == 1)
                <a href="#" class="btn btn__primary ml-0 ml-md-5 my-sm-0" type="button" data-toggle="modal"
                data-target="#unsubscribe">Unsubscribe</a>
                <a href="{{ route('logout') }}" class="btn btn__primary mr-0 mr-md-5 ml-2 my-2 my-sm-0" type="button">Logout</a>
            @elseif($logIn == 1)
                <a href="{{ route('logout') }}" class="btn btn__primary ml-5 my-2 my-sm-0" type="button">Logout</a>
            @else
                <a href="#" class="btn btn__primary ml-5 my-2 my-sm-0" type="button" data-toggle="modal"
                data-target="#login">Log In</a>
            @endif
        </div>
    </nav>
</header>
