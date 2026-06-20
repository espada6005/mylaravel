<x-mail::message>

# メンバー登録完了のお知らせ

{{ $member->name }} 様

<x-mail::panel>
<img src="{{ $message->embed(storage_path('app/public/check.png')) }}"
  alt="会員登録完了" />
この度は、本サイトへメンバー登録をいただきましてありがとうございました。
以下は、登録いただいたメンバー情報です。
</x-mail::panel>

**登録情報**

<x-mail::table>
|項目|内容|
|-------------|-----------------------------------|
|メンバー名|{{ $member->name }}|
|パスワード|（セキュリティ保護のため、伏せています）|
|メールアドレス|{{ $member->email }}|
</x-mail::table>

<x-mail::button :url="route('members.index', [], true)" :color="'success'">
ログインはこちら
</x-mail::button>

---

<x-mail::footer>
[「サーバーサイド技術の学び舎」事務局](mailto:webmaster@wings.msn.to)<br />
<img src="https://wings.msn.to/image/wings.jpg" alt="WINGS" width="53" height="17" /><br />
</x-mail::footer>

</x-mail::message>
