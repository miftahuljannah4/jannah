@extends('layouts.lite.admintemplate')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Laporan Pegawai</h4>
    <!-- Contextual Classes -->
    <!-- Responsive Table -->
    <div class="card">
        <div class="card-body">
            <form action="/absensi/printlaporan" target="_blank" method="POST">
                @csrf
                <div class="row">
                    <div class="col-4 mt-3">
                        <div class="form-group">
                            <select name="bulan" id="bulan" class="form-select form-select-sm">
                                <option value="">Bulan</option>
                                @for($i=1; $i<=12; $i++)
                                <option value="{{$i}}" {{ date('m') == $i ? 'selected' : ''}}>{{$monthName[$i]}}</option>
                            @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4">
                        <div class="form-group">
                            <select name="tahun" id="tahun" class="form-select form-select-sm">
                                <option value="">Tahun</option>
                                @php
                                $startYear = 2022;
                                $endYear = date('Y');
                            @endphp
                            @for($tahun=$startYear; $tahun<=$endYear; $tahun++)
                                <option value="{{$tahun}}" {{ date('Y') == $tahun ? 'selected' : ''}}>{{$tahun}}</option>
                            @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4">
                        <div class="form-group">
                            <select name="nik" id="nik" class="form-select form-select-sm">
                                <option value="">Pilih Karyawan</option>
                                @foreach ($pegawai as $item)
                                    <option value="{{ $item->nik }}">{{ $item->nama_lengkap }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-3" style="padding-left: 70px">
                    <div class="col-1">
                        <div class="form-group">
                            <button type="submit" class="btn rounded-pill btn-icon btn-dark">
                                <span class="tf-icons bx bx-printer"></span>
                              </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
