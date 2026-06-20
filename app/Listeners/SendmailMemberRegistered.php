<?php

namespace App\Listeners;

use App\Events\MemberRegistered;
use App\Mail\MemberCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendmailMemberRegistered /*implements ShouldQueue*/
{
    // public $connection = 'database';
    // public $queue = 'myapp';
    // public $delay = 300;

    public function __construct()
    {
        //
    }

    public function handle(MemberRegistered $event): void
    {
        Mail::to($event->member->email)
            ->send(new MemberCreated($event->member));
    }
}
