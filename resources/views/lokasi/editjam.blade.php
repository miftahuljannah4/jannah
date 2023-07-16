<form action="/lokasi/{{ $jam_kerja->id_jam }}/updatejam" method="POST" id="frmPd" >
    @csrf
    <div class="row g-2">
    <div class="row g-2">
        <div class="col mb-0">
            <label for="nama_jam" class="form-label">Nama Jam</label>
            <input type="text" id="nama_jam" name="nama_jam" class="form-control"
                value="{{ $jam_kerja->nama_jam }}" />
        </div>
    </div>
    </div>
    <div class="row g-2">
    <div class="row g-2">
        <div class="col mb-0">
            <label for="awal_jam_masuk" class="form-label">Jam Awak Masuk</label>
            <input type="time" id="awal_jam_masuk" name="awal_jam_masuk" class="form-control"
            value="{{ $jam_kerja->awal_jam_masuk }}" />
        </div>
    </div>
    </div>
    <div class="row g-2">
        <div class="row g-2">
            <div class="col mb-0">
                <label for="jam_masuk" class="form-label">Jam Masuk</label>
                <input type="time" id="jam_masuk" name="jam_masuk" class="form-control"
                value="{{ $jam_kerja->jam_masuk }}" />
            </div>
        </div>
        </div>
        <div class="row g-2">
            <div class="row g-2">
                <div class="col mb-0">
                    <label for="akhir_jam_masuk" class="form-label">Akhir Jam Masuk</label>
                    <input type="time" id="akhir_jam_masuk" name="akhir_jam_masuk" class="form-control"
                    value="{{ $jam_kerja->akhir_jam_masuk }}" />
                </div>
            </div>
            </div>
            <div class="row g-2">
                <div class="row g-2">
                    <div class="col mb-0">
                        <label for="jam_pulang" class="form-label">jam Pulang</label>
                        <input type="time" id="jam_pulang" name="jam_pulang" class="form-control"
                        value="{{ $jam_kerja->jam_pulang }}" />
                    </div>
                </div>
                </div>
    <div class="row g-2">

        <div class="modal-footer">

            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>
