<?php

namespace service;

class DBConnector
{

    private static $config;

    private static $connection;

    /**
     * Set config
     */
    public static function setConfig(array $config)
    {
        self::$config = $config; 
    }

    /**
     * Creatre a connection
     */
    Private static function createConnection()
    {
        $dbConnection = sprintf(
            '%s:host=%s;dbname=%s', 
            self::$config['driver'],
            self::$config['host'], 
            self::$config['dbname']);
        
            self::$connection = new \PDO(
                $dbConnection,
                self::$config['dbuser'],
                self::$config['dbpass']
            );
    }

    /**
     * Get connection
     */
    
    public static function getConnection()
    {
        if (! self::$connection) {
            self::createConnection();
        }
        
        return self::$connection;
    }
}

/*
 CREATE TABLE `register`.`user`(
 id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 username VARCHAR(255),
 `PASSWORD` varchar(255)
 )
 ENGINE = InnoDB
 DEFAULT CHARACTER SET = utf8
 COLLATE = utf8_bin;*/