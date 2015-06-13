<?php

class DB {

    private $is_connect = false;
    private $cfg = null;
    private static $db = array();
    private $dbh = null;
    private $dsn = null;
    private $error = 0;

    /**
     * 静态使用
     * @param array $cfg
     * @return resource
     */
    public static function getInstance($cfg) {
        $key = self::getInstanceKey($cfg);
        if (!isset(self::$db[$key]) || !is_object(self::$db[$key])) {
            self::$db[$key] = new DB($cfg);
        }
        return self::$db[$key];
    }

    private static function getInstanceKey($cfg) {
        $tmps = array();
        foreach ($cfg as $k => $v) {
            $tmps[] = $k . "::" . $v;
        }
        return md5(implode('##', $tmps));
    }

    /**
     * 构造函数
     */
    function __construct($cfg) {
        $this->cfg = $cfg;
    }

    private function _dsn() {

        if (!isset($this->cfg['port'])) {
            $this->cfg['port'] = '3306';
        }
        if (!isset($this->cfg['char'])) {
            $this->cfg['char'] = 'UTF8';
        }
        $dsn = 'mysql';
        $dsn .= ':dbname=' . $this->cfg['db'] . ';';
        $dsn .= 'host=' . $this->cfg['host'] . ';';
        $dsn .= 'port=' . $this->cfg['port'];
        $this->dsn = $dsn;
    }

    /**
     * 预编译SQL
     * @param string $sql
     * @return void
     */
    private function prepare($sql) {
        if (!$this->is_connect) {
            $this->_dsn();
            try {
                $this->dbh = new PDO($this->dsn, $this->cfg['user'], $this->cfg['pwd'], array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES ' . $this->cfg['char']));
                $this->is_connect = true;
            } catch (PDOException $e) {
                $this->error = -500;
                $this->error($e, __LINE__);
                return;
            }
        }
        try {
            $this->stmt = $this->dbh->prepare($sql);
        } catch (PDOException $e) {
            $this->error = -400;
            $this->error($e, __LINE__);
            return;
        }
        if (!$this->stmt) {
            $this->error(null, __LINE__, 'PREPARE SQL ERROR:' . $sql);
        }
    }

    /**
     * 绑定参数
     * @param array $array
     * @return void
     */
    private function bind($array) {
        try {
            foreach ($array as $key => $val) {
                $this->stmt->bindValue(':' . $key, $val, PDO::PARAM_STR);
            }
        } catch (PDOException $e) {
            $this->error = -300;
            $this->error($e, __LINE__);
            return;
        }
    }

    /**
     * 执行sql
     * @return void
     */
    private function exec() {
        try {
            $this->stmt->execute();
        } catch (PDOException $e) {
            $this->error = -200;
            $this->error($e, __LINE__);
            return;
        }
    }

    /**
     * 执行sql 取多行数据
     * @return array
     */
    public function get_rs($sql, $array = array(), $key = '') {
        $this->prepare($sql);
        $this->bind($array);
        $this->exec();
        $rs = array();
        if ('' != $key) {
            while ($row = $this->stmt->fetch(PDO::FETCH_ASSOC)) {
                $rs[$row[$key]] = $row;
            }
        } else {
            while ($row = $this->stmt->fetch(PDO::FETCH_ASSOC)) {
                $rs[] = $row;
            }
        }
        $this->stmt->closeCursor();
        return $rs;
    }

    /**
     * 执行sql 取单行数据
     * @return array
     */
    public function get_r($sql, $array = array()) {
        $this->prepare($sql);
        $this->bind($array);
        $this->exec();
        $row = $this->stmt->fetch(PDO::FETCH_ASSOC);
        $this->stmt->closeCursor();
        return $row;
    }

    /**
     * 取影响行数
     * @param string $sql
     * @param array $array
     * @return int
     */
    public function affect_num($sql, $array = array()) {
        $this->prepare($sql);
        $this->bind($array);
        $this->exec();
        $cnt = $this->stmt->rowCount();
        $this->stmt->closeCursor();
        return $cnt;
    }

    /**
     * insert 数据
     * @param string $sql
     * @param array $array
     * @return boolean
     */
    public function insert($sql, $array = array()) {
        $this->prepare($sql);
        $this->bind($array);
        $this->exec();
        $cnt = $this->stmt->rowCount();
        $this->stmt->closeCursor();
        return $cnt;
    }

    /**
     * 自增ID
     * @param string $sql
     * @param array $array
     * @return boolean
     */
    public function last_insert_id() {
        return $this->dbh->lastInsertId();
    }

    function __destruct() {
        
    }

    /**
     * 写错误日志
     * @param Exception $e
     * @param int $line
     * @param string $msg
     */
    function error($e, $line, $msg = '') {
        if (!is_null($e)) {
            $str = '[' . $e->getCode() . ']' . '[__LINE__:' . $line . ']' . 'DB CONNECTION FAILED:' . $e->getMessage() . 'pdo' . "\n";
        } else {
            $str = 'pdo' . '[__LINE__:' . $line . ']' . $msg . 'pdo' . "\n";
        }
        $filename = "pdo" . date("Ymd") . ".log";
        error_log($str, 3, ROOT . "/log/" . $filename);
    }

}
