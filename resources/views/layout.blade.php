<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Pet Tracker - @yield('title')</title>
  <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="{{ asset('css/freelancer.css') }}" rel="stylesheet">
  <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
  <!-- Custom Fonts -->
  <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link rel="stylesheet"  type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.10/themes/redmond/jquery-ui.css" />
</head>
<body id="page-top" class="index">
  <!-- Navigation -->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header page-scroll">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <img src="{{ asset('img/logo.png') }}" class="logo"><a class="navbar-brand" href="{{ asset('') }}"> PET TRACKER</a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li class="hidden">
            <a href="#page-top"></a>
          </li>
          @if (Auth::guest()) <!-- guest user -->
          <li>
            <a href="{{ asset('login') }}"> Login/Join</a>
          </li>
          <li>
            <a href="{{ asset('lostnfound') }}">Lost&amp;Found</a>
          </li>
          @else
          <li>
            <a href="{{ asset('lostnfound') }}">Lost&amp;Found</a>
          </li>
          <li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">User <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="{{ asset('user/loginPanel') }}">User Panel</a></li>
              <li><a href="{{ asset('user/profile') }}">Profile</a></li>
                <li role="separator" class="divider"></li>
              <li><a href="{{ asset('user/petChooseTransfer') }}">Pet Transfer</a></li>
              <li><a href="{{ asset('user/petRegister') }}">Pet Register</a></li>
            </ul>
          </li>
          @if(Auth::user()->email=="admin@pettracker.com")  {{-- admin user menu --}}
          <li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Admin <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="{{ asset('admin/user') }}">Manage User</a></li>
              <li><a href="{{ asset('admin/vaccine') }}">Manage Vaccine</a></li>
              <li><a href="{{ asset('admin/exam') }}">Manage Exam</a></li>
            </ul>
          </li>
          @endif
          <li>
            <a href="{{ asset('logout') }}">Logout</a>
          </li>
          @endif  <!-- guest user -->
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
  </nav>
  <!-- Header -->
  <section class="container">
    @yield('content')
  </section>
  <!-- Footer -->
  <footer class="text-center">
    <div class="footer-above">
      <div class="container">
        <div class="row">
          <div class="footer-col col-md-12">
            <h3>Location</h3>
            <p>Cornell Institute of Business &amp; Technology <br>150 Hobson Street, Auckland CBD 1010</p>
          </div>
          <!-- <div class="footer-col col-md-4">
          <h3>About Freelancer</h3>
          <p>Freelance is a free to use, open source Bootstrap theme created by <a href="http://startbootstrap.com">Start Bootstrap</a>.</p>
        </div>-->
      </div>
    </div>
  </div>
  <div class="footer-below">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          Copyright &copy; Pet Tracker 2016
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-top visible-xs visible-sm">
  <a class="btn btn-primary" href="#page-top">
    <i class="fa fa-chevron-up"></i>
  </a>
</div>
<!-- jQuery -->
<script src="{{ asset('js/jquery.js') }}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- Plugin JavaScript -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="{{ asset('js/classie.js') }}"></script>
<script src="{{ asset('js/cbpAnimatedHeader.js') }}"></script>
<!-- Contact Form JavaScript -->
<script src="{{ asset('js/jqBootstrapValidation.js') }}"></script>

<!-- Custom Theme JavaScript-->
<script src="{{ asset('js/freelancer.js') }}"></script>
<script>
var pagename = "<?php if(isset($pagename)) echo $pagename;?>";
if(pagename!='index') {
  $(".footer-above").hide();
}
@stack('scripts')
</script>
</body>
</html>
