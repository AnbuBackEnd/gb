<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Profile</title>
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
                
              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="personaldetails">
                
              
                  <h5 class="card-title">Personal Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Name</div>
                    <div class="col-lg-9 col-md-8">{{ Session::get('name') }}&nbsp;&nbsp;<A href="#" class="editprofile"><i class="ri-ball-pen-line"></i></A></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Email</div>
                    <div class="col-lg-9 col-md-8">{{ Session::get('email') }}&nbsp;&nbsp;<A href="#" class="editprofile"><i class="ri-ball-pen-line"></i></A></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Role</div>
                    <div class="col-lg-9 col-md-8">{{ Session::get('user_type') }}&nbsp;&nbsp;<A href="#" class="editprofile"><i class="ri-ball-pen-line"></i></A></div>
                  </div>
                  
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Mobile</div>
                    <div class="col-lg-9 col-md-8">{{ Session::get('phone') }}&nbsp;&nbsp;<A href="#" class="editprofile"><i class="ri-ball-pen-line"></i></A></div>
                  </div>
                
                  @if(Session::get('user_type_id') == 2)
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Address</div>
                    <div class="col-lg-9 col-md-8">{{ Session::get('address') }}&nbsp;&nbsp;<A href="#" class="editprofile"><i class="ri-ball-pen-line"></i></A></div>
                  </div>
                  @endif
                  @if(Session::get('user_type_id') == 3 && Session::get('user_type_id') == 4)
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Gender&nbsp;&nbsp;<A href="#" class="editprofile"><i class="ri-ball-pen-line"></i></A></div>
                    <div class="col-lg-9 col-md-8">@if(Session::get('gender') ==1) Male @else Female @endif</div>
                  </div>
                  @endif
                
                
              

             
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
  <script>
$(document).ready(function(){
$('.editprofile').click(function()
{
  wwindow.location.href = "{{URL::to('editprofile')}}";
});
});
</script>
</body>

</html>