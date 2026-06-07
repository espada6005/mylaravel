<div class="form-group">
    <label for="name" class="control-label">名前：</label>
    <input id="name" name="name" type="text" value="{{ old('name', $member->name ?? '') }}"
        class="form-control @error('name') bg-danger @enderror" />
    @error('name')
        <span class="fw-bold text-danger">*</span>
    @enderror
</div>

<div class="form-group">
    <label for="name_kana" class="control-label">名前（カナ）：</label>
    <input id="name_kana" name="name_kana" type="text" value="{{ old('name_kana', $member->name_kana ?? '') }}"
        class="form-control @error('name_kana') bg-danger @enderror" />
    @error('name_kana')
        <span class="fw-bold text-danger">*</span>
    @enderror
</div>

<div class="form-group">
    <label for="email" class="control-label">メールアドレス：</label>
    <input id="email" name="email" type="email" value="{{ old('email', $member->email ?? '') }}"
        class="form-control @error('email') bg-danger @enderror" />
    @error('email')
        <span class="fw-bold text-danger">*</span>
    @enderror
</div>

<div class="form-group">
    <label for="password" class="control-label">パスワード：</label>
    <input id="password" name="password" type="password" value="{{ old('password', $member->password ?? '') }}"
        class="form-control @error('password') bg-danger @enderror" />
    @error('password')
        <span class="fw-bold text-danger">*</span>
    @enderror
</div>

<div class="form-group">
    <label for="prefecture" class="control-label">都道府県：</label>
    <input id="prefecture" name="prefecture" type="text" value="{{ old('prefecture', $member->prefecture ?? '') }}"
        class="form-control @error('prefecture') bg-danger @enderror" />
    @error('prefecture')
        <span class="fw-bold text-danger">*</span>
    @enderror
</div>

<div class="form-group">
    <label for="city" class="control-label">市区町村：</label>
    <input id="city" name="city" type="text" value="{{ old('city', $member->city ?? '') }}"
        class="form-control @error('city') bg-danger @enderror" />
    @error('city')
        <span class="fw-bold text-danger">*</span>
    @enderror
</div>

<div class="form-group">
    <label for="other" class="control-label">その他住所：</label>
    <input id="other" name="other" type="text" value="{{ old('other', $member->other ?? '') }}"
        class="form-control @error('other') bg-danger @enderror" />
    @error('other')
        <span class="fw-bold text-danger">*</span>
    @enderror
</div>

<div class="form-group">
    <label for="dm" class="control-label">DM受信：</label>
    <input name="dm" type="hidden" value="0" />
    <input id="dm" name="dm" type="checkbox" value="1"
        @checked(old('dm', $member->dm ?? false)) />
</div>

<div class="form-group">
    <label for="roles" class="control-label">権限：</label>
    <select id="roles" name="roles[]" multiple class="form-control @error('roles') bg-danger @enderror">
        @php $current = old('roles', $member->roles ?? []); @endphp
        <option value="admin" @selected(in_array('admin', (array)$current))>admin</option>
        <option value="manager" @selected(in_array('manager', (array)$current))>manager</option>
        <option value="general" @selected(in_array('general', (array)$current))>general</option>
    </select>
    @error('roles')
        <span class="fw-bold text-danger">*</span>
    @enderror
</div>