<?php

include_once ROOT . "/libs/DB.php";

class UserDB {

    public function getUserList(){
        $sql ="select * from user";
        $dbcfg = Conf::$db['UserDB'];
        $db = DB::getInstance($dbcfg);
        $rs = $db->get_rs($sql);
        return $rs;
    }

	public function getUserPerformance($param){
		$sql = "SELECT * FROM user a, performance b WHERE a.id = b.uid and uid = $param";
		$dbcfg = Conf::$db['UserDB'];
		$db = DB::getInstance($dbcfg);
		$rs = $db->get_rs($sql);
		return $rs;
	}

	public function getUserInfo($param){
		$sql = "select * from user where id = $param";
		$dbcfg = Conf::$db['UserDB'];
		$db = DB::getInstance($dbcfg);
		$rs = $db->get_r($sql);
		return $rs;
	}

	public function getUserScore($departParam){
		$sql = "SELECT * FROM userScore WHERE depart = $departParam";
		$dbcfg = Conf::$db['UserDB'];
		$db = DB::getInstance($dbcfg);
		$rs = $db->get_rs($sql);

		return $rs;
	}

	public function getChartScore($userId){
		$sql = "SELECT * FROM userScore WHERE id = $userId";
		$dbcfg = Conf::$db['UserDB'];
		$db = DB::getInstance($dbcfg);
		$rs = $db->get_r($sql);

		return $rs;
	}

	public function getDepartScore($departParam){
		$sql = "SELECT * FROM departScore WHERE depart = $departParam";
		$dbcfg = Conf::$db['UserDB'];
		$db = DB::getInstance($dbcfg);
		$rs = $db->get_r($sql);
		return $rs;
	}
}
