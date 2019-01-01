<?php

class Database extends PDO {
    public function __construct() {
        try {
            $dsn = "mysql:host=".DATABASE_HOST.";dbname=".DATABASE_NAME;

            parent::__construct($dsn, DATABASE_USER, DATABASE_PASSWORD);
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }
}