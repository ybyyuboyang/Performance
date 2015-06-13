<?php

include_once ROOT . '/libs/Tools.php';

class Auth {

    private static $AUTH = '0544a84aeaf752b4dfc2513714c0490b';
    
    public static function encryptCode($num) {
        $loginip = Tools::get_client_ip();
        $loginip = str_replace('.', '_', $loginip);
        $auth = md5(self::$AUTH . $num . "_" . $loginip . "_" . $num . self::$AUTH);
        self::set('AUTHCODE', $auth);
    }

    public static function decryptCode($num) {
        $auth = self::get('AUTHCODE');
        $loginip = Tools::get_client_ip();
        $loginip = str_replace('.', '_', $loginip);
        self::set('AUTHCODE', '', -1);
        return $auth == md5(self::$AUTH . $num . "_" . $loginip . "_" . $num . self::$AUTH);
    }

    public static function encrypt($uname) {
        $loginip = Tools::get_client_ip();
        $loginip = str_replace('.', '_', $loginip);
        $auth = md5(self::$AUTH . $uname  . "_" . $loginip . "_"  . self::$AUTH);
        self::set('AUTH', $auth);
    }

    public static function check_login() {
        if (self::decrypt()) {
            self::set('LOGININ', 1);
            return true;
        } else {
            self::set('LOGININ', 0);
            return false;
        }
    }

    public static function loginout() {
        $keys = array('LOGININ', 'AUTH', 'uname');
        foreach ($keys as $key) {
            self::set($key, '', -1);
        }
    }

    public static function decrypt() {
        $uname = self::get('uname');
        $auth = self::get('AUTH');
        $loginip = Tools::get_client_ip();
        $loginip = str_replace('.', '_', $loginip);
        return $auth == md5(self::$AUTH . $uname  . "_" . $loginip . "_"  . self::$AUTH);
    }

    public static function set($key, $val, $expire = null) {
        if ($expire == null) {
            $expire = Conf::$domain['expire'] + time();
        }
        setcookie($key, $val, $expire, Conf::$domain['path'], Conf::$domain['host']);
    }

    public static function get($key = null) {
        if ($key == null) {
            return $_COOKIE;
        }
        if (!isset($_COOKIE[$key])) {
            return '';
        }
        return $_COOKIE[$key];
    }

}
