<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pay Clients</title>
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
    <form method="post"  action="{{ route('pay-clients-post') }}" class="formclass">
      <div class="row">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Pay Clients</h5>
              <!-- General Form Elements -->
              @csrf
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                    @endif
            <?php 
            $returnamount=0;
          if($investment != false)
          {
            foreach($investment as $row)
            {

              $maturitydate=date('Y-m-d',strtotime($row['maturitydate']));
              $returnamount=$row['return_overall'];
            }
          }
          ?>
            <input type="hidden" name="investmentid" id="investment" value="<?php echo $investmentid; ?>">
                 @if($clients != false)
                  @foreach($clients as $row)
                    <div class="row mb-3">
                    <div class="col-sm-4">
                        <label for="inputEmail" class="col-form-label">Client Code</label>
                    </div>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="clientcode1" id="clientcode1" value="<?php echo $row['client_code']; ?>" autocomplete="off" disabled>
                      
                    </div>
              </div>
              <div class="row mb-3">
                    <div class="col-sm-4">
                        <label for="inputEmail" class="col-form-label">Client Name</label>
                    </div>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="name" id="name" value="<?php echo $row['client_name']; ?>" autocomplete="off" disabled>
</div>
              </div>
              @endforeach
              @endif
              
              <div class="row mb-3">
                    <div class="col-sm-4">
                        <label for="inputEmail" class="col-form-label">Payment Date</label>
                    </div>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" name="paymentdate" id="paymentdate" value="{{ old('paymentdate') }}" autocomplete="off">
                      <span class="text-danger">@error('paymentdate') {{$message}}@enderror</span>
                    </div>
              </div>
              <div class="row mb-3">
                    <div class="col-sm-4">
                        <label for="inputEmail" class="col-form-label">Return Amount</label>
                    </div>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="returnamount" id="returnamount" disabled autocomplete="off">
              
                    </div>
              </div>
              <div class="row mb-3">
                    <div class="col-sm-4">
                        <label for="inputEmail" class="col-form-label">Payment Description</label>
                    </div>
                    <div class="col-sm-8">
                    <textarea class="form-control" style="height: 100px" name="paymentdescription" id="paymentdescription">{{old('paymentdescription')}}</textarea>
                      <span class="text-danger">@error('paymentdescription') {{$message}}@enderror</span>
                    </div>
              </div>
              <div class="row mb-3">
                  <div class="col-sm-12">
                    <center><button type="submit" class="btn btn-primary addpayment">Add payment</button></center>
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
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
  <script>
  $(document).ready(function(){
   $('#returnamount').val('<?php echo $returnamount; ?>');
   

});
</script>
</body>

</html>