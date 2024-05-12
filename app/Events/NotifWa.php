<?php

namespace App\Events;


class NotifWa
{
    public function __construct(public readonly string $message, public readonly array $numbers = [])
    {
    }
}
