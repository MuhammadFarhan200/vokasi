<x-app-layout title="Forum Rencana Kerja Dosen (FRK)">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6 transition-fade">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Forum Rencana Kerja Dosen (FRK)</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-gray-800">FRK</li>
                </ul>
            </div>
            {{-- <div class="d-flex align-items-center gap-2 gap-lg-3">
            </div> --}}
        </div>
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid transition-fade">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <form id="form_input" class="form" data-redirect-url="{{ route('office.frk.menu') }}" action="{{ route('office.frk.check-result') }}" method="POST">
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="row mb-10">
                            <div class="col-sm-6">
                                <label class="required fw-semibold fs-6 mb-2">Pilih Tahun Ajaran</label>
                                <select name="year" id="year_check" class="form-select form-select-solid">
                                    <option value="2020/2021">2020/2021</option>
                                    <option value="2021/2022">2021/2022</option>
                                    <option value="2022/2023">2022/2023</option>
                                    <option value="2023/2024">2023/2024</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label class="required fw-semibold fs-6 mb-2">Pilih Semester</label>
                                <select name="semester" id="semester" class="form-select form-select-solid">
                                    <option value="ganjil">Ganjil</option>
                                    <option value="genap">Genap</option>
                                </select>
                            </div>
                        </div>
                        <div class="text-center pt-15">
                            <a href="{{route('office.frk.index')}}" class="menu-link btn btn-light me-3">Batal</a>
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
    <script type="text/javascript">
        obj_select('year_check');
        obj_select('semester');
    </script>
    @endsection
</x-office-layout>
