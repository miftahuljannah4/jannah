@extends('layouts.lite.admintemplate')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Table Divisi</h4>
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
                    <button style="float: right" type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#largeModal">
                        +
                    </button>
                </div>
                <div class="col-6">
                    <form action="/perangkatdaerah" method="GET" class="mb-2">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-search fs-4 lh-0"></i></span>
                            <input type="text" name="nama_pd" id="nama_pd" class="form-control"
                                placeholder="Nama Departemen" aria-label="Nama Departemen"
                                aria-describedby="basic-icon-default-email2" />
                        </div>

                    </form>
                </div>


                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered" style="font-size: 11px">
                        <thead>
                            <tr class="table-warning">
                                <th>#</th>
                                <th>ID DIVISI</th>
                                <th>NAMA DIVISI</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pd as $data)


                                <tr class="table-info">
                                    <th>{{ $loop->iteration  }}</th>
                                    <th>{{ $data->id_pd }}</th>
                                    <th>{{ $data->nama_pd }}</th>

                                    <th>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="edit" id="dropdown-item" href="#"
                                                    id_pd="{{ $data->id_pd }}"><i class="bx bx-edit me-1"></i> Edit</a>
                                                <form action="/perangkatdaerah/{{ $data->id_pd }}/delete" method="POST" >
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
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Tambah Divisi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/perangkatdaerah/createstore" method="POST" id="frmPd" >
                        @csrf
                        <div class="row g-2">
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="nik" class="form-label">ID DIVISI</label>
                                <input type="text" id="id_pd" name="id_pd" class="form-control"
                                    placeholder="ID DIVISI" />
                            </div>
                        </div>
                        </div>
                        <div class="row g-2">
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="nama_pd" class="form-label">NAMA DIVISI</label>
                                <input type="text" id="nama_pd" name="nama_pd" class="form-control"
                                    placeholder="DIVISI" />
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
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModal">Edit Divisi</h5>
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
                var id_pd = $(this).attr('id_pd');
                $.ajax({
                    type: 'POST',
                    url: '/perangkatdaerah/editpd',
                    cache: false,
                    data: {
                        _token: "{{ csrf_token() }}",
                        id_pd: id_pd
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
                var id_pd = $("#id_pd").val();
                var nama_pd = $("#nama_pd").val();
                if (id_pd == null||id_pd == "") {
                    alert('ID Harus Diisi');
                    $("#id_pd").focus();
                    return false;
                }


            });
        });
    </script>
@endpush
