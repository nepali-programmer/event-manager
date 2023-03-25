<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('package/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <title>Event Manager</title>
</head>
<body>    
    @yield('content')
    <script src="{{ asset('package/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('package/jquery/jquery.js') }}"></script>
    @yield('end_script')
</body>
</html>