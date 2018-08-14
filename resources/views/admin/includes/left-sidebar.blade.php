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
          <p>Dashboard</p>
        </a>
      </li> <!-- Dashboard -->

      <!-- Maintenance -->
      <li class="nav-item menu-open">
        <a href="#" class="nav-link">
          <p>
            Maintenance
            <i class="right fa fa-angle-left"></i>
          </p>
        </a>
        <!-- Maintenance List -->
        <ul class="nav nav-treeview">
          <!-- Customers -->
          <li class="nav-item">
            <a href="{{ url('customer') }}" class="nav-link">
              <i class="nav-icon fa plus-square"></i> Customers
            </a>
          </li> <!-- Customers -->
          <!-- Service -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fa plus-square"></i>
              <p>
                Vehicles
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('vehicle') }}" class="nav-link">
                  <i class="nav-icon fa plus-square"></i>
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('part') }}" class="nav-link">
                  <i class="nav-icon fa plus-square"></i>
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Parts</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="{{ url('vehicle/category') }}" class="nav-link">
                  <i class="nav-icon fa plus-square"></i>
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Categories</p>
                </a>
              </li>
            </ul>
          </li> <!-- Service -->
          <!-- Service -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fa plus-square"></i>
              <p>
                Services
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('service') }}" class="nav-link">
                  <i class="nav-icon fa plus-square"></i>
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('service/category') }}" class="nav-link">
                  <i class="nav-icon fa plus-square"></i>
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('mechanic') }}" class="nav-link">
                  <i class="nav-icon fa plus-square"></i>
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Technicians</p>
                </a>
              </li>
            </ul>
          </li> <!-- Service -->
        </ul> <!-- Maintenance List -->
      </li> <!-- Maintenance -->
      <!-- Transactions -->
      <li class="nav-item  menu-open">
        <a href="#" class="nav-link">
            <i class="fa fa-exchange-alt"></i>
            <p>
              Transactions
              <i class="right fa fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <p>Appointments</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <p>Job Orders</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('inspection') }}" class="nav-link">
              <p>Inspection</p>
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