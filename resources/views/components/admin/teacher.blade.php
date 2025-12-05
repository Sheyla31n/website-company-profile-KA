<div>
    @php
$columns = ['Name', 'Email','Password','Teacher'];
$rows = [
    ['Callista', 'callista@mail.com','coding25', 'Basic Coding'],
    ['Lucky', 'lucky@mail.com','coding25', 'GPB'],
];
@endphp

@include('components.table', ['columns' => $columns, 'rows' => $rows])

</div>