<?php

namespace App;

use App\Libs\Db;
use PDO;

require_once 'app/libs/Db.php';

class Table {

    protected $db;
    protected $uri;
    private $uri_comments;


    public function __construct($uri) {
        $this->db = new Db();
        $this->uri = $uri;
        $this->uri_comments = $this->uri.'_comments';
    }


    public function getAllRate() {
        return $this->db->selectAll("SELECT * FROM `uris` WHERE `uri`='$this->uri'");
    }


    public function createTableOfComments() {
        $this->db->query("CREATE TABLE IF NOT EXISTS `$this->uri_comments` (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            comment VARCHAR(700) NOT NULL,
            rate BOOLEAN DEFAULT 0,
            ip VARCHAR(25) NOT NULL,
            create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            update_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )");
    }


    public function insertNewTableName() {
        $this->db->squery(
            "INSERT IGNORE INTO uris(uri, ip, comments, likes, dislikes) VALUES (:uri, :ip, 0, 0, 0)",
            ['uri' => $this->uri, 'ip' => $_SERVER['REMOTE_ADDR']]
        );
    }


    public function checkTableName() {
        return $this->db->select("SELECT `uri` FROM `uris` WHERE `uri`='$this->uri'");
    }
}
