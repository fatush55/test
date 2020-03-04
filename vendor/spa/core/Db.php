<?php


namespace spa;


class Db
{

    use TSingleton;

    protected function __construct()
    {
        $db = require_once ROOT . '/config/config_db.php';
        class_alias('\RedBeanPHP\R', '\R');
        \R::setup($db['dsm'], $db['users'], $db['password']);

        if (!\R::testConnection()) {
            echo 'Database connection fail, 500';
        }

        \R::freeze(true);
        if (DEBUG){
            \R::debug(true,1);
        }

        \R::ext('xdispense', function ($type){
            return \R::getRedBean() -> dispense($type);
        });
    }

}