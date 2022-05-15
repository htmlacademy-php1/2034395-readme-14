<?php
$db = require_once 'db.php';

$link = mysqli_connect($db['host'], $db['user'], $db['password'], $db['database']);
mysqli_set_charset($link, "utf8mb4");

$user = null;

$is_auth = false;

if (isset($_COOKIE['user_email']) && isset($_COOKIE['user_password'])) {
    $email = $_COOKIE['user_email'];
    $password = $_COOKIE['user_password'];

    if (!$link) {
        $error = mysqli_connect_error();
        print($error);
        die();
    }

    $sql = "SELECT * FROM `users` u WHERE u.email = '$email'";

    $result = mysqli_query($link, $sql);

    if ($result === false) {
        print_r("Ошибка выполнения запроса: " . mysqli_error($link));
        die();
    }

    $user = mysqli_fetch_all($result, MYSQLI_ASSOC)[0];

    $is_auth = $user['password'] == $password;
}
