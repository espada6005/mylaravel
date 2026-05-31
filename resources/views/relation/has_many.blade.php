<x-layout>
<h2>「{{ $book->title }}」のレビュー一覧</h2>
<hr>
<ul>
    @foreach ($book->reviews as $review)
        <li>
            {{ $review->body ?: '＜本文なし＞' }} （{{ $review->updated_at }}）
        </li>
    @endforeach
</ul>
</x-layout>
