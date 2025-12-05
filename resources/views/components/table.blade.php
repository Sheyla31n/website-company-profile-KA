<table class="min-w-full border border-gray-300 rounded-lg overflow-hidden">
    <thead>
        <tr class="bg-gray-100 text-left">
            @foreach ($columns as $col)
                <th class="px-4 py-2 border-b border-gray-300">{{ $col }}</th>
            @endforeach

            {{-- Kolom default Aksi --}}
            <th class="px-4 py-2 border-b border-gray-300">Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($rows as $row)
            <tr>
                @foreach ($row as $cell)
                    <td class="px-4 py-2 border-b border-gray-300">{{ $cell }}</td>
                @endforeach

                {{-- Tombol Aksi --}}
                <td class="px-4 py-2 border-b border-gray-300">
                    <div class="flex gap-2">
                        <a href="{{ $row['edit_url'] ?? '#' }}"
                           class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm">
                            Edit
                        </a>

                        <form action="{{ $row['delete_url'] ?? '#' }}" method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm">
                                Hapus
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
