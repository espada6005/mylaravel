<x-layout title="メンバー一覧">
    <p>
        <a href="{{ route('members.create') }}" class="btn btn-primary">
            新規登録</a>
    </p>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>名前</th>
                <th>名前（カナ）</th>
                <th>メールアドレス</th>
                <th>住所</th>
                <th>DM</th>
                <th>権限</th>
                {{-- <th>その他</th> --}}
                {{-- <th>登録日</th> --}}
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
                <tr>
                    <td>{{ $member->id }}</td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->name_kana }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->prefecture }}{{ $member->city }}{{ $member->other }}</td>
                    <td>{{ $member->dm ? '受信' : '拒否' }}</td>
                    <td>{{ collect($member->roles)->implode(', ') }}</td>
                    {{-- <td>{{ collect($member->roles) }}</td> --}}
                    {{-- <td>{{ json_encode($member->info, JSON_UNESCAPED_UNICODE) }}</td> --}}
                    {{-- <td>{{ is_array($member->info) ? collect($member->info)->map(fn($v) => is_array($v) ? implode(', ', $v) : $v)->implode(' / ')
        : $member->info }}</td> --}}
                    {{-- <td>{{ $member->created_at->format('Y/m/d') }}</td> --}}
                    <td>
                        <a href="{{ route('members.show', $member) }}">詳細</a>｜
                        <a href="{{ route('members.edit', $member) }}">編集</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
