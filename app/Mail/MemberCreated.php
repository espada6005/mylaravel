<?php

namespace App\Mail;

use App\Models\Member;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Headers;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;

class MemberCreated extends Mailable  /*implements ShouldQueue*/
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public Member $member)
    {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "{$this->member->name}さん、登録ありがとうございました",
        );
    }

    // public function headers(): Headers
    // {
    //     return new Headers(
    //         messageId: 'welcome-'.time().'@example.com',
    //         references: ['7e83-c089-4365-9a83-ed1@example.com'],
    //         text: [
    //         'X-Priority' => '1',
    //         'Importance' => 'High',
    //         'X-My-Header' => 'hoge',
    //         ],
    //     );
    // }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.member_created',
            text: 'emails.member_created_plain',
        // markdown: 'emails.member_created_md',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            // Attachment::fromPath(storage_path('logs/laravel.log')),
        ];

        // return ([
        //     Attachment::fromData(fn() => 'Hoge')
        //         ->as('test.txt')->withMime('text/plain'),
        // ]);
    }
}
