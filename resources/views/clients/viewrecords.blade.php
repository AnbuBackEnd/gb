<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>View Records</title>
  <meta content="" name="">
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
<?php $status=0; ?>
              <!-- Default Table -->
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Investment Date</th>
                    <th scope="col">Investment Amount</th>
                    <th scope="col">Tenure</th>
                    <th scope="col">Interest Rate</th>
                    <th scope="col">Lock Period</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($investments as $dt)
                  <?php $lockedperiod=$dt['locked_period']; ?>
                  <tr>
                    <td>{{ date('d-m-Y',strtotime($dt['invest_date'])) }}</td>
                    <td>{{ $dt['invest_amount'] }}</td>
                    <td>{{ $dt['tenure']}} Months</td>
                    <td>{{ $dt['interestrate']}}%</td>
                    <td>{{ $dt['locked_period']}} Months</td>
                    
                    <td>@if($dt['activeStatus'] == 1) Active @else In Active @endif</td>
                  
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Month</th>
                    <th scope="col">Return Date</th>
                    <th scope="col">Return Amount</th>
                    <th scope="col">Status</th>
     
                    

                    
                  </tr>
                </thead>
                <tbody>
                  @foreach($tenurerecords as $dt)
                  <tr>
                  <td>{{ $dt['monthcount'] }}</td>
                    <td>{{ date('d-m-Y',strtotime($dt['investdate'])) }}</td>
                    <td>{{ number_format($dt['returnamount'],2) }}</td>
                    @if($dt['monthcount'] == $lockedperiod)
                      @if($dt['investdate'] <= date('Y-m-d'))
                          <?php $status = 1; ?>
                        @else 
                        <?php $status = 0; ?>
                        @endif
                  
                    @endif
                   
                    @if($dt['investdate'] <= date('Y-m-d'))
                    <td>Processed</td>
                    @else 
                    <td>Not Processed </td>
                    @endif
                  </tr>
                  @endforeach
                </tbody>
              </table>
            <center> <?php if($status == 1){ ?> <button type="button" class="btn btn-primary">Re Investment </button>&nbsp;&nbsp;<A href="#{{$dt['_id']}}" class="withdrawwindow"><button type="button" class="btn btn-primary">With Draw </button></A><?php } ?>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
<script>
$(document).ready(function()
{
$('.withdrawwindow').click(function()
{
    var id=$(this).attr('href').split('#')[1];
    bootbox.confirm("Do you want to withdraw a Amount", function(result){ 
    if(result == true)
    {
      window.location.href = "{{URL::to('withdrawwindow')}}/"+id;
    }
  });
});
});
</script>
</body>

</html>