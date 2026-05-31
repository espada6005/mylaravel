<x-layout>
    <h3>「{{ $book->title }}」の著者情報</h3>
    <hr />
    <ul>
        @foreach($book->authors as $author)
            <li>
                {{ $author->pen_name }} （{{ $author->debut->format('Y') }}年デビュー）
            </li>
        @endforeach
    </ul>
</x-layout>

