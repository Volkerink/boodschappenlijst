<?php
class Connection {

    public function __construct($config) {
        $this->database = $config['connection']. ';dbname='.$config['name'];
        $this->login = $config['user'];
        $this->password = $config['password'];
    }

    public function connectToDb() {
        try {
            return new PDO($this->database, $this->login, $this->password);
            } catch (PDOException $e) {
                die('Could not connect to DataBase' . $e);
            }
    }
}

$DBConnection = new Connection($config['database']);