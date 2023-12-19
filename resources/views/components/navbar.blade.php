<nav class="navbar">
    <ul>
        <li><a href="{{ route('pages.home') }}">Homepagina</a></li>
        <li><a href="{{ route('pages.categories') }}">Producten</a></li>
        <li><a href="{{ route('pages.cart') }}">Winkelwagen</a></li>
        <!-- Add more links as needed -->
        @auth
            <li><a href="{{ route('pages.profile') }}">Mijn account</a></li>
            <li><a href="{{ route('pages.logout') }}">Logout</a></li>
        @else
            <li><a href="{{ route('pages.viewlogin') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        @endauth
    </ul>
</nav>
