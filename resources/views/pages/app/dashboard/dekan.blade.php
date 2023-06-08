<x-app-layout title="Dekan Dasbor">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6 transition-fade">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Dashboard</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item">
                        <a href="{{route('office.dashboard.index')}}" class="menu-link text-gray-800 text-hover-primary">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-800 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-gray-800">Dekan</li>
                </ul>
            </div>
        </div>
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid transition-fade">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="card">
                <div class="card-body pt-6">
                    <div class="row">
                        <div class="col-sm-8 col-md-6 col-lg-5">
                            <div class="card bg-info bg-opacity-75 text-white">
                                <div class="card-body fw-semibold">
                                    <h3 class="fw-bold text-white mb-4">Unggahan</h3>
                                    <div class="d-flex justify-content-between align-items-start">
                                        <p>Jumlah FRK/FED yang sudah disubmit oleh dosen fakultas Vokasi yang menunggu persetujuan</p>
                                        <h1 class="text-white">{{ $total_permintaan }}</h1>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>Total semua frk/fed: {{ $allTotal }}</span>
                                        <a href="{{ route('office.dekan.index') }}" class="menu-link ms-auto text-white text-decoration-underline">Lihat Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-12 col-lg-10">
                            <div class="card border border-gray-500 border-1">
                                <div class="bg-gray-300 px-5 pt-5 pb-3 rounded-top">
                                    <h3 class="fw-semibold">Selamat Datang</h3>
                                </div>
                                <div class="card-body">
                                    <h5 class="fw-semibold">Pada Halaman ini Dekan Dapat Melakukan:</h4>
                                    <ol class="fw-semibold">
                                        <li>Validasi FRK dan FED yang disubmit oleh dosen fakultas</li>
                                        <li>Melihat Bukti yang diupload oleh dosen fakultas</li>
                                        <li>Memberikan status FEK dan FED yang disubmit oleh dosen fakultas</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
