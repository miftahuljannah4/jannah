<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/admin/adminindex" class="app-brand-link">
            <img src="{{asset('assets/img/jannah.png')}}" alt="image" height="50" width="100" class="form-image">
            <span class="app-brand-text demo menu-text fw-bolder ms-2"></span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item">
            <a href="/admin/adminindex" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>



        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Pages</span>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-vector"></i>
                <div data-i18n="Account Settings">Divisi</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="/perangkatdaerah" class="menu-link">
                        <div data-i18n="Account">Divisi</div>
                    </a>
                </li>

            </ul>
        </li>
        <!-- Layouts -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-user-account"></i>
                <div data-i18n="Layouts">Karyawan</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="/pegawai" class="menu-link">
                        <div data-i18n="Without menu">Karyawan</div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Layouts -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-alarm"></i>
                <div data-i18n="Layouts">Absensi</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="/absensi/cek" class="menu-link">
                        <div data-i18n="Without menu">Absensi</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-report"></i>
                <div data-i18n="Account Settings">Laporan</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="/absensi/laporan" class="menu-link">
                        <div data-i18n="Account">Absensi Karyawan</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/absensi/laporanabsensi" class="menu-link">
                        <div data-i18n="Notifications">Laporan Absensi</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="Layouts">Setting</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="/lokasi/lokasikantor" class="menu-link">
                        <div data-i18n="Without menu">Lokasi PT</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/lokasi/jamkerja" class="menu-link">
                        <div data-i18n="Without menu">Jam Kerja</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-sad"></i>
                <div data-i18n="Layouts">Izin </div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="/absensi/izinadmin" class="menu-link">
                        <div data-i18n="Without menu">Izin Karyawan</div>
                    </a>
                </li>
            </ul>
        </li>


    </ul>
</aside>
