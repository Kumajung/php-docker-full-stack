<?php

$host = getenv('DB_HOST') ?: 'db';
$port = getenv('DB_PORT') ?: '3306';
$user = getenv('DB_USER') ?: 'php_docker';
$pass = getenv('DB_PASS') ?: 'password';
$db   = getenv('DB_NAME') ?: 'php_docker';

$connect = mysqli_connect($host, $user, $pass, $db, (int)$port);
if (!$connect) {
    die('Connection error: ' . mysqli_connect_error());
}

$table_name = 'php_docker_table';
$query = "SELECT * FROM $table_name";
$response = mysqli_query($connect, $query);

echo "<strong>$table_name: </strong>";
while ($i = mysqli_fetch_assoc($response)) {
    echo '<p>'.$i['title'].'</p>';
    echo '<p>'.$i['body'].'</p>';
    echo '<p>'.$i['date_created'].'</p>';
    echo '<p>Kumamen</p>';
    echo '<hr>';
}

