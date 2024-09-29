<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIDIKA | Log in</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/SIDIKA.png') }}">

    {{-- Cdn JS --}}
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css"/>
    <link rel="stylesheet" href="{{ asset('assets/login/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page">
    @yield('login')
    
    
    {{-- Cdn JS --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/js/bootstrap.bundle.min.js"></script>

    {{-- Public --}}
    <script src="{{ asset('assets/login/js/adminlte.min.js') }}"></script>
</body>

</html>
