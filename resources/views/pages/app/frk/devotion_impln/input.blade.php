<form id="form_input_devotion" class="form" data-redirect-url="{{ route('office.fed.index') }}" action="{{ route('office.frk.store-devotion-implementation') }}" method="POST">
    <div class="row mb-10">
        <h4 class="mb-5">Pengembangan Hasil Pendidikan dan Penelitian</h4>
        <div class="col-lg-4">
            <label class="fw-semibold fs-6 mb-2">Nama Kegiatan</label>
            <input type="text" class="form-control form-control-solid mb-3" name="name" id="name">
        </div>
        <div class="col-lg-4">
            <label class="fw-semibold fs-6 mb-2">Loaksi Kegiatan</label>
            <input type="text" class="form-control form-control-solid mb-3" name="location" id="location">
        </div>
        <div class="col-lg-4">
            <label class="fw-semibold fs-6 mb-2">Bukti Penugasan</label>
            <input type="file" class="form-control form-control-solid" name="assignment_proof" id="assignment_proof">
        </div>
    </div>

    <div class="text-center pt-15">
        <a href="{{route('office.frk.index')}}" class="menu-link btn btn-light me-3">Batal</a>
        <button id="tombol_simpan_devotion" onclick="handle_post('#tombol_simpan_devotion','#form_input_devotion');" class="btn btn-primary">
            <span class="indicator-label">Simpan</span>
            <span class="indicator-progress">Harap tunggu...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
    </div>
</form>
