<div>
    @php
$columns = ['Name', 'Course','Bulan', 'Progress'];
$rows = [
    ['Ayu', 'Basic Coding', 'Juli', 'Bisa mengerjakan'],
    ['Budi','GPB', 'Juli', 'Bisa mengerjakan'],
];
@endphp

@include('components.table', ['columns' => $columns, 'rows' => $rows])

</div>