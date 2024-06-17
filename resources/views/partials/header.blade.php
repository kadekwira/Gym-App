<header>
    <h4 class="title-header">
        <i class="fa-solid fa-dumbbell"></i>
        <span>FITNES</span>
    </h4>
    <nav>
        <a href="#" class="active">Home</a>
        <a href="{{ route('class.index') }}">Class</a>
        <a href="#">Trainer</a>

        @auth
        <a href="{{ route('qrcode.generate') }}">QrCode</a>
        <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Profile
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('member.profile') }}">Show Profile</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" class="dropdown-item">
                        @csrf
                        <button type="submit" class="btn">Logout</button>
                    </form>
                </li>
            </ul>
        </div>

        @else
        <a href="{{ route('freetrial.index') }}">Free Trial</a>
        <a href="{{ route('loginView') }}" class="button-signIn">Sign In</a>
        @endauth
    </nav>
</header>
