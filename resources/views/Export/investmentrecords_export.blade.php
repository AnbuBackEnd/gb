<!DOCTYPE html>
<html lang="en">

<body>
<center><img src="{{ public_path('greenbound.jpg') }}" width="200px" height="45px"> </center></header>
  <center><h2>Investment Report</h2></center>
@if($clients != false)
                <table width="100%" border="1">
                <thead>
                  <tr>
                    <th scope="col" line-height="40%"><center>Client Name<center></th>
                    <th scope="col"><center>Client Email</center></th>
                    <th scope="col"><center>Client Phone</center></th>
                    <th scope="col"><center>Status</center></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($clients as $dt)
                 
                  <tr>
                    <td><center>{{ $dt['client_name'] }}</center></td>
                    <td><center>{{ $dt['email'] }}</td>
                    <td><center>{{ $dt['client_phone']}}</td>
                    <td><center>@if($dt['activeStatus'] == 1)Active @else In Active @endif</td>
               
                  </tr>
                  @endforeach
                
                </tbody>
              </table>
              @endif
              <br>
              @if($investmentpar != false)
                <table width="100%" border="1">
                <thead>
                  <tr>
                    <th scope="col">Investment Date</th>
                    <th scope="col">Investment Amount</th>
                    <th scope="col">Tenure</th>
                    <th scope="col">Lock Period</th>
                    <th scope="col">Returns</th>
                    <th scope="col">Payable Amount</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($investmentpar as $dt)
                 
                  <tr>
                    <td><center>{{ date('d-m-Y',strtotime($dt['invest_date'])) }}</td>
                    <td><center>{{ number_format($dt['invest_amount'],2) }}</td>
                    <td><center>{{ $dt['tenure']}} Months</td>
                    <td><center>{{ $dt['locked_period']}} Months</td>
                    <td><center>{{ number_format($dt['return_overall'],2) }}</td>
                    <td><center>{{ number_format($dt['payable_amount'],2) }}</td>
                  
               
                  </tr>
                  @endforeach
                
                </tbody>
              </table>
              @endif
              <br>
              <center><h5>Note : Generated On {{ date('d-m-Y H:i:s') }}</h5></center>
</body>

</html>