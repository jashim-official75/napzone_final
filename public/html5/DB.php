<?php

class DB
{
    private const HOSTNAME   = 'localhost';
    private const USERNAME   = 'root';
    private const PASSWORD   = 'localpass';
    private const DB_NAME    = 'nap_zone';
    private const DB_CHARSET = 'UTF8';

    public static function connect()
    {
        try {
            $dsn = "mysql:host=" . self::HOSTNAME . ";dbname=" . self::DB_NAME . ";charset=" . self::DB_CHARSET . ";";
            $pdo = new PDO($dsn, self::USERNAME, self::PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"));
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $pdo->exec("SET CHARACTER SET UTF8");
            return $pdo;
        } catch (PDOException $e) {
            die('ERROR DB');
        }
    }
}
