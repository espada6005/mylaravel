<x-layout title="メンバー登録フォーム">
    @if ($errors->any())
    <h4>{{$errors->count()}}件のエラーが発生しました。</h4>
    <ul>
        @foreach($errors->all() as $err)
        <li class="text-danger">{{ $err }}</li>
        @endforeach
    </ul>
    @endif
    <form method="POST" action="{{ route('articles.store') }}" novalidate>
        @csrf
        @include('articles.form')

        <div class="form-group">
            <button type="submit" class="btn btn-primary">登録</button>
            <a href="{{ route('articles.index') }}"
            class="btn btn-secondary">一覧に戻る</a>
        </div>
    </form>
</x-layout>