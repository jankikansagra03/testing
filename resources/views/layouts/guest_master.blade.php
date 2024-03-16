<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colorful Todo Application</title>
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/bootstrap.css">
    <script src="{{ URL::to('/') }}/js/jquery.js"></script>
    <script src="{{ URL::to('/') }}/js/popper.min.js"></script>
    <script src="{{ URL::to('/') }}/js/bootstrap.js"></script>
    <link rel="stylesheet" href="{{ URL::to('/') }}/fontawesome/css/all.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/style.css">

</head>

<body>

    <!-- Navigation -->
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#"><i class="fas fa-calendar-check"></i> Todo App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home"><i class="fas fa-home" style="color:white"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about"><i class="fas fa-info-circle"></i> About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact"><i class="fas fa-address-book"></i> Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login"><i class="fas fa-sign-in-alt"></i> Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register"><i class="fas fa-user-plus"></i> Register</a>
                </li>
            </ul>
        </div>
    </nav>

    <br>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Error!</strong> {{ session('error') }}
        </div>
    @endif
    @yield('dynamic_section');

    <!-- Footer -->
    <footer class="footer text-center">
        <div class="container">
            <span class="text-white">© 2024 Todo App. All rights reserved.</span>
        </div>
    </footer>
