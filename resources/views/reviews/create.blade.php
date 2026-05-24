<x-layout>
    @if ($errors->any())
    <h4>{{$errors->count()}}件のエラーが発生しました。</h4>
    <ul>
        @foreach($errors->all() as $err)
        <li class="text-danger">{{ $err }}</li>
        @endforeach
    </ul>
    @endif

    <form method="POST" action="{{ route('reviews.store') }}">
        @csrf
        <div class="form-group">
            <label for="book_id" class="form-label">書籍ID</label>
            <input type="number" class="form-control" id="book_id" name="book_id" value="{{ old('book_id') }}">
            @error('book_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="member_id" class="form-label">メンバーID</label>
            <input type="number" class="form-control" id="member_id" name="member_id" value="{{ old('member_id') }}">
            @error('member_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="rate" class="form-label">評価（1〜5）</label>
            <input type="number" class="form-control" id="rate" name="rate" min="1" max="5" value="{{ old('rate') }}">
            @error('rate')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="review_body" class="control-label">レビュー内容：</label>
            <textarea id="review_body" name="body"
                class="form-control @error('body') bg-danger @enderror">{{ old('body', $review->body) }}</textarea>
            @error('body')
                <span class="fw-bold text-danger">*</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="status" class="form-label">ステータス</label>
            <select class="form-control" id="status" name="status">
                <option value="">選択してください</option>
                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>公開（published）</option>
                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>下書き（draft）</option>
                <option value="deleted" {{ old('status') == 'deleted' ? 'selected' : '' }}>削除（deleted）</option>
            </select>
            @error('status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">登録</button>
            <a href="{{ route('reviews.index') }}"
            class="btn btn-secondary">一覧に戻る</a>
        </div>
    </form>
</x-layout>
