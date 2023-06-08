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
            <div class="card mb-5">
                <div class="card-header hover-scroll-x">
                    <ul class="nav nav-tabs nav-pills navbar-collapse flex-nowrap text-nowrap fs-5 justify-content-around border-0">
                        <li class="nav-item">
                            <a class="nav-link active px-5 py-3" data-bs-toggle="tab" href="#pendidikan">Pendidikan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-5 py-3" data-bs-toggle="tab" href="#penelitian">Penelitian</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-5 py-3" data-bs-toggle="tab" href="#pengabdian">Pengabdian Masyarakat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-5 py-3" data-bs-toggle="tab" href="#penunjang">Penunjang</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="row mb-10">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="pendidikan" role="tabpanel">
                                @include('pages.app.frk.pendidikan.main')
                            </div>
                            <div class="tab-pane fade" id="penelitian" role="tabpanel">
                                {{-- @include('pages.app.frk.research_impln.input') --}}
                                Penelitian
                            </div>
                            <div class="tab-pane fade" id="pengabdian" role="tabpanel">
                                {{-- @include('pages.app.frk.devotion_impln.input') --}}
                                Pengabdian Masyarakat
                            </div>
                            <div class="tab-pane fade" id="penunjang" role="tabpanel">
                                Penunjang
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('custom_js')
    <script type="text/javascript">
        load_teaching_frk(1);
        load_fpa_frk(1);
        load_fpt_frk(1);
        load_clp_frk(1);

        obj_select('subject_id');
        obj_select('subject_id2');
        obj_select('subject_id3');
        obj_date('testing_time');
        obj_date('published1');
        obj_date('published2');
    </script>
    @endsection
</x-office-layout>
