<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <style>
        .btn-info{
            color: white;
        }
    </style>
    @yield('css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand " href="{{ url('/home') }}">
                    HOME
                </a>
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
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('users.edit-profile') }}"
                                      >
                                        My Profile
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
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

        <main class="py-4">
            
           @auth
           <div class="container">
              @if(session()->has('sucs'))
                    <div class="alert alert-success text-center">
                        {{ session()->get('sucs')}}
                    </div>

                @endif
                @if(session()->has('err'))
                    <div class="alert alert-danger text-center">
                        {{ session()->get('err')}}
                    </div>

                @endif
            <div class="row">
                    <div class="col-md-4">
                        
                        <ul class="list-group">
                            <!-- checking if user is admin and displaying users list -->
                            @if(auth()->user()->isAdmin())
                            <li class="list-group-item">
                                <a href="{{ route('users.index')}}"> USERS </a>
                            </li>
                            @endif

                            
                            <li class="list-group-item">
                                <a href="{{ route('posts.index')}}"> POSTS </a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{ route('tags.index') }}"> TAGS </a>
                            </li>
                            
                            <li class="list-group-item">
                                <a href="{{ route('categories.index') }}"> CATEGORIES </a>
                            </li>

                        </ul>

                        <ul class="list-group mt-5">
                            <li class="list-group-item">
                                    <a href="{{ route('trashed-posts.index')}}"> TRASHED POSTS </a>
                            </li>
                        </ul>
                    </div>
                    

                    <div class="col-md-8">
                     @yield('content')
                    </div>
                </div>
           </div>
           @else
           @yield('content')
           @endauth
            
        </main>
    </div>

     <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    @yield('scripts')
    

</body>
</html>
