<x-layout title="レビュー詳細">
    {{-- @isset($book) --}}
    <h1>レビュー詳細</h1>
    <dl class="row">
      <dt class = "col-sm-2">
        書籍ID
      </dt>
      <dd class = "col-sm-10">
        {{ $review->book_id }}
      </dd>
      <dt class = "col-sm-2">
        レビュー内容
      </dt>
      <dd class = "col-sm-10">
        {{ $review->body }}
      </dd>
      <dt class = "col-sm-2">
        評価
      </dt>
      <dd class = "col-sm-10">
        {{ $review->rate }}
      </dd>
    </dl>

    <form method="POST" action="{{ route('reviews.destroy', $review) }}">
        @csrf
        @method('DELETE')
        <a href="{{ route('reviews.index') }}"
            class="btn btn-secandary">一覧に戻る</a>
        <button type="submit" class="btn btn-danger"
            onclick="return confirm('削除しますか？')">削除</button>
    </form>
  </x-layout>