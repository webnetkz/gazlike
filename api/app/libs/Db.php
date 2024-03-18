<?php

namespace App\Libs;

use PDO;

class Db {

    public $pdo = null;


    public function __construct() {
        $driver = 'mysql';
        $host = URL_DB;
        $db_name = NAME_DB;
        $db_user = USER_DB;
        $db_pass = PASS_DB;
        $charset = 'utf8';
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        
        try {
            $this->pdo = new PDO("$driver:host=$host;dbname=$db_name;charset=$charset",$db_user,$db_pass,$options);
        } catch (PDOException $e) {
            exit('Ошибка подключения к базе данных'.$e);
        }
    }


    public function query($sql) {
        return $this->pdo->query($sql);
    }


    public function squery($sql, $params = []) {
        $stmt = $this->pdo->prepare($sql);
    
        try {
            $stmt->execute($params);
            return $stmt->rowCount();
        } catch (PDOException $e) {
            echo 'Ошибка выполнения запроса: ' . $e->getMessage();
            exit();
        }
    }


    public function select($sql) {
        $result = $this->pdo->query($sql);
        return $result->fetch(PDO::FETCH_ASSOC);
    }


    public function selectAll($sql) {
        $result = $this->pdo->query($sql);
        if ($result) {
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }
        return 'Error SelectAll';
    }
}
