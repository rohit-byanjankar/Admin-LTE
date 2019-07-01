<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8">
    <title> Chyasal </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->


    <link rel="stylesheet" type="text/css" href="{{url('css/workwise/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/workwise/responsive.css')}}">
    <!-- Styles -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title></title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

</head>
<body class="sign-in">
<div class="wrapper">
    <div class="sign-in-page">
        <div class="signin-popup">
            <div class="signin-pop">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="cmp-info">
                            <div class="cm-logo">
                                {{--<img src="{{asset('uploads/1559734818.png')}}" alt="" height="150px" width="350px">--}}
                                <p>{{session('basic_settings.0.3.value')}}</p>
                            </div>
                        </div>
                    </div>

                    @yield('content')

                    <div class="footy-sec">
                        <div class="container ">
                            <ul>
                                <li><a href="#" title="">Privacy Policy</a></li>
                                <li><a href="#" title="">Community Guidelines</a></li>
                                <li><a href="#" title="">Language</a></li>
                                <li><a href="#" title="">Copyright Policy</a></li>
                            </ul>

                            <p><img src="images/copy-icon.png" alt="">Copyright 2018</p>
                        </div>
                    </div>
                    <!--footy-sec end-->
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#tabs").tabs();
        });
    </script>
@yield('scripts')
</body>

</html>