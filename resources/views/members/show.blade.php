<x-layout title="メンバー詳細">
    <dl class="row">
      <dt class = "col-sm-2">
        ID
      </dt>
      <dd class = "col-sm-10">
        {{ $member->id }}
      </dd>
      <dt class = "col-sm-2">
         名前
      </dt>
      <dd class = "col-sm-10">
        {{ $member->name }}
      </dd>
      <dt class = "col-sm-2">
        名前（カナ）
      </dt>
      <dd class = "col-sm-10">
        {{ $member->name_kana }}
      </dd>
      <dt class = "col-sm-2">
        メールアドレス：
      </dt>
      <dd class = "col-sm-10">
        {{ $member->email }}
      </dd>
      <dt class = "col-sm-2">
        住所：
      </dt>
      <dd class = "col-sm-10">
        {{ $member->prefecture }}{{ $member->city }}{{ $member->other }}
      </dd>
      <dt class = "col-sm-2">
        DM受信：
      </dt>
      <dd class = "col-sm-10">
        {{ $member->dm ? '受信' : '拒否' }}
      </dd>
      <dt class = "col-sm-2">
        権限：
      </dt>
      <dd class = "col-sm-10">
        {{ collect($member->roles)->implode(', ') }}
      </dd>
      {{-- <dt class = "col-sm-2">
        登録日：
      </dt>
      <dd class = "col-sm-10">
        {{ $member->created_at->format('Y年m月d日') }}
      </dd> --}}
    </dl>

    <form method="POST" action="{{ route('members.destroy', $member) }}">
        @csrf
        @method('DELETE')
        <a href="{{ route('members.index') }}"
            class="btn btn-secandary">一覧に戻る</a>
        <button type="submit" class="btn btn-danger"
            onclick="return confirm('削除しますか？')">削除</button>
    </form>
</x-layout>