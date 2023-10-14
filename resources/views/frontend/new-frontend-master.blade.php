{{-- @include('frontend.partials.header')
@yield('content')
@include('frontend.partials.footer') --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap 5 Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/index.css') }}">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img class="img-fluid" src="{{ asset('assets/frontend/img/logos/logo.png') }}" alt="Logo" width="100" height="auto">
            </a>

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">home title</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">API List</a>
                </li>
            </ul>
            <form class="d-flex ms-auto">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            </form>
            <div class="ms-3">
                <button class="btn">Log-Out</button>
                <button class="btn btn-secondary me-2">Sign Up</button>
            </div>
        </div>
    </nav>

    @yield('content')
</body>

</html>