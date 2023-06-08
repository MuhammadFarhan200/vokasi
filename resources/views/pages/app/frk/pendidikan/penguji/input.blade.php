<x-app-layout title="{{$data->id ? 'Perbarui' : 'Tambah'}} Penguji">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6 transition-fade">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Penguji</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item">
                        <a href="{{route('office.dashboard.index')}}" class="menu-link text-gray-800 text-hover-primary">Dasbor</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-800 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-gray-800">{{$data->id ? 'Perbarui' : 'Tambah'}}</li>
                </ul>
            </div>
        </div>
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid transition-fade">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <form id="form_input" class="form" data-redirect-url="{{route('office.frk.menu')}}" action="{{$data->id ? route('office.frk.final-project-tester.update',$data->id) : route('office.frk.final-project-tester.store')}}" method="{{$data->id ? 'PATCH' : 'POST'}}">
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="row mb-10">
                            <div class="col-md-6">
                                <label class="fw-semibold fs-6 mb-2">Nama Kegiatan</label>
                                <input type="text" class="form-control form-control-solid mb-3" name="activity_name" id="activity_name" value="{{ $data->activity_name }}">
                            </div>
                            <div class="col-md-6">
                                <label class="fw-semibold fs-6 mb-2">Komponen yang Diuji</label>
                                <select name="tested_component_id" id="tested_component_id" class="form-select form-select-solid mb-3">
                                    <option disabled selected>Komponen yang Dibimbing</option>
                                    @foreach ($komponen as $item)
                                    <option value="{{ $item->id }}" {{ $data->tested_component_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-10">
                                <label class="fw-semibold fs-6 mb-2">Posisi Penguji</label>
                                <select name="tester_position_id" id="tester_position_id" class="form-select form-select-solid mb-3">
                                    <option disabled selected>Komponen yang Dibimbing</option>
                                    @foreach ($position as $item)
                                    <option value="{{ $item->id }}" {{ $data->tester_position_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-10">
                                <label class="fw-semibold fs-6 mb-2">Judul Kelompok Pengujian</label>
                                <input type="text" class="form-control form-control-solid" name="group_title" id="group_title" value="{{ $data->group_title }}">
                            </div>
                            <div class="col-md-6 mb-10">
                                <label class="fw-semibold fs-6 mb-2">Jumlah SKS</label>
                                <input type="number" class="form-control form-control-solid" name="sks" id="sks" value="{{ $data->sks }}">
                            </div>
                            <div class="col-md-6 {{ $data->id ?? 'd-none' }}">
                                <label class="required fw-semibold fs-6 mb-2">Upload Bukti</label>
                                <input type="file" class="form-control form-control-solid mb-3" name="proof" id="proof">
                            </div>
                        </div>
                        <div class="text-center pt-15">
                            <a href="{{route('office.frk.menu')}}#pendidikan" class="menu-link btn btn-light me-3">Batal</a>
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

    @section('custom_js')
    <script>
        obj_select("tested_component_id");
        obj_select("tester_position_id");
    </script>
    @endsection
</x-office-layout>
