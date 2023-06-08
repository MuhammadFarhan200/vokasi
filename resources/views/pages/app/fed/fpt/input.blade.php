<x-app-layout title="Penguji Tugas Akhir">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6 transition-fade">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Forum Evaluasi Dosen (FED)</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item">
                        <a href="{{route('office.dashboard.index')}}" class="menu-link text-gray-800 text-hover-primary">Dasbor</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-800 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-gray-800">FED</li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-800 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-gray-800">Penguji Tugas Akhir</li>
                </ul>
            </div>
            {{-- <div class="d-flex align-items-center gap-2 gap-lg-3">
            </div> --}}
        </div>
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid transition-fade">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <form id="form_input" class="form" data-redirect-url="{{route('office.fed.index')}}" action="{{ route('office.fed.fpt.update',$data->id) }}" method="PATCH">
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="row mb-10">
                            <div class="col-md-6">
                                <label class="required fw-semibold fs-6 mb-2">Judul Kelompok</label>
                                <input type="text" class="form-control form-control-solid mb-3" name="group_title2" id="group_title2" value="{{ $data->group_title }}">
                            </div>
                            <div class="col-md-6">
                                <label class="required fw-semibold fs-6 mb-2">Waktu Pengujian</label>
                                <input type="date" class="form-control form-control-solid mb-3" name="testing_time" id="testing_time" value="{{ $data->testing_time }}">
                            </div>
                            <div class="col-md-6">
                                <label class="required fw-semibold fs-6 mb-2">Pilih Mata Kuliah</label>
                                <select name="subject_id" id="subject_id" class="form-select form-select-solid mb-3">
                                    <option disabled selected>Pilih Mata Kuliah</option>
                                    @foreach ($subjects as $item)
                                        <option value="{{ $item->id }}" {{ $data->subject_id == $item->id ? 'selected' : '' }} data-sks="{{ $item->sks }}">{{ $item->name . ' - Semester ' . $item->semester }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="required fw-semibold fs-6 mb-2">Penilaian (%)</label>
                                <input type="text" class="form-control form-control-solid mb-3" name="evaluation" id="evaluation" value="{{ $data->evaluation }}">
                            </div>
                            <div class="col-12 mb-3">
                                <label class="required fw-semibold fs-6 mb-2">Nama Kelompok</label>
                                <input id="group_name2" type="hidden" name="group_name2" value="{{ $data->group_name }}">
                                <trix-editor input="group_name2"></trix-editor>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="required fw-semibold fs-6 mb-2">Tim Dosen Penguji</label>
                                <input id="tester_team" type="hidden" name="tester_team" value="{{ $data->tester_team }}">
                                <trix-editor input="tester_team"></trix-editor>
                            </div>
                            <div class="col-md-6">
                                <label class="required fw-semibold fs-6 mb-2">Upload Bukti</label>
                                <input type="file" class="form-control form-control-solid mb-3" name="proof" id="proof">
                            </div>
                        </div>
                        <div class="text-center pt-15">
                            <a href="{{route('office.fed.index')}}" class="menu-link btn btn-light me-3">Batal</a>
                            <button id="tombol_simpan" onclick="handle_post('#tombol_simpan','#form_input');" class="btn btn-primary">
                                <span class="indicator-label">Kirim</span>
                                <span class="indicator-progress">Harap tunggu...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @section('custom_js')
    <script>
        obj_select('subject_id')
        obj_date('testing_time')
    </script>
    @endsection
</x-office-layout>
