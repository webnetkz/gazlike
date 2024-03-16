<?php

namespace App;

use App\Libs\Db;
use PDO;

require_once 'app/libs/Db.php';

class Table {

    protected $db;
    protected $uri;


    public function __construct($uri) {
        $this->db = new Db();
        $this->uri = $uri;
    }


    public function getAllRate() {
        return $this->db->selectAll("SELECT * FROM $this->uri");
    }


    public function createTableOfStatictics() {
        return $this->db->query("CREATE TABLE IF NOT EXISTS `$this->uri` (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            views INT(12) UNSIGNED NOT NULL DEFAULT 0,
            create_ip VARCHAR(45) NOT NULL,
            likes TINYINT UNSIGNED NOT NULL DEFAULT 0,
            dislikes TINYINT UNSIGNED NOT NULL DEFAULT 0,
            comments_count TINYINT UNSIGNED NOT NULL DEFAULT 0,
            create_date DATE NOT NULL DEFAULT CURRENT_DATE(),
            create_time TIME NOT NULL DEFAULT CURRENT_TIME()
        )");
    }


    public function createTableOfComments() {
        $commentsTableName = $this->uri.'_comments';
        $this->db->query("CREATE TABLE IF NOT EXISTS `$commentsTableName` (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            comment VARCHAR(700) NOT NULL,
            rate TINYINT UNSIGNED NOT NULL DEFAULT 0,
            create_date DATE NOT NULL DEFAULT CURRENT_DATE(),
            create_time TIME NOT NULL DEFAULT CURRENT_TIME()
        )");
    }


    public function insertNewTableName() {
        $this->db->squery(
            "INSERT IGNORE INTO uris(uri) VALUES (:uri)",
            ['uri' => $this->uri]
        );
    }


    public function insertStaticticsOfTable() {
        $this->db->squery(
            "INSERT INTO `$this->uri`(views, create_ip) VALUES (1, :ip)",
            ['ip' => $_SERVER['REMOTE_ADDR']]
        );
    }


    public function checkTableName() {
        return $this->db->select("SELECT `uri` FROM `uris` WHERE `uri`='$this->uri'");
    }
}
