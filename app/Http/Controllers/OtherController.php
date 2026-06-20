<?php

namespace App\Http\Controllers;

use App\Events\Foo;
use App\Events\Hoge;
use App\Jobs\SendmailJob;
use App\Models\Member;

class OtherController extends Controller
{
    public function queueName()
    {
        $member = Member::find(1);
        // $member = Member::find(2);
        SendmailJob::dispatch($member)
            ->onQueue('mail');
        return 'メール送信ジョブをキューに登録しました。';
    }

    public function subscribeEvent()
    {
        Hoge::dispatch();
        Foo::dispatch();
        return "イベントログを記録しました。";
    }
}
