<div class="form-group">
    <label for="isbn" class="control-label">ISBNコード：</label>
    <input id="isbn" name="isbn" type="text" value="{{ old('isbn', $book->isbn) }}"
        class="form-control @error('isbn') bg-danger @enderror" />
    @error('isbn')
        <span class="fw-bold text-danger">*</span>
    @enderror
</div>

<div class="form-group">
    <label for="title" class="control-label">書名：</label>
    <input id="title" name="title" type="text" value="{{ old('title', $book->title) }}"
        class="form-control @error('title') bg-danger @enderror" />
    @error('title')
        <span class="fw-bold text-danger">*</span>
    @enderror
</div>
<div class="form-group">
    <label for="price" class="control-label">価格：</label>
    <input id="price" name="price" type="number" value="{{ old('price', $book->price) }}"
        class="form-control  @error('price') bg-danger @enderror" />
    @error('price')
        <span class="fw-bold text-danger">*</span>
    @enderror
</div>
<div class="form-group">
    <label for="publisher" class="control-label">出版社：</label>
    <input id="publisher" name="publisher" type="text" value="{{ old('publisher', $book->publisher) }}"
        class="form-control @error('publisher') bg-danger @enderror" />
    @error('publisher')
        <span class="fw-bold text-danger">*</span>
    @enderror
</div>
<div class="form-group">
    <label for="published" class="control-label">刊行日：</label>
    <input id="published" name="published" type="date"
        value="{{ old('published', $book->published?->toDateString()) }}"
        class="form-control @error('published') bg-danger @enderror" />
    @error('published')
        <span class="fw-bold text-danger">*</span>
    @enderror
</div>
<div class="form-group">
    <label for="sample" class="control-label">サンプル：</label>
    <input name="sample" type="hidden" value="0" />
    <input id="sample" name="sample" type="checkbox" value="1"
        @checked(old('sample', $book->sample)) />
</div>
