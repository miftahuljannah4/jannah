<!-- App Bottom Menu -->
<div class="appBottomMenu">
    <a href="{{route('dashboard')}}" class="item {{request()->is('dashboard') ? 'active' : ''}}" class="item active">
        <div class="col">
            <ion-icon name="home-outline"></ion-icon>
            <strong>Dashboard</strong>
        </div>
    </a>
    <a href="{{route('absensi-history')}}" class="item" {{request()->is('absensi-history') ? 'active' : ''}}" class="item active">
        <div class="col">
            <ion-icon name="calendar-number-outline"></ion-icon>
            <strong>history</strong>
        </div>
    </a>

    <a href="{{route('camera')}}" class="item">
        <div class="col">
            <ion-icon name="camera"></ion-icon>
            <strong>Camera</strong>
        </div>
    </a>
    <a href="{{route('absensi-izin')}}" class="item" {{request()->is('absensi-izin') ? 'active' : ''}}" class="item active">
        <div class="col">
            <ion-icon name="document-text-outline"></ion-icon>
            <strong>Izin</strong>
        </div>
    </a>

    <a href="{{route('edit-profile')}}" class="item" {{request()->is('edit-profile') ? 'active' : ''}}>
        <div class="col">
            <ion-icon name="settings-outline"></ion-icon>
            <strong>Settings</strong>
        </div>
    </a>
</div>
<!-- * App Bottom Menu -->
