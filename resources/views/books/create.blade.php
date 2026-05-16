<x-layout title="書籍情報フォーム（新規）">
    @if ($errors->any())
    <h4>{{$errors->count()}}件のエラーが発生しました。</h4>
    <ul>
        @foreach($errors->all() as $err)
        <li class="text-danger">{{ $err }}</li>
        @endforeach
    </ul>
    @endif

    <form method="POST" action="{{ route('books.store') }}">
        @csrf
        @include('books.form')
        {{-- <div class="form-group">
            <label for="isbn" class="control-label">ISBNコード：</label>
            <input id="isbn" name="isbn" type="text"
            value="{{ old('isbn', $book->isbn) }}" class="form-control" />
        </div>
        <div class="form-group">
            <label for="title" class="control-label">書名：</label>
            <input id="title" name="title" type="text"
            value="{{ old('title', $book->title) }}" class="form-control" />
        </div>
        <div class="form-group">
            <label for="price" class="control-label">価格：</label>
            <input id="price" name="price" type="number"
            value="{{ old('price', $book->price) }}" class="form-control" />
        </div>
        <div class="form-group">
            <label for="publisher" class="control-label">出版社：</label>
            <input id="publisher" name="publisher" type="text"
            value="{{ old('publisher', $book->publisher) }}" class="form-control" />
        </div>
        <div class="form-group">
            <label for="published" class="control-label">刊行日：</label>
            <input id="published" name="published" type="date"
            value="{{ old('published', $book->published?->toDateString()) }}"
            class="form-control" />
        </div>
        <div class="form-group">
            <label for="sample" class="control-label">サンプル：</label>
            <input name="sample" type="hidden" value="0" />
            <input id="sample" name="sample" type="checkbox" value="1"
            @checked(old('sample', $book->sample)) />
        </div> --}}
        <div class="form-group">
            <button type="submit" class="btn btn-primary">登録</button>
            <a href="{{ route('books.index') }}"
            class="btn btn-secondary">一覧に戻る</a>
        </div>
    </form>
</x-layout>
