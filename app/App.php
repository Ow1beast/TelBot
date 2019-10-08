<?php

use Telegram\Bot\Api;

class App{
    public function __construct()
    {
        $t = new Api("886656983:AAHxao9udRusctpLwHwxUwyn8F9cavQhuM0");
        var_dump($t->getUpdates());
    }
}