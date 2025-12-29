@props(['home_sliders' => []])

<section id="home"
    class="fade-in min-h-screen grid grid-cols-1 md:grid-cols-5 bg-cover bg-center bg-fixed pt-[80px]">

    <!-- kiri -->
    <div class="layer md:col-span-3 bg-white p-8 space-y-6 flex flex-col items-center">
        <h1 class="mt-11 text-[36px] text-center font-poetsen text-[#0B2347] mb-4">
            Coding - Robotics - Engineering
        </h1>

        <p class="font-poppins text-[#0B2347] text-[20px] text-center">
            <span class="text-[#FF8800]">Siapkan</span> diri kamu dengan
            <span class="text-[#FF8800]">Skill Masa Depan</span>
        </p>

        <a href="https://wa.me/6281233515578?text=Halo%20Admin,%20saya%20mau%20daftar%20kursus"
            class="font-bold font-poppins text-center text-white bg-[#0B2347] w-[228px] h-[46px] rounded-[10px] hover:shadow-xl hover:scale-90 transition p-3">
            Daftar Sekarang!
        </a>

        <!-- angka -->
        <div class="grid grid-cols-3 gap-8">
            <div class="text-center">
                <p class="font-poppins text-[48px] text-[#FF8800]">55</p>
                <p class="font-poppins text-[20px] text-[#0B2347]">kursus</p>
            </div>
            <div class="text-center">
                <p class="font-poppins text-[48px] text-[#FF8800]">3310</p>
                <p class="font-poppins text-[20px] text-[#0B2347]">murid</p>
            </div>
            <div class="text-center">
                <p class="font-poppins text-[48px] text-[#FF8800]">49</p>
                <p class="font-poppins text-[20px] text-[#0B2347]">trainers</p>
            </div>
        </div>

        <h1 class="text-2xl text-center font-poetsen text-[#0B2347] mb-4">
            Learn with Industry Leaders and the Coolest Instructors
        </h1>
    </div>


    <!-- kanan -->
    @php
        $defaultSliders = ['home_sliders/gambar1.jpg', 'home_sliders/gambar2.jpg', 'home_sliders/gambar3.jpg'];
    @endphp

    <div class="layer md:col-span-2 bg-white flex flex-col items-start w-full max-w-full overflow-x-hidden">
        <div class="swiper mySwiper ml-0 pl-0 w-[768px] h-[500px] mt-20 md:translate-x-[-110px] overflow-visible">
            <div class="swiper-wrapper">

                @if (isset($home_sliders))
                    {{-- JIKA DATABASE ADA ISINYA --}}
                    @if (count($home_sliders))
                        @foreach ($home_sliders as $slider)
                            <div
                                class="swiper-slide !w-auto shrink-0
                            [&.swiper-slide-active]:scale-100
                            [&.swiper-slide-prev]:scale-90
                            [&.swiper-slide-next]:scale-90
                            transition-transform duration-300 ease-in-out
                            scale-[0.75] md:scale-100">

                                <div
                                    class="bg-gray-300 rounded-[30px] w-[380px] h-[390px]
                                shadow-[0_15px_20px_-12px_rgba(0,0,0,0.25)]
                                overflow-hidden flex items-center justify-center">

                                    @if ($slider->image)
                                        <img src="{{ asset('storage/' . $slider->image) }}"
                                            class="w-full h-full object-cover" alt="Home Slider">
                                    @endif
                                </div>
                            </div>
                        @endforeach

                        {{-- JIKA DATABASE KOSONG --}}
                    @else
                        @foreach ($defaultSliders as $image)
                            <div
                                class="swiper-slide !w-auto shrink-0
                            [&.swiper-slide-active]:scale-100
                            [&.swiper-slide-prev]:scale-90
                            [&.swiper-slide-next]:scale-90
                            transition-transform duration-300 ease-in-out
                            scale-[0.75] md:scale-100">

                                <div
                                    class="bg-gray-300 rounded-[30px] w-[380px] h-[390px]
                                shadow-[0_15px_20px_-12px_rgba(0,0,0,0.25)]
                                overflow-hidden flex items-center justify-center">

                                    <img src="{{ asset('storage/' . $image) }}" class="w-full h-full object-cover"
                                        alt="Default Home Slider">
                                </div>
                            </div>
                        @endforeach
                    @endif
                @endif

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: "auto",
            centeredSlides: true,
            spaceBetween: -20,
            loop: true,
            initialSlide: 1,
            loopAdditionalSlides: 3,
            grabCursor: true,
            observer: true,
            observeParents: true,
            autoplay: {
                delay: 5000,
                reverseDirection: true,
                disableOnInteraction: false,
            },
        });

        // Memastikan DOM siap secepat mungkin
        document.addEventListener("DOMContentLoaded", function() {
            swiper.update();
            swiper.autoplay.start();
        });

        // Memastikan layout selesai (wajib agar kanan tidak kosong)
        window.addEventListener("load", () => {
            swiper.update();
            swiper.slideTo(1, 0); // ini tetap pakai punyamu
            swiper.autoplay.start();
        });

        // Jika tab sempat freeze → autoplay tetap nyala saat balik
        document.addEventListener("visibilitychange", function() {
            if (!document.hidden) {
                swiper.update();
                swiper.autoplay.start();
            }
        });
    </script>
    </div>

</section>
