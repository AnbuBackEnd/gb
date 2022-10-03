<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Re Investment</title>
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
      <div class="row">
      <div class="col-lg-3"></div>
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Re Investment</h5>
              <!-- General Form Elements -->
              <form method="post"  action="{{ route('Re-investment-post') }}">
                  @csrf
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                    @endif
                    <div class="row mb-3">
                <div class="col-sm-4">
                <label class="col-form-label">Select Clients</label>
                </div>
                  <div class="col-sm-8">
                    <select class="form-select" aria-label="Default select example" name="client_name" id="client_name" placeholder="Select Clients">
                      @foreach($clients as $row)
                      <option value="{{ $row['email'] }}">{{ $row['client_name'] }}</option>
                      @endforeach
                    </select>
                  </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-4">
                <label class="col-form-label">Invest Date</label>
                </div>
                  <div class="col-sm-8">
                  <input type="date" class="form-control" name="investdate" id="investdate" value="{{ old('investdate') }}" autocomplete="off">
                    <span class="text-danger">@error('investdate') {{$message}}@enderror</span>
                  </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-4">
                <label class="col-form-label">Invest Amount</label>
                </div>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" name="investamount" id="investamount" value="{{ old('investamount') }}" autocomplete="off">
                    <span class="text-danger">@error('investamount') {{$message}}@enderror</span>
                  </div>
            </div>
          
            <div class="row mb-3">
                <div class="col-sm-4">
                <label class="col-form-label">Locked Period</label>
                </div>
                  <div class="col-sm-8">
                  <input type="number" class="form-control" name="lockperiod" id="lockperiod" value="{{ old('lockperiod') }}" autocomplete="off">
                    <span class="text-danger">@error('lockperiod') {{$message}}@enderror</span>
                  </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-4">
                <label class="col-form-label">Returns</label>
                </div>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" name="returns" id="returns" value="{{ old('returns') }}" autocomplete="off">
                    <span class="text-danger">@error('returns') {{$message}}@enderror</span>
                  </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-4">
                <label class="col-form-label">Tenure</label>
                </div>
                  <div class="col-sm-8">
                  <input type="number" class="form-control" name="tenure" id="tenure" value="{{ old('tenure') }}" autocomplete="off">
                    <span class="text-danger">@error('tenure') {{$message}}@enderror</span>
                  </div>
            </div>
          
               
          
         
            <div class="row mb-3">
                  <div class="col-sm-12">
                    <center><button type="submit" class="btn btn-primary">Add Investment</button></center>
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
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>