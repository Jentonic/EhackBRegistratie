<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        @yield ('head')
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <div class="col-md-10 col-md-offset-1">
            <div class="group ehackbg container-fluid">
                <nav class="navbar navbar-static-top">
                    <div class="container-fluid">
                        {{--<div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigationbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>--}}
                        {{--<div class="collapse navbar-collapse" id="navigationbar">--}}
                            <ul class="nav navbar-nav">
                            @if (Auth::guest())
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Registreren
                                        <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a class="nav-link" href="{{url('registercasual')}}">Ik speel casual</a></li>
                                        <li><a class="nav-link" href="{{url('register')}}">Maak een team</a></li>
                                        <li><a class="nav-link" href="{{url('registerteam')}}">Ga bij een publiek team</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('login') }}">Inloggen</a>
                                </li>
                            @else
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">
                                        {{ Auth::user()->firstName }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ url('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            </ul>
                        {{--</div>--}}
                    </div>
                </nav>
                <div class="text-center">
                    <a href="#"><img src="../img/logo.png" alt="logo" id="logo"></a>
                </div>
                @yield ('content')
            </div>
        </div>

        @yield ('scripts')
        <script src="/js/app.js"></script>
    </body>
</html>
