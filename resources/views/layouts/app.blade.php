<!DOCTYPE html>
<html>
<head>
    <title>Mini E-commerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                @if(session('user_id'))
                    <li class="nav-item">
                        <form method="POST" action="{{ url('logout') }}">
                            @csrf
                            <button class="btn btn-link nav-link">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ url('login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('register') }}">Register</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>

@yield('content')

</body>
</html>
