<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>メンバー登録完了のお知らせ</title>
</head>
<body>
    <p>{{ $member->name }}さま</p>
    <hr />
    <p>
        この度は、本サイトへメンバー登録をいただきましてありがとうございました。<br />
        以下は、登録いただいたメンバー情報です。
    </p>
    <ul>
        <li>メンバー名：{{ $member->name }}</li>
        <li>パスワード：（セキュリティ保護のため、伏せています）</li>
        <li>メールアドレス：{{ $member->email }}</li>
    </ul>
    <p>
        サイトをご利用いただくには、<br />
        <a href="{{ route('members.index', [], true) }}">
            こちら
        </a>からログインしてください。
    </p>
    <hr />
    <p>
        <a href="mailto:webmaster@wings.msn.to">
            「サーバーサイド技術の学び舎」事務局
        </a><br />
        <img src="https://wings.msn.to/image/wings.jpg" alt="WINGS" width="53" height="17" />
    </p>
</body>
</html>