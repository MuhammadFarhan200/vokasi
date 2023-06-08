<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
    <thead>
        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
            <th class="w-10px pe-2">
                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                    <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_customers_table .form-check-input" value="1" />
                </div>
            </th>
            <th class="min-w-125px">Komentar</th>
            <th class="min-w-125px">Dibuat Tanggal</th>
            <th class="text-end min-w-70px">Aksi</th>
        </tr>
    </thead>
    <tbody class="fw-semibold text-gray-600">
        @foreach ($collection as $item)
        <tr>
            <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                    <input class="form-check-input" type="checkbox" value="1" />
                </div>
            </td>
            <td>
                <a href="{{ route('office.comment.show', $item->id) }}" class="menu-link text-gray-600 text-hover-primary">{!! \Illuminate\Support\Str::limit($item->body, 50, '...') !!}</a>
            </td>
            <td>{{$item->created_at->format('d F Y, H:i A')}}</td>
            <td class="text-end text-nowrap">
                <a href="{{route('office.comment.show',$item->id)}}" class="menu-link btn btn-icon btn-primary"><i class="las la-eye fs-2"></i></a>
                <button type="button" title="Hapus" id="tombol_hapus" data-redirect-url="{{route('office.comment.index')}}" onclick="handle_confirm('DELETE','{{route('office.comment.destroy',$item->id)}}','#tombol_hapus');" class="btn btn-icon btn-danger"><i class="las la-trash fs-2"></i></button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$collection->links('themes.app.pagination')}}
