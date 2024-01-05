<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your Laravel App</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="ml-8 mr-8">
        @yield('content')
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
