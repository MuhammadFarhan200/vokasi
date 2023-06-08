<x-app-layout title="Pengembangan Hasil Pendidikan dan Penelitian">
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
                    <li class="breadcrumb-item">
                        <a href="{{ route('office.frk.index') }}" class="menu-link text-gray-800 text-hover-primary">FRK</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-800 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-gray-800">History</li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-800 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-gray-800">Pengembangan Hasil Pendidikan dan Penelitian</li>
                </ul>
            </div>
            {{-- <div class="d-flex align-items-center gap-2 gap-lg-3">
            </div> --}}
        </div>
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid transition-fade">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <form id="form_input" class="form" data-redirect-url="{{route('office.fed.index')}}" action="{{ route('office.fed.result-dev.update',$data->id) }}" method="PATCH">
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="row mb-10">
                            <div class="col-md-6">
                                <label class="required fw-semibold fs-6 mb-2">Nama Kegiatan</label>
                                <input type="text" class="form-control form-control-solid mb-3" value="{{ $data->name }}">
                            </div>
                            <div class="col-md-6">
                                <label class="required fw-semibold fs-6 mb-2">Loaksi Kegiatan</label>
                                <input type="text" class="form-control form-control-solid mb-3" value="{{ $data->location }}">
                            </div>
                            <div class="col-md-6 mt-4">
                                @if ($data->assignment_proof != null)
                                <a href="{{ Storage::url($data->assignment_proof) }}" target="_blank" class="menu-link btn btn-sm btn-info text-nowrap">
                                    <i class="fa-solid fa-eye"></i>
                                    Lihat Bukti Penugasan
                                </a>
                                @endif
                            </div>
                            <div class="col-md-6 mt-4">
                                @if ($data->proof != null)
                                <a href="{{ Storage::url($data->proof) }}" target="_blank" class="menu-link btn btn-sm btn-info text-nowrap">
                                    <i class="fa-solid fa-eye"></i>
                                    Lihat Bukti
                                </a>
                                @endif
                            </div>
                        </div>
                        <div class="text-center pt-15">
                            <a href="{{route('office.frk.index')}}" class="menu-link btn btn-primary me-3">Kembali</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-office-layout>
