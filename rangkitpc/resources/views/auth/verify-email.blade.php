<!DOCTYPE html>
{{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> --}}
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
        <title>Verify Email - Rangkit PC</title>
        <link rel="icon" href="{!! asset('/assets/logo.png') !!}"/>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

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
                        <a href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Welcome {{ auth()->user()->name }}
                        </a>
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
            </div>
        </header>

        <div class="p-3 text-white" style="background-color: #282838;">
            <div class="card shadow w-50 mx-auto" style="background-color: #242a30">
                <div class="card-body">
                    <div class="mb-4 text-sm text-gray-600">
                        Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
                    </div>

                    @if (session('status') == 'verification-link-sent')
                        <div class="mb-4 font-medium text-sm text-green-600">
                            A new verification link has been sent to the email address you provided during registration.
                        </div>
                    @endif

                    <div class="mt-4 flex items-center justify-between">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-light">Resend Verification Email</button>
                        </form>
                        <div class="border my-2"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-light">Log Out</button>
                        </form>
                    </div>
                </div>
            </div>
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
