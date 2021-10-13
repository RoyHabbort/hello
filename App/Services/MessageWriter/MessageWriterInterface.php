<?php

namespace App\Services\MessageWriter;

use App\Services\MessageWriter\Messages\MessageInterface;

interface MessageWriterInterface
{

    public function write(MessageInterface $message);

}