<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Menorah |School Management Portal</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{!! asset('multiselect/jquery-3.4.1.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('multiselect/chosen.jquery.min.js') !!}"></script>
<link rel="stylesheet" type="text/css" href="{!! asset('multiselect/chosen.min.css') !!}">
@yield('css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Menorah
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    
                </div>
            </div>
                @if(Session::has('msgErr'))
             <div style="margin-left: 30px; margin-right: 30px;" class="alert alert-danger">
            <a class="close" data-dismiss="alert">×</a>
            <strong>oops!</strong> {!!Session::get('msgErr')!!}
             </div>
              @endif
                                 @if(Session::has('msg'))
             <div style="margin-left: 30px; margin-right: 30px;"class="alert alert-info">
            <a class="close" data-dismiss="alert">×</a>
            <strong>Heads Up!</strong> {!!Session::get('msg')!!}
             </div>
              @endif
        </nav>
         

        @yield('content')
 
    </div>

    <!-- Scripts -->
    
    <script src="{{ asset('js/app.js') }}"></script>

       @yield('scripts')
</body>
</html>
