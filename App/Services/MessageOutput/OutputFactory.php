<?php

namespace App\Services\MessageOutput;

use App\Exceptions\FactoryOutOfValuesException;

class OutputFactory
{

    public const CONSOLE_OUTPUT = 'console';
    public const FILE_OUTPUT = 'file_output';

    protected $outputs = [
        self::CONSOLE_OUTPUT => ConsoleOutput::class,
        self::FILE_OUTPUT => FileOutput::class,
    ];

    /**
     * @param string $outputName
     * @param array $params
     * @return MessageOutputInterface
     * @throws FactoryOutOfValuesException
     */
    public function factory(string $outputName, array $params = []) : MessageOutputInterface
    {
        if (empty($this->outputs[$outputName])) {
            throw new FactoryOutOfValuesException("Output with name {$outputName} not registered");
        }

        $service = new $this->outputs[$outputName];

        if ($service instanceof FileOutputInterface && !empty($params['file_path'])) {
            $service->setOutputFilePath($params['file_path']);
        }

        return $service;
    }

}