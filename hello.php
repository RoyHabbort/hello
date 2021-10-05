<?php

require_once __DIR__ . "/boot/boot.php";

use App\Services\MessageWriter\Messages\AnonymousMessage;
use \App\Services\MessageWriter\MessageWriter;
use \App\Services\MessageWriter\Messages\DefaultMessage;
use \App\Services\MessageWriter\Messages\DatedMessage;
use \App\Services\MessageWriter\Messages\CompanyMessage;

$message = new DefaultMessage("Hello world", "Oleg");
$messageWriter = new MessageWriter();
$messageWriter->write($message);

$anonymousContent = "Dear friend,
I am Mrs. Sese-seko widow of late President Mobutu Sese-seko of Zaire, now known as Democratic Republic of Congo (DRC). I am moved to write you this letter. This was in confidence considering my present circumstance and situation. I escaped along with my husband and two of our sons Alfred and Basher out of Democratic Republic of Congo (DRC) to Abidjan, Cote d’ivoire where my family and I settled, while we later moved to settled in Morroco where my husband later died of cancer disease.
I have deposited the sum Eighteen Million United State Dollars (US$18,000,000,00.) With a security company for safe keeping. What I want you to do is to indicate your interest that you can assist us in receiving the money on our behalf, so that I can introduce you to my son (Alfred) who has the out modalities for the claim of the said funds. I want you to assist in investing this money, but I will not want my identity revealed. I will also want to acquire real/landed properties and stock in multi-national companies and to engage in other safe and non-speculative investments as advise by your good self.";
$anonymousMessage = new AnonymousMessage($anonymousContent);
$messageWriter->write($anonymousMessage);

$datedMessage = new DatedMessage("Вы опаздываете", "Ваш будильник");
$messageWriter->write($datedMessage);

$companyMessage = new CompanyMessage("Здравствуйте, я оператор Вадим, и я хотел бы рассказать вам о нашем новом предложении", "Арсен", "New investment Republic");
$messageWriter->write($companyMessage);