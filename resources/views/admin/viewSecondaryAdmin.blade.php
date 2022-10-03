<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Primary Admin</title>
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
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.css">


  <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css"/> -->

<style>
table, th, td,tr {
  border: 1px solid #2d5900;

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
            <h5 class="card-title">View Primary Admins</h5>
            @csrf
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                    @endif
              <!-- Default Table -->
              <table class="table" id="primaryadmin">
                <thead>
                  <tr backgroundcolor="white" class="textcolor_head">
                    <th scope="col">S.No</th>
                    <th scope="col" >Code</th>
                    <th scope="col" > Name</th>
                    <th scope="col"> Email</th>
                   
                    <th scope="col">Login</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Edit</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $count=0; ?>
                  @foreach($data as $dt)
                  <?php $count=$count+1;?>                
                    <tr class="textcolor_body">
                    <td><center><?php echo $count; ?><center></td>
                    <td>{{ $dt['admincode'] }}</td>
                    <td>{{ $dt['name'] }}</td>
                    <td>{{ $dt['email'] }}</td>
                   
                    <td class="textcolor_head"><center><A href="#{{$dt['activeStatus']}}#{{$dt['email']}}" class="activestatus">@if($dt['activeStatus'] == 1)<span class="badge bg-primary">Yes</span> @else <span class="badge bg-danger">No</span> @endif</A></center></td>
                    <td class="textcolor_head"><center><A href="#{{ $dt['email']}}#{{$dt['id']}}" class="deletebutton"><span class="badge bg-danger">Delete</span></A></center></td>
                    <td class="textcolor_head"><A href="{{url('updateadmin/'.$dt['email']) }}"><span class="badge bg-primary">Edit</span></A></td>
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
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <!-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
  <script
type="text/javascript"
charset="utf8"
src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script> -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.js"></script>
<script>
$(document).ready(function()
{
 
  $('#primaryadmin').DataTable({
    responsive:true
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
              window.location.href = "{{URL::to('changesecondaryadminstatus')}}/"+activestatus1+'/'+id;
            }
          });


  
});
  $('.deletebutton').click(function()
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
              window.location.href = "{{URL::to('deletesecondaryadmin')}}/"+email+'/'+id;
            }
          });
   
  
});
  });
</script>
</body>

</html>