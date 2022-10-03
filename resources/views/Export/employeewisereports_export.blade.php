<!DOCTYPE html>
<html lang="en">

<body>
  <center><h2>Employee Wise Report</h2></center>
  @if($emp != false)
  <table width="100%" border="1">
                <thead>
                  <tr>
                    <th scope="col" line-height="40%"><center>Employee Name<center></th>
                    <th scope="col"><center>Employee Email</center></th>
                    <th scope="col"><center>Employee Phone</center></th>
                    <th scope="col"><center>Status</center></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($emp as $dt)
                 
                  <tr>
                  <td><center>{{ $dt['name'] }}</center></td>
                    <td><center>{{ $dt['email'] }}</td>
                    <td><center>{{ $dt['phone']}}</td>
                    <td><center>@if($dt['activeStatus'] == 1)Active @else In Active @endif</td>
               
                  </tr>
                  @endforeach
                
                </tbody>
              </table>
  @endif
  <br>
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
              <center><h5>Note : Generated On {{ date('d-m-Y H:i:s') }}</h5></center>
</body>

</html>