<?php

namespace App\Services\MessageOutput;

interface MessageOutputInterface
{

    public function output(string $message): bool;

}