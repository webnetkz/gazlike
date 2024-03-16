<?php

#header('Content-Type: application/json');

use App\Libs\Secure;

require_once './app/libs/Secure.php';

$secure = new Secure();


define('NAME_APP', 'GazLike');

// DB
define('URL_DB', '127.0.0.1');
define('NAME_DB', 'gazlike');
define('USER_DB', 'root');
define('PASS_DB', '');