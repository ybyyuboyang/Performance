<?php

include '../inc/config/config.php';
include ROOT . '/biz/User.php';

$title = "可视化test";

$test = User::get_user_score();

$userIdList = array();
foreach($test as $key => $value){
	array_push($userIdList, $value["id"]);
}
?>

<?php include ROOT . 'include/header_info.php'; ?>

<div style="height: 500px;margin: 0 auto;width: 960px;">

	<canvas id="departChart" width="500" height="300"></canvas>

</div>

<?php foreach($test as $key => $value){?>

	<div style="height: 500px;margin: 0 auto;width: 960px;">

		<canvas id="myChart_<?php echo $value['id']?>" width="500" height="300"></canvas>

	</div>

<?php } ?>

<input type="hidden" name="userArr" value="<?php echo implode(",",$userIdList); ?>"/>

<?php include ROOT . 'include/footer.php'; ?>

<script src="../resources/js/libs/Chart.js"></script>
<script src="../resources/js/persontrend.js"></script>