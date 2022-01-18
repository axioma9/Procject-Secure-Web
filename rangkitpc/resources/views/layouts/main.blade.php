<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="css/style.css"> --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    {{-- <title>@yield('title') - Rangkit PC</title> --}}
    @if ( $title == 'Product')
    <title>{{ $product->name }} - {{ $title }} - Rangkit PC</title>
    @else
    <title>{{ $title }} - Rangkit PC</title>
    @endif
    <link rel="icon" href="{!! asset('/assets/logo.png') !!}"/>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="js/bootstrap.min.js" type="text/javascript" rel="script"></script>
    <script src="js/jquery-1.11.3.min.js" type="text/javascript" rel="script"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
        <div class="container-fluid">

            <a class="navbar-brand ms-4" href="/rangkitpc/browse">
                <img src="{{ URL::to('/assets/logo.png') }}" alt="" width="40" height="32" class="d-inline-block align-text-top">
                Rangkit PC
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">

                <ul class="navbar-nav me-3 mb-2 mb-lg-0">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Welcome {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="/rangkitpc/adminonly" hidden>Admin Only</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <form action="/rangkitpc/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="/rangkitpc/login">Login</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/rangkitpc/register">Register</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <header class="py-3" style="background-color: #242a30">
        <div class="container d-flex flex-wrap justify-content-center">
            <a href="/rangkitpc/builder" class="d-flex align-items-center mb-3 mb-lg-auto me-5 text-dark text-decoration-none text-white">
                <img src="{{ URL::to('/assets/pc.png') }}" width="35" height="35" class="d-inline-block align-text-top me-2">
                <span class="fs-5 mb-1">PC Builder</span>
            </a>
            <a href="/rangkitpc/browse" class="d-flex align-items-center mb-3 mb-lg-auto me-lg-auto text-dark text-decoration-none text-white">
                <img src="{{ URL::to('/assets/cpu.png') }}" width="35" height="35" class="d-inline-block align-text-top me-2">
                <span class="fs-5 mb-1">Browse All Parts</span>
            </a>
            @if ($title == "Browse All Parts")
                <form class="col-12 col-lg-auto mb-3 mb-lg-0">
                    <input type="search" class="form-control" placeholder="Search..." aria-label="Search" id="search">
                </form>
            @endif
        </div>
    </header>

    <div class="p-3 text-white" style="background-color: #282838;">
        @yield('content')
    </div>

    <footer class="footer mt-auto py-2 bg-dark text-white">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="/rangkitpc/builder" class="nav-link px-2 text-muted">PC Builder</a></li>
        <li class="nav-item"><a href="/rangkitpc/browse" class="nav-link px-2 text-muted">Browse All Parts</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
        </ul>
        <p class="text-center text-muted">&copy; 2021 Company, Inc</p>
    </footer>

</body>
</html>
