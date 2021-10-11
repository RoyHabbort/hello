<?php

namespace App\Services\MessageFormatter;

use App\Services\MessageWriter\Messages\MessageInterface;

interface MessageFormatterInterface
{

    public function format(MessageInterface $message): string;

}