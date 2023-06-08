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
                <div class="card-header border-0 pt-6">
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                            <a href="{{ route('office.frk.check') }}" class="menu-link btn btn-primary">
                                <i class="fa-solid fa-plus fs-4"></i>
                                Buat FRK Baru
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0">
                    <div class="row mb-5 px-10">
                        <h3>Biodata</h3>
                    </div>
                    <div class="row mb-10">
                        <style>
                            .table-striped {
                                --bs-table-striped-bg: rgba(var(--bs-gray-200-rgb));
                            }
                        </style>
                        <div class="col-12 table-responsive">
                            <table class="table table-hover fw-semibold table-striped">
                                <tr>
                                    <td class="ps-10 py-5">Nama</td>
                                    <td>:</td>
                                    <td class="py-5">{{ $data->name }}</td>
                                </tr>
                                <tr>
                                    <td class="ps-10 py-5">NIDN</td>
                                    <td>:</td>
                                    <td class="py-5">{{ $data->nip ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td class="ps-10 py-5">Fakultas</td>
                                    <td>:</td>
                                    <td class="py-5">Fakultas Vokasi</td>
                                </tr>
                                <tr>
                                    <td class="ps-10 py-5">Program Studi</td>
                                    <td>:</td>
                                    <td class="py-5">{{ $data->position ?? '-' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card d-none">
                <div class="card-body">
                    <h3>History FRK</h3>
                    {{-- <h3 class="mt-5">Semester Ganjil</h3> --}}
                    <h5 class="mt-8">Pengajaran</h5>
                    <div id="list_teaching_history" class="table-responsive"></div>

                    <h5 class="mt-5">Pembimbing Tugas Akhir</h5>
                    <div id="list_fpa_history" class="table-responsive"></div>

                    <h5 class="mt-5">Penguji Tugas Akhir</h5>
                    <div id="list_fpt_history" class="table-responsive"></div>

                    <h5 class="mt-5">Karya Ilmiah</h5>
                    <div id="list_sf_history" class="table-responsive"></div>

                    <h5 class="mt-5">Hasil Penelitian</h5>
                    <div id="list_research_history" class="table-responsive"></div>

                    <h5 class="mt-5">Pengembangan Hasil Pendidikan dan Penelitian</h5>
                    <div id="list_rd_history" class="table-responsive"></div>
                </div>
            </div>
        </div>
    </div>
    @section('custom_js')
    <script>
        load_teaching_history(1);
        load_fpa_history(1);
        load_fpt_history(1);
        load_research_history(1);
        load_sf_history(1);
        load_rd_history(1);
    </script>
    @endsection
</x-office-layout>
