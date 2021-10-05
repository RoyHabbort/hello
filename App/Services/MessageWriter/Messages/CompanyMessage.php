<?php

namespace App\Services\MessageWriter\Messages;

class CompanyMessage extends AbstractMessage
{

    /** @var string */
    protected $company;

    public function __construct(string $message, string $author, string $company)
    {
        parent::__construct($message, $author);
        $this->company = $company;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        $author = parent::getAuthor();
        return sprintf("%s from %s", $author, $this->company);
    }
}