<table class="table align-middle table-bordered fs-6 gy-5" id="teaching_table">
    <thead>
        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
            <th class="w-10px pe-2">No</th>
            <th class="min-w-125px text-nowrap">Jumlah Kelompok</th>
            <th class="min-w-125px text-nowrap">Komponen yang Dibimbing</th>
            <th class="min-w-125px text-nowrap">Harapan Pertemuan Bimbingan</th>
            <th class="min-w-125px text-nowrap">Judul Kelompok Bimbingan</th>
            <th class="min-w-125px text-nowrap">Jumlah SKS</th>
            <th class="text-end min-w-70px">Aksi</th>
        </tr>
    </thead>
    <tbody class="fw-semibold text-gray-600">
        @php
            $no = 1;
        @endphp
        @foreach ($collection as $item)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item->group_total ?? '-' }}</td>
            <td>{{ $item->testedComponent->name ?? '-' }}</td>
            <td>{{ $item->meeting_expectations ?? '-' }}</td>
            <td>{{ $item->group_title }}</td>
            <td>{{ $item->sks }}</td>
            <td class="text-end text-nowrap">
                <button data-bs-toggle="modal" data-bs-target="#fpa-{{ $item->id }}" class="menu-link btn btn-sm btn-primary pe-4 text-nowrap">
                    <i class="fa-solid fa-circle-info"></i>
                </button>
                @if (App\Helpers\FedHelper::checkBatasWaktuPengisian($item->year))
                <a href="{{ route('office.frk.final-project-advisor.edit', $item->id) }}" class="menu-link btn btn-sm btn-primary pe-4 text-nowrap">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
                @endif
                @if ($item->proof != null)
                <a href="{{ Storage::url($item->proof) }}" target="_blank" class="menu-link btn btn-sm btn-primary text-nowrap">
                    <i class="fa-solid fa-eye"></i>
                    Bukti
                </a>
                <div class="badge badge-success d-block mt-2 ms-auto" style="width: 100px;">Dilengkapi Bukti</div>
                @else
                <div class="badge badge-danger d-block mt-2 ms-auto" style="width: 130px">Bukti Belum Diupload</div>
                @endif
            </td>
        </tr>
        @include('pages.app.frk.pendidikan.pembimbing.show')
        @endforeach
    </tbody>
</table>
{{$collection->links('themes.app.frk_pagination.pagination_fpa')}}
