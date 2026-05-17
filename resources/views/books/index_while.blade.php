<x-layout title="書籍一覧（while文）">
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
            @php
                $i = 0;
            @endphp
            @while ($i < count($books))
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
                @php
                    $i++;
                @endphp
            @endwhile
        </tbody>
    </table>
</x-layout>
