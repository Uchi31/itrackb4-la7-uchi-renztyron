<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'My Book Site')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Renz Book List</h1>
        <p>Prepared by: Renz Tyron Uchi</p>

        @include('partials._nav')

        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif

        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>