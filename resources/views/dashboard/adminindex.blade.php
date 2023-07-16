@extends('layouts.lite.admintemplate')


@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-8 mb-4 order-0">
        <div class="card">
          <div class="d-flex align-items-end row">
            <div class="col-sm-7">
              <div class="card-body">
                <h5 class="card-title text-primary">Welcome {{Auth::guard('user')->user()->name}}! 🎉</h5>
                <p class="mb-4" style="color: black">
                    @php
                        echo date('l, d-m-Y');
                    @endphp
                    <br>
                    @php
                    echo date('h:i:s a');
                    @endphp<p>
                  <span style="color: blue">Semoga Hari ini Bahagia</span>
                </p>

                             </div>
            </div>
            <div class="col-sm-5 text-center text-sm-left">
              <div class="card-body pb-0 px-0 px-md-4">
                <img
                  src="{{ asset('assets/wili/img/illustrations/man-with-laptop-light.png') }}"
                  height="140"
                  alt="View Badge User"
                  data-app-dark-img="illustrations/man-with-laptop-dark.png"
                  data-app-light-img="illustrations/man-with-laptop-light.png"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 order-1">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                        <img
                          src="{{ asset('assets/wili/img/icons/unicons/masuk.png') }}"
                          alt="Credit Card"
                          class="rounded"
                        />
                      </div>

                    </div>
                    <span>Hadir</span><br>
                    <small class="text-success fw-semibold">{{$recapData->sum_presence}}</small>
                  </div>
                </div>
              </div>
          <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img
                      src="{{ asset('assets/wili/img/icons/unicons/izin.png') }}"
                      alt="Credit Card"
                      class="rounded"
                    />
                  </div>

                </div>
                <span>Izin</span><br>
                <small class="text-info fw-semibold">{{$recapizin->jmlizin}}</small>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img
                      src="{{ asset('assets/wili/img/icons/unicons/sad.png') }}"
                      alt="Credit Card"
                      class="rounded"
                    />
                  </div>

                </div>
                <span>Sakit</span><br>
                <small class="text-warning fw-semibold">{{ $recapizin->jmlsakit }}</small>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img
                      src="{{ asset('assets/wili/img/icons/unicons/clock.gif') }}"
                      alt="Credit Card"
                      class="rounded"
                    />
                  </div>

                </div>
                <span>Terlambat</span><br>
                <small class="text-danger fw-semibold">{{ $recapData->sum_late }}</small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Total Revenue -->
    </div>
</div>






@endsection
