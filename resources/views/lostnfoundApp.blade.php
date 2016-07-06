<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Pet Tracker - Lost&Found</title>
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
  <div class="col-lg-12 text-center">
    <h2>Lost&Found</h2>
    <hr class="star-primary">
  </div>
  <div class="col-sm-12" style="padding:0">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>QR Code</th>
          <th>Status</th>
          <th>Owner Email</th>
        </tr>
      </thead>
      <tbody>
      @if (count($records) === 0)
        <tr>
          <td colspan="7" class="text-center no-result">
              No data to show.
          </td>
        </tr>
      @else
        {{-- */ $startNo = 1 /* --}}
        @foreach ($records as $data)
          <tr>
            <td>{{ $startNo++ }}</td>
            <td>{{ $data->qrCode }}</td>
            <td>{{ $data->status }}</td>
            <td>{{ $data->email }}</td>
          </tr>
        @endforeach
      @endif
      </tbody>
    </table>
    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top visible-xs visible-sm">
      <a class="btn btn-primary" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>
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
<script src="{{ asset('js/contact_me.js') }}"></script>
<!-- Custom Theme JavaScript-->
<script src="{{ asset('js/freelancer.js') }}"></script>
</body>
</html>
