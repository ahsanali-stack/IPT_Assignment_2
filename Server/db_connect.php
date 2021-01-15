<?php


class DB_CONNECT
{

    public function __construct()
    {
    }
    public function connect()
    {
        
        //echo DB_CONNECT::$dbname;
        // Create connection
        $conn = new mysqli('localhost', 'test', 'qwerty#@!321','test_db');
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        return $conn;

    }
}