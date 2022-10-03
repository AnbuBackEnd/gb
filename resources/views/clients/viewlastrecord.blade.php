<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>View Client Records</title>
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
            <h5 class="card-title">View Client Records</h5>
            <?php $status=0; ?>
              <!-- Default Table -->
              <div class="row">
          
        <div class="col-lg-6">
              @if($clients != false)
              @foreach($clients as $dt)
              <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Client Code</th>
                    <td scope="col">{{ $dt['client_code'] }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Client Name</th>
                    <td scope="col">{{ $dt['client_name'] }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Client Mobile No</th>
                    <td scope="col">{{ $dt['client_phone'] }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Client Email</th>
                    <td scope="col">{{ $dt['email'] }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Gender</th>
                    @if($dt['gender'] == 1)
                    <td scope="col">Male</td>
                    @else
                    <td scope="col">Female</td>
                    @endif
                   
                  </tr>
                  <tr>
                    <th scope="col">Active Status</th>
                    @if($dt['active_status'] == 1)
                    <td scope="col">Active</td>
                    @else
                    <td scope="col">In Active</td>
                    @endif
                  </tr>
                
                </thead>
              
              </table>
              @endforeach
              @endif

            </div>
            <div class="col-lg-6">
              @if($investmentrecords != false)
              @foreach($investmentrecords as $dt)
              <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Investment Date</th>
                    <td scope="col">{{ date('d-m-Y',strtotime($dt['invest_date'])) }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Investment Amount</th>
                    <td scope="col">{{ number_format($dt['invest_amount'],2) }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Tenure</th>
                    <td scope="col">{{ $dt['tenure'] }} Months</td>
                  </tr>
                  <tr>
                    <th scope="col">Maturity Period</th>
                    <td scope="col">{{ $dt['locked_period'] }} Months</td>
                  </tr>
                  <tr>
                    <th scope="col">Monthly Return Amount</th>
                    <td scope="col">{{ number_format($dt['return_monthly'],2) }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Over All Return Amount</th>
                    <td scope="col">{{ number_format($dt['return_overall'],2) }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Payable Amount</th>
                    <td scope="col">{{ number_format($dt['payable_amount'],2) }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Interest Rate</th>
                    <td scope="col">{{ $dt['interestrate'] }}%</td>
                  </tr>
                  <tr>
                    <th scope="col">Maturity Date</th>
                    <td scope="col">{{ date('d-m-Y',strtotime($dt['maturitydate'])) }}</td>
                  </tr>
                  
                </thead>
              
              </table>
              @endforeach
              @endif

            </div>
          </div>
           
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