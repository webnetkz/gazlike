<?php

namespace App;

use App\Libs\Db;

require_once 'app/libs/Db.php';


class Comments {

    protected $db;
    protected $table;


    public function __construct($table) {
        $this->db = new Db();
        $this->table = $table;
    }

    public function getAllComments() {
        $commentsTableName = $this->table.'_comments';
        return $this->db->selectAll("SELECT * FROM $commentsTableName ORDER BY id DESC");
    }

    public function createNewComment() {
        $commentsTableName = $this->table.'_comments';
        return $this->db->selectAll("SELECT * FROM $commentsTableName ORDER BY id DESC");
    }

    
}
