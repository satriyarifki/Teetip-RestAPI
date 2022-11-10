<!DOCTYPE html>
<html>
<head>
  <title>Teetip</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- CSRF Token -->
  <meta name="_token" content="{{ csrf_token() }}">
  
  <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

  <link rel="stylesheet" href="public/assets/plugins/perfect-scrollbar/perfect-scrollbar.css">
  <link rel="stylesheet" href="public/assets/plugins/@mdi/font/css/materialdesignicons.min.css">
  <link href="{{ asset('/assets/plugins/plugin.css') }}" rel="stylesheet">


  <!-- common css -->
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
  <!-- end common css -->
</head>
<body data-base-url="{{url('/')}}">

  <div class="container-scroller" id="app">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      @yield('content')
    </div>
  </div>

  <script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>