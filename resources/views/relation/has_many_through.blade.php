<x-layout>
    <h3>{{ $book->title }} のレビューコメント</h3>
    <ul>
    @foreach ($book->comments as $comment)
        <li>{{ $comment->body }}</li>
    @endforeach
    </ul>
</x-layout>
