<?php

namespace Core;

class Config {

    private static $cfgs = [];

    private function __construct()
    {
    }

    static function getFromName($name, $key = null) {

        if (self::$cfgs[$name])
            $cfg = self::$cfgs[$name];
        else {
            $cfg = include Helpers::path("config", "$name.php");
            self::$cfgs[$name] = $cfg;
        }

        return Helpers::keyOrArray($cfg, $key);

    }

    static function telegram($key = null) {
        return self::getFromName("telegram", $key);
    }

}