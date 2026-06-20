<?php

namespace App\Jobs;

use DateTime;
use Throwable;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Queue\ShouldBeEncrypted;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\Attributes\WithoutRelations;
use Illuminate\Queue\Middleware\FailOnException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\MemberCreated;
use App\Models\Member;

class SendmailJob implements ShouldQueue, ShouldBeUnique /*, ShouldBeEncrypted */
{
    use Queueable;

    // public $uniqueFor = 300;

    public $deleteWhenMissingModels = true;

    // public $tries = 5;
    // public $backoff = 10;
    // public $backoff = [1, 5, 10];
    // public $maxExceptions = 3;
    // public $failOnTimeout = true;
    // public $timeout = 60;

    public function __construct(
        // #[WithoutRelations]
        public Member $member
    ) {
        // $this->delay(300);
        // $this->afterCommit();
        // $this->onQueue('mail');
    }

    // public function uniqueId(): string
    // {
    //     return 'send_mail_to_' . $this->member->id;
    // }

    public function handle(): void
    {
        // throw new AuthorizationException('Job is not authorized.');
        Mail::to($this->member->email)
            ->send(new MemberCreated($this->member));
    }

    // public function middleware(): array
    // {
    //     return [
    //         new FailOnException([AuthorizationException::class])
    //     ];
    // }

    // public function tries()
    // {
    //     if (app()->environment('production')) { return 5; }
    //     return 1;
    // }

    // public function retryUntil()
    // {
    //     return now()->addMinutes(5);
    // }

    // public function backoff(): array
    // {
    //     return [1, 5, 10];
    // }

    // public function failed(?Throwable $ex): void
    // {
    //     Log::channel('slack')->error(get_class($this) . ': ' . $ex->getMessage());
    // }
}
