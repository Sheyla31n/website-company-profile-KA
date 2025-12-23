<div>
    <x-header-dashboard>
        <x-slot:title>Reporting</slot:title>
            <x-slot:description></slot:description>
    </x-header-dashboard>

    <a href="#"
        class="bg-gray-600 min-h-3 font-poppins text-[12px] text-white px-5 py-1 rounded-l mr-5 shadow hover:bg-[#e57800] transition">
        + Tambah
    </a>

    @php
        $columns = ['Name', 'Course', 'Bulan', 'Progress'];
        $rows = [['Duma', 'Basic Coding', 'Juli', 'Bisa mengerjakan'], ['Budi', 'GPB', 'Juli', 'Bisa mengerjakan']];
    @endphp

    @include('components.table', ['columns' => $columns, 'rows' => $rows])

</div>
