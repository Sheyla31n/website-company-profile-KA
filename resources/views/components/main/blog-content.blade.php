@props(['articles' => []])

@php
    use Illuminate\Support\Str;
@endphp

<div id="blog-content">
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-6 ml-10 mr-10 my-4">

        @if (isset($articles))

            {{-- JIKA DATABASE ADA --}}
            @if (count($articles))
                @foreach ($articles as $article)
                    <div
                        class="rounded-[20px] bg-[#E4E0DD] h-[180px] shadow-sm overflow-hidden hover:shadow-lg transition group">

                        <img src="{{ asset('storage/' . $article->thumbnail) }}"
                            class="w-full h-[110px] object-cover group-hover:scale-105 transition" />

                        <div class="p-2">
                            <h3 class="text-sm font-semibold text-[#0B2347] line-clamp-1">
                                {{ $article->title }}
                            </h3>
                            <p class="text-xs text-gray-600 line-clamp-2">
                                {{ $article->excerpt }}
                            </p>
                        </div>
                    </div>
                @endforeach

                {{-- JIKA DATABASE KOSONG --}}
            @else
                @for ($i = 1; $i <= 10; $i++)
                    <div class="rounded-[20px] bg-[#E4E0DD] h-[180px] shadow-sm overflow-hidden">

                        <img src="{{ asset('storage/articles/default1.jpg') }}"
                            class="w-full h-[110px] object-cover opacity-80" />

                        <div class="p-2">
                            <h3 class="text-sm font-semibold text-[#0B2347]">
                                {{ Str::limit('Contoh Judul Artikel Dummy ' . $i, 30) }}
                            </h3>
                            <p class="text-xs text-gray-600">
                                {{ Str::limit('Ini adalah contoh konten artikel dummy yang ditampilkan ketika database masih kosong.', 55) }}
                            </p>
                        </div>
                    </div>
                @endfor
            @endif

        @endif

    </div>

    {{-- PAGINATION (HANYA JIKA DATA ASLI) --}}
    @if ($articles instanceof \Illuminate\Contracts\Pagination\Paginator && count($articles))
        <div class="mt-6">
            {{ $articles->links('vendor.pagination.pagination') }}
        </div>
    @endif
</div>
