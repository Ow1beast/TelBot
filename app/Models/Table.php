<?php

namespace Models;

use Core\Database;

abstract class Table{
    private static $table_name;

    static function select($join = "*", $columns = null, $where = null){
        return Database::instance()->select(static::$table_name, $join, $columns, $where);
    }

    static function has($where = null){
        return Database::instance()->has(static::$table_name, $where);
    }

    static function insert($datas){
        return Database::instance()->insert(static::$table_name, $datas);
    }

    static function get($join = null, $columns = null, $where = null){
        return Database::instance()->get(static::$table_name, $join, $columns, $where);
    }

    static function update($datas, $where){
        return Database::instance()->update(static::$table_name, $datas, $where);
    }

    static function delete($where){
        return Database::instance()->delete(static::$table_name, $where);
    }

    static function count($where = null){
        return Database::instance()->count(static::$table_name, $where);
    }

    static function getById($id){
        return self::get(["id" => $id]);
    }
}