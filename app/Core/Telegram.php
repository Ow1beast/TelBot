<?php

namespace Core;

use Core\Commands\HelpCommand;
use Models\Tables\Updates;
use Telegram\Bot\Api;
use Telegram\Bot\Methods\Update;

class Telegram{
    private static $instance;

    private function __construct()
    {
        self::$instance = new Api("886656983:AAHxao9udRusctpLwHwxUwyn8F9cavQhuM0");

        self::$instance->addCommand(HelpCommand::class);
    }

    private static function init(){
        if (!self::$instance instanceof Api)
            new self();
    }

    static function getUpdates(array $params = [], $shouldEmitEvents = true){
        self::init();

        return self::$instance->getUpdates($params, $shouldEmitEvents);
    }

    static function sendMessage($chat_id, $message){
        return self::$instance->sendMessage([
            "chat_id" => $chat_id,
            "text" => $message
        ]);
    }
    static function eachUpdate(callable $callback){

        $update_id = Updates::max("id");

        foreach (self::getUpdates([
            "offset" => $update_id + 1
        ]) as $update){

            self::$instance->commandsHandler(false);

            Updates::insert([
                "id" => $update["update_id"]
            ]);
            if($update->getMessage()["text"][0] != "/")
                call_user_func($callback, $update);
        }
    }
}