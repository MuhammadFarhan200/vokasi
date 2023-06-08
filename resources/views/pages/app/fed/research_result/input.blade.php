<x-app-layout title="Hasil Penelitian">
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
                    <li class="breadcrumb-item text-gray-800">Hasil Penelitian</li>
                </ul>
            </div>
            {{-- <div class="d-flex align-items-center gap-2 gap-lg-3">
            </div> --}}
        </div>
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid transition-fade">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <form id="form_input" class="form" data-redirect-url="{{route('office.fed.index')}}" action="{{ route('office.fed.research-result.update',$data->id) }}" method="PATCH">
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="row mb-10">
                            <div class="col-lg-4">
                                <label class="required fw-semibold fs-6 mb-2">Nama Kegiatan</label>
                                <input type="text" class="form-control form-control-solid mb-3" name="activity_name2" id="activity_name2" value="{{ $data->name }}">
                            </div>
                            <div class="col-lg-4">
                                <label class="required fw-semibold fs-6 mb-2">Jumlah Halaman</label>
                                <input type="text" class="form-control form-control-solid mb-3" name="pages" id="pages" value="{{ $data->pages }}">
                            </div>
                            <div class="col-lg-4">
                                <label class="required fw-semibold fs-6 mb-2">Tanggal Terbit</label>
                                <input type="date" class="form-control form-control-solid mb-3" name="published2" id="published2" value="{{ $data->published }}">
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
</x-office-layout>
