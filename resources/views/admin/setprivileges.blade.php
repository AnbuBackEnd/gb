<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Set Privileges</title>
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
      <div class="row">
      <div class="col-lg-1"></div>
        <div class="col-lg-10">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Set Privileges</h5>
              
              <!-- General Form Elements -->
              <form method="post"  action="{{ route('postuserprivilege') }}">
                  @csrf
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                    @endif
                    <input type="hidden" name="employeecreatehide" id="employeecreatehide">
                    <div class="row">
                    <div class="col-lg-12">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#secondaryadmins" aria-expanded="false" aria-controls="flush-collapseOne">
                     Primary Admin
                    </button>
                  </h2>
                  <div id="secondaryadmins" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                    <div class="row">
                      <div class="col-lg-12">
                      <table class="table table-striped" border="1">
                    <thead>
                    <tr>
                    <th scope="col"><center>Name</th>
                    <th scope="col"><center>Create</th>
                    <th scope="col"><center>Edit</th>
                    <th scope="col"><center>View</th>
                    <th scope="col"><center>Delete</th>
                    <th scope="col"><center>Downloadable</th>
                   </tr>
                    </thead>
                    <tbody>
                   @foreach($secemployee as $row)
                   <tr>
                    <td scope="col"><center>Employees</td>
                    @if($row['create'] == 1)
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="employeecreate" value="1" name="employeecreate" style="float:center;" checked></center></td>
                    @else
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="employeecreate" value="1" name="employeecreate" style="float:center;"></center></td>
                    @endif
                    @if($row['edit'] == 1)
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="employeeedit" value="1" name="employeeedit" style="float:center;" checked></center></td>
                    @else
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="employeeedit" value="1" name="employeeedit" style="float:center;"></center></td>
                    @endif
                    @if($row['view'] == 1)
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="employeeview" value="1" name="employeeview" style="float:center;" checked></center></td>
                    @else
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="employeeview" value="1" name="employeeview" style="float:center;"></center></td>
                    @endif
                    @if($row['delete'] == 1)
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="employeedelete" value="1" name="employeedelete" style="float:center;" checked></center></td>
                    @else
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="employeedelete" value="1" name="employeedelete" style="float:center;"></center></td>
                    @endif
                    
                 
                    <td></td>
                   </tr>
                   @endforeach
                   @foreach($secclient as $row)
                   <tr>
                    <td scope="col"><center>Clients</td>
                    @if($row['create'] == 1)
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="gridCheck1" name="clientcreate" value="1" style="float:center;" checked></center></td>
                    @else 
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="gridCheck1" name="clientcreate" value="1" style="float:center;"></center></td>
                    @endif
                    @if($row['edit'] == 1)
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="gridCheck1" name="clientedit" value="1" style="float:center;" checked></center></td>
                    @else 
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="gridCheck1" name="clientedit" value="1" style="float:center;"></center></td>
                    @endif
                    @if($row['view'] == 1)
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="gridCheck1" name="clientview" value="1" style="float:center;" checked></center></td>
                    @else 
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="gridCheck1" name="clientview" value="1" style="float:center;"></center></td>
                    @endif
                    @if($row['delete'] == 1)
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="gridCheck1" name="clientdelete" value="1" style="float:center;" checked></center></td>
                    @else 
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="gridCheck1" name="clientdelete" value="1" style="float:center;"></center></td>
                    @endif
                    
                    <td></td>
                   </tr>
                   @endforeach
                   @foreach($secinvestment as $row)
                   <tr>
                    <td scope="col"><center>Investment Records</td>
                    @if($row['create'] == 1)
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="gridCheck1" name="investmentcreate" value="1" style="float:center;" checked></center></td>
                    @else 
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="gridCheck1" name="investmentcreate" value="1" style="float:center;"></center></td>
                    @endif
                    @if($row['edit'] == 1)
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="gridCheck1" name="investmentedit" value="1" style="float:center;" checked></center></td>
                    @else 
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="gridCheck1" name="investmentedit" value="1" style="float:center;"></center></td>
                    @endif
                    @if($row['view'] == 1)
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="gridCheck1" name="investmentview" value="1" style="float:center;" checked></center></td>
                    @else 
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="gridCheck1" name="investmentview" value="1" style="float:center;"></center></td>
                    @endif
                    @if($row['delete'] == 1)
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="gridCheck1" name="investmentdelete" value="1" style="float:center;" checked></center></td>
                    @else 
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="gridCheck1" name="investmentdelete" value="1" style="float:center;"></center></td>
                    @endif
                  
                    <td></td>
                   </tr>
                   @endforeach
                 
                   @foreach($secreports as $row)
                   <tr>
                    <td scope="col"><center>Reports</td>
                    <td scope="col"><center></center></td>
                    <td scope="col"><center></center></td>
                    @if($row['view'] == 1)
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="gridCheck1" name="reportview" value="1" style="float:center;" checked></center></td>
                    @else 
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="gridCheck1" name="reportview" value="1" style="float:center;"></center></td>
                    @endif
                    
                    <td scope="col"><center></center></td>
                    @if($row['downloadable'] == 1)
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="gridCheck1" name="reportdownloadable" value="1" style="float:center;" checked></center></td>
                    @else 
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="gridCheck1" name="reportdownloadable" value="1" style="float:center;"></center></td>
                    @endif
                    
                   </tr>
                   @endforeach
                   
                  
                    </thead>
