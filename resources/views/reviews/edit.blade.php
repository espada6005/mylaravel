<x-layout title="レビューフォーム（編集）">
    <form method="POST" action="{{ route('reviews.update', $review) }}">
        @csrf
        @method('PATCH')
        @include('reviews.form')
        <div class="form-group">
            <button type="submit" class="btn btn-primary">更新</button>
            <a href="{{ route('reviews.index') }}" class="btn btn-secondary">
            一覧に戻る</a>
      </div>
    </form>
  </x-layout>