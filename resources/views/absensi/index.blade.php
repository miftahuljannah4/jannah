@extends('layouts.template')

@section('content')
<style>
    .webcam-capture,
    .webcam-capture video{
        display: inline-block;
        width: 100% !important;
        margin: auto;
        height: auto !important;
        border-radius: 10px;
    }
    #map { height: 180px; }
    .jam-digital-malasngoding {

 background-color: #27272783;
 position: absolute;
 top: 60px;
 right: 5px;
 z-index: 9999;
 width: 100px;
 border-radius: 10px;
 padding: 5px;
 margin-top: 20px;
 margin-right: 20px;
}



.jam-digital-malasngoding p {
 color: #fff;
 font-size: 11px;
 text-align: center;
 margin-top: 0;
 margin-bottom: 0;
}
</style>
    <!-- App Header -->
    <div style="background-color: yellow" class="appHeader">
        <div class="left">
            <a href="/dashboard" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div  class="pageTitle">
            Absensi Karyawan
        </div>
        <div class="right">
        </div>
    </div>
    <!-- * App Header -->
<div class="card-body">
    <div class="row" >
        <div class="col">
            <input type="hidden" id="lokasi" >
            <div class="webcam-capture"></div>
        </div>
        <div class="jam-digital-malasngoding">
            <p id="jam"></p>
            <p>{{ $jamkerja->nama_jam }}</p>
            <p>mulai : {{ date("H:i",strtotime($jamkerja->awal_jam_masuk))  }}</p>
            <p>masuk : {{ date("H:i",strtotime($jamkerja->jam_masuk)) }}</p>
            <p>akhir : {{ date("H:i",strtotime($jamkerja->akhir_jam_masuk)) }}</p>
            <p>pulang : {{ date("H:i",strtotime($jamkerja->jam_pulang)) }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col" style="padding-top: 30px">
            @if($check > 0)
            <button id="takeabsen" class="btn btn-info btn-block"><ion-icon name="camera"></ion-icon>Absen Pulang</button>
            @else
            <button id="takeabsen" class="btn btn-primary btn-block"><ion-icon name="camera"></ion-icon>Absen Masuk</button>
            @endif
        </div>
    </div>
    <div class="row mt-3">
        <div class="col" style="padding-top: 30px">
        <div id="map" class="map"></div>
        </div>
    </div>
</div>
    <audio type="audio/mpeg" id="notif_in" src="{{asset('assets/audio/in.mp3')}}"></audio>
    <audio type="audio/mpeg" id="notif_out" src="{{asset('assets/audio/out.mp3')}}"></audio>
    <audio type="audio/mpeg" id="notif_radius" src="{{asset('assets/audio/radius.mp3')}}"></audio>

@endsection

@push('myscript')
<script type="text/javascript">
    window.onload = function() {
        jam();
    }

    function jam() {
        var e = document.getElementById('jam')
            , d = new Date()
            , h, m, s;
        h = d.getHours();
        m = set(d.getMinutes());
        s = set(d.getSeconds());

        e.innerHTML = h + ':' + m + ':' + s;

        setTimeout('jam()', 1000);
    }

    function set(e) {
        e = e < 10 ? '0' + e : e;
        return e;
    }

</script>
<script>
    var notif_in = document.getElementById('notif_in');
    var notif_out = document.getElementById('notif_out');
    var notif_radius = document.getElementById('notif_radius');

    Webcam.set({
        height:480,
        width:480,
        image_format: 'jpeg',
        jpeg_quality: 80
    });

    Webcam.attach('.webcam-capture');

    var lokasi = document.getElementById('lokasi');
    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
    }

    function successCallback(position){
        lokasi.value = position.coords.latitude +","+ position.coords.longitude;
        var map = L.map('map').setView([position.coords.latitude, position.coords.longitude], 13);
        var lokasi_kantor = "{{ $lokasi_kantor->lokasi_kantor }}";
        var lok = lokasi_kantor.split(",");
        var lat_kantor = lok[0];
        var long_kantor = lok[1];
        var radius = "{{ $lokasi_kantor->radius }}";
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {

}).addTo(map);
        var marker = L.marker([position.coords.latitude, position.coords.longitude]).addTo(map);
        //-6.517376559500617, 108.2057859
        var circle = L.circle([lat_kantor,long_kantor], {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: radius
        }).addTo(map);
    }

    function errorCallback(){

    }

    $('#takeabsen').click(function(e){
        Webcam.snap(function(uri){
            image = uri;
        });
        var lokasi = $('#lokasi').val();
        $.ajax({
            type: "POST",
            url: "/camera-snap",
            data: {
                _token: "{{csrf_token()}}",
                image:image,
                lokasi:lokasi
            },
            cache:false,
            success: function(respond){
                var status = respond.split('|');
                if(status[0] == "success"){
                    if(status[2] == "in"){
                        notif_in.play();
                    } else {
                        notif_out.play();
                    }
                    Swal.fire({
                        title: 'Success!',
                        text: status[1],
                        icon: 'success'
                    })
                    setTimeout("location.href='/dashboard'",2500);
                } else {
                    if(status[2] == "radius"){
                        notif_radius.play();
                    }
                    Swal.fire({
                        title: 'Error!',
                        text: status[1],
                        icon: 'error'
                    })
                }
            }
        });
    });


</script>
@endpush
