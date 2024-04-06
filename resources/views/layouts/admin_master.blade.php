<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colorful Todo Application</title>

    <link rel="stylesheet" href="{{ URL::to('/') }}/css/bootstrap.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/style.css">
    <script src="{{ URL::to('/') }}/js/jquery.js"></script>
    <script src="{{ URL::to('/') }}/js/popper.min.js"></script>
    <script src="{{ URL::to('/') }}/js/bootstrap.js"></script>
    <link rel="stylesheet" href="{{ URL::to('/') }}/fontawesome/css/all.css">

</head>

<body>

    <!-- Navigation -->
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><i class="fas fa-calendar-check"></i> Todo App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ URL::to('/') }}/user_dashboard"><i class="fas fa-home"
                            style="color:white"></i> Admin Dashbord</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ URL::to('/') }}/add_task"><i class="fa-solid fa-list fa-lg"></i>&nbsp;
                        Manage Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ URL::to('/') }}/view_list"><i class="fa-solid fa-list-ol fa-lg"></i>
                        &nbsp;Manage Tasks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ URL::to('/') }}/view_completed_list"><i
                            class="fa-solid fa-list-check fa-lg"></i>&nbsp; View Completed List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ URL::to('/') }}/admin_edit_profile"><i
                            class="fa-solid fa-address-card"></i>&nbsp; Edit Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ URL::to('/') }}/change_password"><i
                            class="fa-solid fa-lock fa-lg"></i>&nbsp; Change Password</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ URL::to('/') }}/logout"><i
                            class="fa-solid fa-right-from-bracket fa-lg"></i>&nbsp; Logout</a>
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
