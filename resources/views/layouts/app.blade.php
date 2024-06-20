<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIM UPC</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <div class="header-overlay"></div> 
        <div class="image-container">
            <img src="{{ asset('images/Logo Alta Resolució.png') }}" alt="Logo">
        </div>
    </header>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
