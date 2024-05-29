<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="classname">
            <section>
                <center>
                    <img src="{{ asset('asset/Ellipse 63.png') }}" alt="Header" width="100" height="100">
                    <h1>Lost & Found</h1>
                </center>
            </section>
        </div>
    </header>
    @yield('content')
    <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>
</html>
