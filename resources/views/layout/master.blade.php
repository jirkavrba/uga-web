<!doctype html>
<html lang="cs">
<head>
    <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> <meta http-equiv="X-UA-Compatible" content="ie=edge"> <title>UGA &mdash; Univerzitní Gaming Asociace</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/926e679c11.js" crossorigin="anonymous"></script>
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
            integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
            crossorigin="anonymous"></script>

    <style>
        .bg-discord {
            background: #7289DA;
        }

        .bg-admin {
            background: #dd5555;
        }

        .text-discord {
            color: #7289DA;
        }
    </style>
</head>
<body>
@section("header")
    <header class="@admin bg-danger @else bg-discord @endadmin">
        <div class="container pb-2 pt-5">
            <div class="row d-flex align-items-center">
                <div class="col-sm-12 col-md-6 text-center text-md-left">
                    <h1 class="h1 text-white font-weight-bold">UGA</h1>
                    <h2 class="lead text-white">Univerzitní Gaming Asociace</h2>
                </div>
            </div>
        </div>
    </header>
@show
<nav class="navbar navbar-expand-lg navbar-dark @admin bg-admin @else bg-dark @endadmin text-white">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('index') }}">Domů</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Novinky</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Akce</a>
                </li>

                @admin
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("administration.index") }}">
                        <i class="fas fa-lock fa-xs mr-1"></i>
                        Správa webu
                    </a>
                </li>
                @endadmin
            </ul>
            <ul class="navbar-nav ml-auto">
                @auth
                    <li class="nav-item">
                        <div class="nav-link">
                            <img src="{{ auth()->user()->gravatar(20) }}" class="rounded-circle">
                            {{ auth()->user()->name }}
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("authentication.logout") }}" tabindex="-1"
                           aria-disabled="true">
                            <i class="fas fa-sign-out-alt mr-1"></i>
                            Odhlásit se
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('authentication.gate') }}"
                           tabindex="-1">
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            Přihlášení / Registrace
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
<main>
    @if ($errors->any())
        <div class="mt-5 container">
            <div class="alert alert-danger border-0">
                <b class="title">Došlo k chybám</b><br>
                <hr>
                @foreach($errors->all() as $error)
                    <span>{{ $error }}</span>
                    @unless($loop->last) <br> @endunless
                @endforeach
            </div>
        </div>
    @endif
    <div class="mt-5">
        @yield("content")
    </div>
</main>
</body>
</html>
