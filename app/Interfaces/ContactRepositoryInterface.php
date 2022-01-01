<?php


namespace App\Interfaces;


interface ContactRepositoryInterface
{
    public function sendContactFromSite(string $name, string $email, string $message): void;
}
