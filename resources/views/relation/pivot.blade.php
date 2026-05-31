<x-layout>
    <h3>「{{ $book->title }}」の著者情報</h3>
    <hr />
    <ul>
        @foreach($book->authors as $author)
            @unless($author->pivot->hidden)
            <li>
                {{ $author->pen_name }} （{{ $author->debut->format('Y') }}年デビュー）
            </li>
            @endunless
        @endforeach
    </ul>

    {{-- Authorモデルから取得する場合 --}}
    {{-- <h3>「{{ $author->pen_name }}」の著作情報</h3>
    <hr>
    <ul>
        @foreach($author->books as $book)
        <li>
            {{ $book->title }} （著者名の表示順: {{ $book->pivot->order }}）
        </li>
        @endforeach
    </ul> --}}
</x-layout>
