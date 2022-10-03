<!DOCTYPE html>
<html lang="en">

<body>
  <center><h2>User Details</h2></center>
                <table width="100%" border="1">
                <thead>
                  <tr>
                  <th scope="col">User Name</th>
                    <th scope="col">Email ID</th>
                    <th scope="col">Phone </th>
                    <th scope="col">User Type</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                @if(Session::get('user_type_id') ==1)
                  @foreach($superadmins as $dt)
                 
                  <tr>
                  <td>{{ $dt['name'] }}</td>
                    <td>{{ $dt['email'] }}</td>
                    <td>{{ $dt['phone']}}</td>
                    <td>Super Admin</td>
                    <td>@if($dt['activeStatus'] == 1)<span class="badge bg-primary">Active</span> @else <span class="badge bg-danger">In Active</span> @endif</td>
               
                  </tr>
                  @endforeach
                  @endif
                  @if(Session::get('user_type_id') ==1)
                  @foreach($admin as $dt)
                  <tr>
                    <td>{{ $dt['name'] }}</td>
                    <td>{{ $dt['email'] }}</td>
                    <td>{{ $dt['phone']}}</td>
                    <td>Secondary Admin</td>
                    <td>@if($dt['activeStatus'] == 1)<span class="badge bg-primary">Active</span> @else <span class="badge bg-danger">In Active</span> @endif</td>
               
                  </tr>
                  @endforeach
                  @endif
                  @if(Session::get('user_type_id') ==2 || Session::get('user_type_id') ==3)
                  @if($employee != false)
                  @foreach($employee as $dt)
                  <tr>
                    <td>{{ $dt['name'] }}</td>
                    <td>{{ $dt['email'] }}</td>
                    <td>{{ $dt['phone']}}</td>
                    <td>Employee</td>
                    <td>@if($dt['activeStatus'] == 1)<span class="badge bg-primary">Active</span> @else <span class="badge bg-danger">In Active</span> @endif</td>
               
                  </tr>
                
                  @endforeach
                  @endif
                  @endif
                  @foreach($clients as $dt)
                  <tr>
                    <td>{{ $dt['client_name'] }}</td>
                    <td>{{ $dt['email'] }}</td>
                    <td>{{ $dt['client_phone']}}</td>
                    <td>Client</td>
                    <td>@if($dt['activeStatus'] == 1)<span class="badge bg-primary">Active</span> @else <span class="badge bg-danger">In Active</span> @endif</td>
               
                  </tr>
                  @endforeach
                
                </tbody>
              </table>
            
             
              <center><h5>Note : Generated On {{ date('d-m-Y H:i:s') }}</h5></center>
</body>

</html>