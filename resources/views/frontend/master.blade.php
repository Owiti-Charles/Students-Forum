<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Begin Head -->
<head>
    <meta charset="utf-8" />
    <title>Multimedia University Web Forum</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <!--srart theme style -->
    <link href="{{URL::to('frontend/css/main.css')}}" rel="stylesheet" type="text/css"/>
    <!-- end theme style -->
    <!-- favicon links -->
    <link rel="shortcut icon" type="image/png" href="{{URL::to('frontend/images/header/favicon.png')}}" />
    <script type="text/javascript" src="{{URL::to('frontend/js/jquery-1.12.2.js')}}"></script>
    <link href="{{URL::to('frontend/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <script type="text/javascript" src="{{URL::to('frontend/js/owl.carousel.js')}}"></script>
</head>
<body>
<!--Page main section start-->
<div id="educo_wrapper">
    <!--Header start-->

@include('frontend.includes.header')
<!--header end -->
@yield('content')

    <!--Footer Bottom section start-->
@include('frontend.includes.footerbootom')
<!--Footer Bottom section end-->
</div>
<!--main js file start-->
<script type="text/javascript" src="{{URL::to('frontend/js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{URL::to('frontend/js/modernizr.js')}}"></script>
<script type="text/javascript" src="{{URL::to('frontend/js/smooth-scroll.js')}}"></script>
<script type="text/javascript" src="{{URL::to('frontend/js/plugins/revel/jquery.themepunch.tools.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('frontend/js/plugins/revel/jquery.themepunch.revolution.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('frontend/js/plugins/revel/revolution.extension.layeranimation.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('frontend/js/plugins/revel/revolution.extension.navigation.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('frontend/js/plugins/revel/revolution.extension.slideanims.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('frontend/js/plugins/countto/jquery.countTo.js')}}"></script>
<script type="text/javascript" src="{{URL::to('frontend/js/plugins/countto/jquery.appear.js')}}"></script>
<script type="text/javascript" src="{{URL::to('frontend/js/custom.js')}}"></script>
@yield('scripts')
<!--main js file end-->
</body>
</html>