<x-layout>
    <ul>
    @foreach ($book as $key => $value)
        <li>{{ $key }}：{{ $value }}</li>
    @endforeach
    </ul>
</x-layout>
