<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image" href="logo.png">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Company Management</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">    
    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"/>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/> -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body background="background/back.png">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a style='color: #444;' class="navbar-brand" href="{{ url('/') }}"><i class="fas fa-braille"></i> Company Management
                </a>

                @yield('menu')
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest                                                    
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><b>{{ __('Login') }} <i class="fas fa-sign-in-alt"></i> </b></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}"><b>{{ __('Register') }} <i class="fas fa-user-plus"></i></b></a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('companies.index') }}"><b><i class="fas fa-building"></i>&nbsp;{{ __('My Companies') }}&nbsp;|</b></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('projects.index') }}"><b><i class="fas fa-project-diagram"></i>&nbsp;{{ __('Projects') }}&nbsp;|</b></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('tasks.index') }}"><b><i class="fas fa-tasks"></i>&nbsp;{{ __('Tasks') }}&nbsp;|</b></a>
                            </li>
                            @if(Auth::user()->role_id == 1)
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i class="fas fa-user-tie"></i>
                                    Admin<span class="caret">&nbsp;</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/adminpro">
                                        <i class="fa fa-briefcase"></i>&nbsp;&nbsp;All Projects
                                    </a>
                                    <a class="dropdown-item" href="/users">
                                        <i class="fa fa-users"></i>&nbsp;&nbsp;All Users
                                    </a>
                                    <a class="dropdown-item" href="{{ route('tasks.index') }}">
                                       <i class="fa fa-tasks"></i>&nbsp;&nbsp;All Tasks
                                    </a>
                                    <a class="dropdown-item" href="/admincom">
                                        <i class="fa fa-building"></i>&nbsp;&nbsp;All Companies
                                    </a>
                                    <a class="dropdown-item" href="/adminroles">
                                       <i class="fa fa-envelope"></i>&nbsp;&nbsp;All Roles
                                    </a>
                                </div>

                            </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="position: relative; padding-left: 50px;">
                                    <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width: 32px; height: 32px; position: absolute; top: 5px; left: 10px;border-radius: 50%;" />
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="users/{{Auth::user()->id}}"><i class="fas fa-user-edit"></i>&nbsp;&nbsp;My Profile</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out-alt"></i>&nbsp;
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">


            @include('partials.errors')
            @include('partials.success')
            
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
