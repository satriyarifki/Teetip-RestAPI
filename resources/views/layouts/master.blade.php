<!DOCTYPE html>
<html style="height: 100%">
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

  @stack('style')
</head>
<body data-base-url="{{url('/')}}" style="height: 100%">

  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column" style="background: linear-gradient(90deg, rgba(32,33,173,1) 0%, rgba(20,133,107,1) 100%)">
    <header class="masthead mb-auto">
      <div class="inner">
        <h3 class="masthead-brand">Cover</h3>
        @include('layout.header')
      </div>
    </header>
  
    @yield('content')
  
    <footer class="mastfoot mt-auto">
      <div class="container-fluid clearfix text-center text-white">
        <span class=" d-block text-center text-sm-left d-sm-inline-block text-white">Copyright ©  <a href="/" target="_blank">Teetip</a> 2022</span>
        </span>
      </div>
    </footer>
  </div>

  <!-- base js -->
  <script src="{{ asset('/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('/js/app.js') }}"></script>
  <!-- end base js -->

  <!-- common js -->
  <script src="{{ asset('/assets/plugins/chartjs/chart.min.js') }}"></script>
  <script src="{{ asset('/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
  <script src="{{ asset('/assets/js/dashboard.js') }}"></script>
  <script src="{{ asset('/assets/js/off-canvas.js') }}"></script>
  <script src="{{ asset('/assets/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('/assets/js/misc.js') }}"></script>
  <script src="{{ asset('/assets/js/settings.js') }}"></script>
  <script src="{{ asset('/assets/js/todolist.js') }}"></script>

  @stack('custom-scripts')
</body>
</html>