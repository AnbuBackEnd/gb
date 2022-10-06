
@if(Session::get('user_type') == 'Super Admin')
<aside id="sidebar" class="sidebar">
<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link" href="{{url('Dashboard')}}">
      <i class="bi bi-columns-gap"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->
  
  
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#secondaryAdmin" data-bs-toggle="collapse" href="#">
      <i class="bi bi-person-bounding-box"></i><span>Primary Admin</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="secondaryAdmin" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{ url('addAdmin') }}">
          <i class="bi bi-circle"></i><span>Add New Primary Admin</span>
        </a>
      </li>
      <li>
        <a href="{{ url('viewSecondaryAdmin') }}">
          <i class="bi bi-circle"></i><span>View Primary Admins</span>
        </a>
      </li>
     
     
    </ul>
  </li><!-- End Components Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#userswindow" data-bs-toggle="collapse" href="#">
      <i class="bi bi-person-badge"></i><span>Employees</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="userswindow" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{ url('addEmployee') }}">
          <i class="bi bi-circle"></i><span>Add New Employee</span>
        </a>
      </li>
      <li>
        <a href="{{ url('viewEmployees') }}">
          <i class="bi bi-circle"></i><span>View Employees</span>
        </a>
      </li>
    
     
    </ul>
  </li><!-- End Components Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#clientswindow" data-bs-toggle="collapse" href="#">
      <i class="bi bi-person-circle"></i><span>Clients</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="clientswindow" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{ url('addClients') }}">
          <i class="bi bi-circle"></i><span>Add New Clients</span>
        </a>
      </li>
      <li>
        <a href="{{ url('newinv') }}">
          <i class="bi bi-circle"></i><span>Add New Investment</span>
        </a>
      </li>
      <li>
        <a href="{{ url('viewClients') }}">
          <i class="bi bi-circle"></i><span>View All Clients</span>
        </a>
      </li>
     
     
     
     
    </ul>
  </li><!-- End Components Nav -->
 
 
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#reports" data-bs-toggle="collapse" href="#">
      <i class="bi bi-list-check"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="reports" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{ url('client_wise_report/0') }}">
          <i class="bi bi-circle"></i><span>Client Wise Report</span>
        </a>
      </li>
      <li>
        <a href="{{ url('overallclientreports') }}">
          <i class="bi bi-circle"></i><span>Over All Clients Report</span>
        </a>
      </li>
      <li>
        <a href="{{ url('employeewisereports/0') }}">
          <i class="bi bi-circle"></i><span>Employee Selective Report</span>
        </a>
      </li>
      <li>
        <a href="{{ url('investmentrecords/0') }}">
          <i class="bi bi-circle"></i><span>Investment Records</span>
        </a>
      </li>
     
      <li>
        <a href="{{ url('userdetails') }}">
          <i class="bi bi-circle"></i><span>User Details</span>
        </a>
      </li>
    </ul>
  </li><!-- End Components Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#otherswindow" data-bs-toggle="collapse" href="#">
      <i class="bi bi-person-circle"></i><span>Others</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="otherswindow" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{ url('approvallist') }}">
          <i class="bi bi-circle"></i><span>Approval List</span>
        </a>
      </li>
      <li>
        <a href="{{ url('setprivileges') }}">
          <i class="bi bi-circle"></i><span>Set Privileges</span>
        </a>
      </li>
      <li>
        <a href="{{ url('settings') }}">
          <i class="bi bi-circle"></i><span>Settings</span>
        </a>
      </li>
     
     
     
     
    </ul>
  </li><!-- End Components Nav -->
</ul>
</aside><!-- End Sidebar-->
@endif
@if(Session::get('user_type') == 'Admin')
<aside id="sidebar" class="sidebar">
<ul class="sidebar-nav" id="sidebar-nav">
<li class="nav-item">
    <a class="nav-link" href="{{url('Dashboard')}}">
      <i class="bi bi-columns-gap"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->
<li class="nav-item">
    <a class="nav-link " href="{{url('approvallist')}}">
      <i class="bi bi-columns-gap"></i>
      <span>Approval List</span>
    </a>
</li><!-- End Dashboard Nav -->
  
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#userswindow" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Employees</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="userswindow" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{ url('addEmployee') }}">
          <i class="bi bi-circle"></i><span>Add New Employee</span>
        </a>
      </li>
      <li>
        <a href="{{ url('viewEmployees') }}">
          <i class="bi bi-circle"></i><span>View Employees</span>
        </a>
      </li>
    
     
    </ul>
  </li><!-- End Components Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#clientswindow" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Clients</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="clientswindow" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
        <a href="{{ url('addClients') }}">
          <i class="bi bi-circle"></i><span>Add New Clients</span>
        </a>
      </li>
      <li>
        <a href="{{ url('newinv') }}">
          <i class="bi bi-circle"></i><span>Add New Investment</span>
        </a>
      </li>
      <li>
        <a href="{{ url('viewClients') }}">
          <i class="bi bi-circle"></i><span>View All Clients</span>
        </a>
      </li>
     
     
    </ul>
  </li><!-- End Components Nav -->
  
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#reports" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="reports" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{ url('client_wise_report/0') }}">
          <i class="bi bi-circle"></i><span>Client Wise Report</span>
        </a>
      </li>
      <li>
        <a href="{{ url('overallclientreports') }}">
          <i class="bi bi-circle"></i><span>Over All Clients Report</span>
        </a>
      </li>
      <li>
        <a href="{{ url('employeewisereports/0') }}">
          <i class="bi bi-circle"></i><span>Employee Selective Report</span>
        </a>
      </li>
      
     
      <li>
        <a href="{{ url('userdetails') }}">
          <i class="bi bi-circle"></i><span>User Details</span>
        </a>
      </li>
    </ul>
  </li><!-- End Components Nav -->
</ul>
</aside><!-- End Sidebar-->
@endif
@if(Session::get('user_type') == 'Employee')
<aside id="sidebar" class="sidebar">
<ul class="sidebar-nav" id="sidebar-nav">
<li class="nav-item">
    <a class="nav-link" href="{{url('Dashboard')}}">
      <i class="bi bi-columns-gap"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#clientswindow" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Clients</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="clientswindow" class="nav-content collapse " data-bs-parent="#sidebar-nav">
   
    <li>
        <a href="{{ url('addClients') }}">
          <i class="bi bi-circle"></i><span>Add New Clients</span>
        </a>
      </li>
      <li>
        <a href="{{ url('newinv') }}">
          <i class="bi bi-circle"></i><span>Add New Investment</span>
        </a>
      </li>
      <li>
        <a href="{{ url('viewClients') }}">
          <i class="bi bi-circle"></i><span>View All Clients</span>
        </a>
      </li>
     
     
    </ul>
  </li><!-- End Components Nav -->
  
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#reports" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="reports" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{ url('client_wise_report/0') }}">
          <i class="bi bi-circle"></i><span>Client Wise Report</span>
        </a>
      </li>
      <li>
        <a href="{{ url('overallclientreports') }}">
          <i class="bi bi-circle"></i><span>Over All Clients Report</span>
        </a>
      </li>
     
     
     
      <li>
        <a href="{{ url('userdetails') }}">
          <i class="bi bi-circle"></i><span>User Details</span>
        </a>
      </li>
    </ul>
  </li><!-- End Components Nav -->
</ul>
</aside><!-- End Sidebar-->
@endif

