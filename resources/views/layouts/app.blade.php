<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="api-token" content="{{ auth()->check() ? auth()->user()->api_token: '' }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    @stack('styles')
</head>
<body>
    @include('layouts.partials.navbar')

    @if(auth()->check())
        <section class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <ul class="nav nav-stacked">
                                <li><a href="{{ route('admin.index') }}">Admin Users</a></li>
                                <li><a href="{{ route('teacher.index') }}">Teacher Users</a></li>
                                <li><a href="{{ route('parent.index') }}">Parent Users</a></li>
                                <li><a href="{{ route('grade.index') }}">Manage Class</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <h2>{{ date('d') }}</h2>
                        <h3>{{ date('M') }}</h3>
                    </div>
                </div>
                <div class="col-md-9">
                    @yield('content')
                </div>
            </div>
        </section>
    @else
        <section class="container-fluid">
            @yield('content')
        </section>
    @endif

    
    @include('layouts.footer')

    <!-- Scripts -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    @stack('scripts')
</body>
</html>
