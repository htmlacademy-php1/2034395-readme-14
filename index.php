<?php
require_once 'helpers.php';
require_once 'init.php';

if ($is_auth) {
    header("Location: /popular.php");
    exit();
}

$data = $_POST;

function authUser($data, $link): bool {
    $email = $data['email'] ?? null;
    $password = $data['password'] ?? null;

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

    if (password_verify($password, $user['password'])) {
        $now = time();
        $expires = strtotime('+1 month', $now);

        setcookie('user_email', $email, $expires);
        setcookie('user_password', $user['password'], $expires);
        return true;
    } else return false;
}

if (isset($data['email'])) {
    $is_auth = authUser($data, $link);

    if ($is_auth) {
        header("Location: /popular.php");
        exit();
    }
}

$content = include_template('main.php');

print($content);
