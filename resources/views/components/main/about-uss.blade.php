@props([
    'about_us' => [],
    'partners' => [],
])


<!-- ABOUT -->
<section id="about"
    class="
        fade-in relative z-5
        min-h-screen
        bg-white
        rounded-t-[50px]
        shadow-[0_-8px_20px_rgba(0,0,0,0.1)]
        px-4 sm:px-6 lg:px-12
        py-5 sm:py-8
    ">

    <!-- About Us -->
    <div class="max-w-5xl mx-auto mb-12">
        <h1 class="text-center font-poetsen text-[#0B2347] text-[28px] sm:text-[32px] lg:text-[36px] mb-3">
            About Us
        </h1>
        @if (isset($about_us) && count($about_us))
            @if ($about_us)
                <p class="text-justify font-poppins text-black text-[15px] sm:text-[17px] lg:text-[18px]">
                    {{ $about_us?->description }}
                </p>
            @else
                <p class="text-center italic font-poppins text-gray-500 text-[15px] sm:text-[17px] lg:text-[18px]">
                    Belum ada deskripsi
                </p>
            @endif
        @endif
    </div>

    <!-- Divider -->
    <div class="h-[10px] w-[100%] bg-[#103163] w-24 mx-auto mb-10 rounded-full"></div>

    <!-- Our Partner -->
    <div class="max-w-full">
        <h1 class="text-center font-poetsen text-[#0B2347] text-[18px] sm:text-[20px] mb-6">
            Our Partner
        </h1>

        <div class="overflow-hidden">
            <!-- WRAPPER ANIMASI -->
            <div class="flex animate-scroll-slow">

                <!-- TRACK 1 -->
                <div class="flex gap-6 scroll-track">
                    @if (isset($partners) && count($partners))
                        @foreach ($partners as $partner)
                            <div
                                class="
                            min-w-[120px] sm:min-w-[140px]
                            max-w-[200px]
                            h-[70px] sm:h-[80px]
                            bg-white rounded-xl
                            flex items-center justify-center
                            p-3 sm:p-4
                            flex-shrink-0
                        ">
                                <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}"
                                    class="max-h-full max-w-full object-contain">
                            </div>
                        @endforeach
                    @endif
                </div>

                <!-- TRACK 2 (DUPLIKAT) -->
                <div class="flex gap-6 scroll-track">
                    @if (isset($partners) && count($partners))
                        @foreach ($partners as $partner)
                            <div
                                class="
                            min-w-[120px] sm:min-w-[140px]
                            max-w-[200px]
                            h-[70px] sm:h-[80px]
                            bg-white rounded-xl
                            flex items-center justify-center
                            p-3 sm:p-4
                            flex-shrink-0
                        ">
                                <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}"
                                    class="max-h-full max-w-full object-contain">
                            </div>
                        @endforeach
                    @endif
                </div>

            </div>
        </div>
    </div>


</section>
