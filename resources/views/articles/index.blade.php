<x-layout title="記事一覧">
    <p>
        <a href="{{ route('articles.create') }}" class="btn btn-primary">
            新規登録</a>
    </p>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>記事名</th>
                <th>本文</th>
                <th>概要</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->subject }}</td>
                    <td>{{ $article->body }}</td>
                    <td>{{ $article->summary }}</td>
                    <td>
                        <a href="{{ route('articles.show', $article) }}">詳細</a>｜
                        <a href="{{ route('articles.edit', $article) }}">編集</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-layout>
