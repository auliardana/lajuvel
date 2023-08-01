<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Your App')</title>
    <!-- Add your CSS and other head elements here -->
</head>
<body>
    <!-- Navigation bar -->
    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/login">login</a></li>
            <li><a href="/register">register</a></li>
            <li><a href="/admin/dashboard">dashboard admin</a></li>
            <li><a href="/index">products</a></li>
            <li><a href="/products/10">show</a></li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
            <br>
            <li><a href="{{route('carts.create')}}">addToCart</a></li>
            <!-- Add more navigation items as needed -->
        </ul>
    </nav>

    <!-- Content section -->
    <div class="container">
        @yield('content')
    </div>

    <!-- Footer section -->
    <footer>
        <!-- Add footer content here -->
    </footer>

    <!-- Add your JavaScript files and other scripts here -->
</body>
</html>
