<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Client Wise Report</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }} " rel="icon">
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
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
            <h5 class="card-title">Employee Wise Report</h5>

              <!-- Default Table -->
              @if($email != 0)
              <div class="row">
              <div class="col-sm-9"></div>
              <div class="col-sm-3">
              <A href="{{url('employeewisereports_export')}}/{{$email}}" target="_block"><button type="button" class="btn btn-danger rounded-pill" >Download As Pdf</button></A>
</div>
</div>
@endif
              <div class="row">
                 
                   
                  <div class="col-sm-4">
                  <label for="inputNumber" class="col-form-label">Select Employee</label>
                    <select class="form-select clientname" aria-label="Default select example" name="activeStatus" id="activeStatus" placeholder="Select Client">
                    <option value="&nbsp;"> </option>
                      @foreach($employees as $row)
                      <option value="{{ $row['email'] }}">{{ $row['name'] }}</option>
                      @endforeach
                    
                    </select>
                  </div>
                 
                </div><br>
                @if($emp != false)
                <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Employee Name</th>
                    <th scope="col">Employee Email</th>
                    <th scope="col">Employee Phone</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($emp as $dt)
                 
                  <tr>
                    <td>{{ $dt['name'] }}</td>
                    <td>{{ $dt['email'] }}</td>
                    <td>{{ $dt['phone']}}</td>
                
                    <td>@if($dt['activeStatus'] == 1)<span class="badge bg-primary">Active</span> @else <span class="badge bg-danger">In Active</span> @endif</td>
               
                  </tr>
                  @endforeach
                
                </tbody>
              </table>
                @endif
                @if($clients != false)
                <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Client Name</th>
                    <th scope="col">Client Email</th>
                    <th scope="col">Client Phone</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($clients as $dt)
                 
                  <tr>
                    <td>{{ $dt['client_name'] }}</td>
                    <td>{{ $dt['email'] }}</td>
                    <td>{{ $dt['client_phone']}}</td>
                
                    <td>@if($dt['activeStatus'] == 1)<span class="badge bg-primary">Active</span> @else <span class="badge bg-danger">In Active</span> @endif</td>
               
                  </tr>
                  @endforeach
                
                </tbody>
              </table>
              @endif
            
                
             
            </div>
          </div>

        
        </div>

     
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

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

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
<script>
$(document).ready(function()
{
  $('.clientname').change(function()
  {
    window.location.href = "{{URL::to('employeewisereports/')}}/"+$(this).val();
  });
});
</script>
</body>

</html>