<table class="table align-middle table-row-dashed fs-6 gy-5" id="rd_table">
    <thead>
        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
            <th class="w-10px pe-2">No</th>
            <th class="min-w-125px">Tahun Ajaran</th>
            <th class="min-w-125px">Status</th>
            <th class="min-w-125px">Persetujuan</th>
            <th class="text-end min-w-70px">Aksi</th>
        </tr>
    </thead>
    <tbody class="fw-semibold text-gray-600">
        @php
            $no = 1;
        @endphp
        @foreach ($rd as $item)
        <tr>
            <td>{{ $no++ }}</td>
            <td class="text-uppercase">{{ $item->year . ' ('. $item->semester . ')' }}</td>
            <td>{{ $item->status ?? '-' }}</td>
            <td>{{ $item->agreement ?? '-' }}</td>
            <td class="text-end text-nowrap">
                @if (request()->is('office/fed/result-dev*'))
                    <button data-bs-toggle="modal" data-bs-target="#rd-{{ $item->id }}" class="menu-link btn btn-sm btn-primary pe-4 text-nowrap">
                        <i class="fa-solid fa-circle-info"></i>
                    </button>
                    @if (App\Helpers\FedHelper::checkBatasWaktuPengisian($item->year))
                    <a href="{{ route('office.fed.result-dev.edit', $item->id) }}" class="menu-link btn btn-sm btn-primary pe-4 text-nowrap">
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
                    <div class="badge badge-danger d-block mt-2 ms-auto" style="width: 130px">Bukti Belum diupload</div>
                    @endif
                @else
                    <a href="{{ route('office.frk.result-dev.show', $item->id) }}" class="menu-link btn btn-sm btn-primary pe-4 text-nowrap" title="Lihat Detail">
                        <i class="fa-solid fa-circle-info"></i>
                    </a>
                @endif
            </td>
        </tr>
        @include('pages.app.fed.result_dev.show')
        @endforeach
    </tbody>
</table>
@if (request()->is('office/fed/result-dev*'))
    {{$rd->links('themes.app.fed_pagination.pagination_rd')}}
@else
    {{$rd->links('themes.app.frk_fed_history.pagination_rd')}}
@endif
