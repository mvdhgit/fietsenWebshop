<!-- authenticated.blade.php -->
<div class="user-info">
    Welcome, {{ Auth::user()->name }}!
    <form method="POST" action="{{ route('pages.logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>

</div>
@yield('content')
