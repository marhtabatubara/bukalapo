<nav class="navbar navbar-expand-sm navbar-dark bg-danger p-0">
    <div class="container">
        <a href="" class="navbar-brand">BukaLapo</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav">
                @if (Auth::check() && Auth::user()->level == 'admin')
                    <li class="nav-item px-2">
                        <a href="/postingan" class="nav-link active">Postingan</a>
                    </li>
                @endif
                
                @if (Auth::check())
                    <li class="nav-item px-2">
                        <a href="/artikel" class="nav-link active">Artikel</a>
                    </li>
                @endif

                @if (Auth::check())
                    <li class="nav-item px-2">
                        <a href="/infodata" class="nav-link active">Info Data</a>
                    </li>
                @endif

                @if (Auth::check())
                    <li class="nav-item px-2">
                        <a href="/carousel" class="nav-link active">Carousel</a>
                    </li>
                @endif

                @if (Auth::check() && Auth::user()->level == 'admin')
                    <li class="nav-item px-2">
                        <a href="/user" class="nav-link active">Manajemen User</a>
                    </li>
                @endif
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown mr-3">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user"></i> Hi, {{ Auth::user()->name ?? null }}
                    </a>
                    <div class="dropdown-menu">
                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out-alt"></i> {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>