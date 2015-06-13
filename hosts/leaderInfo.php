<?php
include '../inc/config/config.php';

include ROOT . '/biz/User.php';
$title = "述职报告";

$param = $_GET['id'];
$perform = User::get_user_performance($param);
$userInfo = User::get_user_info($param);

$title = "述职报告";

?>

<?php include ROOT . 'include/header_info.php'; ?>

<div class="info">
	<h1><?php echo $userInfo["name"];?></h1>
	<h2><?php echo $userInfo["job"];?></h2>
</div>
<div class="content">
	<h2>岗位绩效考核（100%）</h2>
	<table class="partform_table">
		<thead>
			<th width="28%">关键绩效指标及权重</th>
			<th width="10%">评分区间</th>
			<th width="51%">标准</th>
			<th width="10%">自评分</th>
		</thead>
		<tbody>
			<?php foreach($perform as $key => $value){?>
				<tr>
					<td><?php echo $value["perform"]; ?></td>
					<td><?php echo str_replace(";","</br>",$value["interval"]); ?></td>
					<td><?php echo str_replace(";","</br>",$value["standard"]); ?></td>
					<td><h4><?php echo $value["score"]; ?></h4></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>


<?php include ROOT . 'include/footer.php'; ?>
