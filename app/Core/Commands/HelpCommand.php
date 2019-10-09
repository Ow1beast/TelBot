<?php

namespace Core\Commands;


use Telegram\Bot\Commands\Command;

class HelpCommand extends Command
{
    protected $name = "help";

    protected $description = "This is help";

    public function handle()
    {
        $this->replyWithMessage(["text"=>"This is help command  "]);
    }

}