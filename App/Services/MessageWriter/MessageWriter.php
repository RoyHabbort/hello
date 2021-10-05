<?php

namespace App\Services\MessageWriter;

use App\Interfaces\DatedInterface;
use App\Services\MessageWriter\Messages\MessageInterface;

class MessageWriter
{

    public function write(MessageInterface $message)
    {
        echo "--------------------------------------------------------------------" . PHP_EOL;
        echo $message->getContent() . PHP_EOL;
        echo "Author: " . $message->getAuthor() . PHP_EOL;
        if ($message instanceof DatedInterface) {
            echo "Date: {$message->getDate()}" . PHP_EOL;
        }
        echo "--------------------------------------------------------------------" . PHP_EOL;
        echo PHP_EOL;
    }

}