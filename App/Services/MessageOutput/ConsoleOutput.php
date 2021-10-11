<?php

namespace App\Services\MessageOutput;

class ConsoleOutput implements MessageOutputInterface
{

    public function output(string $message): bool
    {
        echo $message;
        return true;
    }

}