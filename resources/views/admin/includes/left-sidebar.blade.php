
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/admin/dashboard" class="brand-link">
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
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="/admin/dashboard" class="nav-link active">
            <i class="nav-icon fa fa-dashboard"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <div>
          <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link">
            <i class="nav-icon fa plus-square"></i>
            <p>
              MAINTENANCE
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa plus-square"></i>
                <span><p>CUSTOMERS</p></span>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/maintenance/vehicle/vehicles" class="nav-link">
                <i class="nav-icon fa plus-square"></i>
                <span><p>VEHICLES</p></span>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/maintenance/part/parts" class="nav-link">
                <i class="nav-icon fa plus-square"></i>
                <span><p>PARTS</p></span>
              </a>
            </li>  
          <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link">
            <i class="nav-icon fa plus-square"></i>
            <p>
              SERVICE
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('category') }}" class="nav-link">
                <i class="nav-icon fa plus-square"></i>
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Category</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('service') }}" class="nav-link">
                <i class="nav-icon fa plus-square"></i>
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Service</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('mechanic') }}" class="nav-link">
                <i class="nav-icon fa plus-square"></i>
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Technician</p>
              </a>
            </li>
          </ul>
        </div>
        <div>
          <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link">
            <i class="nav-icon fa plus-square"></i>
            <p>
              TRANSACTION
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Appointment</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Job Order</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Check-up</p>
              </a>
            </li>
          </ul>
        </li>
      </div>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<!-- /footer--->


  <!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
