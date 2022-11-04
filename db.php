<?php
$servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "blog";

    try {
        $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }


    function getData($sql, $connection, $fetchAll = false) {
        $statement = $connection->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $fetchAll ? $statement->fetchAll() : $statement->fetch();      
    }

    function insertData($sql, $connection) {
        $statement = $connection->prepare($sql);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement->execute();
    }

?>