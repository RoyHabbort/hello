<?php

namespace App\Services\MessageWriter\Messages;

abstract class AbstractMessage implements MessageInterface
{

    /** @var string */
    protected $content;
    /** @var string */
    protected $author;

    public function __construct(string $message, string $author)
    {
        $this->content = $message;
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @return int
     */
    public function getContentSize(): int
    {
        return mb_strlen($this->content);
    }

}