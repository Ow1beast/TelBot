<?php

namespace Core\Commands;


use Telegram\Bot\Commands\Command;

class HelpCommand extends Command
{
    protected $name = "help";

    protected $description = "This is help";

    public function handle()
    {
        $response = '';
        $commands = $this->getTelegram()->getCommands();

        foreach ($commands as $command){
            $response .= "/" . $command->getName() . " - ";
            $response .= $command->getDescription() . PHP_EOL;
        }
        $this->replyWithMessage(["text" => $response]);
    }

}