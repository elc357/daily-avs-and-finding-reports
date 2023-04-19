<?php

namespace Helper {

    class Database
    {
        static function getConnection(): \PDO
        {
            $db = "MCC_PM3";
            $host = "localhost";
            $port = "3306";
            $username = "root";
            $password = "1234";

            return new \PDO("mysql:host=$host:$port;dbname=$db", $username, $password);
        }
    }
}
