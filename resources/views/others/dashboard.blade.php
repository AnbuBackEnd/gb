<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
@include('others.header');
@include('others.sidemenu');

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            @if(Session::get('user_type_id') == 1)
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                
               
                <div class="card-body">
                  <h5 class="card-title">Primary Admins </h5>

                  <div class="d-flex align-items-center">
                   
                    <div class="ps-3">
                      <h6>{{ $secondaryadmins }}</h6>
                     

                    </div>
                  </div>
                </div>
                

              </div>
            </div><!-- End Sales Card -->
            @endif
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

              

                <div class="card-body">
                  <h5 class="card-title">Clients </h5>

                  <div class="d-flex align-items-center">
                   
                    <div class="ps-3">
                      <h6>{{$clients}}</h6>
                      

                    </div>
                  </div>
                </div>
                

              </div>
            </div><!-- End Sales Card -->
            @if(Session::get('user_type_id') != 3)
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

               

                <div class="card-body">
                  <h5 class="card-title">Employees </h5>

                  <div class="d-flex align-items-center">
                    
                    <div class="ps-3">
                      <h6>{{ $employees }}</h6>
                      

                    </div>
                  </div>
                </div>
                

              </div>
            </div><!-- End Sales Card -->
            @endif
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

              

                <div class="card-body">
                  <h5 class="card-title">Approved Investments </h5>

                  <div class="d-flex align-items-center">
                  
                    <div class="ps-3">
                      <h6>{{ $investments }}</h6>
                      

                    </div>
                  </div>
                </div>
                

              </div>
            </div>
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

              

                <div class="card-body">
                  <h5 class="card-title">Rejected Investments </h5>

                  <div class="d-flex align-items-center">
                  
                    <div class="ps-3">
                      <h6>{{ $r_investmentsamount }}</h6>
                      

                    </div>
                  </div>
                </div>
                

              </div>
            </div>
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

              

                <div class="card-body">
                  <h5 class="card-title">Awaiting Investments </h5>

                  <div class="d-flex align-items-center">
                  
                    <div class="ps-3">
                      <h6>{{ $awaiting }}</h6>
                      

                    </div>
                  </div>
                </div>
                

              </div>
            </div>
           

            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                

                <div class="card-body">
                  <h5 class="card-title">Total Investments </h5>

                  <div class="d-flex align-items-center">
                    
                    <div class="ps-3">
                      <h6>{{ number_format($investmentsamount,2) }}</h6>
                      

                    </div>
                  </div>
                </div>
                

              </div>
            </div>
        
      </div>
    </section>

  </main><!-- End #main -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chart.js') }}/chart.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script>
  $(document).ready(function(){
    $('.dashboard').html('active');
  });
  </script>
</body>

</html>