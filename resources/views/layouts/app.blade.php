<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Google Maps -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script type="text/javascript">
      // let map;
      // var shops = [];
      // const philippines = { lat: 15.5000569, lng: 120.9109837 };
      //
      // function initMap() {
      //
      //   map = new google.maps.Map(document.getElementById("map"), {
      //     center: { lat: 15.5000569, lng: 120.9109837 },
      //     zoom: 8,
      //   });
      //
      //   console.log(shops);
      //   shops.forEach((shop) => {
      //     var marker = new google.maps.Marker(shop);
      //     marker.setMap(map);
      //   });
      //
      //
      //   google.maps.event.addListener(marker, 'dragend', function(event){
      //     // When marker is dragged, do this
      //     document.getElementById("lat").value = event.latLng.lat();
      //     document.getElementById("lng").value = event.latLng.lng();
      //   });
      // }
    </script>
    <style media="screen">
      /* Always set the map height explicitly to define the size of the div
             * element that contains the map. */
      #map {
        height: 100%;
      }

      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }

    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                  <!-- @if (Auth::user() && Auth::user()->type == 'admin')
                    Admin Home Page
                  @else
                    {{ config('app.name', 'Laravel') }}
                  @endif -->
                  <img class="img-fluid" src="{{ asset('img/logo.png') }}" alt="" width="90" height="72">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                      @if (Auth::user() && Auth::user()->type == 'admin')
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.shopowners') }}">{{ __('Shop Owners') }}</a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.shops') }}">{{ __('Shops') }}</a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.admins') }}">{{ __('Admins') }}</a>
                      </li>
                      @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                              <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->avatar }}">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ Route('profile') }}">
                                        {{ __('Profile') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
            @yield('content')
        </main>
    </div>
</body>
</html>
