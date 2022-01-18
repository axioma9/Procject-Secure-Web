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
    <title>{{ $title }} - Rangkit PC</title>
    <link rel="icon" href="{{ asset('/assets/logo.png') }}"/>
</head>
<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="js/bootstrap.min.js" type="text/javascript" rel="script"></script>
    <script src="js/jquery-1.11.3.min.js" type="text/javascript" rel="script"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
        <div class="container align-items-center justify-content-center">
            <a class="navbar-brand ms-4" href="/rangkitpc/browse">
                <img src="{{ URL::to('/assets/logo.png') }}" width="40" height="32" class="d-inline-block align-text-top">
                Rangkit PC
            </a>
        </div>
    </nav>

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
    </svg>

    <div class="p-3 text-white" style="background-color: #282838;">
        {{-- alert --}}
        @if (session()->has('success'))
            <div class="alert alert-success d-flex align-items-cente alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('loginerror'))
            <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                {{ session('loginerror') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- end alert --}}
        <div class="container mt-3 mb-4 text-center">
            <h3>Your Account</h3>
        </div>
        <div class="card shadow w-50 mx-auto" style="background-color: #242a30">
            <div class="card-body">
                <h5 class="card-title mt-2 mx-3">Log In</h5>
                <div class="border-bottom mb-4 mx-3"></div>
                <main class="form-signin">
                    <form method="POST" action="/rangkitpc/login">
                        @csrf
                        <div class="mx-4 mb-4">
                            <input type="email" id="email" name="email" class="form-control shadow @error('email') is-invalid @enderror" placeholder="E-mail" value="{{ old('email') }}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mx-4 mb-4">
                            <input type="password" id="password" name="password" class="form-control shadow @error('password') is-invalid @enderror" placeholder="Password">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button class="d-grid gap-2 col-6 mx-auto btn btn-lg btn-primary mx-4 my-3" type="submit">Log In</button>
                    </form>
                </main>
                <div class="border-bottom mt-4 mb-4 mx-3"></div>
                <div class="mt-4 mx-3">
                    <label>Dont have an account? Register <a href="/rangkitpc/register" class="text-decoration-underline">Here</a></label>
                </div>
                <div class="mt-2 mx-3">
                    {{-- <label>Forgot password? Click <a href="/rangkitpc/register" class="text-decoration-underline">Here</a></label> --}}
                </div>
            </div>
        </div>
    </div>
</body>
</html>
