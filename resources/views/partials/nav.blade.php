<ul>
    @if(Auth::check())
            <li><a href="{{ url('logout') }}">Logout</a></li>
    @else
        <li><a href="{{ url('login') }}">Login</a></li> 
    @endif
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('/post/create') }}">créer un post</a></li>
        <li><a href="{{ url('/post') }}">Administration des posts</a></li>
</ul>