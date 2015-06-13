<?php

include '../../inc/config/config.php';
include ROOT . '/biz/User.php';


$departParam = $_POST["depart"];
$result = User::get_depart_score($departParam);

echo $result;
exit;


