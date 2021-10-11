<?php

namespace App\Services\MessageOutput;

interface FileOutputInterface
{

    public function getOutputFilePath(): string;

    public function setOutputFilePath(string $outputFilePath): FileOutput;

}