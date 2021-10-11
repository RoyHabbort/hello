<?php

namespace App\Services\MessageOutput;

class FileOutput implements MessageOutputInterface, FileOutputInterface
{

    /** @var string */
    protected $outputFilePath;

    /**
     * @return string
     */
    public function getOutputFilePath(): string
    {
        return $this->outputFilePath;
    }

    /**
     * @param string $outputFilePath
     * @return FileOutput
     */
    public function setOutputFilePath(string $outputFilePath): FileOutput
    {
        $this->outputFilePath = $outputFilePath;
        return $this;
    }

    /**
     * @param string $message
     * @return bool
     * @throws MessageOutputException
     */
    public function output(string $message): bool
    {
        if (empty($this->outputFilePath)) {
            throw new MessageOutputException("Missing path for output file");
        }

        //@todo: подумать над передачей флагов извне
        return (bool) file_put_contents($this->getOutputFilePath(), $message, FILE_APPEND);
    }

}