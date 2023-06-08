<x-app-layout title="{{$data->id ? 'Perbarui' : 'Tambah'}} Buku">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6 transition-fade">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Buku</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item">
                        <a href="{{route('office.dashboard.index')}}" class="menu-link text-gray-800 text-hover-primary">Dasbor</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-800 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-gray-800">{{ $dosen->name }}</li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-800 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-gray-800">Buku</li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-800 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-gray-800">{{$data->id ? 'Perbarui' : 'Tambah'}}</li>
                </ul>
            </div>
            {{-- <div class="d-flex align-items-center gap-2 gap-lg-3">
            </div> --}}
        </div>
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid transition-fade">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <form id="form_input" class="form" data-redirect-url="{{route('office.dosen.book.index')}}" action="{{$data->id ? route('office.dosen.book.update', $data->id) : route('office.dosen.book.store')}}" method="{{$data->id ? 'PATCH' : 'POST'}}">
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="row mb-10">
                            <input type="hidden" name="user_id" id="user_id" value="{{ $dosen->id }}">
                            <div class="col-12">
                                <label class="required fw-semibold fs-6 mb-2">Judul Buku</label>
                                <input type="text" class="form-control form-control-solid mb-3" name="title" id="title" value="{{$data->title}}">
                            </div>
                            <div class="col-6">
                                <label class="required fw-semibold fs-6 mb-2">Tahun</label>
                                <input type="text" class="form-control form-control-solid number_only mb-3" name="year" id="year" value="{{$data->year}}">
                            </div>
                            <div class="col-6">
                                <label class="required fw-semibold fs-6 mb-2">Penerbit</label>
                                <input type="text" class="form-control form-control-solid mb-3" name="published" id="published" value="{{$data->published}}">
                            </div>
                            <div class="col-12">
                                <label class="required fw-semibold fs-6 mb-2">Deskripsi</label>
                                <input id="desc" type="hidden" name="desc" value="{{ $data->desc }}">
                                <trix-editor input="desc"></trix-editor>
                            </div>
                        </div>
                        <div class="text-center pt-15">
                            <a href="{{route('office.dosen.book.index')}}" class="menu-link btn btn-light me-3">Batal</a>
                            <button id="tombol_simpan" onclick="handle_post('#tombol_simpan','#form_input');" class="btn btn-primary">
                                <span class="indicator-label">Simpan</span>
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
