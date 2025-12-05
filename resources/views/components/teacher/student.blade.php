<div>
    @php
$columns = ['Name', 'Email','Password','Course'];
$rows = [
    ['Ayu', 'ayu@mail.com','coding25', 'Basic Coding'],
    ['Budi', 'budi@mail.com','coding25', 'GPB'],
];
@endphp

@include('components.table', ['columns' => $columns, 'rows' => $rows])

</div>