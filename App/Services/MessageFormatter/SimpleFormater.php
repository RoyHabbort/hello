<?php

namespace App\Services\MessageFormatter;

use App\Services\MessageWriter\Messages\MessageInterface;

class SimpleFormater implements MessageFormatterInterface
{

    public function format(MessageInterface $message): string
    {
        $formatString = $message->getContent() . PHP_EOL;
        $formatString .= "Author: " . $message->getAuthor() . PHP_EOL;
        $formatString .= PHP_EOL;
        return $formatString;
    }

}