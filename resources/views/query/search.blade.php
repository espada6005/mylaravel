<x-layout>
    <form action="/query/search">
        <label for="title">タイトル:</label>
        <input type="text" id="title" name="title">
        <br>
        <label for="sample">サンプル:</label>
        <input type="checkbox" id="sample" name="sample" value="1">
        <br>
        <button type="submit">検索</button>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>ISBNコード</th><th>書名</th><th>価格</th>
                <th>出版社</th><th>刊行日</th><th>サンプル</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
              <tr>
                <td>{{ $book->isbn }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->price }}円</td>
                <td>{{ $book->publisher }}</td>
                <td>{{ $book->published }}</td>
                <td>{{ $book->sample ? '○' : '×' }}</td>
              </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
