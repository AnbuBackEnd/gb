<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Add Employees</title>
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
      <div class="col-lg-2"></div>
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Employees</h5>
              <!-- General Form Elements -->
              @if($settingscount > 0)
              @foreach($settings as $row)
                <?php $dateofjoiningallowed=$row['dateofjoiningallowed']; ?>
             
              @endforeach
              @endif
              <form method="post" class="formclass" action="{{ route('add-employee-post') }}" autocomplete="off">
                  @csrf
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                    @endif
                    <input type="hidden" name="employeecode" id="employeecode" value="<?php echo $employeecode; ?>">
                    <input type="hidden" name="employeenumber" id="employeenumber" value="<?php echo $employeenumber; ?>">
                    <div class="row mb-3">
                    <div class="col-sm-4">
                        <label for="inputEmail" class="col-form-label">Employee Code</label>
                    </div>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="empcode" id="empcode" value="<?php echo $employeecode; ?>" autocomplete="off" disabled>
                      
                    </div>
              </div>
              <div class="row mb-3">
                    <div class="col-sm-4">
                        <label for="inputEmail" class="col-form-label">Name</label>
                    </div>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" autocomplete="off">
                      <span class="text-danger adminnameerror">@error('name') {{$message}}@enderror</span>
                    </div>
              </div>
              <div class="row mb-3">
                    <div class="col-sm-4">
                        <label for="inputEmail" class="col-form-label">Email</label>
                    </div>
                    <div class="col-sm-8">
                      <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" autocomplete="off">
                      <span class="text-danger adminemailerror">@error('email') {{$message}}@enderror</span>
                    </div>
              </div>
             
                <fieldset class="row mb-3">
                <div class="col-sm-4">
                <legend class="col-form-label pt-0">Gender</legend>
                </div>
                  <div class="col-sm-8">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="1" checked>
                      <label class="form-check-label" for="gridRadios1">
                        Male
                      </label>
                    </div>
                    <div class="form-check">
                      
                      <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="2">
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
                  <input type="number" class="form-control" name="mobile" id="mobile" value="{{ old('mobile') }}" autocomplete="off">
                    <span class="text-danger adminmobileerror">@error('mobile') {{$message}}@enderror</span>
                  </div>
                </div>
                <div class="row mb-3">
                <div class="col-sm-4">
                <label for="inputNumber" class="col-form-label">Password</label>
                </div>
                 
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="pwd" id="pwd" value="{{ old('pwd') }}" autocomplete="off">
                    <span class="text-danger passworderror">@error('pwd') {{$message}}@enderror</span>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-4">
                  <label for="inputDate" class="col-form-label">Date of Joining</label>
                  </div>
                  
                    <div class="col-sm-8">
                      <input type="date" class="form-control" name="date_of_joining" id="date_of_joining" value="{{ old('date_of_joining') }}" autocomplete="off">
                      <span class="text-danger errormsg">@error('date_of_joining') {{$message}}@enderror</span>
                    </div>
                </div>
                @if(Session::get('user_type_id') == 1)
                <div class="row mb-3">
                <div class="col-sm-4">
                <label class="col-form-label">Assign Under<br>(Primary Admin)</label>
                </div>
                  <div class="col-sm-8">
                    <select class="form-select" aria-label="Default select example" name="assignAdmin" id="assignAdmin" placeholder="Select Admins">
                    
                     
                      @foreach($data as $row)
                      <option value="{{ $row['email'] }}">{{ $row['name'] }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
               @endif
                <div class="row mb-3">
                <div class="col-sm-4">
                <label class="col-form-label">Login Allowed</label>
                </div>
                  
                  <div class="col-sm-8">
                    <select class="form-select" aria-label="Default select example" name="activeStatus" id="activeStatus">
                    
                      <option value="1">Yes</option>
                      <option value="2">No</option>
                    
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-12">
                    <center><button type="button" class="btn btn-primary addemployee">Add Employee</button></center>
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
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"\></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script>
   var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope,$http) {
  
  $('.addemployee').click(function()
  {
    swal({
              title: `Are you sure you want to confirm to Add Employee...?`,
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((addemployee) => {
            if (addemployee) {
              $('.formclass').submit();
            }
          });
   
  });
 $('#date_of_joining').change(function()
 {
  if('<?php echo $dateofjoiningallowed; ?>' == 2)
  {
    var current='<?php echo date('Y-m-d'); ?>';
    if($(this).val() > current || $(this).val() == current)
    {
      $('.errormsg').html('');
    }
    else
    {
      $('.errormsg').html('Past Dates not Allowed');
      $('#date_of_joining').val('');
    }
  }
   
 });
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
        $('.addemployee').attr('disabled',true);
      }
      else
      {
        $('.adminmobileerror').html('');
        $('.addemployee').attr('disabled',false);
      }
    
    }
    else
    {
      $('.adminmobileerror').html('<font size="2">Mobile No Not Entered</font>');
        $('.addemployee').attr('disabled',true);
    }
  });
  $('#pwd').keyup(function()
  {
      if($(this).val() != '')
      {
          if($(this).val().length < 8)
          {
            $('.passworderror').html('<font size="2">Password Must be 8 Characters</font>');
            $('.addemployee').attr('disabled',true);
          }
          else
          {
            $('.passworderror').html('');
          $('.addemployee').attr('disabled',false);
          }
          
      }
      else
      {
        $('.passworderror').html('<font size="2">Password not Entered</font>');
            $('.addemployee').attr('disabled',true);
      }
  });
  $('#email').keyup(function()
  {
    if($(this).val() != '')
    {
     
      var reg=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($(this).val());
      if(reg == true)
      {
        $('.adminemailerror').html('');
        $('.addemployee').attr('disabled',false);
        $http.get("http://127.0.0.1:8000/validemail/"+$('#email').val()).then(function(response) {
          if(response.data[0] == 0)
          {
            $('.adminemailerror').html('<font size="2">Email Already Exists</font>');
            $('.addemployee').attr('disabled',true);
          }
          else
          {
            $('.adminemailerror').html('');
            $('.addemployee').attr('disabled',false);
          }
        });
      }
      else
      {
        $('.adminemailerror').html('<font size="2">Invalid Email ID</font>');
        $('.addemployee').attr('disabled',true);
      }
    }
    else
    {
      $('.adminemailerror').html('<font size="2">Email Not Entered..</font>');
        $('.addemployee').attr('disabled',false);
    }
   


  });
});
</script>

</body>

</html>