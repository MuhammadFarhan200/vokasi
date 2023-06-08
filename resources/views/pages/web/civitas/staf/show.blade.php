<style>
    @import url("{{ asset('web/css/show_civitas.css') }}");
</style>
<x-web-layout title="Staf - {{ $staf->name ?? '' }}">
    <!-- Content ============================================= -->
    <section id="content" style="background: #ebe8e879" class="my-font">
        <div class="row align-items-center bg-white m-0">
            <div class="col-3">
                <a href="{{ route('web.civitas.staf') }}" class="my-link text-dark text-small fw-light"><i class="fa-solid fa-arrow-left me-3"></i>kembali ke halaman staf</a>
            </div>
            <div class="col-9">
                <ul class="nav my-tabs flex-nowrap text-nowrap border-0 mt-0 ms-5 overflow-auto">
                    <li class="nav-item">
                        <a class="nav-link active px-5 py-3 text-dark text-uppercase" data-bs-toggle="tab" href="#tentang">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-5 py-3 text-dark text-uppercase" data-bs-toggle="tab" href="#identitas">Identitas</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="content-wrap" style="padding-top: 25 !important;">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card my-card border-0">
                            <div class="card-body py-4">
                                <div class="d-flex justify-content-center align-items-cemter mt-2">
                                    <img src="{{ $staf->avatar ? Storage::url($staf->avatar) : asset('web/images/no-img-profile.jpg') }}" class="my-image rounded rounded-circle">
                                </div>
                                <div class="text-center mt-3 border-bottom-dashed">
                                    <div class="text-muted fw-light text-uppercase" style="font-size: 12px">Staf IT Del</div>
                                    <h4 class="text-center fw-500 mb-3">{{ $staf->name ?? '-' }}</h2>
                                </div>
                                <div class="text-center mt-2 border-bottom-dashed pb-2">
                                    ID Karyawan: {{ $staf->employee_id ?? '-' }}
                                </div>
                                <div class="text-start text-muted mt-2 border-bottom-dashed pb-3 pt-2 px-2">
                                    <i class="fa-solid fa-building-columns me-3"></i>  {{ $staf->position ?? '-' }}
                                </div>
                                <div class="text-start text-muted mt-2 border-bottom-dashed pb-3 pt-2 px-2">
                                    <i class="fa-solid fa-phone me-3"></i>  {{ $staf->phone ?? '-' }}
                                </div>
                                <div class="text-start text-muted mt-2 border-bottom-dashed pb-3 pt-2 px-2">
                                    <i class="fa-solid fa-envelope me-3"></i>  {{ $staf->email ?? '-' }}
                                </div>
                            </div>
                            <a href="{{ route('office.auth.index') }}" class="are-you-is">
                                <div class="d-flex justify-content-center align-items-center">
                                    <i class="fa-solid fa-user-pen fs-4 me-2"></i>
                                    <div>
                                        <div class="fs-6">Apakah Anda {{ $staf->name }} ?</div>
                                        <div class="fw-light mt-1">Edit Profilmu *</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-container">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane active" id="tentang" role="tabpanel">
                                    <div class="card my-card border-0">
                                        <div class="card-body px-4">
                                            <div class="card-title text-uppercase">Bio</div>
                                            <div class="text-muted fw-light">
                                                {!! $staf->bio ?? 'Belum ada deskripsi apa pun yang ditambahkan' !!}
                                            </div>
                                        </div>
                                    </div>
                                    @if ($staf->skill != null)
                                    <style>
                                        ol {
                                            display: block;
                                            list-style-type: decimal;
                                            margin-top: 0;
                                            margin-bottom: 1em;
                                            margin-left: 0;
                                            margin-right: 0;
                                            padding-left: 20px;
                                        }

                                        ul {
                                            display: block;
                                            list-style-type: disc;
                                            margin-top: 0;
                                            margin-bottom: 1em;
                                            margin-left: 0;
                                            margin-right: 0;
                                            padding-left: 20px;
                                        }

                                        li {
                                            display: list-item;
                                        }
                                    </style>
                                    <div class="card my-card border-0 mt-4">
                                        <div class="card-body px-4">
                                            <div class="card-title text-uppercase">Keahlian</div>
                                            <div class="text-muted">
                                            {!! $staf->skill !!}
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="tab-pane" id="identitas" role="tabpanel">
                                    <div class="card my-card border-0">
                                        <div class="card-body px-4">
                                            <div class="card-title text-uppercase">Data Diri</div>
                                            <table class="table table-borderless fw-light">
                                                <tr>
                                                    <td>Nama</td>
                                                    <td>:</td>
                                                    <td>{{ $staf->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>ID Karyawan</td>
                                                    <td>:</td>
                                                    <td>{{ $staf->nip ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Tempat Lahir</td>
                                                    <td>:</td>
                                                    <td>{{ $staf->place_birth ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal Lahir</td>
                                                    <td>:</td>
                                                    <td>{{ date('d M Y', strtotime($staf->date_birth)) ?? '-' }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    @if ($education->count() > 0)
                                    <div class="card my-card border-0 mt-4">
                                        <div class="card-body px-4">
                                            <div class="card-title text-uppercase">Riwayat Pendidikan</div>
                                            @foreach ($education as $item)
                                            <div class="fs-6">{{ $item->university }}</div>
                                            <div class="fw-light">{{ $item->year . ' - ' . $item->knowledge_field }}</div>
                                            @if (!$loop->last)
                                            <hr>
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- #content end -->

</x-web-layout>

