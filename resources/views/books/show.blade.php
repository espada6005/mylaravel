<x-layout title="書籍詳細">
    @isset($book)
        <dl class="row">
            <dt class="col-sm-2">
                ISBNコード
            </dt>
            <dd class="col-sm-10">
                {{ $book->isbn }}
            </dd>

            <dt class="col-sm-2">
                書名
            </dt>
            <dd class="col-sm-10">
                {{ $book->title }}
            </dd>

            <dt class="col-sm-2">
                価格
            </dt>
            <dd class="col-sm-10">
                {{ Number::currency($book->price, in: 'JPY') }}
            </dd>

            <dt class="col-sm-2">
                出版社：
            </dt>
            <dd class="col-sm-10">
                {{ $book->publisher }}
            </dd>

            <dt class="col-sm-2">
                刊行日：
            </dt>
            <dd class="col-sm-10">
                {{ $book->published->format('Y年m月d日') }}
            </dd>

            <dt class="col-sm-2">
                サンプル：
            </dt>
            <dd class="col-sm-10">
                {{ $book->sample ? 'あり' : 'なし' }}
            </dd>
        </dl>

        @unless($book->sample)
            <div class="alert alert-danger">本書では提供サンプルはありません。</div>
        @endunless

        {{-- <div>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">一覧に戻る</a>
        </div> --}}

        <form method="POST" action="{{ route('books.destroy', $book) }}">
            @csrf
            @method('DELETE')
            <a href="{{ route('books.index') }}" class="btn btn-secondary">
                一覧に戻る
            </a>
            <button type="submit" class="btn btn-danger"
                onclick="return confirm('削除しますか？')">
                削除
            </button>
        </form>
    @else
        <div class="alert alert-danger">書籍情報が存在しません。</div>
    @endisset
    {{-- @empty($book)
        <div class="alert alert-danger">書籍情報が存在しません。</div>
    @endempty --}}
</x-layout>
