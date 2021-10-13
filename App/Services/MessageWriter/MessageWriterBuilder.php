<?php

namespace App\Services\MessageWriter;

use App\Services\MessageFormatter\FormatterFactory;
use App\Services\MessageOutput\OutputFactory;

class MessageWriterBuilder
{

    public const CONFIG_FORMATTER_NAME = 'formatter_name';
    public const CONFIG_OUTPUT_NAME = 'output_service_name';
    public const CONFIG_OUTPUT_ADVANCE_PARAMS_NAME = 'output_service_params';

    /**
     * @param array $config
     * @return MessageWriterInterface
     * @throws BuildMessageWriterFailure
     */
    public function build(array $config): MessageWriterInterface
    {

        if (empty($config[static::CONFIG_FORMATTER_NAME])) {
            throw new BuildMessageWriterFailure('Writer service build failed. Formatter name is missed.');
        }

        if (empty($config[static::CONFIG_OUTPUT_NAME])) {
            throw new BuildMessageWriterFailure('Writer service build failed. Output service name is missed.');
        }

        $formatterFactory = new FormatterFactory();
        $formatter = $formatterFactory->factory($config[static::CONFIG_FORMATTER_NAME]);

        $outputFactory = new OutputFactory();
        $outputService = $outputFactory->factory(
            $config[static::CONFIG_OUTPUT_NAME],
            $config[static::CONFIG_OUTPUT_ADVANCE_PARAMS_NAME] ?? []
        );

        return new MessageWriter($formatter, $outputService);
    }

}