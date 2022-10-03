<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Users / Profile - NiceAdmin Bootstrap Template</title>
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

  

    <section class="section profile">
      <div class="row">
      

        <div class="col-xl-12">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#personaldetails">Personal Details</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#investmentdetails">Investment Records</button>
                </li>

             

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="personaldetails">
                
                @foreach($data as $row)
                  <h5 class="card-title">Personal Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Client Name</div>
                    <div class="col-lg-9 col-md-8">{{ $row['client_name'] }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Client Address</div>
                    <div class="col-lg-9 col-md-8">{{ $row['client_address'] }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Mobile No</div>
                    <div class="col-lg-9 col-md-8">{{ $row['client_phone'] }}</div>
                  </div>
                  @endforeach
              

             
                </div>
                <div class="tab-pane fade profile-edit pt-3 profile-overview" id="investmentdetails">
                <table class="table table-striped" border=1>
                <thead>
                  <tr>
                    <th scope="col">Investment Date</th>
                    <th scope="col">Investment Amount</th>
                    <th scope="col">Locked Period</th>
                    <th scope="col">Tenure</th>
                    <th scope="col">Returns</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($investmentRecords as $row)
                  <tr>
                    <th scope="row">{{date('d-m-Y',strtotime($row['invest_date']))}}</th>
                    <td>{{ $row['invest_amount'] }}</td>
                    <td>{{ $row['locked_period'] }} Months</td>
                    <td>{{ $row['tenure'] }} Months</td>
                    <td>{{ $row['returns'] }}</td>
                  </tr>
                  @endforeach
                 
                </tbody>
              </table>
             <center> <A href="{{ url('reinvestment') }}"><button type="button" class="btn btn-primary rounded-pill">Re Investment</button></A></center>
              
                </div>

              

              </div><!-- End Bordered Tabs -->

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

</body>

</html>