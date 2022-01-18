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

    <div class="p-3 text-white" style="background-color: #282838;">
        <div class="container mt-3 mb-4 text-center">
            <h3>Registration</h3>
        </div>
        <div class="card shadow-sm w-50 mx-auto" style="background-color: #242a30">
            <div class="card-body">
                <h5 class="card-title mt-2 mx-3">Make a New Account</h5>
                <div class="border-bottom mb-4 mx-3"></div>
                <main class="form-signin">
                    <form method="POST" action="/rangkitpc/register">
                        @csrf
                        <div class="mx-4 mb-4">
                            <input type="text" id="name" name="name" class="form-control shadow @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mx-4 mb-4">
                            <input type="email" id="email" name="email" class="form-control shadow @error('email') is-invalid @enderror" placeholder="E-mail" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mx-4">
                            <input type="password" id="password" name="password" class="form-control shadow @error('password') is-invalid @enderror" aria-describedby="passwordHelpBlock" placeholder="Password">
                            <div id="passwordHelpBlock" class="form-text mb-2">
                                Password must be 8+ characters long, with atleast 1 uppercase letter and a number.
                            </div>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mx-4 mb-4">
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control shadow @error('password') is-invalid @enderror" aria-describedby="passwordHelpBlock" placeholder="Password Confirmation">
                        </div>
                        <button class="d-grid gap-2 col-6 mx-auto btn btn-lg btn-primary mx-4 my-3" type="submit">Register</button>
                    </form>
                </main>
                <div class="border-bottom mt-4 mb-4 mx-3"></div>
                <div class="mt-4 mx-3">
                    <label>Already have an account? Log in <a href="/rangkitpc/login" class="text-decoration-underline">Here</a></label>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
