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
                <div class="nav row text-center">
                    <div class="col-md-4"></div>
                    <div class="col-md-4"><a href="#"><img src="../img/logo.png" alt="logo" id="logo"></a></div>
                    <div class="col-md-4">
                        <!-- Authentication Links -->
                        <div class="right text-right">
                            @if (Auth::guest())
                                <h3 class=""><a href="{{ url('/login') }}">Login</a>/<a href="{{ url('/register') }}">Register</a></h3>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <h3>{{ Auth::user()->firstName }} <span class="caret"></span></h3>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        </div>
                    </div>
                </div>
                @yield ('content')
            </div>
        </div>

        @yield ('scripts')
        <script src="/js/app.js"></script>
    </body>
</html>
