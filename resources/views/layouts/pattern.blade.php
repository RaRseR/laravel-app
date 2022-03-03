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
</head>

<body class="d-flex flex-column h-100">
    <header class="d-flex justify-content-center py-3">
        <ul class="nav nav-pills">
            <li class="nav-item"><a href="/" class="nav-link active" aria-current="page">Main</a></li>
            <li class="nav-item"><a href="#" class="nav-link">About</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Reviews</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Contacts</a></li>
            <li class="nav-item ">
                <button type="button" class="btn mx-2" data-bs-toggle="modal" data-bs-target="#signUpForm">
                    Sign Up
                </button>
                <button type="button" class="btn mx-2" data-bs-toggle="modal" data-bs-target="#signInForm">
                    Sign In
                </button>
            </li>
        </ul>

    </header>

    {{-- modals --}}
    <div class="modal" tabindex="-1" id="signUpForm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sign Up</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        @csrf
                        <input type="text" name="User_name" id="" class="form-control mt-1" placeholder="User name">
                        <input type="email" name="User_email" id="" class="form-control mt-1" placeholder="Email">
                        <div class="d-flex align-items-center">
                            <input type="password" name="Password" id="SignUpPass1" class="form-control mt-1"
                                placeholder="Password">
                            <img class="icon" src="img/icons/eye.svg" alt=""
                                onclick="ShowPassword('SignUpPass1')">
                        </div>
                        <div class="d-flex align-items-center">
                            <input type="password" name="Password" id="SignUpPass2" class="form-control my-1"
                                placeholder="Repeat password">
                            <img class="icon" src="img/icons/eye.svg" alt=""
                                onclick="ShowPassword('SignUpPass2')">
                        </div>
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="signInForm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sign In</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        @csrf
                        <input type="text" name="User_name" id="" class="form-control my-1" placeholder="User name">
                        <div class="d-flex align-items-center">
                            <input type="password" name="Password" id="SignUpPass" class="form-control my-1"
                                placeholder="Password">
                            <img class="icon" src="img/icons/eye.svg" alt=""
                                onclick="ShowPassword('SignUpPass')">
                        </div>
                        <button type="button" class="btn btn-primary">Sign In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- modals --}}

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
