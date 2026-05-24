<x-layout>
    <table class="table">
        <thead>
            <tr>
            <th>書名</th><th>価格</th><th>出版社</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->price }}円</td>
                    <td>{{ $book->pub }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
