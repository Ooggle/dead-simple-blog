<a href="setup?go">Run setup</a>
<?php

if(isset($_GET['go']))
{
    include('website.conf.php');

    try{
        $db = new PDO('mysql:host=' . $config['db_host'] . ';dbname=' . $config['db_name'] . ';charset=utf8', $config['db_user'], $config['db_password']);
    }
    catch(Exception $e){
        die('error with database.');
    }

    $sql = "CREATE TABLE stats (
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        use_date DATETIME NULL,
        client_info VARCHAR(200) NULL,
        endpoint VARCHAR(1000) NULL
        ) ENGINE = InnoDB";

    try {
        $db->exec($sql);
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    echo '<p style="color: green;">Setup run successfully.</p>';
}