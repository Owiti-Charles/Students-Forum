<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>redirecting</title>

    <!-- Fonts -->

    <link href="{{URL::to('css/app_1.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('css/app_2.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<?php
//   if(Auth::user()->role->name=='coordinator'){
//       header("refresh:4;url=http://localhost/pms/public/coordinator");
//   }
header("refresh:4;url=http://localhost/webforum/public/login");

?>
<body>
<div class="flex-center position-ref full-height">

    <div class="content">
        <div class="title m-b-md" >
            Please Wait <br>

        </div>
        <div class="body m-b-md" >
            Redirecting to your Dashboard <br>

        </div>
        
        @if(Auth::user()->roles->name=='admin')
            <a href="{{route('admin.index')}}" class="btn btn-warning btn-large">Back to Dashboard</a>
        @endif
        @if(Auth::user()->roles->name=='lecturer')
            <a href="{{route('lecturer.index')}}" class="btn btn-warning btn-large">Back to Dashboard</a>
        @endif
        @if(Auth::user()->roles->name=='student')
            <a href="{{route('student.index')}}" class="btn btn-warning btn-large">Back to Dashboard</a>
        @endif

    </div>
</div>
</body>
</html>
