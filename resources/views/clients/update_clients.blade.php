<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Update Clients</title>
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

</head>
<body>

  @include('others.header');
  @include('others.sidemenu');
  <main id="main" class="main">
    <section class="section">
      <div class="row">
      <div class="col-lg-1"></div>
        <div class="col-lg-10">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Update Clients</h5>
              <!-- General Form Elements -->
              <form method="post" action="{{ route('update-client-post') }}">
                  @csrf
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                    @endif
                    @foreach($data as $row)
                 
                    <div class="row mb-3">
                    <div class="col-sm-4">
                        <label for="inputEmail" class="col-form-label">Client Name</label>
                    </div>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="name" id="name" value="{{ $row['client_name'] }}" autocomplete="off">
                      <span class="text-danger">@error('name') {{$message}}@enderror</span>
                    </div>
              </div>
              <input type="hidden" name="email" id="email" value="<?php echo $email; ?>">
              <div class="row mb-3">
                    <div class="col-sm-4">
                        <label for="inputEmail" class="col-form-label">Client Email</label>
                    </div>
                    <div class="col-sm-8">
                      <input type="email" class="form-control" name="email1" id="email1" value="{{ $row['email'] }}" autocomplete="off" disabled>
                     
                    </div>
              </div>
              <div class="row mb-3">
                    <div class="col-sm-4">
                        <label for="inputEmail" class="col-form-label">Client Address</label>
                    </div>
                    <div class="col-sm-8">
                    <textarea class="form-control" style="height: 100px" name="client_address" id="client_address">{{ $row['client_address'] }}</textarea>
                      <span class="text-danger">@error('client_address') {{$message}}@enderror</span>
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
                <label class="col-form-label">Client Mobile No</label>
                </div>
                  <div class="col-sm-8">
                  <input type="number" class="form-control" name="client_phone" id="client_phone" value="{{$row['client_phone']}}">
                    <span class="text-danger">@error('client_phone') {{$message}}@enderror</span>
                  </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-sm-4">
                <label for="inputNumber" class="col-form-label">Password</label>
                </div>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="pwd" id="pwd" value="{{ $row['pwd'] }}" autocomplete="off">
                    <span class="text-danger">@error('pwd') {{$message}}@enderror</span>
                  </div>
            </div>
               
            <div class="row mb-3">
                    <div class="col-sm-4">
                    <label class="col-form-label">Select Admin</label>
                     </div>
                  <div class="col-sm-8">
                    <select class="form-select" aria-label="Default select example" name="assignAdmin" id="assignAdmin">
                   
                    
                    @foreach($admins as $row1)
                    @if($row['assignAdmin'] == $row1['email'])
                      <option value="{{ $row1['email'] }}" selected>{{ $row1['name'] }}</option>
                    @endif
                    @endforeach
                    @foreach($admins as $row1)
                    @if($row['assignAdmin'] != $row1['email'])
                      <option value="{{ $row1['email'] }}">{{ $row1['name'] }}</option>
                    @endif
                    @endforeach
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4">
                    <label class="col-form-label">Select Employee</label>
                     </div>
                  <div class="col-sm-8">
                    <select class="form-select" aria-label="Default select example" name="assignEmployee" id="assignEmployee">
                   
                    
                    @foreach($employee as $row1)
                    @if($row['assignEmployee'] == $row1['email'])
                      <option value="{{ $row1['email'] }}" selected>{{ $row1['name'] }}</option>
                    @endif
                    @endforeach
                    @foreach($employee as $row1)
                    @if($row['assignEmployee'] != $row1['email'])
                      <option value="{{ $row1['email'] }}">{{ $row1['name'] }}</option>
                    @endif
                    @endforeach
                    </select>
                  </div>
                </div>
            <div class="row mb-3">
                    <div class="col-sm-4">
                    <label class="col-form-label">Login Allowed</label>
                     </div>
                  <div class="col-sm-8">
                    <select class="form-select" aria-label="Default select example" name="activeStatus" id="activeStatus">
                      @if($row['activeStatus'] == 1)
                      <option value="1" selected>Yes</option>
                      <option value="2">No</option>
                      @else 
                      <option value="1">Yes</option>
                      <option value="2" selected>No</option>
                      @endif
                      
                    
                    </select>
                  </div>
                </div>
            <div class="row mb-3">
                  <div class="col-sm-12">
                    <center><button type="submit" class="btn btn-primary">Update Client</button></center>
                  </div>
            </div>
              
                @endforeach
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>