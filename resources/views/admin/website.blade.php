<x-header-dashboard>
    <x-slot:title>Kelola Website</x-slot:title>
    <x-slot:description>Edit deskripsi, gambar, dan course Koding Akademi</x-slot:description>
</x-header-dashboard>

<div class="grid gap-3 mt-5">
    <!-- Home -->
    <a href="{{ route('dashboard', ['page' => 'adminWebHome']) }}">
        <div class="bg-gray-200 p-4 rounded-lg hover:bg-gray-300">
            <h3 class="font-poppins font-semibold text-gray-800">Home</h3>
            <p class="text-gray-600 text-sm">(edit atau tambah gambar home)</p>
        </div>
    </a>

    <!-- About -->
    <a href="{{ route('dashboard', ['page' => 'adminWebAbout']) }}">
        <div class="bg-gray-200 p-4 rounded-lg hover:bg-gray-300 ">
            <h3 class="font-poppins font-semibold text-gray-800">About</h3>
            <p class="text-gray-600 text-sm">(edit deskripsi dan partner)</p>
        </div>
    </a>

    <!-- Course -->
    <a href="{{ route('dashboard', ['page' => 'adminWebCourse']) }}">
        <div class="bg-gray-200 p-4 rounded-lg hover:bg-gray-300 ">
            <h3 class="font-poppins font-semibold text-gray-800">Course</h3>
            <p class="text-gray-600 text-sm">(edit kategori dan gambar course)</p>
        </div>
    </a>

    <!-- Blog -->
    <a href="{{ route('dashboard', ['page' => 'adminWebBlog']) }}">
        <div class="bg-gray-200 p-4 rounded-lg hover:bg-gray-300">
            <h3 class="font-poppins font-semibold text-gray-800">Blog</h3>
            <p class="text-gray-600 text-sm">(edit artikel)</p>
        </div>
    </a>

</div>
