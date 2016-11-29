<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>EhackB</title>
        @yield ('head')
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/style.css">
    </head>

    <body>
        <div class="col-md-10 col-md-offset-1">
            <div class="group ehackbg container-fluid">
                <nav class="navbar navbar-static-top">
                    <div class="container-fluid">
                            <ul class="nav navbar-nav">
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ url('/') }}">Home</a>
                              </li>
                            @if (Auth::guest())
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Registreren
                                        <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a class="nav-link" href="{{url('registercasual')}}">Gewoon registreren</a></li>
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
                                        {{ Auth::user()->firstName. " ".Auth::user()->lastName }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ url('show') }}">
                                                Toon profiel
                                            </a>
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
                    <a href="{{url('/')}}"><img src="/img/logo.png" alt="logo" id="logo"></a>
                </div>
                @yield ('content')
            </div>
        </div>
        <script type="text/javascript" src="{{ asset('bower/jquery/dist/jquery.min.js') }}"></script>
        @yield ('scripts')
        <script src="/js/app.js"></script>
        <!-- Piwik -->
        <script type="text/javascript">
          var _paq = _paq || [];
          _paq.push(["setDomains", ["*.hack.ehb.be","*.ehackb.be"]]);
          _paq.push(['trackPageView']);
          _paq.push(['enableLinkTracking']);
          (function() {
            var u="//www.arco.me/piwik/";
            _paq.push(['setTrackerUrl', u+'piwik.php']);
            _paq.push(['setSiteId', '1']);
            var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
            g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
          })();
        </script>
        <noscript><p><img src="//www.arco.me/piwik/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
        <!-- End Piwik Code -->
    </body>
</html>
