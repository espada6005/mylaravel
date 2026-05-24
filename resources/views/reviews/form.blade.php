<div class="form-group">
    <label for="review_book_id" class="control-label">書籍ID：</label>
    <input id="review_book_id" name="book_id" type="number"
        value="{{ old('book_id', $review->book_id) }}"
        class="form-control @error('book_id') bg-danger @enderror" />
    @error('book_id')
        <span class="fw-bold text-danger">*</span>
    @enderror
</div>
<div class="form-group">
    <label for="review_member_id" class="control-label">メンバーID：</label>
    <input id="review_member_id" name="member_id" type="number"
        value="{{ old('member_id', $review->member_id) }}"
        class="form-control @error('member_id') bg-danger @enderror" />
    @error('member_id')
        <span class="fw-bold text-danger">*</span>
    @enderror
</div>
<div class="form-group">
    <label for="review_status" class="control-label">ステータス：</label>
    <select id="review_status" name="status"
        class="form-control @error('status') bg-danger @enderror">
        <option value="">選択してください</option>
        @foreach (['published' => '公開（published）', 'draft' => '下書き（draft）', 'deleted' => '削除（deleted）'] as $value => $label)
            <option value="{{ $value }}" @selected(old('status', $review->status->value) == $value)>
                {{ $label }}
            </option>
        @endforeach
    </select>
    @error('status')
        <span class="fw-bold text-danger">*</span>
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
    <label for="review_rate" class="control-label">評価：</label>
    <select id="review_rate" name="rate"
        class="form-control @error('rate') bg-danger @enderror">
        <option value="">選択してください</option>
        @foreach (range(1, 5) as $i)
            <option value="{{ $i }}" @selected(old('rate', $review->rate) == $i)>
                {{ $i }}
            </option>
        @endforeach
    </select>
    @error('rate')
        <span class="fw-bold text-danger">*</span>
    @enderror
</div>