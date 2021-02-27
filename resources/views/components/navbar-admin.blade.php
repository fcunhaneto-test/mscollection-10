<nav class="navbar is-dark navbar-admin" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand mr-3">
            <a class="navbar-item is-active" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }} Administração
            </a>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
               data-target="navbarTop">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarTop" class="navbar-menu">
            <div class="navbar-start">
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-item">Filmes<i class="fas fa-chevron-down ml-2"></i></a>
                    <div class="navbar-dropdown navbar-admin">
                        @foreach($media as $m)
                            <a class="navbar-item navbar-admin"
                               href="{{ route('admin-movies', ['channel' => $m->slug]) }}">{{ $m->name }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-item">Séries<i class="fas fa-chevron-down ml-2"></i></a>
                    <div class="navbar-dropdown navbar-admin">
                        @foreach($media as $m)
                            <a class="navbar-item navbar-admin"
                               href="{{ route('admin-series', ['channel' => $m->slug]) }}">{{ $m->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="navbar-end mr-6">
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link is-active">{{ Auth::user()->name }}</a>

                    <div class="navbar-dropdown">
                        <a class="navbar-item" href="{{ url('/') }}">home</a>
                        <a class="navbar-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
