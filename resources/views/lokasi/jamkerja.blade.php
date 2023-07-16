@extends('layouts.lite.admintemplate')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Table Jam Kerja PT ACE MOLD TECH</h4>
    <!-- Contextual Classes -->
    <!-- Responsive Table -->
    <div class="card">
        <div class="card-body">


            @if (Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}

                </div>
            @endif
            @if (Session::get('error'))
                <div class="alert alert-danger" role="alert">

                    {{ Session::get('error') }}

                </div>
            @endif


        </div>
        <div class="card-body">
            <div class="mt-3">
            <div class="col-6">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#largeModal">
                +
            </button>
            </div>
        </div>
            <div class="table-responsive text-nowrap mt-3">
                <table class="table table-bordered" style="font-size: 11px">
                    <thead>
                        <tr class="table-warning">
                            <th>#</th>
                            <th>Nama Jam</th>
                            <th>Jam Awal Masuk</th>
                            <th>Jam Masuk</th>
                            <th>Akhir Jam Masuk</th>
                            <th>Jam Pulang</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jamkerja as $data)


                        <tr class="table-info">
                            <th>{{ $loop->iteration  }}</th>
                            <th>{{ $data->nama_jam }}</th>
                            <th>{{ $data->awal_jam_masuk }}</th>
                            <th>{{ $data->jam_masuk }}</th>
                            <th>{{ $data->akhir_jam_masuk }}</th>
                            <th>{{ $data->jam_pulang }}</th>
                            <th>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="edit" id="dropdown-item" href="#"
                                            id_jam="{{ $data->id_jam }}"><i class="bx bx-edit me-1"></i> Edit</a>
                                        <form action="/lokasi/{{ $data->id_jam }}/hapus" method="POST" >
                                            @csrf

                                            <a class="delete" id="dropdown-item"
                                            ><i
                                                class="bx bx-trash me-1"></i> Delete</a>
                                        </form>
                                    </div>
                                </div>
                            </th>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <!--/ Responsive Table -->


</div>
    <!--Modal Large-->
    <!-- Large Modal -->
    <div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-small" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Tambah Jam</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/lokasi/storejam" method="POST" id="frmPd" >
                        @csrf
                        <div class="row g-2">
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="nama_jam" class="form-label">Nama Jam</label>
                                <input type="text" id="nama_jam" name="nama_jam" class="form-control"
                                    placeholder="Nama Jam" />
                            </div>
                        </div>
                        </div>
                        <div class="row g-2">
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="awal_jam_masuk" class="form-label">Jam Awak Masuk</label>
                                <input type="time" id="awal_jam_masuk" name="awal_jam_masuk" class="form-control"
                                    placeholder="00:00:00" />
                            </div>
                        </div>
                        </div>
                        <div class="row g-2">
                            <div class="row g-2">
                                <div class="col mb-0">
                                    <label for="jam_masuk" class="form-label">Jam Masuk</label>
                                    <input type="time" id="jam_masuk" name="jam_masuk" class="form-control"
                                        placeholder="00:00:00"  />
                                </div>
                            </div>
                            </div>
                            <div class="row g-2">
                                <div class="row g-2">
                                    <div class="col mb-0">
                                        <label for="akhir_jam_masuk" class="form-label">Akhir Jam Masuk</label>
                                        <input type="time"  id="akhir_jam_masuk" name="akhir_jam_masuk" class="form-control"
                                            placeholder="00:00:00" />
                                    </div>
                                </div>
                                </div>
                                <div class="row g-2">
                                    <div class="row g-2">
                                        <div class="col mb-0">
                                            <label for="jam_pulang" class="form-label">jam Pulang</label>
                                            <input type="time" id="jam_pulang" name="jam_pulang" class="form-control"
                                                placeholder="00:00:00" />
                                        </div>
                                    </div>
                                    </div>
                        <div class="row g-2">

                            <div class="modal-footer">

                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- EDIT Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-small" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModal">Edit Jam</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="loadeditform">

                </div>
            </div>
        </div>
    </div>
@endsection

@push('myscript')
    <script>

        $(function() {
            $(".edit").click(function() {
                var id_jam = $(this).attr('id_jam');
                $.ajax({
                    type: 'POST',
                    url: '/lokasi/editjam',
                    cache: false,
                    data: {
                        _token: "{{ csrf_token() }}",
                        id_jam: id_jam
                    },
                    success: function(respone) {
                        $("#loadeditform").html(respone);
                    }
                });
                $("#editModal").modal("show");
            });
            $(".delete").click(function(e) {
                var form = $(this).closest('form');
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            });

            $("#frmPd").submit(function() {
                var nama_jam = $("#nama_jam").val();
                var awal_jam_masuk = $("#awal_jam_masuk").val();
                var jam_masuk = $("#jam_masuk").val();
                var akhir_jam_masuk =$("#akhir_jam_masuk").val();
                var jam_pulang =$("#jam_pulang").val();
                if (nama_jam == ""||awal_jam_masuk == ""||jam_masuk== ""||akhir_jam_masuk == ""||jam_pulang =="") {
                    alert('Harus Diisi semua');
                    $("#nama_jam","#awal_jam_masuk","#jam_masuk","#akhir_jam_masuk","#jam_pulang").focus();
                    return false;
                }
            });
        });
    </script>
@endpush
