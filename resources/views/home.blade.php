<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <title>X Office</title>
  <link rel="icon" href="{{ asset('images/logos/logo-with-black-bg.svg') }}" type="image/icon type">

  <meta name="role" content="{{$role}}">
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
  
  <div id="app">
    <keep-alive>
      <router-view></router-view>
    </keep-alive>
  </div>
  
  <!-- Scripts -->
  <script src="{{ asset('js/app.js')}}"></script>
  
</body>
</html>