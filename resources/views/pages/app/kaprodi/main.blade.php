<x-app-layout title="Forum Evaluasi Dosen (FED)">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6 transition-fade">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Forum Evaluasi Dosen (FED)</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{route('office.dashboard.index')}}" class="menu-link text-muted text-hover-primary">Dasbor</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">FED</li>
                </ul>
            </div>
        </div>
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid transition-fade">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="card mb-5">
                <div class="card-body ">
                    <h4>Keterangan</h4>
                    <div class="row">
                        <div class="col-sm-4">
                            <table class="table d-sm-table-cell">
                                <tr>
                                    <td class="fw-bold fs-5">TM</td>
                                    <td>:</td>
                                    <td class="fs-5">Tidak Memenuhi</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold fs-5 pt-0">M</td>
                                    <td class="pt-0">:</td>
                                    <td class="fs-5 pt-0">Memenuhi</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-sm-4">
                            <table class="table d-sm-table-cell">
                                <tr>
                                    <td class="fw-bold fs-5">DS</td>
                                    <td>:</td>
                                    <td class="fs-5">Disetujui</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold fs-5 pt-0">KL</td>
                                    <td class="pt-0">:</td>
                                    <td class="fs-5 pt-0">Kurang Lengkap</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-sm-4">
                            <table class="table d-sm-table-cell">
                                <tr>
                                    <td class="fw-bold fs-5">TD</td>
                                    <td>:</td>
                                    <td class="fs-5">Tidak Disetujui</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-5">
                <div class="card-header border-0 pt-6">
                    <h4 class="mb-5">Pengajaran</h4>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
                            <div class="fw-bold me-5">
                            <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected</div>
                            <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete Selected</button>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div id="list_teaching_kaprodi" class="table-responsive"></div>
                </div>
            </div>
            <div class="card mb-5">
                <div class="card-header border-0 pt-6">
                    <h4 class="mb-5">Pembimbing Tugas Akhir</h4>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
                            <div class="fw-bold me-5">
                            <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected</div>
                            <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete Selected</button>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div id="list_fpa_kaprodi" class="table-responsive"></div>
                </div>
            </div>
            <div class="card mb-5">
                <div class="card-header border-0 pt-6">
                    <h4 class="mb-5">Penguji Tugas Akhir</h4>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
                            <div class="fw-bold me-5">
                            <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected</div>
                            <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete Selected</button>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div id="list_fpt_kaprodi" class="table-responsive"></div>
                </div>
            </div>
            <div class="card mb-5">
                <div class="card-header border-0 pt-6">
                    <h4 class="mb-5">Karya Ilmiah</h4>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
                            <div class="fw-bold me-5">
                            <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected</div>
                            <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete Selected</button>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div id="list_sf_kaprodi" class="table-responsive"></div>
                </div>
            </div>
            <div class="card mb-5">
                <div class="card-header border-0 pt-6">
                    <h4 class="mb-5">Hasil Penelitian</h4>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
                            <div class="fw-bold me-5">
                            <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected</div>
                            <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete Selected</button>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div id="list_research_kaprodi" class="table-responsive"></div>
                </div>
            </div>
            <div class="card mb-5">
                <div class="card-header border-0 pt-6">
                    <h4 class="mb-5">Pengembangan Hasil Pendidikan dan Penelitian</h4>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
                            <div class="fw-bold me-5">
                            <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected</div>
                            <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete Selected</button>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div id="list_rd_kaprodi" class="table-responsive"></div>
                </div>
            </div>
        </div>
    </div>
    @section('custom_js')
        <script>
            load_teaching_kaprodi(1);
            load_fpa_kaprodi(1);
            load_fpt_kaprodi(1);
            load_research_kaprodi(1);
            load_sf_kaprodi(1);
            load_rd_kaprodi(1);
        </script>
    @endsection
</x-app-layout>
