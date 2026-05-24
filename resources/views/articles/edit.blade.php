<x-layout title="記事フォーム（編集）">
    <form method="POST" action="{{ route('articles.update', $article) }}">
        @csrf
        @method('PATCH')
        @include('articles.form')
        <div class="form-group">
            <button type="submit" class="btn btn-primary">更新</button>
            <a href="{{ route('articles.index') }}" class="btn btn-secondary">
            一覧に戻る</a>
      </div>
    </form>
  </x-layout>