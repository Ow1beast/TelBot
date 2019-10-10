<?php

use Core\Config;
use Core\Telegram;
use Telegram\Bot\Api;

class App {

    public function __construct()
    {
        /*
        Telegram::init(Config::telegram());
        Telegram::handle();
        */

        $cfg = Config::telegram();

        $api = new Api($cfg["token"]);
        $api->addCommands($cfg["commands"]);
        $updates = $api->commandsHandler(false);

        new UpdatesHandler($api, $updates);

    }

}