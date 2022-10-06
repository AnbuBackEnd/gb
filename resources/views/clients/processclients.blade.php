<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Process Clients</title>
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
  <style>
    table, th, td,tr {
  border: 1px solid #2d5900;

} 
.backtoview
{
  cursor:pointer;
}
.textcolor_head
{
  color: black;
  font-size: 15px;
}
.textcolor_body
{
  color: black;
  font-size: 13px;
}
    </style>
</head>

<body>

@include('others.header');
  @include('others.sidemenu');

  <main id="main" class="main">
    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
           
            <h5 class="card-title">Personal Details<br><br>&nbsp;<span class="backtoview badge bg-primary"><font color="white">Back To View</font></span></h5>
              <!-- Default Table -->
              @csrf
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                    @endif
              @if($clientrecordscount > 0)
              @foreach($clientrecords as $row)
              <table class="table">
                <thead>
              
                <tr>
                    <th scope="col" class="textcolor_head">Client Code</th>
                    <td scope="col" class="textcolor_body"><?php echo $row['client_code']; ?></td>
                  </tr>
                  <tr>
                    <th scope="col" class="textcolor_head">client Name</th>
                    <td scope="col" class="textcolor_body"><?php echo $row['client_name']; ?></td>
                  </tr>
                  <tr>
                    <th scope="col" class="textcolor_head">client Email</th>
                    <td scope="col" class="textcolor_body"><?php echo $row['email']; ?></td>
                  </tr>
                  <tr>
                    <th scope="col" class="textcolor_head">client Mobile No</th>
                    <td scope="col" class="textcolor_body"><?php echo $row['client_phone']; ?></td>
                  </tr>
                  <tr>
                    <th scope="col" class="textcolor_head">Gender</th>
                    <td scope="col" class="textcolor_body"><?php if($row['gender'] == 1){ ?> MALE <?php } else { ?>FEMALE<?php } ?></td>
                  </tr>
                  <tr>
                    <th scope="col" class="textcolor_head">Login Allowed</th>
                    <td scope="col" class="textcolor_body"><?php if($row['active_status'] == 1){ ?> YES <?php } else { ?>NO<?php } ?></td>
                  </tr>
                  <tr>
                    <th scope="col" class="textcolor_head">Action</th>
                    <td scope="col" class="textcolor_body"><A href="#{{ $row['email']}}" class="editbutton"><span class="badge bg-primary">Edit</span></A>&nbsp;<A href="#{{ $row['email']}}" class="deletebutton"><span class="badge bg-danger">Delete</span></A></td>
                  </tr>
                  
                </thead>
              
              </table>
              @endforeach
              @else 
              <center><font color="red"><b>No Records Found..</b></font></center>
              @endif
            </div>
          </div>

        
        </div>

     <?php date_default_timezone_set('Asia/Kolkata'); ?>
      </div>
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
          
            <h5 class="card-title">Investment Records</h5>
              <!-- Default Table -->
              <?php $counting=0; ?>
            
              <table class="table table-bordered">
                <thead>
              
                <tr class="textcolor_head">
                    <th scope="col">S.NO</th>
                    <th scope="col">Date</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Tenure Period</th>
                    <th scope="col">Maturity Period</th>
                    <th scope="col">Interest Rate</th>
                    <th scope="col">Status</th>
                    <th scope="col"><center>Action</center></th>
                  </tr>
                  @if($investmentrecordscount > 0)
              @foreach($investmentrecords as $row)
             
              <?php $counting=$counting+1; ?>
              <?php $firstmonthdate = date('Y-m-d', strtotime($row['invest_date']. ' + 1 months'));?>
              <tr class="textcolor_body">
              <td scope="col"><center><?php echo $counting; ?></center></td>
              <td scope="col"><?php echo date('d-m-Y',strtotime($row['invest_date'])); ?></td>
                    <td scope="col"><?php echo number_format($row['invest_amount'],2); ?></td>
                    <td scope="col"><?php echo $row['tenure']; ?> Months</td>
                    <td scope="col"><?php echo $row['locked_period']; ?> Months</td>
                    <td scope="col"><?php echo $row['interestrate']; ?>%</td>
                    <td scope="col"><?php if($row['approval'] == 1){ ?><font color="green">Approved <?php if($row['investmentStatus'] != 'paid' && $row['investmentStatus'] != 'reinvested'){ ?> and Processing<?php } else if($row['investmentStatus'] == 'paid'){ ?> and <?php echo "Paid on ".date('d-m-Y',strtotime($row['paydate'])); ?><?php } else { ?> and Re Invested <?php } ?></font><?php } else if($row['approval'] == 2){ ?><font color="red">Rejected</font><?php } else { ?><font color="blue">Pending</font><?php } ?></td>
                    <td scope="col"><center>&nbsp;<?php if($row['approval'] == 1){ ?><A href="#<?php echo $row['client_email_id'].'#'.$row['_id']; ?>" class="viewdocument" target="_block"><span class="badge bg-danger">View Document</span></A><?php } ?><?php if($firstmonthdate < date('Y-m-d') && $row['investmentStatus'] != 'paid' && $row['investmentStatus'] == 'reinvested'){ ?><A href="#{{ $row['client_email_id']}}#{{$row['_id']}}" class="deletebuttoninvest"><span class="badge bg-danger">Delete</span></A><?php } ?><?php if(date('Y-m-d') >= date('Y-m-d',strtotime($row['maturitydate'])) && $row['investmentStatus'] != 'paid' && $row['investmentStatus'] != 'reinvested'){ ?>&nbsp;<A href="#<?php echo $row['client_email_id'].'#'.$row['_id']; ?>" class="pay_or_reinvest"><span class="badge bg-danger">Pay</span></A>&nbsp;&nbsp;<A href="#<?php echo $row['client_email_id'].'#'.$row['_id']; ?>" class="reinvest"><span class="badge bg-primary">Re Investing</span></A><?php } ?></center></td>
                    
                  </tr>
              @endforeach
              @else 
              <tr class="textcolor_body">
              <td scope="col" colspan="8"><center><font color="red">No Records Found..</font></center></td>
             
                    
                  </tr>

              @endif
           
                </thead>
              
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
  $('.viewdocument').click(function()
  {
    var email=$(this).attr('href').split('#')[1];
    var id=$(this).attr('href').split('#')[2];
    window.open("{{URL::to('viewdocument')}}/"+email+"/"+id);
  });
  $('.pay_or_reinvest').click(function()
  {
    var email=$(this).attr('href').split('#')[1];
    var id=$(this).attr('href').split('#')[2];
    window.location.href = "{{URL::to('payclients')}}/"+email+"/"+id;
  });
  $('.reinvest').click(function()
  {
    var email=$(this).attr('href').split('#')[1];
    var id=$(this).attr('href').split('#')[2];
    window.location.href = "{{URL::to('reinvest')}}/"+email+"/"+id;
  });
  $('.editbutton').click(function()
  {
    var email=$(this).attr('href').split('#')[1];
    window.location.href = "{{URL::to('updateclients')}}/"+email;
  }); 
  $('.deletebutton').click(function()
  {
    var email=$(this).attr('href').split('#')[1];
   
    swal({
              title: `Do you Want to Delete a Record...?`,
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((addprimaryadmin) => {
            if (addprimaryadmin) {
              window.location.href = "{{URL::to('deleteclientpersonalinfo')}}/"+email;
            }
          });
   });
  $('.backtoview').click(function()
  {
    window.location.href = "{{URL::to('viewClients')}}/";
  });
  $('.editbuttoninvest').click(function()
  {
    var email=$(this).attr('href').split('#')[1];
    var id=$(this).attr('href').split('#')[2];
    window.location.href = "{{URL::to('editinvestingrecords')}}/"+email+"/"+id;
  });
  $('.deletebuttoninvest').click(function()
  {
    var email=$(this).attr('href').split('#')[1];
    var id=$(this).attr('href').split('#')[2];
   
    swal({
              title: `Do you Want to Delete a Record...?`,
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((addprimaryadmin) => {
            if (addprimaryadmin) {
              window.location.href = "{{URL::to('deleteinvestmentrecords')}}/"+email+"/"+id;
            }
          });
  });
});
</script>
</body>

</html>