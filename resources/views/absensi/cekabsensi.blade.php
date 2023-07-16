@extends('layouts.lite.admintemplate')


@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Absensi Monitoring</h4>
        <!-- Contextual Classes -->
        <!-- Responsive Table -->
        <div class="card">
            <div class="card-body">

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                            <input type="text" value="{{ date("Y-m-d") }}" class="form-control" id="tanggal" name="tanggal" value="" placeholder="tanggal"/>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered" style="font-size: 11px">
                            <thead>
                                <tr class="table-info">
                                    <th>#</th>
                                    <th>NIK</th>
                                    <th>Nama Pegawai</th>
                                    <th>Divisi</th>
                                    <th>Nama Jam</th>
                                    <th>Jadwal</th>
                                    <th>Foto IN</th>
                                    <th>Jam OUT</th>
                                    <th>Foto OUT</th>
                                    <th>Keterangan</th>
                                    <th>Lokasi</th>
                                </tr>
                            </thead>
                            <tbody id="loadAbsensi">

                            </tbody>
                        </table>
                    </div>

                </div>

            </div>

        </div>
        <!--/ Responsive Table -->


    </div>
    <!-- EDIT Modal -->
    <div class="modal fade" id="modal-showmap" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-showmap">Lokasi Absensi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="loadmap">

                </div>
            </div>
        </div>
    </div>
@endsection

@push('myscript')
    <script>
        $(function() {

            $( "#tanggal" ).datepicker({
                autoclose: true,
        todayHighlight: true,
        format:'yyyy-mm-dd'
            });
            function loadAbsensi(){
                var tanggal = $('#tanggal').val();
                //alert(tanggal);
                $.ajax({
                    type: 'POST',
                    url:'/cekdata',
                    cache:false,
                    data :{
                        _token: "{{ csrf_token() }}",
                        tanggal:tanggal,
                    },
                    success: function(respone) {
                        $("#loadAbsensi").html(respone);
                    }
                });
            }
            $("#tanggal").change(function(e) {
                loadAbsensi();
            });
            loadAbsensi();
        });
    </script>
@endpush
