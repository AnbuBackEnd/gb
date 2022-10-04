<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edit Admin</title>
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
    <section class="section">
      <div class="row" ng-app="myApp" ng-controller="myCtrl">
      <div class="col-lg-3"></div>
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Update Primary Admin</h5>
              <!-- General Form Elements -->
              <form method="post" class="formclass" action="{{ route('update-admin-post') }}">
                  @csrf
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                    @endif
                    @foreach($data as $row)
                    <input type="hidden" name="email" id="email" value="{{ $row['email'] }}">
                    <div class="row mb-3">
                    <div class="col-sm-4">
                        <label for="inputEmail" class="col-form-label">Admin Code</label>
                    </div>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="admincodefinal" id="admincodefinal" value="{{ $row['admincode'] }}" autocomplete="off" disabled>
                     
                    </div>
              </div>
                    <div class="row mb-3">
                    <div class="col-sm-4">
                        <label for="inputEmail" class="col-form-label">Name</label>
                    </div>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="name" id="name" value="{{ $row['name'] }}" autocomplete="off">
                      <span class="text-danger adminnameerror">@error('name') {{$message}}@enderror</span>
                    </div>
              </div>
              <div class="row mb-3">
                    <div class="col-sm-4">
                        <label for="inputEmail" class="col-form-label">Email</label>
                    </div>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="safasf" id="asfasfas" value="{{ $row['email'] }}" autocomplete="off" disabled>
                      <span class="text-danger adminemailerror">@error('email') {{$message}}@enderror</span>
                    </div>
              </div>
              <fieldset class="row mb-3">
                <div class="col-sm-4">
                <legend class="col-form-label pt-0">Gender</legend>
                </div>
                  
                  <div class="col-sm-8">
                    <div class="form-check">
                      @if($row['gender'] == 1)
                      <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="1" checked>
                      @else 
                      <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="1">
                      @endif
                      <label class="form-check-label" for="gridRadios1">
                        Male
                      </label>
                    </div>
                    <div class="form-check">
                      @if($row['gender'] == 2)
                      <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="2" checked>
                      @else 
                      <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="2">
                      @endif
                      <label class="form-check-label" for="gridRadios2">
                      Female
                      </label>
                    </div>
                    <span class="text-danger">@error('gender') {{$message}}@enderror</span>
                   
                  </div>
                </fieldset>
                <div class="row mb-3">
                <div class="col-sm-4">
                <label class="col-form-label">Mobile No</label>
                </div>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" name="mobile" id="mobile" value="{{ $row['phone'] }}" autocomplete="off">
                    <span class="text-danger adminmobileerror">@error('mobile') {{$message}}@enderror</span> 
                  </div>
                </div>
                <div class="row mb-3">
                <div class="col-sm-4">
                <label for="inputNumber" class="col-form-label">Password</label>
                </div>
                 
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="pwd" id="pwd" value="{{ $row['pwd'] }}" autocomplete="off">
                    <span class="text-danger passworderror">@error('pwd') {{$message}}@enderror</span>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-4">
                  <label for="inputDate" class="col-form-label">Date of Joining</label>
                  </div>
                  
                    <div class="col-sm-8">
                      <input type="date" class="form-control" name="date_of_joining" id="date_of_joining" value="{{ $row['date_of_joining'] }}" autocomplete="off" disabled>
                      <span class="text-danger">@error('date_of_joining') {{$message}}@enderror</span>
                    </div>
                </div>
               
              @endforeach
                <div class="row mb-3">
                  <div class="col-sm-12">
                    <center><button type="button" class="btn btn-primary updateadminsubmit">Update Admin</button></center>
                  </div>
                </div>

              </form>

            </div>
          </div>

        </div>

   
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
 

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chart.js/chart.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script>
   var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope,$http) {
  $('#name').keyup(function()
  {

    if($(this).val().length == 0)
    {
      $('.adminnameerror').html('<font size="2">Name is Required</font>');
    }
    else
    {
      $('.adminnameerror').html('');
    }
  });
  $('#mobile').keyup(function()
  {
    if($(this).val() != '')
    {
      if($(this).val().length > 10 || $(this).val().length < 10)
      {
        $('.adminmobileerror').html('<font size="2">10 Digits only Allowed to Mobile Number</font>');
        $('.updateadminsubmit').attr('disabled',true);
      }
      else
      {
        $('.adminmobileerror').html('');
        $('.updateadminsubmit').attr('disabled',false);
      }
    
    }
    else
    {
      $('.adminmobileerror').html('<font size="2">Mobile No Not Entered</font>');
        $('.updateadminsubmit').attr('disabled',true);
    }
  });
  $('#pwd').keyup(function()
  {
      if($(this).val() != '')
      {
          if($(this).val().length < 8)
          {
            $('.passworderror').html('<font size="2">Password Must be 8 Characters</font>');
            $('.updateadminsubmit').attr('disabled',true);
          }
          else
          {
            $('.passworderror').html('');
          $('.updateadminsubmit').attr('disabled',false);
          }
          
      }
      else
      {
        $('.passworderror').html('<font size="2">Password not Entered</font>');
            $('.updateadminsubmit').attr('disabled',true);
      }
  });
  $('.updateadminsubmit').click(function()
  {
    swal({
              title: `Are you sure you want to confirm to Update a Primary Admin...?`,
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((updateadminsubmit) => {
            if (updateadminsubmit) {
              $('.formclass').submit();
            }
          });
   
  });
});
</script>
</body>

</html>