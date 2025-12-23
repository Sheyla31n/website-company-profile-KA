    <x-header-dashboard>
        <x-slot:title>Kelola Course</x-slot:title>
        <x-slot:description></x-slot:description>
    </x-header-dashboard>

    @php
        $tab = request('tab', 'categories'); // default course
    @endphp

    <div class="flex gap-3 mt-4 border-b pb-2">
        <a href="/dashboard?page=adminWebCourse&tab=categories"
            class="px-4 py-2 rounded-t font-poppins text-sm
        {{ $tab === 'categories' ? 'bg-gray-700 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
            Kategori
        </a>

        <a href="/dashboard?page=adminWebCourse&tab=review"
            class="px-4 py-2 rounded-t font-poppins text-sm
        {{ $tab === 'review' ? 'bg-gray-700 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
            Review
        </a>
    </div>

    @if ($tab === 'categories')
        @php
            $columns = ['Kategori', 'Icon'];
            $rows = [];

            foreach ($kategori as $kategoris) {
                $rows[] = [
                    'Kategori' => $kategoris->name,
                    'Icon' => basename($kategoris->icon),
                    'edit_url' => route('admin.web.course.edit', $kategoris->id),
                ];
            }
        @endphp

        @include('components.table', [
            'columns' => $columns,
            'rows' => $rows,
            'showEdit' => true,
            'showDelete' => false,
        ])
    @endif

    @if ($tab === 'review')
        @php
            $columns = ['Nama', 'Rating', 'Komentar'];
            $rows = [];

            foreach ($reviews as $review) {
                $rows[] = [
                    'Nama' => $review->name,
                    'Rating' => $review->stars,
                    'Komentar' => $review->content,
                    'edit_url' => route('admin.web.review.edit', $review->id),
                ];
            }
        @endphp

        @include('components.table', [
            'columns' => $columns,
            'rows' => $rows,
            'showEdit' => true,
            'showDelete' => false,
        ])
    @endif
