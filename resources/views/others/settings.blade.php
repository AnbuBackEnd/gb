<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Settings</title>
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
  <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
  <link
      rel="stylesheet"
      href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('confirmbox/style.css') }}">
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
  <link
rel="stylesheet"
type="text/css"
href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css"
/>
</head>

<body>

  @include('others.header');
  @include('others.sidemenu');
  <main id="main" class="main">
    <section class="section">
      <div class="row">
      <div class="col-lg-2"></div>
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Settings</h5>
              <!-- General Form Elements -->
              <form method="post" class="formclass"  action="{{ route('save-settings') }}">
                  @csrf
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                    @endif
                   @if($settingscount > 0)
                   @foreach($settings as $row)
              <div class="row mb-3">
                    <div class="col-sm-6">
                        <label for="inputEmail" class="col-form-label">Investment Amount Limit</label>
                    </div>
                    <div class="col-sm-6">
                      <input type="number" class="form-control" name="investamountlimit" id="investamountlimit" value="{{ $row['invest_amount_limit'] }}" autocomplete="off">
                      <span class="text-danger">@error('investamountlimit') {{$message}}@enderror</span>
                    </div>
              </div>
              <div class="row mb-3">
                    <div class="col-sm-6">
                        <label for="inputEmail" class="col-form-label">Investment Date</label>
                    </div>
                    <div class="col-sm-6">
                    <select class="form-select" aria-label="Default select example" name="investmentdateallowed" id="investmentdateallowed">
                    @if($row['investmentdateallowed'] == 1)
                    <option value="1" selected>Past Dates Allowed</option>
                    <option value="2">Past Dates Not Allowed</option>
                    @elseif($row['investmentdateallowed'] == 2)
                    <option value="1">Past Dates Allowed</option>
                    <option value="2" selected>Past Dates Not Allowed</option>
                    @else 
                    <option value="1">Past Dates Allowed</option>
                    <option value="2">Past Dates Not Allowed</option>
                    @endif
                  
                  </select>
                    </div>
              </div>
              <div class="row mb-3">
                    <div class="col-sm-6">
                        <label for="inputEmail" class="col-form-label">Date of Joining</label>
                    </div>
                    <div class="col-sm-6">
                    <select class="form-select" aria-label="Default select example" name="dateofjoiningallowed" id="dateofjoiningallowed">
                    @if($row['dateofjoiningallowed'] == 1)
                    <option value="1" selected>Past Dates Allowed</option>
                    <option value="2">Past Dates Not Allowed</option>
                    @elseif($row['dateofjoiningallowed'] == 2)
                    <option value="1">Past Dates Allowed</option>
                    <option value="2" selected>Past Dates Not Allowed</option>
                    @else 
                    <option value="1">Past Dates Allowed</option>
                    <option value="2">Past Dates Not Allowed</option>
                    @endif
                  
                  </select>
                    </div>
              </div>
              <div class="row mb-3">
                    <div class="col-sm-6">
                        <label for="inputEmail" class="col-form-label">Tenure Period Limit</label>
                    </div>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="tenureperiodlimit" id="tenureperiodlimit" value="{{ $row['tenureperiodlimit'] }}" autocomplete="off">
                      <span class="text-danger">@error('tenureperiodlimit') {{$message}}@enderror</span>
                    </div>
              </div>
              <div class="row mb-3">
                    <div class="col-sm-6">
                        <label for="inputEmail" class="col-form-label">Maturity Period</label>
                    </div>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="maturityperiod" id="maturityperiod" value="{{ $row['maturityperiod'] }}" autocomplete="off">
                      <span class="text-danger">@error('maturityperiod') {{$message}}@enderror</span>
                    </div>
              </div>
              <div class="row mb-3">
                    <div class="col-sm-6">
                        <label for="inputEmail" class="col-form-label">Interest Rate Limit</label>
                    </div>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="interestratelimit" id="interestratelimit" value="{{ $row['interestratelimit'] }}" autocomplete="off">
                      <span class="text-danger">@error('interestratelimit') {{$message}}@enderror</span>
                    </div>
              </div>
              <div class="row mb-3">
                    <div class="col-sm-6">
                        <label for="inputEmail" class="col-form-label">Director Name</label>
                    </div>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="directorname" id="directorname" value="{{ $row['directorname'] }}" autocomplete="off">
                      <span class="text-danger">@error('directorname') {{$message}}@enderror</span>
                    </div>
              </div>
             
                <div class="row mb-3">
                
                  <div class="col-sm-12">
                    <center><button type="submit" class="btn btn-primary">Save Settings</button></center>
                  </div>
                </div>
                @endforeach
                @else 
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <label for="inputEmail" class="col-form-label">Investment Amount Limit</label>
                    </div>
                    <div class="col-sm-6">
                      <input type="number" class="form-control" name="investamountlimit" id="investamountlimit" value="{{ old('investamountlimit') }}" autocomplete="off">
                      <span class="text-danger">@error('investamountlimit') {{$message}}@enderror</span>
                    </div>
              </div>
              <div class="row mb-3">
                    <div class="col-sm-6">
                        <label for="inputEmail" class="col-form-label">Investment Date</label>
                    </div>
                    <div class="col-sm-6">
                    <select class="form-select" aria-label="Default select example" name="investmentdateallowed" id="investmentdateallowed">
                  
                    <option value="1">Past Date Allowed</option>
                    <option value="2">Past Date Not Allowed</option>
                  
                  
                  </select>
                    </div>
              </div>
              <div class="row mb-3">
                    <div class="col-sm-6">
                        <label for="inputEmail" class="col-form-label">Date of Joining</label>
                    </div>
                    <div class="col-sm-6">
                    <select class="form-select" aria-label="Default select example" name="dateofjoiningallowed" id="dateofjoiningallowed">
                  
                    <option value="1">Past Date Allowed</option>
                    <option value="2">Past Date Not Allowed</option>
                  
                  
                  </select>
                    </div>
              </div>
              <div class="row mb-3">
                    <div class="col-sm-6">
                        <label for="inputEmail" class="col-form-label">Tenure Period Limit</label>
                    </div>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="tenureperiodlimit" id="tenureperiodlimit" value="{{ old('tenureperiodlimit') }}" autocomplete="off">
                      <span class="text-danger">@error('tenureperiodlimit') {{$message}}@enderror</span>
                    </div>
              </div>
              <div class="row mb-3">
                    <div class="col-sm-6">
                        <label for="inputEmail" class="col-form-label">Maturity Period</label>
                    </div>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="maturityperiod" id="maturityperiod" value="{{ old('maturityperiod') }}" autocomplete="off">
                      <span class="text-danger">@error('maturityperiod') {{$message}}@enderror</span>
                    </div>
              </div>
              <div class="row mb-3">
                    <div class="col-sm-6">
                        <label for="inputEmail" class="col-form-label">Interest Rate Limit</label>
                    </div>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="interestratelimit" id="interestratelimit" value="{{ old('interestratelimit') }}" autocomplete="off">
                      <span class="text-danger">@error('interestratelimit') {{$message}}@enderror</span>
                    </div>
              </div>
              <div class="row mb-3">
                    <div class="col-sm-6">
                        <label for="inputEmail" class="col-form-label">Director Name</label>
                    </div>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="directorname" id="directorname" value="{{ old('directorname') }}" autocomplete="off">
                      <span class="text-danger">@error('directorname') {{$message}}@enderror</span>
                    </div>
              </div>
             
                <div class="row mb-3">
                
                  <div class="col-sm-12">
                    <center><button type="submit" class="btn btn-primary">Save Settings</button></center>
                  </div>
                </div>
                @endif

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
  <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script> 
<script src="{{ asset('confirmbox/dist/jquery.eModal.js') }}"></script> 
  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<script>
$(document).ready(function(){
  
  $('.addprimaryadmin').click(function()
  {
    swal({
              title: `Are you sure you want to confirm to Add Primary Admin...?`,
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((addprimaryadmin) => {
            if (addprimaryadmin) {
              $('.formclass').submit();
            }
          });
   
  });
 $('#date_of_joining').change(function()
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
 });
});

  </script>

</body>

</html>