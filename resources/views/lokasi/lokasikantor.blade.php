@extends('layouts.lite.admintemplate')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Lokasi PT ACE MOLD TECH</h4>
    <!-- Contextual Classes -->
    <!-- Responsive Table -->
    <div class="row">
    <div class="col-md-6">
        <div class="card mb-4">


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
        <h5 class="card-header">Update Lokasi Kantor</h5>
          <div class="card-body demo-vertical-spacing demo-only-element">
            <form action="/lokasi/updatelokasi" method="POST">
                @csrf
                <label class="form-label" for="basic-default-password12">Lokasi Absensi/lat,long</label>
            <div class="input-group">
              <span class="input-group-text" id="basic-addon11">@</span>
              <input
                type="text"
                name="lokasi_kantor"
                id="lokasi_kantor"
                class="form-control"
                placeholder="lokasi_kantor"
                value="{{ $lokasi_kantor->lokasi_kantor }}"
                aria-label="Username"
                aria-describedby="basic-addon11"
              />
            </div>
            <div class="form-password-toggle">
            <label class="form-label" for="basic-default-password12">Radius/m</label>
            <div class="input-group">
                <span class="input-group-text" id="basic-addon11">@</span>
                <input
                  type="text"
                  class="form-control"
                  name="radius"
                  id="radius"
                  value="{{ $lokasi_kantor->radius }}"
                  placeholder="radius"
                  aria-label="Username"
                  aria-describedby="basic-addon11"
                />
              </div>
              <div class="demo-inline-spacing">
                <button type="submit" class="btn btn-primary">
                  <span class="tf-icons bx bx-pie-chart-alt"></span>&nbsp; Update lokasi
                </button>
              </div>
        </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
