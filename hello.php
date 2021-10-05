<?php

require_once __DIR__ . "/boot/boot.php";

use \App\Services\MessageWriter\MessageWriter;

$messageWriter = new MessageWriter();
$messageWriter->write("hello world");
