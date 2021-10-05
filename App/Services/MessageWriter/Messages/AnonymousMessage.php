<?php

namespace App\Services\MessageWriter\Messages;

class AnonymousMessage extends AbstractMessage
{

    public const ANONYMOUS_NAME = 'Your dear friend';

    public function __construct(string $message)
    {
        parent::__construct($message, static::ANONYMOUS_NAME);
    }

}