<?php

class Database {

    private $dsn = "mysql:host=localhost;dbname=taxi";
    private $user = "root";
    private $passwd = "";
    private $pdo;

    public function open() {
        $this->pdo = new PDO($this->dsn, $this->user, $this->passwd);
        return $this->pdo;
    }

    public function getConnection() {
        return $this->pdo;
    }

}
