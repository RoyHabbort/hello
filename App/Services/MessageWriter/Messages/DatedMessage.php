<?php

namespace App\Services\MessageWriter\Messages;

use App\Interfaces\DatedInterface;
use App\Services\MessageWriter\Messages\Exceptions\MessageConstructException;

class DatedMessage extends AbstractMessage implements DatedInterface
{

    /** @var string  */
    protected $date;

    public function __construct(string $message, string $author, string $dateFormat = 'Y-m-d H:i:s')
    {
        parent::__construct($message, $author);

        $currentDate = date($dateFormat);
        //обработка false, которое может вернуть date()
        if (!$currentDate) {
            throw new MessageConstructException("PHP function date() is failed. Returned false.");
        }

        $this->date = $currentDate;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

}