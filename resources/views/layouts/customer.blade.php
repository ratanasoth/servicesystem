<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Customer Portal | Vdoo</title>
    <!-- Styles -->
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/datepicker.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
        <link rel="stylesheet" href="{{asset("chosen/chosen.css")}}">
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset("css/table.css")}}">
</head>
<body>
<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
    <div class="container">
            <button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="#">Vdoo</a>
            
                <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                    <ul class="navbar-nav mr-auto mn">
                        <li class="nav-item" id="menu_home">
                            <a class="nav-link" href="{{url('/customer/home')}}">Home</a>
                        </li>
                        <li class="nav-item" id="menu_product">
                                <a class="nav-link" href="{{url('/customer/product')}}">Products/Services</a>
                            </li>
                        <li class="nav-item" id="menu_request">
                            <a class="nav-link" href="{{url('/customer/request')}}">Requests</a>
                        </li>
                         <li class="nav-item" id="menu_feedback">
                            <a class="nav-link" href="{{url('/customer/feedback')}}">Feedbacks</a>
                        </li>
                         <li class="nav-item" id="menu_task">
                            <a class="nav-link" href="{{url('/customer/task')}}">Task Progression</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="nav1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{session('customer')->username}}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="nav1">
                                <a class="dropdown-item" href="{{url('/customer/profile/'.session('customer')->id)}}"><i class="fa fa-user text-primary"></i> &nbsp;Profile</a>
                                <a href="{{url('/customer/logout')}}" class="dropdown-item"><i class="fa fa-sign-out text-success"></i> &nbsp;Logout</a>
                            </div>
                        </li>
                    </ul>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
    </div>
</nav>
<div class="container">
    <div class="row">
        <main class="col-sm-12">
            @yield('content')
        </main>
    </div>
</div>
<!-- Scripts -->
<script>
    var burl = "{{url('/')}}";
</script>
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('js/tether.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
@yield('js')
</body>
</html>
