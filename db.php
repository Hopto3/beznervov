<?php
$host = "sql300.infinityfree.com";
$user = "if0_41707934";
$password = "21012006Hh";
$dbname = "if0_41707934_XXX";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

$conn->set_charset("utf8");
?>
