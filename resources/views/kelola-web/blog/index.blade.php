    <x-header-dashboard>
        <x-slot:title>Kelola Blog</x-slot:title>
        <x-slot:description></x-slot:description>
    </x-header-dashboard>

    <a href="{{ route('admin.web.blog.create') }}"
        class="bg-gray-600 min-h-3 font-poppins text-[12px] text-white px-5 py-1 rounded-l mr-5 shadow hover:bg-[#e57800] transition">
        + Tambah
    </a>

    @php
        $columns = ['Judul', 'Paragraf', 'Image'];
        $rows = [];
        foreach ($articles as $article) {
            $rows[] = [
                'Judul' => $article->title,
                'Paragraf' => Str::limit($article->content, 20),
                'Image' => basename($article->thumbnail),
                'edit_url' => route('admin.web.blog.edit', $article->id),
                'delete_url' => route('admin.web.blog.destroy', $article->id),
            ];
        }
    @endphp

    @include('components.table', ['columns' => $columns, 'rows' => $rows])

    {{ $articles->links('vendor.pagination.pagination') }}
