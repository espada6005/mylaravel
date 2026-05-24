<x-layout>
    <p>
        <a href="{{ route('reviews.create') }}" class="btn btn-primary">
            新規登録</a>
    </p>
    <table class="table">
      <thead>
            <tr>
                <th>書籍ID</th>
                <th>メンバーID</th>
                <th>ステータス</th>
                <th>評価</th>
                <th>レビュー本文</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reviews as $review)
                <tr>
                    <td>{{ $review->book_id }}</td>
                    <td>{{ $review->member_id }}</td>
                    <td>{{ $review->status }}</td>
                    <td>{{ $review->rate}}</td>
                    <td>{{ $review->body }}</td>
                    <td>
                <a href="{{ route('reviews.show', $review->id) }}">詳細</a>｜
                <a href="{{ route('reviews.edit', $review->id) }}">編集</a>
            </td>
        </tr>
      @endforeach
      </tbody>
    </table>
</x-layout>
