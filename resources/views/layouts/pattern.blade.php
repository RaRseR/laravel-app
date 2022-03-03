<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel-App</title>
    <link rel="stylesheet" href="css/app.css">
</head>

<body class="d-flex flex-column h-100">
    <header class="d-flex justify-content-center py-3">
        <ul class="nav nav-pills">
            <li class="nav-item"><a href="/" class="nav-link active" aria-current="page">Главная</a></li>
            <li class="nav-item"><a href="#" class="nav-link">О компании</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Отзывы</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Контакты</a></li>
        </ul>
    </header>
    <div class="container">

        @yield('content')
        <div id="root">

        </div>

    </div>

    <footer class="footer mt-auto py-3">
        <span class="text-muted">&copy;Laravel-App 2022</span>
    </footer>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="{{mix('js/app.js')}}"></script> --}}
</body>

</html>
