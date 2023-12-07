<?php


/**
 *Class Db
 *  Component for working with database
 */
class Db
{

    /**
     * Establishes a connection to the database
     * @return PDO <p>Object of PDO class for working with the database</p>
     */
    public static function getConnection()
    {
        // Get connection parameters from the file
        $paramsPath = ROOT . '/config/db_params.php';
        $params = include($paramsPath);

        // Establish the connection
        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO($dsn, $params['user'], $params['password']);

        // Set the encoding
        $db->exec("set names utf8");

        return $db;
    }

}