<x-layout>
    <ul>
        @foreach($books as $book)
            <li>{{ $book->publisher }} （{{ round($book->average) }}円）</li>
        @endforeach
    </ul>
</x-layout>
