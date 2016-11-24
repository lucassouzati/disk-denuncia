<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DiskDenuncia') }}</title>

    <!-- Styles -->
    <!-- <link href="/css/app.css" rel="stylesheet"> -->
    <!-- Bootstrap 3.3.7 -->
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <style media="screen">
    .navbar-default {
        background-color: #fff;
        background-repeat: no-repeat;

    }
    .navbar-default .navbar-brand {
      color: #ef4724;
    }
    </style>
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div >
        
    </div>
    <div id="app">
        
        @if(Session::has('flash_message'))
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div align="center" class="alert {{ Session::get('flash_message')['class'] }}">
                        {{ Session::get('flash_message')['msg'] }}
                    </div>
                </div>
            </div>
        </div>

    @endif
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
