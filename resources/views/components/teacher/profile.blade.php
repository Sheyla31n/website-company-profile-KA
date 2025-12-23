<x-header-dashboard>
    <x-slot:title>Profile</slot:title>
        <x-slot:description>Sesuaikan profile</slot:description>
</x-header-dashboard>

<div class="max-w-4xl space-y-2 mt-5">

    <!-- Header Profile -->
    <div class="bg-gray-200 rounded-2xl shadow-md p-6 ml-0 flex items-center gap-6">
        <!-- Avatar -->
        <img src="https://via.placeholder.com/120" class="w-24 h-24 rounded-full object-cover border-4 border-blue-600">

        <div>
            <h1 class="text-2xl font-bold text-[#0B2347]">Sheyla N</h1>
            <p class="text-gray-600 mt-1">Student</p>
            <button class="mt-3 px-4 py-2 bg-blue-600 text-white rounded-lg text-sm">
                Ganti Foto
            </button>
        </div>
    </div>

    <!-- Profile Details -->
    <div class="mt-8 bg-gray-200 rounded-2xl shadow-md p-6">
        <h2 class="text-xl font-semibold text-[#0B2347] mb-4">Personal Information</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <div>
                <p class="text-gray-500 text-sm">Full Name</p>
                <p class="font-medium">Sheyla N</p>
            </div>

            <div>
                <p class="text-gray-500 text-sm">Username</p>
                <p class="font-medium">sheyla31n</p>
            </div>

            <div>
                <p class="text-gray-500 text-sm">Email</p>
                <p class="font-medium">example@gmail.com</p>
            </div>

            <div>
                <p class="text-gray-500 text-sm">Phone</p>
                <p class="font-medium">+62 812 3456 7890</p>
            </div>

        </div>
    </div>
</div>
