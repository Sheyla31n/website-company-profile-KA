<x-header-dashboard>
    <x-slot:title>Dashboard</x-slot:title>
    <x-slot:description>Kelola web dengan bijak!</x-slot:description>
</x-header-dashboard>


<div class="grid gap-3 mt-5">

    <!-- Card 1 -->
    <a href="/dashboard?page=adminWebsite">
        <div class="bg-gray-200 p-4 rounded-lg cursor-pointer hover:bg-gray-300 transition">
            <h3 class="font-poppins font-semibold text-gray-800">Kelola Website</h3>
            <p class="text-gray-600 text-sm">Edit halaman website (home/about/course/dll)</p>
        </div>
    </a>

    <!-- Card 2 -->
    <a href="/dashboard?page=adminCourse">
        <div class="bg-gray-200 p-4 rounded-lg cursor-pointer hover:bg-gray-300 transition">
            <h3 class="font-poppins font-semibold text-gray-800">Kelola Course</h3>
            <p class="text-gray-600 text-sm">Edit atau tambah course.</p>
        </div>
    </a>

    <!-- Card 3 -->
    <a href="/dashboard?page=adminTeacher">
        <div class="bg-gray-200 p-4 rounded-lg cursor-pointer hover:bg-gray-300 transition">
            <h3 class="font-poppins font-semibold text-gray-800">Kelola Data Teacher</h3>
            <p class="text-gray-600 text-sm">Edit atau tambah teacher.</p>
        </div>
    </a>

    <!-- Card 4 -->
    <a href="/dashboard?page=adminStudent">
        <div class="bg-gray-200 p-4 rounded-lg cursor-pointer hover:bg-gray-300 transition">
            <h3 class="font-poppins font-semibold text-gray-800">Kelola Data Murid</h3>
            <p class="text-gray-600 text-sm">Edit atau tambah murid.</p>
        </div>
    </a>

</div>
