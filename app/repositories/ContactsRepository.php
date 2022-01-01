<?php


namespace App\repositories;


use App\Interfaces\ContactRepositoryInterface;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactsRepository implements ContactRepositoryInterface
{
    public function sendContactFromSite($name, $email, $message): void
    {
        Mail::send(new ContactMail($name, $email, $message));
    }
}
