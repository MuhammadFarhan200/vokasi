<form id="form_input_research" class="form" data-redirect-url="{{ route('office.fed.index') }}" action="{{ route('office.frk.store-research-implementation') }}" method="POST">
    <div class="row mb-10">
        <h4 class="mb-5">Karya Ilmiah</h4>
        <div class="col-lg-4">
            <label class="fw-semibold fs-6 mb-2">Nama Kegiatan</label>
            <input type="text" class="form-control form-control-solid mb-3" name="activity_name1" id="activity_name1">
        </div>
        <div class="col-lg-4">
            <label class="fw-semibold fs-6 mb-2">Nama Jurnal</label>
            <input type="text" class="form-control form-control-solid mb-3" name="journal_name" id="journal_name">
        </div>
        <div class="col-lg-4 mb-10">
            <label class="fw-semibold fs-6 mb-2">Tanggal Terbit</label>
            <input type="date" class="form-control form-control-solid mb-3" name="published1" id="published1">
        </div>
        <h4 class="mb-5">Hasil Penelitian</h4>
        <div class="col-lg-4">
            <label class="fw-semibold fs-6 mb-2">Nama Kegiatan</label>
            <input type="text" class="form-control form-control-solid mb-3" name="activity_name2" id="activity_name2">
        </div>
        <div class="col-lg-4">
            <label class="fw-semibold fs-6 mb-2">Jumlah Halaman</label>
            <input type="text" class="form-control form-control-solid mb-3" name="pages" id="pages">
        </div>
        <div class="col-lg-4">
            <label class="fw-semibold fs-6 mb-2">Tanggal Terbit</label>
            <input type="date" class="form-control form-control-solid mb-3" name="published2" id="published2">
        </div>
    </div>

    <div class="text-center pt-15">
        <a href="{{ route('office.frk.index') }}" class="menu-link btn btn-light me-3">Batal</a>
        <button id="tombol_simpan_research" onclick="handle_post('#tombol_simpan_research','#form_input_research');" class="btn btn-primary">
            <span class="indicator-label">Simpan</span>
            <span class="indicator-progress">Harap tunggu...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
    </div>
</form>
