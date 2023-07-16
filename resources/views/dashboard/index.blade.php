@extends('layouts.template')

@section('content')

        <!-- Wallet Card -->
        <div class="section full gradientSection  ">
            <div class="in">
            <!-- Balance -->
            <div class="balance ">
                <div class="left">
                    <h1 class="total">{{Auth::guard('pegawai')->user()->nama_lengkap}}</h1>
                    <span class="title">{{Auth::guard('pegawai')->user()->bagian}}</span>

                </div>

            </div>
            <!-- * Balance -->
            <div class="section ">
                <div class="row mt-3">
                    <div class="col-6">
                        <div class="stat-box">
                            <center>
                                <div class="iconpresence">
                                    @if($todayPresence != null)
                                        @php
                                            $path = Storage::url('uploads/absensi/'.$todayPresence->foto_in);
                                        @endphp
                                        <img src="{{url($path)}}" alt="avatar" class="imaged w40">
                                    @else
                                        <ion-icon name="camera"></ion-icon>
                                    @endif
                                </div>

                            <div class="value text-success">
                                <div class="presencedetail">
                                <h4 class="presencetitle">Masuk</h4>
                                <span style="font-size: 16px">{{$todayPresence != null ? $todayPresence->jam_in : 'Belum Absen'}}</span>
                            </div>
                        </div></center>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="stat-box">
                            <center>
                                <div class="iconpresence">
                                        @if($todayPresence != null && $todayPresence->jam_out != null)
                                        @php
                                        $path = Storage::url('uploads/absensi/'.$todayPresence->foto_out);
                                    @endphp
                                    <img src="{{url($path)}}" alt="avatar" class="imaged w40">
                                @else
                                    <ion-icon name="camera"></ion-icon>
                                @endif
                                    </div>

                            <div class="value text-danger">
                                <div class="presencedetail">
                                    <h4 class="presencetitle">Pulang</h4>
                                    <span style="font-size: 16px">{{$todayPresence != null && $todayPresence->jam_out != null ? $todayPresence->jam_out : 'Belum Absen'}}</span>
                                </div>
                            </div></center>
                        </div>
                    </div>
                </div>
            </div>
            <div class="in">
                <!-- Wallet Footer -->
                <div class="wallet-inline-button mt-5">
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body text-center" style="padding: 10px 8px !important; line-height:0.8rem;">
                                <span class="badge badge-danger" style="position:absolute; top:2px; right:5px; font-size:0.7rem; z-index:999;">{{$recapData->sum_presence}}</span>
                                <ion-icon name="checkmark-circle" style="font-size: 1.4rem" class="text-success"></ion-icon><br>
                                <span style="font-size: 0.5rem">Hadir</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body text-center" style="padding: 10px 8px !important; line-height:0.8rem;">
                                <span class="badge badge-danger" style="position:absolute; top:2px; right:5px; font-size:0.7rem; z-index:999;">{{$recapizin->jmlizin }}</span>
                                <ion-icon name="remove-circle" style="font-size: 1.4rem" class="text-primary"></ion-icon><br>
                                <span style="font-size: 0.5rem">Izin</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body text-center" style="padding: 10px 8px !important; line-height:0.8rem;">
                                <span class="badge badge-danger" style="position:absolute; top:2px; right:5px; font-size:0.7rem; z-index:999;">{{$recapizin->jmlsakit }}</span>
                                <ion-icon name="sad" style="font-size: 1.4rem" class="text-warning"></ion-icon><br>
                                <span style="font-size: 0.5rem">Sakit</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body text-center" style="padding: 10px 8px !important; line-height:0.8rem;">
                                <span class="badge badge-danger" style="position:absolute; top:2px; right:5px; font-size:0.7rem; z-index:999;">{{$recapData->sum_late}}</span>
                                <ion-icon name="alarm" style="font-size: 1.4rem" class="text-danger"></ion-icon><br>
                                <span style="font-size: 0.5rem">Telat</span>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- * Wallet Footer -->
            </div>
            </div>


        @endsection


