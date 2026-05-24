<x-layout>
    <ul>
        @foreach($books as $publisher)
            <li>{{ $publisher }}</li>
        @endforeach
    </ul>
</x-layout>