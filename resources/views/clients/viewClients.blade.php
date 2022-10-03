<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>View Clients</title>
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
            <h5 class="card-title">View Clients</h5>
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
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    
                   
                    <th scope="col"><center>Process Client</center></th>
                    <th scope="col"><center>Terminate</center></th>
  
                   
                  
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $dt)

                  <tr>
                    <td>{{ $dt['client_name'] }}</td>
                    <td>{{ $dt['email'] }}</td>
                   
                   
                    <!-- <td><A href="{{url('updateclients/'.$dt['email']) }}"><button class="btn btn-xs">Edit</button></A></td> -->
                    <!-- <td><A href="{{url('viewBriefClients/'.$dt['email']) }}"><button class="btn btn-xs">View</button></A></td> -->
                    <td><center>@if($dt['terminatestatus'] != 1)<A href="{{url('processclients/'.$dt['email']) }}"><span class="badge bg-info">Process</span></A>@endif</center></td>
                    <td><center>@if($dt['terminatestatus'] != 1)<A href="#<?php echo $dt['email']; ?>" class="terminateclass"><span class="badge bg-danger">Terminate</span></A>@else<font color="red">Terminated</font>  @endif</center></td>
                    
                  </tr>
                  @endforeach
                
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
  $('.terminateclass').click(function()
  {
    var email=$(this).attr('href').split('#')[1];
    swal({
              title: `Do You want to Terminate a Client...?`,
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((addprimaryadmin) => {
            if (addprimaryadmin) {
              window.location.href = "{{URL::to('terminateclients')}}/"+email;
            }
          });

  });
  $('.activestatus').click(function()
  {
    var activestatus1=$(this).attr('href').split('#')[1];
    var id=$(this).attr('href').split('#')[2];
    swal({
              title: `Do You want to Change a Status...?`,
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((addprimaryadmin) => {
            if (addprimaryadmin) {
              window.location.href = "{{URL::to('changeclientstatus')}}/"+activestatus1+'/'+id;
            }
          });


  
});
});
</script>
</body>

</html>