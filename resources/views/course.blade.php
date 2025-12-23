<x-head></x-head>

<body class="font-poppins bg-white scroll-smooth">

    <x-navbar-course />
    <section id="courses" class="max-w-7xl mx-auto px-5 py-5">

        {{-- HEADER --}}
        <div class="mb-5 text-center">
            <h2 class="text-3xl md:text-4xl font-poetsen mb-2">
                Our Courses
            </h2>
            <p class="text-gray-500">
                Pilih course sesuai kebutuhan dan minatmu
            </p>
        </div>

        <form method="GET" action="{{ route('courses') }}" class="flex flex-col md:flex-row gap-4 mb-10">

            {{-- SEARCH --}}
            <div class="flex-1">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari course..."
                    class="w-full border rounded-lg px-4 py-2
                      focus:outline-none focus:ring-2 focus:ring-black">
            </div>

            {{-- CATEGORY --}}
            <div class="w-full md:w-64">
                <select name="category"
                    class="w-full border rounded-lg px-4 py-2
                       focus:outline-none focus:ring-2 focus:ring-black">
                    <option value="">Semua Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button class="px-6 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition">
                Filter
            </button>
        </form>


        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            @forelse ($courses as $course)
                <div class="group bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">

                    {{-- IMAGE --}}
                    <div class="aspect-[4/3] overflow-hidden bg-gray-100">
                        @if ($course->icon)
                            <img src="{{ asset('storage/' . $course->icon) }}" alt="{{ $course->title }}"
                                class="w-full h-full object-cover
                                group-hover:scale-105 transition">
                        @else
                            <div
                                class="w-full h-full flex items-center justify-center
                                text-gray-400 text-sm">
                                No Image
                            </div>
                        @endif
                    </div>

                    {{-- BODY --}}
                    <div class="p-4">
                        <h3 class="font-semibold text-lg leading-tight mb-2">
                            {{ $course->title }}
                        </h3>

                        @if ($course->category)
                            <span class="inline-block text-sm text-gray-500">
                                {{ $course->category->name }}
                            </span>
                        @endif
                    </div>

                </div>
            @empty
                <p class="col-span-full text-center text-gray-500">
                    Course tidak ditemukan.
                </p>
            @endforelse

        </div>


    </section>

    <x-main.contact />

</body>
