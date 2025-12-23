<!-- Course -->
<section id="courses" class="fade-in min-h-screen bg-white py-4">
    <h1 class="text-center font-poetsen text-[#0B2347] text-[36px] mt-3 mb-3">
        Our Courses
    </h1>

    <div class="relative bg-[#103163] rounded-[50px_0_50px_0] min-h-[90vh] py-8 px-6">

        <!-- CARD WRAPPER -->
        <div class="flex gap-4 overflow-x-auto justify-center">

            @forelse ($course_categories as $category)
                <div
                    class="bg-white shadow-xl rounded-xl flex-shrink-0 
                           flex flex-col items-center
                           w-[80px] h-[240px]
                           sm:w-[160px] sm:h-[260px]
                           md:w-[180px] md:h-[300px]
                           lg:w-[200px] lg:h-[320px]">

                    <!-- TITLE -->
                    <div class="w-full text-center py-2">
                        <h3 class="font-poetsen text-[#0B2347] text-sm sm:text-base">
                            {{ $category->name }}
                        </h3>
                    </div>

                    <!-- IMAGE WRAPPER -->
                    <div class="relative bg-gray-300 w-full h-[70%] overflow-hidden">

                        {{-- FADE EFFECT --}}
                        <div
                            class="absolute inset-0 pointer-events-none 
                                    bg-gradient-to-b 
                                    from-black/70 via-transparent to-black/70">
                        </div>

                        @if ($category->icon)
                            <img src="{{ asset('storage/' . $category->icon) }}" alt="{{ $category->name }}"
                                class="w-full h-full object-cover hover:scale-105 transition">
                        @else
                            <div class="flex items-center justify-center h-full">
                                <span class="text-gray-500 font-poppins text-sm">
                                    Coming Soon
                                </span>
                            </div>
                        @endif
                    </div>

                    <a href="/course"
                        class="mt-auto mb-3 px-3 py-1 rounded-full font-poppins
                               border border-[#103163]
                               hover:bg-[#103163] hover:text-white hover:shadow-md">
                        View Course
                    </a>
                </div>

            @empty
                {{-- FALLBACK JIKA DATA KOSONG --}}
                @for ($i = 0; $i < 5; $i++)
                    <div
                        class="bg-white shadow-xl rounded-xl flex-shrink-0 
                               flex flex-col items-center
                               w-[80px] h-[240px]
                               sm:w-[160px] sm:h-[260px]
                               md:w-[180px] md:h-[300px]
                               lg:w-[200px] lg:h-[320px]">

                        <div class="w-full text-center py-2">
                            <h3 class="font-poetsen text-[#0B2347] text-sm">
                                Coming Soon
                            </h3>
                        </div>

                        <div class="relative bg-gray-300 w-full h-[70%] overflow-hidden">
                            <div
                                class="absolute inset-0 pointer-events-none 
                                        bg-gradient-to-b 
                                        from-black/70 via-transparent to-black/70">
                            </div>
                        </div>

                        <a href="/course"
                            class="mt-auto mb-3 px-3 py-1 rounded-full font-poppins
                                   border border-gray-400 text-gray-400 cursor-not-allowed">
                            View Course
                        </a>
                    </div>
                @endfor
            @endforelse

        </div>
    </div>

    <!-- WHITE CURVE BOTTOM -->
    <div
        class="absolute bottom-10 left-1/2 -translate-x-1/2 
           bg-white rounded-[50px_0_50px_0] 
           w-[90%] p-6">

        <div class="grid grid-cols-1 sm:grid-cols-3">

            @foreach ($reviews as $index => $review)
                <div
                    class="px-6
                {{ $index < count($reviews) - 1 ? 'sm:border-r-2 border-[#0B2347]' : '' }}">

                    <h3 class="font-poppins font-semibold text-[#0B2347] mb-1">
                        {{ $review->name }}
                    </h3>

                    <!-- STAR -->
                    <div class="flex gap-1 mb-2">
                        @for ($i = 1; $i <= 5; $i++)
                            <span class="{{ $i <= $review->stars ? 'text-yellow-400' : 'text-gray-300' }}">
                                ★
                            </span>
                        @endfor
                    </div>

                    <p class="text-sm text-black font-poppins">
                        {{ $review->content }}
                    </p>
                </div>
            @endforeach

        </div>
    </div>

</section>
