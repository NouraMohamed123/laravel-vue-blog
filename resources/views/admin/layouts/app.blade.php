<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Styles -->
    <link href='{{asset("css/app.css")}}' rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link href='{{asset("assets/css/bootstrap.min.css")}}' rel="stylesheet">
  <link href='{{asset("assets/css/font-awesome.min.css")}}' rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href='{{asset("assets/css/added_style.css")}}' rel="stylesheet">
  <link rel="/stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

</head>
<body>
    <div id="app">
        <div class="wrapper">
             @include('admin.layouts.sidebar')
              @yield('content')
        </div>
    </div>



  <script src="{{asset('assets/js/jquery.min.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('js/app.js')}}"></script>
</body>
</html>

