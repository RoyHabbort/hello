<?php

namespace App\Services\MessageWriter\Messages;

interface MessageInterface
{

    public function getContent(): string;

    public function getAuthor(): string;

    public function getContentSize(): int;

}