 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto"> 
        <!-- Notifications Dropdown Menu -->
            <button class="btn btn-dark">Logout</button>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        
        <span class="brand-text ml-3">Admin</span>
    </a>
    
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="/admin" class="nav-link {{ request()->is('admin') ? "active" : ""}}">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="/perumahan" class="nav-link {{ request()->is('perumahan') ? "active" : ""}}">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Data Perumahan
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/rumah" class="nav-link {{ request()->is('rumah') ? "active" : ""}}">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Data Rumah
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/pesanan-admin" class="nav-link {{ request()->is('pesanan-admin') ? "active" : ""}}">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Data DP
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/booking-admin" class="nav-link {{ request()->is('booking-admin') ? "active" : ""}}">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Data Booking
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/laporan" class="nav-link {{ request()->is('laporan') ? "active" : ""}}">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Laporan
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/client" class="nav-link {{ request()->is('client') ? "active" : ""}}">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Data Client
                            </p>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>