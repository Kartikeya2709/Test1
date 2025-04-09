<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 mb-4">
        <a class="navbar-brand" href="{{ route('posts.index') }}">MyBlog</a>

        <div class="ms-auto">
            @guest
                <a class="btn btn-outline-light me-2" href="{{ route('login') }}">Login</a>
                <a class="btn btn-outline-light" href="{{ route('register') }}">Register</a>
            @endguest

            @auth
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button class="btn btn-outline-light" type="submit">Logout</button>
                </form>
            @endauth
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <script>
        function confirmDelete(event, form) {
            event.preventDefault();
            if (confirm('Are you sure you want to delete this post?')) {
                form.submit();
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
