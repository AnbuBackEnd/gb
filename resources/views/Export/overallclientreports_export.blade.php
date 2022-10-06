<!DOCTYPE html>
<html lang="en">

<body>
<center><img src="{{ public_path('greenbound.jpg') }}" width="200px" height="45px"> </center></header>
  <center><h2>OverAll Clients Report</h2></center>
@if($clients != false)
                <table width="100%" border="1">
                <thead>
                  <tr>
                  <tr>
                    <th scope="col">Client Name</th>
                    <th scope="col">Client Email</th>
                    <th scope="col">Client Phone</th>
                    <th scope="col">Status</th>
                  </tr>
                  </tr>
                </thead>
                <tbody>
                  @foreach($clients as $dt)
                 
                  <tr>
                    <td>{{ $dt['client_name'] }}</td>
                    <td>{{ $dt['email'] }}</td>
                    <td>{{ $dt['client_phone']}}</td>
                
                    <td>@if($dt['activeStatus'] == 1)<span class="badge bg-primary">Active</span> @else <span class="badge bg-danger">In Active</span> @endif</td>
               
                  </tr>
                  @endforeach
                
                </tbody>
              </table>
              @endif
              
              <br>
              <center><h5>Note : Generated On {{ date('d-m-Y H:i:s') }}</h5></center>
</body>

</html>