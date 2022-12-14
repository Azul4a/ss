<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('build/assets/app.67dcdfd2.css') }}">
    <link href="{{ asset('build/assets/style.css') }}" rel="stylesheet" type="text/css" >
    <title>Document</title>
</head>

<body class="container">

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="{{ route('main.index') }}">Main</a>
                    <a class="nav-link" href="{{ route('about.index') }}">About</a>
                    <a class="nav-link" href="{{ route('product.index') }}">Shop</a>
                    <a class="nav-link" href="{{ route('post.index') }}">Posts</a>
                    <a class="nav-link" href="{{ route('contact.index') }}">Contacts</a>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')

</body>

</html>
