<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $name_contact;
    protected $content_contact;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name_contact,$content_contact)
    {
        $this->name_contact = $name_contact;
        $this->content_contact = $content_contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('shop.pages.contact')->with([
          'name_contact' => $this->name_contact,
          'content_contact' => $this->content_contact
        ]);
    }
}
