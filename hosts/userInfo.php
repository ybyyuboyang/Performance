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
	<h2>岗位绩效考核（80%）</h2>
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
<div class="content_s">
	<h2>职业素质考核考核（20%）</h2>
	<table class="partform_table">
		<thead>
			<th width="28%">关键绩效指标及权重</th>
			<th width="10%">评分区间</th>
			<th width="51%">标准</th>
			<th width="10%">自评分</th>
		</thead>
		<tbody>
		<tr>
			<td>能力提升，学习进取（10）</td>
			<td>10<br>8-9<br>6-7<br><6</td>
			<td>A.学习能力强，有上进心<br>B.学习能力较好，能够参加安排的培训<br>C.学习能力一般，能够参加安排的培训<br>D.学习能力差，没有学习意识'</td>
			<td><h4><?php echo $userInfo["abiliScore"];?></h4></td>
		</tr>
		<tr>
			<td>工作态度与工作效率（10）</td>
			<td>10<br>8-9<br>6-7<br><6</td>
			<td>A.工作态度积极，服务意识强，积极性、主动性高，工作有创新能力，工作效率高，能较好的完成各项工作<br>B.工作态度较好，服务意识较强，基本能及时解决各部门需求、及时反馈；工作效率较高，能及时完成各项工作<br>C.工作态度尚可，缺少激情，有时处于被动，工作效率一般，完成工作时间较长<br>D.工作态度怠慢，服务意识淡薄，经常推托责任；工作效率差，不能及时完成工作。</td>
			<td><h4><?php echo $userInfo["attiScore"];?></h4></td>
		</tr>
		</tbody>
	</table>
</div>

<?php include ROOT . 'include/footer.php'; ?>
