<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Qais Construction System')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Italiana&display=swap" rel="stylesheet">
    <style>
        body {
            padding-top: 70px; 
        }
        .navbar {
            margin-bottom: 30px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }
        .container {
            margin-top: 20px;
        }
        .navbar-brand {
            display: flex;
            align-items: center;
        }
        .navbar-brand img {
            height: 60px;
            margin-right: 10px; 
        }
        .navbar-brand span {
            font-family: 'Italiana', serif;
            font-size: 24px;
            font-weight: bold;
        }
        .navbar-nav {
            margin-left: auto;
        }
        .navbar-nav .nav-item {
            margin-left: 15px; 
        }
        .hero {
            background-image: url('{{ asset('images/construction-bg.jpg') }}');
            background-size: cover;
            background-position: center;
            height: 400px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
        }
        .hero h1 {
            font-size: 48px;
            font-weight: bold;
        }
        .hero p {
            font-size: 24px;
        }
        .features {
            display: flex;
            justify-content: space-around;
            text-align: center;
            margin-top: 50px;
        }
        .features .feature {
            width: 30%;
        }
        .features .feature img {
            width: 350px;
            margin-bottom: 20px;
            /* border-radius: 50%; */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .features .feature h3 {
            margin-top: 10px;
            font-size: 22px;
        }
        .features .feature p {
            font-size: 16px;
            color: #666;
        }
        @media print {
            body * {
                visibility: hidden;
            }
            .container, .container * {
                visibility: visible;
            }
            .container {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
            .btn, .navbar {
                display: none;
            }
            .card {
                page-break-inside: avoid;
                -webkit-print-color-adjust: exact;
            }
            .card-header {
                font-size: 20px;
                font-weight: bold;
                text-align: center;
                padding: 10px;
            }
            .card-body {
                font-size: 18px;
                line-height: 1.6;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/logo.png') }}" alt="Qais Construction Logo">
            <span>Qais Construction</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('companies.index') }}">Companies</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('employees.index') }}">Employees</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('attendances.index') }}">Attendance</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('expenses.index') }}">Manage Expenses</a></li>
            </ul>
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('profile.show') }}">
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
    </nav>
    
    <!-- <div class="hero">
        <div>
            <h1>Welcome to Qais Construction</h1>
            <p>Your Trusted Partner in Construction</p>
        </div>
    </div> -->
    
    <div class="container">
        <div class="features">
            <div class="feature">
                <img src="{{ asset('images/quality.jpg') }}" alt="Quality">
                <h3>Quality</h3>
                <p>We provide the highest quality construction services.</p>
            </div>
            <div class="feature">
                <img src="{{ asset('images/reliability.jpg') }}" alt="Reliability">
                <h3>Reliability</h3>
                <p>We are reliable and complete projects on time.</p>
            </div>
            <div class="feature">
                <img src="{{ asset('images/safety.png') }}" alt="Safety">
                <h3>Safety</h3>
                <p>We prioritize safety in all our projects.</p>
            </div>
        </div>
    </div>
    
    <div class="container">
        @include('special-page')
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
