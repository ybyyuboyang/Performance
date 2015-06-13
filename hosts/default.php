<?php
include '../inc/config/config.php';
include ROOT . '/biz/User.php';

$userList = User::get_user_list();

$title = "人员列表";

?>

<?php include ROOT . 'include/header.php'; ?>

<div class="content_box clearfix">
	<div class="content-wrap">
	<div class="depart_box">
		<h2>
			办公室
			<a href="score.php?depart='办公室'" target="_blank">查看部门评分</a>
		</h2>
		<table class="depart_table">
			<thead>
			<th width="25%">#</th>
			<th width="75%">姓名</th>
			</thead>
			<tbody>
				<?php foreach($userList as $key=>$user) {
					if($user["type"] == 0 && $user["depart"] == "办公室"){
				?>
					<tr>
						<td class="t_id">0<?php echo $user["id"]?></td>
						<td class="t_name"><a href="userInfo.php?id=<?php echo $user["id"]?>" target="_blank"><?php echo $user["name"]?></a></td>
					</tr>
				<?php }}?>
			</tbody>
		</table>
	</div>
	<div class="depart_box">
		<h2>
			安保部
			<a href="score.php?depart='安保部'" target="_blank">查看部门评分</a>
		</h2>
		<table class="depart_table">
			<thead>
			<th>#</th>
			<th>姓名</th>
			</thead>
			<tbody>
				<?php foreach($userList as $key=>$user) {
					if($user["type"] == 0 && $user["depart"] == "安保部"){
						?>
						<tr>
							<td class="t_id">0<?php echo $user["id"]?></td>
							<td class="t_name"><a href="userInfo.php?id=<?php echo $user["id"]?>" target="_blank"><?php echo $user["name"]?></a></td>
						</tr>
				<?php }}?>
			</tbody>
		</table>
	</div>
	<div class="depart_box">
		<h2>财务部
			<a href="score.php?depart='财务部'" target="_blank">查看部门评分</a>
		</h2>
		<table class="depart_table">
			<thead>
			<th>#</th>
			<th>姓名</th>
			</thead>
			<tbody>
				<?php foreach($userList as $key=>$user) {
					if($user["type"] == 0 && $user["depart"] == "财务部"){
				?>
						<tr>
							<td class="t_id">0<?php echo $user["id"]?></td>
							<td class="t_name"><a href="userInfo.php?id=<?php echo $user["id"]?>" target="_blank"><?php echo $user["name"]?></a></td>
						</tr>
				<?php }}?>
			</tbody>
		</table>
	</div>
	<div class="depart_box">
		<h2>经营部
			<a href="score.php?depart='经营部'" target="_blank">查看部门评分</a>
		</h2>
		<table class="depart_table">
			<thead>
			<th>#</th>
			<th>姓名</th>
			</thead>
			<tbody>
				<?php foreach($userList as $key=>$user) {
					if($user["type"] == 0 && $user["depart"] == "经营部"){
				?>
						<tr>
							<td class="t_id">0<?php echo $user["id"]?></td>
							<td class="t_name"><a href="userInfo.php?id=<?php echo $user["id"]?>" target="_blank"><?php echo $user["name"]?></a></td>
						</tr>
				<?php }}?>
			</tbody>
		</table>
	</div>
	<div class="depart_box">
		<h2>技术部
			<a href="score.php?depart='技术部'" target="_blank">查看部门评分</a>
		</h2>
		<table class="depart_table">
			<thead>
			<th>#</th>
			<th>姓名</th>
			</thead>
			<tbody>
				<?php foreach($userList as $key=>$user) {
					if($user["type"] == 0 && $user["depart"] == "技术部"){
				?>
						<tr>
							<td class="t_id">0<?php echo $user["id"]?></td>
							<td class="t_name"><a href="userInfo.php?id=<?php echo $user["id"]?>" target="_blank"><?php echo $user["name"]?></a></td>
						</tr>
				<?php }}?>
			</tbody>
		</table>
	</div>
	<div class="depart_box">
		<h2>合约预算部
			<a href="score.php?depart='合约预算部'" target="_blank">查看部门评分</a>
		</h2>
		<table class="depart_table">
			<thead>
			<th>#</th>
			<th>姓名</th>
			</thead>
			<tbody>
				<?php foreach($userList as $key=>$user) {
					if($user["type"] == 0 && $user["depart"] == "合约预算部"){
				?>
						<tr>
							<td class="t_id">0<?php echo $user["id"]?></td>
							<td class="t_name"><a href="userInfo.php?id=<?php echo $user["id"]?>" target="_blank"><?php echo $user["name"]?></a></td>
						</tr>
				<?php }}?>
			</tbody>
		</table>
	</div>
	<div class="depart_box">
		<h2>测量部
			<a href="score.php?depart='测量部'" target="_blank">查看部门评分</a>
		</h2>
		<table class="depart_table">
			<thead>
			<th>#</th>
			<th>姓名</th>
			</thead>
			<tbody>
				<?php foreach($userList as $key=>$user) {
					if($user["type"] == 0 && $user["depart"] == "测量部"){
				?>
						<tr>
							<td class="t_id">0<?php echo $user["id"]?></td>
							<td class="t_name"><a href="userInfo.php?id=<?php echo $user["id"]?>" target="_blank"><?php echo $user["name"]?></a></td>
						</tr>
				<?php }}?>
			</tbody>
		</table>
	</div>
	<div class="depart_box">
		<h2>勘察部
			<a href="score.php?depart='勘察部'" target="_blank">查看部门评分</a>
		</h2>
		<table class="depart_table">
			<thead>
			<th>#</th>
			<th>姓名</th>
			</thead>
			<tbody>
				<?php foreach($userList as $key=>$user) {
					if($user["type"] == 0 && $user["depart"] == "勘察部"){
				?>
						<tr>
							<td class="t_id">0<?php echo $user["id"]?></td>
							<td class="t_name"><a href="userInfo.php?id=<?php echo $user["id"]?>" target="_blank"><?php echo $user["name"]?></a></td>
						</tr>
				<?php }}?>
			</tbody>
		</table>
	</div>
	<div class="depart_box">
		<h2>物资部
			<a href="score.php?depart='物资部'" target="_blank">查看部门评分</a>
		</h2>
		<table class="depart_table">
			<thead>
			<th>#</th>
			<th>姓名</th>
			</thead>
			<tbody>
				<?php foreach($userList as $key=>$user) {
					if($user["type"] == 0 && $user["depart"] == "物资部"){
						?>
						<tr>
							<td class="t_id">0<?php echo $user["id"]?></td>
							<td class="t_name"><a href="userInfo.php?id=<?php echo $user["id"]?>" target="_blank"><?php echo $user["name"]?></a></td>
						</tr>
				<?php }}?>
			</tbody>
		</table>
	</div>
	<div class="depart_box">
		<h2>第一项目部
			<a href="score.php?depart='第一项目部'" target="_blank">查看部门评分</a>
		</h2>
		<table class="depart_table">
			<thead>
			<th>#</th>
			<th>姓名</th>
			</thead>
			<tbody>
				<?php foreach($userList as $key=>$user) {
					if($user["type"] == 0 && $user["depart"] == "第一项目部"){
						?>
						<tr>
							<td class="t_id">0<?php echo $user["id"]?></td>
							<td class="t_name"><a href="userInfo.php?id=<?php echo $user["id"]?>" target="_blank"><?php echo $user["name"]?></a></td>
						</tr>
				<?php }}?>
			</tbody>
		</table>
	</div>
	<div class="depart_box">
		<h2>外围施工项目部
			<a href="score.php?depart='外围施工项目部'" target="_blank">查看部门评分</a>
		</h2>
		<table class="depart_table">
			<thead>
			<th>#</th>
			<th>姓名</th>
			</thead>
			<tbody>
				<?php foreach($userList as $key=>$user) {
					if($user["type"] == 0 && $user["depart"] == "外围施工项目部"){
						?>
						<tr>
							<td class="t_id">0<?php echo $user["id"]?></td>
							<td class="t_name"><a href="userInfo.php?id=<?php echo $user["id"]?>" target="_blank"><?php echo $user["name"]?></a></td>
						</tr>
				<?php }}?>
			</tbody>
		</table>
	</div>
	<div class="depart_box">
		<h2>第二项目部
			<a href="score.php?depart='第二项目部'" target="_blank">查看部门评分</a>
		</h2>
		<table class="depart_table">
			<thead>
			<th>#</th>
			<th>姓名</th>
			</thead>
			<tbody>
				<?php foreach($userList as $key=>$user) {
					if($user["type"] == 0 && $user["depart"] == "第二项目部"){
						?>
						<tr>
							<td class="t_id">0<?php echo $user["id"]?></td>
							<td class="t_name"><a href="userInfo.php?id=<?php echo $user["id"]?>" target="_blank"><?php echo $user["name"]?></a></td>
						</tr>
				<?php }}?>
			</tbody>
		</table>
	</div>

	<div class="depart_box">
		<h2>第三项目部
			<a href="score.php?depart='第三项目部'" target="_blank">查看部门评分</a>
		</h2>
		<table class="depart_table">
			<thead>
			<th>#</th>
			<th>姓名</th>
			</thead>
			<tbody>
				<?php foreach($userList as $key=>$user) {
					if($user["type"] == 0 && $user["depart"] == "第三项目部"){
						?>
						<tr>
							<td class="t_id">0<?php echo $user["id"]?></td>
							<td class="t_name"><a href="userInfo.php?id=<?php echo $user["id"]?>" target="_blank"><?php echo $user["name"]?></a></td>
						</tr>
				<?php }}?>
			</tbody>
		</table>
	</div>

	<div class="depart_box">
		<h2>第四项目部
			<a href="score.php?depart='第四项目部'" target="_blank">查看部门评分</a>
		</h2>
		<table class="depart_table">
			<thead>
			<th>#</th>
			<th>姓名</th>
			</thead>
			<tbody>
				<?php foreach($userList as $key=>$user) {
					if($user["type"] == 0 && $user["depart"] == "第四项目部"){
						?>
						<tr>
							<td class="t_id">0<?php echo $user["id"]?></td>
							<td class="t_name"><a href="userInfo.php?id=<?php echo $user["id"]?>" target="_blank"><?php echo $user["name"]?></a></td>
						</tr>
				<?php }}?>
			</tbody>
		</table>
	</div>

	<div class="depart_box">
		<h2>第五项目部
			<a href="score.php?depart='第五项目部'" target="_blank">查看部门评分</a>
		</h2>
		<table class="depart_table">
			<thead>
			<th>#</th>
			<th>姓名</th>
			</thead>
			<tbody>
				<?php foreach($userList as $key=>$user) {
					if($user["type"] == 0 && $user["depart"] == "第五项目部"){
						?>
						<tr>
							<td class="t_id">0<?php echo $user["id"]?></td>
							<td class="t_name"><a href="userInfo.php?id=<?php echo $user["id"]?>" target="_blank"><?php echo $user["name"]?></a></td>
						</tr>
				<?php }}?>
			</tbody>
		</table>
	</div>

	</div>
</div>
<div class="to-top">回到顶部</div>
<?php include ROOT . 'include/footer.php'; ?>