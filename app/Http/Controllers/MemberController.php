<?php

namespace App\Http\Controllers;

use App\Events\MemberRegistered;
use App\Jobs\SendmailJob;
use App\Mail\MemberCreated;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('members.index', ['members' => $members]);
    }

    public function create()
    {
        return view('members.create', ['member' => new Member()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'exclude_if:dm,false|required|email:rfc,dns',
            // 'email' => 'required_if:dm,true',
            // 'email'=> [
            //     Rule::excludeIf(fn () => $request->input('roles') === ['general']),
            //     // Rule::excludeIf($request->input('roles') === ['general']),
            //     'required',
            //     'email:rfc,dns',
            // ],

            'dm' => 'boolean',

        ]);
        $data = $request->only(['name', 'name_kana', 'email', 'dm', 'password', 'prefecture', 'city', 'other', 'roles', 'info']);
        $member = new Member();
        $member->fill($data)->save();

        // Mail::to($member->email)->send(new MemberCreated($member));

        // Mail::to($member->email)
        //     ->queue(new MemberCreated($member));

        // SendmailJob::dispatch($member);

        // SendmailJob::dispatchIf($member->dm, $member);

        // SendmailJob::dispatch($member)->delay(now()->addMinutes(5));

        // SendmailJob::dispatch($member)->withoutDelay();

        // SendmailJob::dispatch($member)->afterCommit();

        // MemberRegistered::dispatch($member);

        // MemberRegistered::dispatchIf(in_array('general', $member->roles), $member);

        return to_route('members.index');
    }

    public function show(Member $member)
    {
        return view('members.show', ['member' => $member]);
    }

    public function edit(Member $member)
    {
        return view('members.edit', ['member' => $member]);
    }

    public function update(Request $request, Member $member)
    {
        $member->fill($request->only(
            ['name', 'name_kana', 'email', 'dm', 'password', 'prefecture', 'city', 'other', 'roles', 'info']
        ))->save();
        return to_route('members.index');
    }

    public function destroy(Member $member)
    {
        $member->delete();
        return to_route('members.index');
    }
}
