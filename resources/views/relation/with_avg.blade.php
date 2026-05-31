<x-layout>
    <ul>
        @foreach ($books as $book)
            <li>{{ $book->title }}：{{ $book->reviews_avg_rate ?: '＜評価なし＞' }}</li>
            {{-- <li>{{ $book->title }}：{{ $book->avg_rate1 ?: '＜評価なし＞' }} ／{{ $book->avg_rate2 ?: '＜評価なし＞' }}</li> --}}
        @endforeach
    </ul>
</x-layout>
