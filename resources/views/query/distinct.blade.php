<x-layout>
    <ul>
        @foreach($books as $book)
            <li>{{ $book->publisher }}</li>
        @endforeach
    </ul>
</x-layout>
