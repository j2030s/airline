<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>







    <style>
        body {
          display: flex;
          flex-direction: column;
          min-height: 100vh;
        }
        .content {
          flex: 1;
        }
        .footer {
          background-color: #f8f9fa;
          padding: 20px 0;
          text-align: center;
        }
      </style>










</head>
<body>
    <body class="d-flex flex-column h-100">
        <header>
            <div id="app">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark ms-auto shadow-sm fixed-top">
                    <div class="container">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            PUC AIRLINES
                        </a>
                    
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav me-auto">
        
                            </ul>
        
                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ms-auto">
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
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>
        
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            @if(Auth::user()->role_id === 1)
                                                <a class="dropdown-item" href="{{ route('admin') }}">
                                                    My Profile
                                                </a>
                                            @elseif(Auth::user()->role_id === 2)
                                                <a class="dropdown-item" href="{{ route('user') }}">
                                                    My Profile
                                                </a>
                                            @endif
                                            
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
            </div>
        </header>
        
        
        <!-- Main Content -->
    <main class="flex-grow-1 d-flex mt-5">

        @if(!isset($hideNav) || !$hideNav)
        <!-- Sidebar -->
        <nav id="sidebar"  class="bg-dark text-light position-fixed " style="height: 100%;width:180px; ">
        <!-- Sidebar content goes here -->
        <ul class="nav  flex-column  "  >
           <br><br><br>
          @yield('side-items')
        </ul>
   </nav>

   @endif








   
   <!-- Your main content goes here -->
   <div class="container-fluid " style="margin-top: 56px;">
       <div class="row">
           <!-- Content area, adjust the classes based on your design -->
           <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('warning'))
    <div class="alert alert-warning">
        {{ session('warning') }}
    </div>
@endif
@if (session('info'))
    <div class="alert alert-info">
        {{ session('info') }}
    </div>
@endif
               @yield('content')
           </main>
       </div>
   </div>
    </main>
   



     <div class="container mb-5">
       <br><br><br>
       </div> 




<!-- Footer -->
<footer class="footer bg-dark navbar-dark mt-auto position-relative">
   <div class="container-fluid col-md-9 text-light">
       <div class="row">
           <div class="col-md-4">
               <h5>Contact Us</h5>
               <p>Email: info@yourairlinesystem.com</p>
               <p>Phone: +1 (555) 123-4567</p>
           </div>
           <div class="col-md-4">
               <h5>Quick Links</h5>
               <ul class="list-unstyled">
                   <li><a href="#">Where We Fly</a></li>
                   <li><a href="#">User Experience</a></li>
                   <li><a href="#">Help</a></li>
                   <li><a href="#">About Us</a></li>
                   <li><a href="#">Terms & Conditions</a></li>
                   <li><a href="#">Privacy Policy</a></li>
               </ul>
           </div>
           <div class="col-md-4">
               <h5>Connect with Us</h5>
               <ul class="list-unstyled">
                   <li><a href="#" target="_blank">Facebook</a></li>
                   <li><a href="#" target="_blank">Twitter</a></li>
                   <li><a href="#" target="_blank">Instagram</a></li>
               </ul>
           </div>
      
</footer>
</body>
</html>