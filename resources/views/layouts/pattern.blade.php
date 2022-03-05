<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel-App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/app.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="d-flex flex-column h-100">
    <header class="d-flex justify-content-center py-3">
        <ul class="nav nav-pills">
            <li class="nav-item"><a href="/" class="nav-link active" aria-current="page">Main</a></li>
            <li class="nav-item"><a href="#" class="nav-link">About</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Reviews</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Contacts</a></li>
            <li class="nav-item ">
                @if (Auth::check())
                    <a href="#" class="btn">Profile</span></a>
                    <button type="button" class="btn mx-2" onclick="signOut()">
                        Sign Out
                    </button>
                @else
                    <button type="button" class="btn mx-2" data-bs-toggle="modal" data-bs-target="#signUpForm">
                        Sign Up
                    </button>
                    <button type="button" class="btn mx-2" data-bs-toggle="modal" data-bs-target="#signInForm">
                        Sign In
                    </button>
                @endif
            </li>
        </ul>

    </header>



    <div class="container">
        @yield('content')
    </div>

    <footer class="footer mt-auto py-3 d-flex justify-content-center ">
        <span class="text-muted">&copy;Laravel-App 2022</span>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="js/app.js"></script>
    <script src="js/index.js"></script>
</body>

</html>
