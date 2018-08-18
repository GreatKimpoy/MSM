<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ url('dashboard') }}" class="brand-link">
    <img src="{{ asset('material/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
    <span class="brand-text font-weight-light">MIDSOUTH</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('material/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Eliakim Urian</a>
      </div>
    </div>
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
      with font-awesome or any other icon font library -->
      <!-- Dashboard -->
      <li class="nav-item">
        <a href="{{ url('dashboard') }}" class="nav-link">
          <p>
            <i class="nav-icon fa fa-tachometer-alt"></i> 
            Dashboard
          </p>
        </a>
      </li> <!-- Dashboard -->

      <!-- Maintenance -->
      <li class="nav-item menu-open">
        <a href="#" class="nav-link">
          <p>
            <i class="nav-icon fa fa-palette"></i>
            Maintenance
            <i class="right fa fa-angle-left"></i>
          </p>
        </a>
        <!-- Maintenance List -->
        <ul class="nav nav-treeview">
          <!-- Customers -->
          <li class="nav-item">
            <a href="{{ url('customer') }}" class="nav-link">
              <i class="nav-icon fa plus-square"></i>
              <i class="nav-icon fa fa-user-alt"></i> Customers
            </a>
          </li> <!-- Customers -->
          <!-- Service -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <p>
                <i class="nav-icon fa fa-car-side"></i>
                Vehicles
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('vehicle/category') }}" class="nav-link">
                  <i class="nav-icon fa plus-square"></i>
                  <p><i class="nav-icon fa fa-car-alt"></i>List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('vehicle/part') }}" class="nav-link">
                  <i class="nav-icon fa plus-square"></i>
                  <p><i class="nav-icon fa fa-car-alt"></i>Parts</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="{{ url('vehicle/category') }}" class="nav-link">
                  <i class="nav-icon fa plus-square"></i>
                  <p><i class="nav-icon fa fa-car-alt"></i>Category</p>
                </a>
              </li>
            </ul>
          </li> <!-- Service -->
          <!-- Service -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <p>
                <i class="nav-icon fa fa-server"></i>
                Services
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('service') }}" class="nav-link">
                  <i class="nav-icon fa plus-square"></i>
                  <p><i class="nav-icon fa fa-car-alt"></i>List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('service/category') }}" class="nav-link">
                  <i class="nav-icon fa plus-square"></i>
                  <p><i class="nav-icon fa fa-car-alt"></i>Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('mechanic') }}" class="nav-link">
                  <i class="nav-icon fa plus-square"></i>
                  <p><i class="nav-icon fa fa-user-alt"></i>Technicians</p>
                </a>
              </li>
            </ul>
          </li> <!-- Service -->
        </ul> <!-- Maintenance List -->
      </li> <!-- Maintenance -->
      <!-- Transactions -->
      <li class="nav-item  menu-open">
        <a href="#" class="nav-link">
            <p>
              <i class="nav-icon fa fa-money-check"></i>
              Transactions
              <i class="right fa fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
              <a href="{{url ('appointments')}}" class="nav-link">
              <p>Appointments</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('job-order') }}" class="nav-link">
              <p>Job Orders</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('inspection') }}" class="nav-link">
              <i class="nav-icon fa plus-square"></i>
              <p><i class="nav-icon fa fa-eye"></i>Inspection</p>
            </a>
          </li>
        </ul>
      </li> <!-- Transactions -->
    </ul>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<!-- /footer--->