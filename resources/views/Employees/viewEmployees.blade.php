<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>View Employees</title>
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
            <h5 class="card-title">View Employees</h5>
            @csrf
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                    @endif
              <!-- Default Table -->
              
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Employee Code</th>
                    <th scope="col">Employee Name</th>
                    <th scope="col">Employee Email ID</th>
  
                    <th scope="col">Login Allowed</th>
                    <th scope="col">Delete</th>
                    <th scope="col">update</th>
                  </tr>
                </thead>
                <tbody>
                @if($datacount > 0)
                  @foreach($data as $dt)
                  <tr>
                    <td>{{ $dt['employeecode'] }}</td>
                    <td>{{ $dt['name'] }}</td>
                    <td>{{ $dt['email'] }}</td>
                    
                    <td><center>@if($dt['activeStatus'] == 1)<A href="#<?php echo $dt['email']; ?>#<?php echo $dt['activeStatus']; ?>" class="changestatus"><span class="badge bg-primary">Yes</span></A> @else <A href="#<?php echo $dt['email']; ?>#<?php echo $dt['activeStatus']; ?>" class="changestatus"><span class="badge bg-danger">No</span></A> @endif</center></td>
                    <td><A href="#{{$dt['email']}}#{{$dt['id']}}" class="deletebutton"><span class="badge bg-danger">Delete</span></A></td>
                    <td><A href="{{url('updateemployee/'.$dt['email']) }}"><span class="badge bg-primary">Edit</span></A></td>
                  </tr>
                  @endforeach
              @else
              <tr >
                    <td colspan="6"> <center><font color="red" size="2">No Records Found...</font></center></td>
                  
                  </tr>
              @endif
                </tbody>
              </table>
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
  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
<script>
$(document).ready(function()
{
  $('.changestatus').click(function()
  {
    var changestatus=$(this).attr('href').split('#')[2];
    var email=$(this).attr('href').split('#')[1];
    swal({
              title: 'Are you sure you want to confirm to change the Status',
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((addclient) => {
            if (addclient) {
              window.location.href = "{{URL::to('changestatusemployee')}}/"+email+'/'+changestatus;
            }
          });
  });
  $('.deletebutton').click(function()
  {
    var email=$(this).attr('href').split('#')[1];
    var id=$(this).attr('href').split('#')[2];
    swal({
              title: 'Are you sure you Delete This Record...',
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((addclient) => {
            if (addclient) {
              window.location.href = "{{URL::to('deleteemployee')}}/"+email+'/'+id;
            }
          });
   
});
});
</script>
</body>

</html>