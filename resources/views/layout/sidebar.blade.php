        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" style="background:#393E46" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-solid fa-bolt"></i>
                </div>
                <div class="justify-content-center">
                    <div class="col-8">
                        <div class="sidebar-brand-text mx-0">Monitoring</div>
                    </div>
                    <div>
                        <div class="fsidebar-brand-text mx-0" style="font-size:10px">Tugas Akhir</div>
                    </div>
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading" style="color:#EEEEEE">
                <span style="font-size:15px"> Our Fitur </span>
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('magnitude') }}">
                    <i class="fas fa-solid fa-bolt" style="color:#EEEEEE; font-size:15px"></i>
                    <span style="color:#EEEEEE; font-size:15px">Magnitude</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('frequency') }}">
                    <i class="fas fa-solid fa-wave-square" style="color:#EEEEEE; font-size:15px"></i>
                    <span style="color:#EEEEEE; font-size:15px">Frekuensi</span>
                </a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('analytic') }}">
                    <i class="fas fa-solid fa-chart-line" style="color:#EEEEEE; font-size:15px"></i>
                    <span style="color:#EEEEEE; font-size:15px">Analytic</span>
                </a>
            </li>

        </ul>
        <!-- End of Sidebar -->
