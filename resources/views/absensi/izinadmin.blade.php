@extends('layouts.lite.admintemplate')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Izin Karywawan</h4>
    <!-- Contextual Classes -->
    <!-- Responsive Table -->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered" style="font-size: 11px">
                    <thead>
                        <tr style="background-color: aliceblue">
                            <th>#</th>
                            <th>NIK</th>
                            <th>Nama Lengkap</th>
                            <th>Tanggal Izin</th>
                            <th>Izin/Sakit</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($izinsakit as $data)
                            <tr>
                                <th>{{ $loop->iteration  }}</th>
                                <th>{{ $data->nik }}</th>
                                <th>{{ $data->nama_lengkap }}</th>
                                <th>{{ date('d-F-Y',strtotime($data->tgl_izin)) }}</th>
                                <th>{{ $data->status == "i" ? "Izin" : "Sakit" }}</th>
                                <th>{{ $data->keterangan }}</th>
                                <th>
                                    @if ($data->status_approved ==1)
                                    <span class="badge bg-label-success">Accept</span>
                                    @elseif ($data->status_approved ==2)
                                    <span class="badge bg-label-danger">Reject</span>
                                    @else
                                    <span class="badge bg-label-warning">Pending</span>
                                    @endif
                                </th>
                                <th>
                                    @if ($data->status_approved == 0)
                                    <a href="#" id="approved" class="btn btn-icon btn-primary" id_izin="{{ $data->id }}">
                                        <span style="color: white" class="tf-icons bx bxs-hand-up"></span>
                                    </a>
                                    @else
                                    <a href="/absensi/{{ $data->id }}/batalapprove" class="btn btn-icon btn-danger">
                                        <span style="color: white" class="tf-icons bx bx-x-circle"></span>
                                    </a>
                                    @endif
                                </th>

                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-showaction" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-showaction">Approved</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/absensi/approved" method="POST">
                    @csrf
                <input type="hidden" id="id_izin_form" name="id_izin_form">
                <div class="row">
                    <div class="col mb-3">
                      <div class="form-check mt-3">
                        <input
                          name="status_approved"
                          class="form-check-input"
                          type="radio"
                          value="1"
                          id="status_approved"
                        />
                        <label class="form-check-label" for="defaultRadio1"> Accept </label>
                      </div>
                      <div class="form-check">
                        <input
                          name="status_approved"
                          class="form-check-input"
                          type="radio"
                          value="2"
                          id="status_approved"
                          checked
                        />
                        <label class="form-check-label" for="defaultRadio2"> Reject </label>
                      </div>
                    </div>
                  </div>
                  <div class="col m-3">
                  <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('myscript')
<script>
    $(function(){
        $("#approved").click(function(e){
            e.preventDefault();
            var id_izin =$(this).attr('id_izin');
            $("#id_izin_form").val(id_izin);
            $("#modal-showaction").modal("show");
        });
    });

</script>
@endpush
