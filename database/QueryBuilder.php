<?php
class QueryBuilder {

    public function __construct($pdo, $selection, $tableName) {
        $this->pdo = $pdo;
        $this->selection = $selection;
        $this->tableName = $tableName;
    }

    public function fetchData() {
        $statement = $this->pdo->prepare("select $this->selection from $this->tableName");
        $statement->execute();
        return $statement->fetchAll();
    }

    public function insertData($postArray) {
        try {
            $statement = $this->pdo->prepare(sprintf('insert into %s (%s) values (%s)', 
            $this->tableName, 
            implode(', ', array_keys($postArray)), 
            ':' . implode(', :', array_keys($postArray))));
            $statement->execute($postArray);
    
            } catch (PDOException $e) {
               die('Error inserting into database' . $e);
        }
    }
}

$allGroceries = new QueryBuilder($DBConnection->connectToDb(), "*", "groceries");
$groceryDB = $allGroceries->fetchData();