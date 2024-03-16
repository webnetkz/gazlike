<?php

require_once './settings.php';

require_once './app/libs/Debug.php';
require_once './app/libs/Db.php';
// require_once './app/Core.php';
require_once './public/components/header.php';

?>

<div id="content">
    <?php
        $x = new Debug(true);
        // $core = new Core();
        $db = new DB();

        if (isset($_GET['new_uri'])) {

            $uri = $_GET['new_uri'];

            $db->insert(
                "INSERT INTO uris(uri, create_date, create_time) VALUES (:uri, CURRENT_TIMESTAMP(), NOW())",
                ['uri' => $uri]
            );

            $db->query("CREATE TABLE IF NOT EXISTS $uri (
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                views INT(12) UNSIGNED NOT NULL DEFAULT 0,
                create_ip VARCHAR(45) NOT NULL,
                likes TINYINT UNSIGNED NOT NULL DEFAULT 0,
                dislikes TINYINT UNSIGNED NOT NULL DEFAULT 0,
                comments_count TINYINT UNSIGNED NOT NULL DEFAULT 0,
                create_date DATE NOT NULL,
                create_time TIME NOT NULL
            )");


            $db->insert(
                "INSERT INTO `$uri`(views, create_ip, create_date, create_time) VALUES (1, :ip, CURRENT_TIMESTAMP(), NOW())",
                ['ip' => $_SERVER['REMOTE_ADDR']]
            );
        }
    ?>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        requestToServer('./json', {'one': 2}).then( data => console.log(data.data));
    });
</script>

<?php
require_once './public/components/footer.php';
?>