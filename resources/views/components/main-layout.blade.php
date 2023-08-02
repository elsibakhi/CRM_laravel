<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{config("app.name")}}</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{$path}}vendors/feather/feather.css">
  <link rel="stylesheet" href="{{$path}}vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="{{$path}}vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{$path}}vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="{{$path}}vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="{{$path}}js/select.dataTables.min.css">

  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{$path}}css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{$path}}images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row mb-5">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="{{route("dashboard")}}">{{config("app.name")}}</a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{$path}}images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <form action="{{route("contacts.search")}}" method="get" class="d-flex">
             
                <input   name="name" type="text" class="form-control" id="navbar-search-input" placeholder="Search by name" aria-label="search" aria-describedby="search">
                <button  class="btn btn-md btn-dark" type="submit">Search</button>
              </form>
            </div>
          </li>
        </ul>

        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper my-5">

{{$slot}}

  

    </div>
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{$path}}vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{$path}}vendors/chart.js/Chart.min.js"></script>
  <script src="{{$path}}vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="{{$path}}vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="{{$path}}js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{$path}}js/off-canvas.js"></script>
  <script src="{{$path}}js/hoverable-collapse.js"></script>
  <script src="{{$path}}js/template.js"></script>
  <script src="{{$path}}js/settings.js"></script>
  <script src="{{$path}}js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{$path}}js/dashboard.js"></script>
  <script src="{{$path}}js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>