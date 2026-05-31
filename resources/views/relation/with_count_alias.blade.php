<x-layout>
    <table class="table">
        <tr>
            <th>タイトル</th><th>著者数</th><th>レビュー数</th><th>コメント付きレビュー数</th>
        </tr>
        @foreach ($books as $book)
        <tr>
            <td>{{ $book->title }}</td>
            <td>{{ $book->authors_count }}</td>
            <td>{{ $book->reviews_count }}</td>
            <td>{{ $book->commented_review_count }}</td>
        </tr>
        @endforeach
    </table>
</x-layout>
