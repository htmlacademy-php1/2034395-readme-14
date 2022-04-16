<?php
$db = require_once 'db.php';

$link = mysqli_connect($db['host'], $db['user'], $db['password'], $db['database']);
