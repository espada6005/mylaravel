<x-layout title="書籍情報フォーム（編集）">
    <form method="POST" action="{{ route('books.update', $book) }}">
        @csrf
        @method('PATCH')
        @include('books.form')
        <div class="form-group">
            <button type="submit" class="btn btn-primary">更新</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">
            一覧に戻る</a>
    </div>
    </form>
</x-layout>