</table>
                      </div>
                    </div>
                   

<div class="row">
<div class="col-lg-1"></div>

</div>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                      Employees
                    </button>
                  </h2>
                  <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                    <div class="row">
                      <div class="col-lg-12">
                      <table class="table table-striped" border="1">
                    <thead>
                    <tr>
                    <th scope="col"><center>Name</th>
                    <th scope="col"><center>Create</th>
                    <th scope="col"><center>Edit</th>
                    <th scope="col"><center>View</th>
                    <th scope="col"><center>Delete</th>
                    <th scope="col"><center>Downloadable</th>
                   </tr>
                    </thead>
                    <tbody>
                
                  @foreach($empclient as $row)
                   <tr>
                    <td scope="col"><center>Clients</td>
                    @if($row['create'] == 1)
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="gridCheck1" name="clientcreate1" value="1" style="float:center;" checked></center></td>
                    @else 
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="gridCheck1" name="clientcreate1" value="1" style="float:center;"></center></td>
                    @endif
                    @if($row['edit'] == 1)
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="gridCheck1" name="clientedit1" value="1" style="float:center;" checked></center></td>
                    @else 
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="gridCheck1" name="clientedit1" value="1" style="float:center;"></center></td>
                    @endif
                    @if($row['view'] == 1)
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="gridCheck1" name="clientview1" value="1" style="float:center;" checked></center></td>
                    @else 
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="gridCheck1" name="clientview1" value="1" style="float:center;"></center></td>
                    @endif
                    @if($row['delete'] == 1)
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="gridCheck1" name="clientdelete1" value="1" style="float:center;" checked></center></td>
                    @else 
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="gridCheck1" name="clientdelete1" value="1" style="float:center;"></center></td>
                    @endif
                   
                    <td></td>
                   </tr>
                   @endforeach
                   @foreach($empinvestment as $row)
                   <tr>
                    <td scope="col"><center>Investment Records</td>
                    @if($row['create'] == 1)
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="gridCheck1" name="investmentcreate1" value="1" style="float:center;" checked></center></td>
                    @else 
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="gridCheck1" name="investmentcreate1" value="1" style="float:center;"></center></td>
                    @endif
                    @if($row['edit'] == 1)
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="gridCheck1" name="investmentedit1" value="1" style="float:center;" checked></center></td>
                    @else 
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="gridCheck1" name="investmentedit1" value="1" style="float:center;"></center></td>
                    @endif
                    @if($row['view'] == 1)
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="gridCheck1" name="investmentview1" value="1" style="float:center;" checked></center></td>
                    @else 
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="gridCheck1" name="investmentview1" value="1" style="float:center;"></center></td>
                    @endif
                    @if($row['delete'] == 1)
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="gridCheck1" name="investmentdelete1" value="1" style="float:center;" checked></center></td>
                    @else 
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="gridCheck1" name="investmentdelete1" value="1" style="float:center;"></center></td>
                    @endif
                    <td></td>
                   </tr>
                   @endforeach
                  
                   @foreach($empreports as $row)
                   <tr>
                    <td scope="col"><center>Reports</td>
                    <td scope="col"><center></center></td>
                    <td scope="col"><center></center></td>
                    @if($row['view'] == 1)
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="gridCheck1" name="reportview1" value="1" style="float:center;" checked></center></td>
                    @else 
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="gridCheck1" name="reportview1" value="1" style="float:center;"></center></td>
                    @endif
                    
                    <td scope="col"><center></center></td>
                    @if($row['downloadable'] == 1)
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="gridCheck1" name="reportdownloadable1" value="1" style="float:center;" checked></center></td>
                    @else 
                    <td scope="col"><center><input class="form-check-input" type="checkbox" id="gridCheck1" name="reportdownloadable1" value="1" style="float:center;"></center></td>
                    @endif
                    
                   </tr>
                   @endforeach
                  
                    </thead>
</table>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>
               
</div>
</div>
                </div>
              
              
             
                <div class="row mb-3">
                
                  <div class="col-sm-12">
                    <center><button type="submit" class="btn btn-primary savebutton">Save</button></center>
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

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>