<x-layout title="記事詳細">
    <dl class="row">
      <dt class = "col-sm-2">
        ID
      </dt>
      <dd class = "col-sm-10">
        {{ $article->id }}
      </dd>
      <dt class = "col-sm-2">
         記事名
      </dt>
      <dd class = "col-sm-10">
        {{ $article->subject }}
      </dd>
      <dt class = "col-sm-2">
        本文
      </dt>
      <dd class = "col-sm-10">
        {{ $article->body }}
      </dd>
      <dt class = "col-sm-2">
        概要
      </dt>
      <dd class = "col-sm-10">
        {{ $article->summary }}
      </dd>
    </dl>
        <form method="POST" action="{{ route('articles.destroy', $article) }}">
        @csrf
        @method('DELETE')
        <a href="{{ route('articles.index') }}"
            class="btn btn-secondary">一覧に戻る</a>
        <button type="submit" class="btn btn-danger"
            onclick="return confirm('削除しますか？')">削除</button>
    </form>
</x-layout>