<x-layout>
    <ul>
    @foreach ($books as $book)
        <li>{{ $book->title }}：{{ $book->reviews_count }}件</li>
    @endforeach
    </ul>
</x-layout>
