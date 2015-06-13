<?php

include_once ROOT . '/dat/UserDB.php';

class User {

    public static function get_user_list() {
        $userList = UserDB::getUserList();
        return $userList;
    }

	public static function get_user_performance($param) {
		$perform = UserDB::getUserPerformance($param);
		return $perform;
	}

	public static function get_user_info($param) {
		$userInfo = UserDB::getUserInfo($param);
		return $userInfo;
	}

	public static function get_user_score($departParam) {
		$userScore = UserDB::getUserScore($departParam);
		return $userScore;
	}

	// 获取user评分
	public static function get_chart_score($userId) {
		$userScore = UserDB::getChartScore($userId);
		$data = array(
			"yData" => array($userScore["2010Score"],$userScore["2011Score"],$userScore["2012Score"],$userScore["2013Score"],$userScore["2014Score"],$userScore["2015Score"]),
			"status" => 0
		);

		$result = json_encode($data);
		return $result;
	}

	// 获取部门评分
	public static function get_depart_score($departParam) {
		$score = UserDB::getDepartScore($departParam);
		$data = array(
			"yData" => array($score["2010Score"],$score["2011Score"],$score["2012Score"],$score["2013Score"],$score["2014Score"],$score["2015Score"]),
			"status" => 0
		);

		$result = json_encode($data);
		return $result;
	}

	// 获取部门信息
	public static function get_depart_info($departParam) {
		$departInfo = UserDB::getDepartScore($departParam);
		return $departInfo;
	}
}

