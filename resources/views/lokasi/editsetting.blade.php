@extends('layouts.lite.admintemplate')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Table Karyawan PT ACE MOLD TECH</h4>
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
                <div class="table-responsive text-nowrap mt-3">
                    <table class="table table-bordered" >
                        <thead>
                            <tr class="table-warning">
                                <th>NIK</th>
                                <th>NAMA LENGKAP</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr >
                                    <th>{{ $karyawan->nik_karyawan }}</th>
                                    <th>{{ $karyawan->nama_lengkap }}</th>
                                </tr>
                        </tbody>
                    </table>
                    <div class="row">
                    <div class="col-md-5 mt-3">
                        <form action="/lokasi/updatesetting" method="POST">
                            @csrf
                            <input type="hidden" name="nik" value="{{ $karyawan->nik }}">
                        <table class="table" style="font-size: 11px">
                            <thead>
                                <tr class="table-info">
                                    <th>HARI</th>
                                    <th>JAM KERJA</th>
                                </tr>
                            </thead>
                            <tbody>
                                   @foreach ($setjamkerja as $item)
                                   <tr >
                                    <th>{{ $item->hari }}
                                        <input type="hidden" name="hari[]" value="{{ $item->hari }}">
                                    </th>
                                    <th> <select name="id_jam[]" id="id_jam" class="form-select">
                                        <option>-pilih-</option>
                                        @foreach ($jam_kerja as $data)
                                            <option {{ $data->id_jam==$item->id_jam ? 'selected' : '' }}
                                                value="{{ $data->id_jam }}">{{ $data->nama_jam }}</option>
                                        @endforeach
                                    </select>
                                </th>
                                   </tr>
                                   @endforeach
                            </tbody>
                        </table>
                        <button class="btn btn-primary col-12 mt-3 mb-3">Update</button>
                    </form>
                    </div>
                    <div class="col-md-7 mt-3">
                        <table class="table table-bordered"  style="font-size: 11px">
                            <thead>
                                <tr class="table-success">
                                    <th>Nama Jam</th>
                                    <th>Awal Jam Masuk</th>
                                    <th>Jam Masuk</th>
                                    <th>Akhir Jam Masuk</th>
                                    <th>Jam Pulang</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jam_kerja as $data)


                                    <tr >
                                        <th>{{ $data->nama_jam }}</th>
                                        <th>{{ $data->awal_jam_masuk }}</th>
                                        <th>{{ $data->jam_masuk }}</th>
                                        <th>{{ $data->akhir_jam_masuk }}</th>
                                        <th>{{ $data->jam_pulang }}</th>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!--/ Responsive Table -->


    </div>
@endsection
