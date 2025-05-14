<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HotelHub - MeMe Hotel</title>
    <link rel="stylesheet" href="../../site/public/vendor/fontawesome-free-5.11.2-web/css/all.min.css" />
    <link rel="stylesheet" href="../../site/public/vendor/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../site/public/css/style.css" />
    <link rel="shortcut icon" href="../../upload/Logo.ico" type="image/x-icon">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand ml-1" href="#"><img src="../../upload/Logo.png" alt="logo" />HotelHub</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menuCollapse">
                <ul id="nav-links" class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link p-2" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link p-2" href="#">Rooms</a></li>
                    <li class="nav-item">
                        <a class="nav-link p-2" href="#">Feedback</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-2" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-2" data-toggle="modal" data-target="#authModal" href="#"><i
                                class="fas fa-user"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>