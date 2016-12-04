<?php

class DbConfig
{
    protected static $DB_HOST     = 'localhost';
    protected static $DB_USER     = 'softHouse';
    protected static $DB_PASSWORD = 'qwerty';
    protected static $DB_NAME     = 'softHouse';
    protected static $SERVER_TYPE = 'mysql';
    protected static $CHARSET     = 'utf8';
    public static $TABLE_PREFIX   = '';//'3w_';

    public static function getDbName()
    {
        return self::$DB_NAME;
    }
    public static function getDbPrefix()
    {
        return self::$TABLE_PREFIX;
    }
}
