<?php

namespace App\Observers;

use App\Models\Member;
use Illuminate\Support\Facades\Mail;
use App\Mail\MemberCreated;

class MemberObserver
{
    public function created(Member $member): void
    {
        Mail::to($member->email)
            ->send(new MemberCreated($member));
    }
}
