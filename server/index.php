<?php

header('Content-Type: application/json');

use App\Table;
use App\Comments;

require_once './settings.php';
require_once './app/Table.php';
require_once './app/Comments.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $data = json_decode(file_get_contents('php://input'), true);
    $data['table'] = $_GET['table']; 

    if ($data !== null) {
        if (isset($data['table']) && !empty($data['table'])) {

            $uri = $secure->fullFilterData($data['table']);
            $table = new Table($uri);
            $comments = new Comments($uri);
            
            $checkUri = $table->checkTableName();
    
            if ($checkUri) {
                $data = ['table' => ['name' => $uri, 'data' => $table->getAllRate()], 'comments' => $comments->getAllComments()];
                echo json_encode(['success' => true, 'data' => $data]);
                return;
            } 
            
            $table->insertNewTableName();
            $table->createTableOfComments();
            
            $data = ['msg' => 'Created table'];
        }

        if (isset($data['comment']) && !empty($data['comment'])) {

            $table = $secure->fullFilterData($data['table_name']);
            $table = $table.'_comments';

            $comment = $secure->filterData($data['comment']);
    
            $db->squery(
                "INSERT IGNORE INTO `$table`(comment) VALUES (:comment)",
                ['comment' => $comment]
            );

            $data = ['msg' => 'Created comment'];
        }
        
        echo json_encode(['success' => true, 'data' => $data]);
    } else {
        http_response_code(400);
        echo json_encode(['success' => false, 'error' => 'Invalid JSON']);
    }
} else {
    http_response_code(405);
    echo json_encode(['success' => false, 'error' => 'Method Not Allowed']);
}
