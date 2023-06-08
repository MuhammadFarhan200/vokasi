{{-- <form id="form_input_edu" class="form" data-redirect-url="{{ route('office.fed.index') }}" action="{{ route('office.frk.store-education-implementation') }}" method="POST">
    <div class="row mb-10">
        <h4 class="mb-5">Pengajaran</h4>
        <div class="col-lg-4 col-md-6">
            <label class="fw-semibold fs-6 mb-2">Pilih Mata Kuliah</label>
            <select name="subject_id" id="subject_id" class="form-select form-select-solid mb-3">
                <option disabled selected>Pilih Mata Kuliah</option>
                @foreach ($subjects as $item)
                <option value="{{ $item->id }}" data-sks="{{ $item->sks }}">{{ $item->name . ' - Semester ' . $item->semester }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-4 col-md-6">
            <label class="fw-semibold fs-6 mb-2">SKS Mata Kuliah</label>
            <input type="text" class="form-control form-control-solid mb-3" name="sks" id="sks" value="" readonly>
        </div>
        <div class="col-lg-4 col-md-6 mb-10">
            <label class="fw-semibold fs-6 mb-2">Jumlah Pertemuan</label>
            <input type="text" class="form-control form-control-solid" name="meeting" id="meeting">
        </div>
        <h4 class="mb-5">Pembimbing Tugas Akhir</h4>
        <div class="col-md-6">
            <label class="fw-semibold fs-6 mb-2">Pilih Mata Kuliah</label>
            <select name="subject_id2" id="subject_id2" class="form-select form-select-solid mb-3">
                <option disabled selected>Pilih Mata Kuliah</option>
                @foreach ($subjects as $item)
                <option value="{{ $item->id }}" data-sks-2="{{ $item->sks }}">{{ $item->name . ' - Semester ' . $item->semester }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label class="fw-semibold fs-6 mb-2">Judul Kelompok</label>
            <input type="text" class="form-control form-control-solid mb-3" name="group_title" id="group_title">
        </div>
        <div class="col-12 mb-10">
            <label class="fw-semibold fs-6 mb-2">Nama Kelompok</label>
            <input id="group_name" type="hidden" name="group_name">
            <trix-editor input="group_name"></trix-editor>
        </div>
        <h4 class="mb-5">Penguji Tugas Akhir</h4>
        <div class="col-md-6">
            <label class="fw-semibold fs-6 mb-2">Judul Kelompok</label>
            <input type="text" class="form-control form-control-solid mb-3" name="group_title2" id="group_title2">
        </div>
        <div class="col-md-6">
            <label class="fw-semibold fs-6 mb-2">Waktu Pengujian</label>
            <input type="date" class="form-control form-control-solid mb-3" name="testing_time" id="testing_time">
        </div>
        <div class="col-12 mb-3">
            <label class="fw-semibold fs-6 mb-2">Nama Kelompok</label>
            <input id="group_name2" type="hidden" name="group_name2">
            <trix-editor input="group_name2"></trix-editor>
        </div>
        <div class="col-12 mb-3">
            <label class="fw-semibold fs-6 mb-2">Tim Dosen Penguji</label>
            <input id="tester_team" type="hidden" name="tester_team">
            <trix-editor input="tester_team"></trix-editor>
        </div>
        <div class="col-md-6">
            <label class="fw-semibold fs-6 mb-2">Pilih Mata Kuliah</label>
            <select name="subject_id3" id="subject_id3" class="form-select form-select-solid mb-3">
                <option disabled selected>Pilih Mata Kuliah</option>
                @foreach ($subjects as $item)
                <option value="{{ $item->id }}" data-sks-3="{{ $item->sks }}">{{ $item->name . ' - Semester ' . $item->semester }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label class="fw-semibold fs-6 mb-2">Penilaian (%)</label>
            <input type="text" class="form-control form-control-solid mb-3" name="evaluation" id="evaluation">
        </div>
    </div>

    <div class="text-center pt-15">
        <a href="{{ route('office.frk.index') }}" class="menu-link btn btn-light me-3">Batal</a>
        <button id="tombol_simpan_edu" onclick="handle_post('#tombol_simpan_edu','#form_input_edu');" class="btn btn-primary">
            <span class="indicator-label">Simpan</span>
            <span class="indicator-progress">Harap tunggu...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
    </div>
</form> --}}


<div class="d-flex align-items-center justify-content-between mb-4">
    <h4 class="fw-bold">Pengajaran</h4>
    <a href="{{ route('office.frk.teaching.create') }}" class="menu-link btn btn-sm btn-primary">Tambah</a>
</div>
<div id="list_teaching_frk" class="table-responsive"></div>

<div class="d-flex align-items-center justify-content-between  mb-4 mt-10">
    <h4 class="fw-bold">Pembimbing</h4>
    <a href="{{ route('office.frk.final-project-advisor.create') }}" class="menu-link btn btn-sm btn-primary">Tambah</a>
</div>
<div id="list_fpa_frk" class="table-responsive"></div>

<div class="d-flex align-items-center justify-content-between  mb-4 mt-10">
    <h4 class="fw-bold">Pengujian</h4>
    <a href="{{ route('office.frk.final-project-tester.create') }}" class="menu-link btn btn-sm btn-primary">Tambah</a>
</div>
<div id="list_fpt_frk" class="table-responsive"></div>

<div class="d-flex align-items-center justify-content-between  mb-4 mt-10">
    <h4 class="fw-bold">Menduduki Jabatan Pimpinan Perguruan Tinggi</h4>
    <a href="{{ route('office.frk.college-leadership-position.create') }}" class="menu-link btn btn-sm btn-primary">Tambah</a>
</div>
<div id="list_clp_frk" class="table-responsive"></div>

<div class="d-flex align-items-center justify-content-between  mb-4 mt-10">
    <h4 class="fw-bold">Membimbing Dosen yang Lebih Rendah Jabatannya</h4>
    <a href="#" class="menu-link btn btn-sm btn-primary d-none">Tambah</a>
</div>
<div class="d-flex align-items-center justify-content-between  mb-4 mt-10">
    <h4 class="fw-bold">Melaksanakan Kegiatan Pendampingan Mahasiswa di Luar Institusi Sesuai Kebijakan Kementrian</h4>
    <a href="#" class="menu-link btn btn-sm btn-primary d-none">Tambah</a>
</div>
<div class="d-flex align-items-center justify-content-between  mb-4 mt-10">
    <h4 class="fw-bold">Membimbing Kuliah Kerja Nyata, Praktek Kerja Nyata, Praktek Kerja Lapangan</h4>
    <a href="#" class="menu-link btn btn-sm btn-primary d-none">Tambah</a>
</div>
<div class="d-flex align-items-center justify-content-between  mb-4 mt-10">
    <h4 class="fw-bold">Membimbing dan ikut membimbing dalam menghasilkan disertasi, tesis, skripsi, dan laporan akhir studi yang sesuai dengan bidang tugasnya</h4>
    <a href="#" class="menu-link btn btn-sm btn-primary d-none">Tambah</a>
</div>
<div class="d-flex align-items-center justify-content-between  mb-4 mt-10">
    <h4 class="fw-bold">Bertugas Sebagai Penguji pada Ujian Akhir/Profesi</h4>
    <a href="#" class="menu-link btn btn-sm btn-primary d-none">Tambah</a>
</div>
<div class="d-flex align-items-center justify-content-between  mb-4 mt-10">
    <h4 class="fw-bold">Menyampaikan Orasi Ilmiah</h4>
    <a href="#" class="menu-link btn btn-sm btn-primary d-none">Tambah</a>
</div>
