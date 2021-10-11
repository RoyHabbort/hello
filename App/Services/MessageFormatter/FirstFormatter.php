<?php

namespace App\Services\MessageFormatter;

use App\Interfaces\DatedInterface;
use App\Services\MessageWriter\Messages\MessageInterface;

class FirstFormatter implements MessageFormatterInterface
{

    public function format(MessageInterface $message): string
    {
        $formatString = "--------------------------------------------------------------------" . PHP_EOL;
        $formatString .= $message->getContent() . PHP_EOL;
        $formatString .= "Author: " . $message->getAuthor() . PHP_EOL;
        if ($message instanceof DatedInterface) {
            $formatString .= "Date: {$message->getDate()}" . PHP_EOL;
        }
        $formatString .= "--------------------------------------------------------------------" . PHP_EOL;
        $formatString .= PHP_EOL;
        return $formatString;
    }

}