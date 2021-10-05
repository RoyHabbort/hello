<?php

namespace App\Services\MessageWriter\Messages;

class DefaultMessage extends AbstractMessage
{

    public function __construct(string $message, string $author)
    {
        parent::__construct($message, $author);
    }

}