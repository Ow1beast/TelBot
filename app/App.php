<?php

use Core\Telegram;
use Models\Tables\Updates;
use Telegram\Bot\Api;
use Telegram\Bot\Objects\Update;

class App{
    public function __construct()
    {
        Telegram::eachUpdate(function (Update $update){

            $chat_id = $update->getMessage()["chat"]["id"];

            $text = $update->getMessage()["text"];

            Telegram::sendMessage($chat_id, $text);
            echo "<br />";
        });
    }
}