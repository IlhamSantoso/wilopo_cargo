<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('pengajuan-cuti.index') }}">
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Pengajuan Cuti</span>
            </a>
        </li>

        @if (Auth::user()->role == 'ADMIN' || Auth::user()->role == 'HR')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('data-pengajuan-cuti.index') }}">
                    <i class="mdi mdi-chart-pie menu-icon"></i>
                    <span class="menu-title">Data Pengajuan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                    <i class="mdi mdi-database menu-icon"></i>
                    <span class="menu-title">Managemen</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="auth">
                    <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('data-master-cuti.index') }}"> Data Master Cuti </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('managemen-karyawan.index') }}"> Managemen Karyawan </a></li>
                    </ul>
                </div>
            </li>
        @endif
    </ul>
</nav>