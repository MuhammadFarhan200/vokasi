<div class="modal fade" tabindex="-1" id="rd-{{ $item->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Data Pengembangan Hasil Pendidikan dan Penelitian</h4>

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
                    <p>Nama Kegiatan</p>
                    <p>{{ $item->name ?? '-' }}</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p>Lokasi Kegiatan</p>
                    <p>{{ $item->location ?? '-' }}</p>
                </div>
                @if ($item->assignment_proof)
                <div class="d-flex justify-content-between mb-3">
                    <span class="badge badge-success"><i class="bi bi-check text-white me-1"></i>Dilengkapi Bukti Penugasan</span>
                    <a href="{{ Storage::url($item->assignment_proof) }}" target="_blank" class="menu-link text-primary text-nowrap">
                        <i class="fa-solid fa-eye text-primary"></i>
                        Lihat Bukti Penugasan
                    </a>
                </div>
                @else
                <div class="d-flex justify-content-between">
                    <p>Bukti Penugasan</p>
                    <p>-</p>
                </div>
                @endif
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
