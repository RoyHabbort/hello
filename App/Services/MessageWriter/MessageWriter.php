<?php

namespace App\Services\MessageWriter;

use App\Services\MessageFormatter\MessageFormatterInterface;
use App\Services\MessageOutput\MessageOutputException;
use App\Services\MessageOutput\MessageOutputInterface;
use App\Services\MessageWriter\Messages\MessageInterface;

class MessageWriter
{

    const STATUS_SUCCESS = "SUCCESS";
    const STATUS_FAILED = "FAILED";

    /** @var MessageFormatterInterface  */
    protected $formatter;
    /** @var MessageOutputInterface  */
    protected $outputer;

    public function __construct(MessageFormatterInterface $formatter, MessageOutputInterface $outputer)
    {
        $this->formatter = $formatter;
        $this->outputer = $outputer;
    }

    public function write(MessageInterface $message)
    {
        $string = $this->formatter->format($message);
        try {
            $result = $this->outputer->output($string);
        } catch (MessageOutputException $messageOutputException) {
            //@todo: нормальную систему логирования через монолог
            echo $messageOutputException->getMessage();
            $result = false;
        }

        $resultStatus = $result ? static::STATUS_SUCCESS : static::STATUS_FAILED;
        echo "SEND MESSAGE STATUS: {$resultStatus}" . PHP_EOL;
    }

}