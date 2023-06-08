<x-app-layout title="{{$data->id ? 'Perbarui' : 'Tambah'}} Menduduki Jabatan Pimpinan Perguruan Tinggi">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6 transition-fade">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Menduduki Jabatan Pimpinan Perguruan Tinggi</h1>
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
            <form id="form_input" class="form" data-redirect-url="{{route('office.frk.menu')}}" action="{{$data->id ? route('office.frk.college-leadership-position.update',$data->id) : route('office.frk.college-leadership-position.store')}}" method="{{$data->id ? 'PATCH' : 'POST'}}">
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="row mb-10">
                            <div class="col-lg-4 col-md-6">
                                <label class="fw-semibold fs-6 mb-2">Nama Posisi</label>
                                <input type="text" class="form-control form-control-solid mb-3" name="position_name" id="position_name" value="{{ $data->position_name }}">
                            </div>
                            <div class="col-lg-4 col-md-6 mb-10">
                                <label class="fw-semibold fs-6 mb-2">Harapan Waktu Menjabat</label>
                                <input type="text" class="form-control form-control-solid" name="expectation_time" id="expectation_time" value="{{ $data->expectation_time }}">
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <label class="fw-semibold fs-6 mb-2">SKS</label>
                                <input type="number" class="form-control form-control-solid mb-3" name="sks" id="sks" value="{{ $data->sks }}">
                            </div>
                            <div class="col-md-6 {{ $data->id ?? 'd-none' }}">
                                <label class="required fw-semibold fs-6 mb-2">Upload Bukti</label>
                                <input type="file" class="form-control form-control-solid mb-3" name="proof" id="proof">
                            </div>
                        </div>
                        <div class="text-center pt-15">
                            <a href="{{route('office.frk.menu')}}" class="menu-link btn btn-light me-3">Batal</a>
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
        obj_select('subject_id');

        if ($('#subject_id').length > 0) {
            $('#subject_id').on('change', function() {
                $('#sks').val($('#subject_id option:selected').attr('data-sks'));
            });
        }
    </script>
    @endsection
</x-office-layout>
