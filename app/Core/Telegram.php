<?php

namespace Core;

use Telegram\Bot\Api;

class Telegram
{

    private static $instance;

    private function __construct($cfg)
    {
        self::$instance
            = new Api($cfg["token"]);

        if (isset($cfg["commands"]))
            self::$instance
                ->addCommands($cfg["commands"]);
    }

    static function init($cfg)
    {
        if (!self::$instance instanceof Api)
            new self($cfg);
    }

    static function sendMessage($chat_id, $message) {
        return self::$instance
            ->sendMessage([
                "chat_id" => $chat_id,
                "text" => $message
            ]);
    }

    static function handle() {

        $updates = self::$instance
            ->commandsHandler(false);

    }

}