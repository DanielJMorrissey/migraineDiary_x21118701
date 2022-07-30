<!DOCTYPE html>
<html  class="h-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="migraine, Migraine, headache, headaches, diary, GP, gp, analysis, migraine trigger, migraine triggers, trigger, triggers" />
        <meta name="description" content="an online migraine diary with GP visit tracking and analysis of potential migraine triggers to aid in the determination of a persons migraine trigger or triggers" />
        @yield('title')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
        <link href="{{asset('css/migrainestyle.css')}}" rel="stylesheet">
    </head>
    <body id="body" class="d-flex flex-column h-100" style="overflow-x:hidden">
        <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    {{-- 
                        Navigation menu
                        links between @guest and @else show when user is not logged in
                        links between @else and @endguest show when user is logged in
                        home link will show regardless if user is logged in or not
                        route function uses the name of the route in routes/web.php, this makes changes easier to make    
                    --}}
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('loggingin') }}">Log In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('registerUser') }}">Register</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('diary') }}">Diary</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('gpTracker') }}">GP Tracker</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('analysisPage') }}">Trigger Analysis</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Log Out</a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @yield('maincontent')
            
            <footer class="footer mt-auto py-3 navbar-light">
                <div class="container">
                    <hr />
                    <span id="copyright">
                    </span>
                </div>
            </footer>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="{{ asset('js/migrainediary.js') }}"></script>
    </body>
</html>