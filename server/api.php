<?php

require_once 'C:\Program Files\OSPanel\domains\gazlike\server\settings.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(array('error' => 'Метод запроса должен быть POST'));
    exit();
}

$request_body = file_get_contents('php://input');

if (!json_decode($request_body)) {
    echo json_encode(array('error' => 'Данные должны быть в формате JSON'));
    exit();
}

$data = json_decode($request_body, true);

if (!isset($data['action'])) {
    echo json_encode(array('error' => 'Отсутствует обязательный параметр action'));
    exit();
}

$action = $data['action'];

if ($action === '') {
    echo json_encode(array('error' => 'Строка не должна быть пустой'));
    exit();
}

if (!preg_match('/^[a-zA-Z0-9_-]+$/', $action)) {
    echo json_encode(array('error' => 'Некорректный формат строки'));
    exit();
}


echo json_encode(array('success' => 'Данные успешно обработаны'));

?>
