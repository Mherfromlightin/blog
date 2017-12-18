<div class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            <a class="blog-nav-item" href="{{ url('articles') }}">Articles</a>
            <a class="blog-nav-item" href="{{ url('articles/create') }}">New article</a>
            <a class="blog-nav-item" href="{{ url('categories') }}">Categories</a>
            <a class="blog-nav-item" href="{{ url('categories/create') }}">New Category</a>
            @if(auth()->check())
                <form action="{{ url('logout') }}" method="POST" style="display: inline-block" class="navbar-right">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary" style="background: transparent; border: none">Logout</button>
                </form>
            @else
                <a class="blog-nav-item navbar-right" href="{{ url('login') }}">Login</a>
                <a class="blog-nav-item navbar-right" href="{{ url('register') }}">Sing Up</a>
            @endif
        </nav>
    </div>
</div>