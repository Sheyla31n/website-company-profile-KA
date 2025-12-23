@php
    $showEdit = $showEdit ?? true;
    $showDelete = $showDelete ?? true;
@endphp

<table class="min-w-full border border-gray-300 rounded-lg overflow-hidden mt-5">
    <thead>
        <tr class="bg-gray-100 text-left">
            @foreach ($columns as $col)
                <th class="px-4 py-2 border-b text-center border-gray-300">{{ $col }}</th>
            @endforeach

            <th class="px-4 py-2 border-b border-gray-300 text-center sticky right-0 bg-gray-100 w-40">
                Aksi
            </th>
        </tr>
    </thead>

    <tbody>
        @foreach ($rows as $row)
            <tr>
                {{-- Hanya render kolom sesuai $columns --}}
                @foreach ($columns as $colKey)
                    <td class="px-4 py-2 border border-gray-300 bg-gray-25">
                        {{ $row[$colKey] ?? '' }}
                    </td>
                @endforeach

                {{-- Kolom Aksi (pasti di kanan) --}}
                <td
                    class="px-4
                        py-2 border-b border-gray-300 text-center sticky right-0 bg-white">
                    <div class="flex gap-2 justify-center">
                        @if ($showEdit && !empty($row['edit_url']))
                            <a href="{{ $row['edit_url'] }}"
                                class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm">
                                Edit
                            </a>
                        @endif

                        @if ($showDelete && !empty($row['delete_url']))
                            <form action="{{ $row['delete_url'] }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm">
                                    Hapus
                                </button>
                            </form>
                        @endif
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
