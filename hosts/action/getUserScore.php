<?php

include '../../inc/config/config.php';
include ROOT . '/biz/User.php';

$userId = $_POST["userId"];
$result = User::get_chart_score($userId);

echo $result;
exit;


