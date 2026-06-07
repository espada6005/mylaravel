<x-layout title="メンバー編集フォーム">

    <form method="POST" action="{{ route('members.update', $member) }}">
        @csrf
        @method('PATCH')
        @include('members.form')

        <div class="form-group">
            <button type="submit" class="btn btn-primary">更新</button>
            <a href="{{ route('members.index') }}"
               class="btn btn-outline-secondary">一覧に戻る</a>
        </div>
    </form>
</x-layout>