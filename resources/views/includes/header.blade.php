<!-- header
    ================================================== -->
<header class="s-header">

    <div class="row s-header__content">

        <div class="s-header__logo">
            <a class="logo" href="/">
                <img src="{{ asset('images/logo.svg') }}" alt="Homepage">
            </a>
        </div>

        <nav class="s-header__nav-wrap">

            <h2 class="s-header__nav-heading h6">Site Navigation</h2>

            <ul class="s-header__nav">
                <li class="current"><a href="/" title="">Home</a></li>
                
                <li class="has-children">

                    <a href="#0" title="">Categories</a>
                    <ul class="sub-menu">

                        @include('widget.category')
                    </ul>
                </li>
              

               <li class="has-children">

                    <a href="/NewsApi" >News</a>
                    <ul class="sub-menu">
                          <li><a href="/TopHeadlines/technology">technology</a></li>
                        <li><a href="/TopHeadlines/business">business</a></li>
                        <li><a href="/TopHeadlines/entertainment">entertainment</a></li>
                        <li><a href="/TopHeadlines/general">general</a></li>
                        <li><a href="/TopHeadlines/health">health</a></li>
                        <li><a href="/TopHeadlines/science">science</a></li>
                        
                    </ul>
                </li>
                <li><a href="{{route('AboutUs')}}" title="">About</a></li>
                <li><a href="{{route('ContactUs')}}" title="">Contact</a></li>






                @guest
                @if (Route::has('login'))
                <li><a href="{{ route('login') }}" class="login" title="">{{ __('Login') }}</a></li>

                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else

                <li class="has-children">
                    <a href="{{ route('login') }}" title="">{{ Auth::user()->name }}</a>
                    <ul class="sub-menu">
                        @if(Auth::user()->is_admin==true)
                        <li> <a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li><a  href="{{ route('user.categories') }}">Categories</a></li> 
                        <li><a  href="{{ route('user.comments') }}">Comments</a></li>
                        <li><a  href="{{ route('contactmessages') }}">Contact messages</a></li>
                        <li><a  href="{{ route('slides.show') }}">Slider</a></li>
                        @endif
                        <li> <a href="{{ route('profile') }}">Profile</a></li>
                        <li><a  href="{{ route('user.posts') }}">Posts</a></li>
                        
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </a>

                        </li>

                    </ul>
                </li>











                @endguest







            </ul> <!-- end header__nav -->

            <a href="#0" title="Close Menu" class="s-header__overlay-close close-mobile-menu">Close</a>

        </nav> <!-- end header__nav-wrap -->

        <a class="s-header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

        <div class="s-header__search">

            <form method="GET" action="{{route('search')}}" class="s-header__search-form">

                <label>
                    <span class="hide-content">Search for:</span>
                    <input type="search" class="s-header__search-field" placeholder="Type Your Keywords" value=""
                        name="q" title="Search for:" autocomplete="off">
                </label>
                <input type="submit" class="s-header__search-submit" value="Search">
            </form>

            <a href="#0" title="Close Search" class="s-header__overlay-close">Close</a>

        </div> <!-- end search wrap -->

        <a class="s-header__search-trigger" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path
                    d="M10 18a7.952 7.952 0 004.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0018 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z">
                </path>
            </svg>
        </a>

    </div> <!-- end s-header__content -->

</header> <!-- end header -->