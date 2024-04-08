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

$mysql = new mysqli(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME, DB_PORT);
if ($mysql->connect_errno) {
    echo json_encode(array('error' => 'Не удалось подключиться к БД'));
    exit();
}
$mysql->set_charset('utf8');

if ($action === 'new_comment') {
    if (!isset($data['text'])) {
        echo json_encode(array('error' => 'Отсутствует текст комментария'));
        exit();
    }

    $text = isset($data['text']) ? $data['text'] : '';
    $ip = $_SERVER['REMOTE_ADDR'];

    $stmt = $mysql->prepare("INSERT INTO users (comments, likes, dislikes, ip, create_date) VALUES (?, 0, 0, ?, NOW())");
    $stmt->bind_param("ss", $text, $ip);

    if ($stmt->execute()) {
        echo json_encode(array('success' => 'Комментарий успешно добавлен'));
    } else {
        echo json_encode(array('error' => 'Произошла ошибка при добавлении комментария'));
    }
    exit();
}

echo json_encode(array('error' => 'Некорректное действие'));
exit();

?>
