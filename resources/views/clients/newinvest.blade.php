<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>New Investment</title>
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
    <form method="post"  action="{{ route('add-clients-post') }}" class="formclass">
      <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">New Investment </h5>
              <!-- General Form Elements -->
             
              @if($settingscount > 0)
              @foreach($settings as $row)
                <?php $pastdatesettings=$row['investmentdateallowed']; ?>
                <?php $investmentamountlimit=$row['invest_amount_limit']; ?>
                <?php $interestratelimit=$row['interestratelimit']; ?>
                <?php $maturityperiod=$row['maturityperiod']; ?>
              @endforeach
              @endif
            
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
                      <option value="<?php echo $row['email'].'|'.$row['client_code']; ?>">{{ $row['client_name'] }}</option>
                      @endforeach
                    </select>
                  </div>
            </div>
            <input type="hidden" name="clientcode" id="clientcode">
                    <div class="row mb-3">
                    <div class="col-sm-4">
                        <label for="inputEmail" class="col-form-label">Client Code</label>
                    </div>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="clientcode1" id="clientcode1" autocomplete="off" disabled>
                      
                    </div>
              </div>
             
            <div class="row mb-3 hidecontent">
                <div class="col-sm-4">
                <label class="col-form-label">Investment Amount</label>
                </div>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" name="investamount" id="investamount" value="{{ old('investamount') }}" autocomplete="off">
                    <span class="text-danger investamounterror">@error('investamount') {{$message}}@enderror</span>
                  </div>
            </div>
           
            <div class="row mb-3 hidecontent">
                <div class="col-sm-4">
                <label class="col-form-label">Investment Date</label>
                </div>
                  <div class="col-sm-8">
                  <input type="date" class="form-control" name="investdate" id="investdate" value="{{ old('investdate') }}" autocomplete="off">
                    <span class="text-danger investdateerror">@error('investdate') {{$message}}@enderror</span>
                  </div>
            </div>
           
            <div class="row mb-3 hidecontent">
                <div class="col-sm-4">
                <label class="col-form-label">Tenure Period<br><center>(In Months)</center></label>
                </div>
                  <div class="col-sm-8">
                  <input type="number" class="form-control" name="tenure" id="tenure" value="{{ old('tenure') }}" autocomplete="off">                                                            
                    <span class="text-danger">@error('tenure') {{$message}}@enderror</span>
                  </div>
            </div>
            <div class="row mb-3 hidecontent">
                <div class="col-sm-4">
                <label class="col-form-label">Maturity Period<br>(In Months)</label>
                </div>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" name="maturityperiod" id="maturityperiod" autocomplete="off" disabled>
                  
                  </div>
            </div>
            <div class="row mb-3 hidecontent">
                <div class="col-sm-4">
                <label class="col-form-label">Interest Rate</label>
                </div>
                  <div class="col-sm-8">
                  <input type="number" class="form-control" name="interestrate" id="interestrate" value="{{ old('interestrate') }}" autocomplete="off">
                    <span class="text-danger interestrateerror">@error('interestrate') {{$message}}@enderror</span>
                  </div>
            </div>
            <div class="row mb-3 hidecontent">
                <div class="col-sm-4">
                <label class="col-form-label">Return Amount<br>(Monthly)</label>
                </div>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" name="returns_monthly" id="returns_monthly" value="{{ old('returns_monthly') }}" autocomplete="off" disabled>
                    <span class="text-danger">@error('returns') {{$message}}@enderror</span>
                  </div>
            </div>
            <div class="row mb-3 hidecontent">
                <div class="col-sm-4">
                <label class="col-form-label">Return Amount<br>(Overall)</label>
                </div>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" name="returns_overall" id="returns_overall" value="{{ old('returns_overall') }}" autocomplete="off" disabled>
                    <span class="text-danger">@error('returns') {{$message}}@enderror</span>
                  </div>
            </div>
            <div class="row mb-3 hidecontent">
                <div class="col-sm-4">
                <label class="col-form-label">Total Payable Amount</label>
                </div>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" name="overallreturnamount" id="overallreturnamount" value="{{ old('overallreturnamount') }}" autocomplete="off" disabled>
                    <span class="text-danger">@error('returns') {{$message}}@enderror</span>
                  </div>
            </div>
           
            
           
           
            <div class="row mb-3 hidecontent">
                  <div class="col-sm-12">
                    <center><button type="button" class="btn btn-primary addclients">Add Client</button></center>
                  </div>
            </div>
            </div>
          </div>

        </div>
       
          </form>
      
   
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
    $('.hidecontent').hide();
    $('#client_name').change(function()
    {
       var clientcode=$(this).val().split('|')[1];
      $('#clientcode1').val(clientcode);
      $('#clientcode').val(clientcode);
      $('.hidecontent').show();

    }); 
    $('.addclients').click(function()
    {
      swal({
              title: 'Are you sure you want to confirm to Add Client...',
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((addclient) => {
            if (addclient) {
              $('.formclass').submit();
            }
          });
    });
    $('#investamount').keyup(function()
    {
      if($(this).val().length > 0)
      {
          if('<?php echo $investmentamountlimit; ?>' < parseFloat($(this).val()))
          {
            $('.investamounterror').html('Investment Amount Limit Exceeds');
            $('.addclients').attr('disabled',true);
          }
          else
          {
            $('.investamounterror').html('');
            $('.addclients').attr('disabled',false);
          }
      }
    });
    $('#investdate').change(function()
 {
  if('<?php echo $pastdatesettings; ?>' == 2)
  {
    var current='<?php echo date('Y-m-d'); ?>';
    if($(this).val() > current || $(this).val() == current)
    {
      $('.investdateerror').html('');
      $('.addclients').attr('disabled',false);
    }
    else
    {
      $('.investdateerror').html('Past Dates not Allowed');
      $('#investdate').val('');
      $('.addclients').attr('disabled',true);
    }
  }

  
 });
  $('#interestrate').keyup(function()
  {
    if($(this).val().length > 0)
    {
      if('<?php echo $interestratelimit; ?>' < parseInt($(this).val()))
        {
          $('.interestrateerror').html('Interest Rate Exceeds Limit');
          $('.addclients').attr('disabled',true);
          $('#interestrate').val('');
        }
        else
        {
          $('.interestrateerror').html('');
          $('.addclients').attr('disabled',false);
          if($('#investamount').val() != '')
          {
              $('.interestrateerror').html('');
              var investamount=parseFloat($('#investamount').val(),2);
              var start_investamount=investamount;
              var tenure=$('#tenure').val();
              var interestrate=$('#interestrate').val();
              var returnamount_monthly=((investamount/100)*interestrate);
              $('#returns_monthly').val(returnamount_monthly);
              var returnamount_yearly=parseInt(returnamount_monthly)*tenure;  
              $('#returns_overall').val(returnamount_yearly);
              $('#overallreturnamount').val(returnamount_yearly+investamount);
        }
        else
        {
          $('.interestrateerror').html('Investment Amount Not Entered');
        }
      }
     
    }
  });
  $('#tenure').keyup(function()
  {
    
    if($(this).val().length > 0)
    {
     
      var mat='<?php echo $maturityperiod; ?>';
      
      $('#maturityperiod').val(parseInt(mat)+parseInt($(this).val()));
      var investamount=parseFloat($('#investamount').val(),2);
      var start_investamount=investamount;
      var tenure=$(this).val();
      var interestrate=$('#interestrate').val();
      var divide=tenure/12;
      var returnamount=investamount;
      if(tenure > 0)
      {
        for(var i=0;i<tenure;i++)
        {
          returnamount=returnamount+((returnamount/100)*interestrate);
        }
      }
      $('#returns').val(parseFloat(returnamount).toFixed(2));
    }
  }); 
  $('#lockperiod').keyup(function()
  {
    if($(this).val().length > 0)
    {
      var tenure=$('#tenure').val();
      if($(this).val() > tenure)
      {
        $(this).val('');
      }
     
    }
  });

});
</script>
</body>

</html>