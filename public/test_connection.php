<?php

try {
    echo '<br />';

    $host = 'db';
    $dbname = 'dynatech_test';
    $user = 'dynatech';
    $pass = 'dynatech';
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
    $conn = new PDO($dsn, $user, $pass);

    echo 'Database connected successfully';
    echo '<br />';
    echo '<br />';
    echo phpinfo();
} catch (\Throwable $t) {
    echo 'Error: ' . $t->getMessage();
    echo '<br />';
}
