<table class="table align-middle table-row-dashed fs-6 gy-5" id="teaching_table">
    <thead>
        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
            <th class="w-10px pe-2">No</th>
            <th class="min-w-125px text-nowrap">Nama Dosen</th>
            <th class="min-w-125px text-nowrap">Program Studi</th>
            <th class="min-w-125px text-nowrap">Status</th>
            <th class="min-w-125px text-nowrap">Persetujuan</th>
            <th class="text-end min-w-70px">Bukti</th>
        </tr>
    </thead>
    <tbody class="fw-semibold text-gray-600">
        @php
            $no = 1;
        @endphp
        @foreach ($teaching as $item)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item->user->name }}</td>
            <td>{{ $item->user->position }}</td>
            <td>{{ $item->status }}</td>
            <td>{{ $item->agreement }}</td>
            <td class="text-end text-nowrap">
                <button data-bs-toggle="modal" data-bs-target="#teaching-{{ $item->id }}" class="menu-link btn btn-sm btn-primary pe-4 text-nowrap">
                    <i class="fa-solid fa-circle-info"></i>
                </button>
                <a href="{{ route('office.dekan.teaching.edit', $item->id) }}" class="menu-link btn btn-sm btn-primary text-nowrap">
                    <i class="fa-solid fa-pen-to-square"></i>
                    Ubah
                </a>
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
        @include('pages.app.dekan.teaching.show')
        @endforeach
    </tbody>
</table>
{{$teaching->links('themes.app.dekan_pagination.pagination_teaching')}}