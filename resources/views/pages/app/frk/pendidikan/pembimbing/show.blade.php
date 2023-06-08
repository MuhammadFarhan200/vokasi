<div class="modal fade" tabindex="-1" id="fpa-{{ $item->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Data Pembimbing</h4>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body fw-semibold">
                <div class="d-flex justify-content-between">
                    <p>Nama Dosen</p>
                    <p>{{ $item->user->name ?? '-' }}</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p>Program Studi</p>
                    <p>{{ $item->user->position ?? '-' }}</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p>Jumlah Kelompok</p>
                    <p>{{ $item->group_total ?? '-' }}</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p>Komponen yang dibimbing</p>
                    <p>{{ $item->testedComponent->name ?? '-' }}</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p>Harapan Pertemuan Bimbingan</p>
                    <p>{{ $item->meeting_expectations ?? '-' }}</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p>Judul Kelompok Bimbingan</p>
                    <p>{{ $item->group_title ?? '-' }}</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p>SKS</p>
                    <p>{{ $item->sks ?? '-' }}</p>
                </div>
                <div class="d-flex justify-content-between">
                    @php
                        $status = $item->status ?? '-';
                        $keterangan = '';
                        if ($status == 'M') {
                            $keterangan = 'Memenuhi';
                        } elseif ($status == 'TM') {
                            $keterangan = 'Tidak Memenuhi';
                        } else {
                            $keterangan = '-';
                        }
                    @endphp
                    <p>Status</p>
                    <p>{{ $status . ' (' . $keterangan . ')' }}</p>
                </div>
                <div class="d-flex justify-content-between">
                    @php
                        $persetujuan = $item->agreement ?? '-';
                        $ket = '';
                        if ($persetujuan == 'DS') {
                            $ket = 'Disetujui';
                        } elseif ($persetujuan == 'KL') {
                            $ket = 'Kurang Lengkap';
                        } elseif ($persetujuan == 'TD') {
                            $ket = 'Tidak Disetujui';
                        } else {
                            $ket = 'Belum Diproses';
                        }
                    @endphp
                    <p>Persetujuan</p>
                    <p>{{ $persetujuan . ' (' . $ket . ')' }}</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p>Dibuat Tanggal</p>
                    <p>{{ $item->created_at ? $item->created_at->format('d F Y') : '-' }}</p>
                </div>
                @if ($item->proof != null)
                <div class="d-flex justify-content-between mt-4">
                    <div class="badge badge-success d-block mt-2" style="width: 100px;">Dilengkapi Bukti</div>
                    <a href="{{ Storage::url($item->proof) }}" target="_blank" class="menu-link text-primary text-nowrap">
                        <i class="fa-solid fa-eye text-primary"></i>
                        Lihat Bukti
                    </a>
                </div>
                @else
                <div class="badge badge-danger d-block mt-4 ms-auto" style="width: 130px">Bukti Belum Diupload</div>
                @endif
            </div>

        </div>
    </div>
</div>
