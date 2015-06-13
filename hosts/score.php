<?php

include '../inc/config/config.php';
include ROOT . '/biz/User.php';

$title = "部门人员评分";

$departParam = $_GET['depart'];

$userScore = User::get_user_score($departParam);

$userIdList = array();
foreach($userScore as $key => $value){
	array_push($userIdList, $value["id"]);
}

$depart = User::get_depart_info($departParam);
?>

<?php include ROOT . 'include/header_score.php'; ?>

<div class="info score_splite">
	<h1><?php echo $depart["depart"]?></h1>
	<h2>综合评分</h2>
	<h1 class="depart_score"><?php echo $depart["composScore"]?></h1>
	<div class="depart_chart">
		<canvas id="departChart" width="480" height="260"></canvas>
	</div>
</div>

<div class="content_s">
	<h2>部门人员评分</h2>
	<table class="partform_table score_table">
		<thead>
			<th width="21%">成员</th>
			<th width="20%">综合评分</th>
			<th width="20%">修正评分</th>
			<th width="39%">变化趋势</th>
		</thead>
		<tbody>
		<?php foreach($userScore as $key => $value){?>
			<tr>
				<td class="user_name"><?php echo $value["name"]?></td>
				<td class="score"><?php echo $value["composScore"]?></td>
				<td class="score fix"><?php echo $value["fixScore"]?></td>
				<td>
					<div class="user_chart">
						<canvas id="myChart_<?php echo $value['id']?>" width="255" height="130"></canvas>
					</div>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</div>

<input type="hidden" name="userArr" value="<?php echo implode(",",$userIdList); ?>"/>
<input type="hidden" name="depart" value="<?php echo $departParam; ?>"/>

<?php include ROOT . 'include/footer.php'; ?>

<script src="../resources/js/libs/Chart.js"></script>
<script src="../resources/js/persontrend.js"></script>