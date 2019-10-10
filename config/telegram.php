<?php

use Core\Commands\HelpCommand;
use Core\Commands\StartCommand;
use Core\Helpers;

return [
    "token" => "932185911:AAGdwWai22WKCAQl4TjXNDOq9v8JXBH6Paw",
    "commands" => [
        StartCommand::class,
        HelpCommand::class
    ],
    "update_id_file" => Helpers::path("data", "update_id.txt")
];