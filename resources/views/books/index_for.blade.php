<x-layout title="書籍一覧（for文）">
    <p>
        <a href="{{ route('books.create') }}" class="btn btn-primary">
            新規登録</a>
    </p>
    <table class="table">
        <thead>
            <tr>
                <th>ISBNコード</th>
                <th>書名</th>
                <th>価格</th>
                <th>出版社</th>
                <th>刊行日</th>
                <th>サンプル</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < count($books); $i++)
                <tr>
                    <td>{{ $books[$i]->isbn }}</td>
                    <td>{{ $books[$i]->title }}</td>
                    <td>{{ $books[$i]->price }}円</td>
                    <td>{{ $books[$i]->publisher }}</td>
                    <td>{{ $books[$i]->published }}</td>
                    <td>{{ $books[$i]->sample ? '○' : '×' }}</td>
                    <td>
                        <a href="{{ route('books.show', $books[$i]->id) }}">詳細</a>｜
                        <a href="{{ route('books.edit', $books[$i]->id) }}">編集</a>
                    </td>
                </tr>
            @endfor
        </tbody>
    </table>
</x-layout>
