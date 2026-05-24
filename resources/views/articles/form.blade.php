<div class="form-group">
    <label for="subject" class="control-label">記事名：</label>
    <input id="subject" name="subject" type="text" value="{{ old('subject', $article->subject ?? '') }}"
        class="form-control @error('subject') bg-danger @enderror" />
    @error('subject')
        <span class="fw-bold text-danger">*</span>
    @enderror
</div>
<div class="form-group">
    <label for="body" class="control-label">本文：</label>
    <textarea id="body" name="body" class="form-control @error('body') bg-danger @enderror"
        rows="5">{{ old('body', $article->body ?? '') }}</textarea>
    @error('body')
        <span class="fw-bold text-danger">*</span>
    @enderror
</div>
<div class="form-group">
    <label for="summary" class="control-label">概要：</label>
    <input id="summary" name="summary" type="text" value="{{ old('summary', $article->summary ?? '') }}"
        class="form-control @error('summary') bg-danger @enderror" />
    @error('summary')
        <span class="fw-bold text-danger">*</span>
    @enderror
</div>
