<?php

namespace App;

use App\Libs\Db;

require_once 'app/libs/Db.php';


class Comments {

    protected $db;
    protected $uri;
    private $uri_comments;


    public function __construct($uri) {
        $this->db = new Db();
        $this->uri = $uri;
        $this->uri_comments = $this->uri.'_comments';
    }

    public function getAllComments() {
        return $this->db->selectAll("SELECT id, comment, rate, create_date FROM $this->uri_comments ORDER BY id DESC");
    }

    public function createNewComment($comment, ) {
        $this->db->squery(
            "INSERT IGNORE INTO `$this->uri_comments`(comment, ip) VALUES (:comment, :ip)",
            ['comment' => $comment, 'ip' => $_SERVER['REMOTE_ADDR']]
        );
    }

    
}
