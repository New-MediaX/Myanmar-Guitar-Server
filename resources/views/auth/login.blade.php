  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>{{ config('app.name', 'Laravel') }} | Log In</title>
      <!-- Favicon -->
      <link rel="icon" href="{{ url('public/images/favicon.png') }}">
      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
      <!-- Font Awesome -->
      <link rel="stylesheet" href="{{asset('public/plugins/fontawesome-free/css/all.min.css')}}" />
      <!-- icheck bootstrap -->
      <link rel="stylesheet" href="{{asset('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}" />
      <!-- Theme style -->
      <link rel="stylesheet" href="{{asset('public/dist/css/adminlte.min.css')}}" />

      <!-- Scripts -->
      <script src="{{ asset('public/js/app.js') }}" defer></script>

      <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

      <!-- Styles -->
      <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
  </head>

  <body class="hold-transition login-page">
      <div id="app">
          <login-component url="{{config('vars.server_base_url')}}" id="1" url="{{config('vars.server_base_url')}}"></login-component>
      </div>

      <!-- jQuery -->
      <script src="{{asset('public/plugins/jquery/jquery.min.js')}}"></script>
      <!-- Bootstrap 4 -->
      <script src="{{asset('public/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <!-- AdminLTE App -->
      <script src="{{asset('public/dist/js/adminlte.min.js')}}"></script>
  </body>

  </html>