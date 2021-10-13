<?php

namespace App\Services\MessageFormatter;

use App\Exceptions\FactoryOutOfValuesException;

class FormatterFactory
{

    public const FIRST_FORMATTER = 'first';
    public const SIMPLE_FORMATTER = 'simple';

    protected $formatters = [
        self::FIRST_FORMATTER => FirstFormatter::class,
        self::SIMPLE_FORMATTER => SimpleFormater::class,
    ];

    /**
     * @param string $formatterName
     * @return MessageFormatterInterface
     * @throws FactoryOutOfValuesException
     */
    public function factory(string $formatterName): MessageFormatterInterface
    {
        if (empty($this->formatters[$formatterName])) {
            throw new FactoryOutOfValuesException("Formatter with name {$formatterName} not registered");
        }

        return new $this->formatters[$formatterName];
    }

}