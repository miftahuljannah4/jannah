

    <!-- App Header -->
    <div class="appHeader bg-danger text-light">
        <div class="left">
            <a class="headerButton">
                @if(!empty(Auth::guard('pegawai')->user()->foto))
                @php
                    $path = Storage::url('uploads/pegawai/'.Auth::guard('pegawai')->user()->foto);
                @endphp
                <img src="{{url($path)}}" alt="avatar" class="imaged w38">
                @else
                <img src="assets/img/sample/avatar/avatar1.jpg" alt="avatar" class="imaged w38">
                @endif
            </a>
        </div>
        <div class="pageTitle">
            <img src="assets/img/jannah.png" alt="logo" class="logo">
            Absensi PT ACE MOLD TECH
        </div>
        <div class="right">
            <a href="/Logout" class="headerButton">
                <ion-icon class="icon" name="log-out-outline"></ion-icon>
            </a>
        </div>
    </div>
    <!-- * App Header -->
