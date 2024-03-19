<?php
    
    define('DB_HOST', 'localhost');
    define('DB_PORT', '3306');
    define('DB_LOGIN', 'bd');
    define('DB_PASSWORD', '31230');
    define('DB_NAME', 'uris');

    $mysql = new mysqli (DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME, DB_PORT);
    if ($mysql->connect_errno) exit('Не удалось подключиться к БД');
    $mysql->set_charset('utf8');
    $mysql->close();


?>