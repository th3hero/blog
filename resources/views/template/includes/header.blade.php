<header class="navbar-light navbar-sticky header-static">
    <!-- Logo Nav START -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Logo START -->
            <a class="navbar-brand" href="{{ route('root.page') }}">
                <h4 class="navbar-brand-item">Latest News<h6 class="text-end mt-0">ye toh latest news hai</h6></h4>
            </a>
            <!-- Logo END -->

            <!-- Responsive navbar toggler -->
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="text-body h6 d-none d-sm-inline-block">Menu</span>
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Main navbar START -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav navbar-nav-scroll ms-auto">
                    <!-- Nav item 1 Home -->
                    <li class="nav-item"><a class="nav-link {{ Route::currentRouteNamed('root.page') ? 'active' : '' }}" href="{{ route('root.page') }}">Home</a></li>
                    @guest()
                        @if (Route::has('login'))
                            <li class="nav-item"><a class="nav-link {{ Route::currentRouteNamed('login') ? 'active' : '' }}" href="{{ route('login') }}">Login</a></li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a href="{{ route('tags.index') }}" class="dropdown-item">Tags Management</a>
                                <a href="{{ route('blog.index') }}" class="dropdown-item">List Posts</a>
                                <a href="{{ route('blog.create') }}" class="dropdown-item">Create Post</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
            <!-- Main navbar END -->
        </div>
    </nav>
    <!-- Logo Nav END -->
</header>
