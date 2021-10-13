<?php

require_once __DIR__ . "/boot/boot.php";

use \App\Services\MessageWriter\Messages\AnonymousMessage;
use \App\Services\MessageWriter\Messages\DefaultMessage;
use \App\Services\MessageWriter\Messages\DatedMessage;
use \App\Services\MessageWriter\Messages\CompanyMessage;
use \App\Services\MessageWriter\MessageWriterBuilder;
use \App\Services\MessageFormatter\FormatterFactory;
use \App\Services\MessageOutput\OutputFactory;

$outputFilePath = __DIR__ . "/outputs/testfile";
//Такие конфиги обычно хранятся где-то во вне.
$configFirstWriter = [
    MessageWriterBuilder::CONFIG_FORMATTER_NAME => FormatterFactory::FIRST_FORMATTER,
    MessageWriterBuilder::CONFIG_OUTPUT_NAME => OutputFactory::CONSOLE_OUTPUT,
];

$configSecondWriter = [
    MessageWriterBuilder::CONFIG_FORMATTER_NAME => FormatterFactory::SIMPLE_FORMATTER,
    MessageWriterBuilder::CONFIG_OUTPUT_NAME => OutputFactory::FILE_OUTPUT,
    MessageWriterBuilder::CONFIG_OUTPUT_ADVANCE_PARAMS_NAME => [
        'file_path' => $outputFilePath
    ]
];

//Можно добавить перехват и обработку эксепшенов, но так как у нас нет никакой оболочки, и вообще всё по минимуму,
//то будем довольствоваться тем что имеем, и радоваться эксепшенам в консоле.
$messageWriterBuilder = new MessageWriterBuilder();
$firstWriter = $messageWriterBuilder->build($configFirstWriter);
$secondWriter = $messageWriterBuilder->build($configSecondWriter);

$message = new DefaultMessage("Hello world", "Oleg");
$firstWriter->write($message);

$anonymousContent = "Dear friend,
I am Mrs. Sese-seko widow of late President Mobutu Sese-seko of Zaire, now known as Democratic Republic of Congo (DRC). I am moved to write you this letter. This was in confidence considering my present circumstance and situation. I escaped along with my husband and two of our sons Alfred and Basher out of Democratic Republic of Congo (DRC) to Abidjan, Cote d’ivoire where my family and I settled, while we later moved to settled in Morroco where my husband later died of cancer disease.
I have deposited the sum Eighteen Million United State Dollars (US$18,000,000,00.) With a security company for safe keeping. What I want you to do is to indicate your interest that you can assist us in receiving the money on our behalf, so that I can introduce you to my son (Alfred) who has the out modalities for the claim of the said funds. I want you to assist in investing this money, but I will not want my identity revealed. I will also want to acquire real/landed properties and stock in multi-national companies and to engage in other safe and non-speculative investments as advise by your good self.";
$anonymousMessage = new AnonymousMessage($anonymousContent);
$secondWriter->write($anonymousMessage);

$datedMessage = new DatedMessage("Вы опаздываете", "Ваш будильник");
$secondWriter->write($datedMessage);

$companyMessage = new CompanyMessage("Здравствуйте, я оператор Вадим, и я хотел бы рассказать вам о нашем новом предложении", "Арсен", "New investment Republic");
$secondWriter->write($companyMessage);