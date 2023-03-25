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
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="/">Event Manager</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteNamed('event') ? 'active' : '' }}" aria-current="page" href="/">Event</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteNamed('ticket-type') ? 'active' : '' }}" href="/ticket-type">Ticket Type</a>
                </li>                
            </ul>
            <form class="d-flex justify-content-between" action="/logout">                
                <div class="me-4 d-flex align-items-center">
                    {{ auth()->user()->name }}
                </div>           
                <button class="btn btn-sm btn-outline-danger" type="submit">Logout</button>
            </form>
            </div>
        </div>
    </nav>
    <div class="container p-4">
    @yield('content')
    </div>
    <script src="{{ asset('package/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('package/jquery/jquery.js') }}"></script>
    @yield('end_script')
</body>
</html>