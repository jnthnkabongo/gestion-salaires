<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion de salaire employés</title>
    <link href="{{ asset('dist/css/bootstrap.css') }}" rel="stylesheet" >
    <link href="{{ asset('dist/css/bootstrap.min.css') }}" rel="stylesheet" >
    <link href="{{ asset('dist/fontawesome-free/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/style.css') }}" rel="stylesheet" >
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>
    <nav id="nav" class="navbar navbar-expand-lg navbar-dark bg-success" aria-label="Eighth navbar example">
       <div class="container">
        <a class="navbar-brand" href="#">Gestion des Salaires Employés</a>
       </div>
    </nav>
    <div class="container-fluid">
        @yield('content')
    </div>
    <script src="{{ asset('dist/js/bootstrap.js') }}"></script>
    <script src="{{ asset('dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/fontawesome-free/js/all.js') }}"></script>
    </body>
</html>
