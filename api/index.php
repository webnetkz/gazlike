<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: *');

header('Content-Type: application/json');

use App\Table;
use App\Comments;

require_once './settings.php';
require_once './app/Table.php';
require_once './app/Comments.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $uri = $secure->fullFilterData($data['table']);
    $table = new Table($uri);
    $comments = new Comments($uri);

    if ($data !== null && isset($data['action'])) {

        switch($data['action']) {
            case 'search_table':
            
                $checkUri = $table->checkTableName();
        
                if ($checkUri) {
                    $data = ['table' => ['name' => $uri, 'data_of_table' => $table->getAllRate()], 'comments' => $comments->getAllComments()];
                    $data = ['success' => true, 'data' => $data];
                } 
            
            break;

            case 'create_table':
                
                $table->insertNewTableName();
                $table->createTableOfComments();
                $data = ['success' => true, 'msg' => 'Created table'];
    
            break;

            case 'create_comment':

                $uri = $secure->fullFilterData($data['table']);
                $uri = $uri.'_comments';
        
                $comment = $secure->filterData($data['comment']);
                $comments->createNewComment($comment, $data['rate']);
        
                $data = ['msg' => 'Created comment'];

            break;
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