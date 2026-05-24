<x-layout>
    <table class="table">
        <thead>
            <tr>
                <th>書名</th><th>価格</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                <td>{{ $book->short_title }}</td>
                <td>{{ $book->taxed_price }}円</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>

