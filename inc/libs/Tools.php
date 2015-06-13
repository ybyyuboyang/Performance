<?php

class Tools {

    function get_client_ip() {
        if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
            $cip = $_SERVER["HTTP_CLIENT_IP"];
        } elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            $cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } elseif (!empty($_SERVER["REMOTE_ADDR"])) {
            $cip = $_SERVER["REMOTE_ADDR"];
        } else {
            $cip = "无法获取！";
        }
        return $cip;
    }

    public static function get_refer() {
        if ($_SERVER['HTTP_REFERER'] == '') {
            $url = $_SERVER['REQUEST_URI'];
        } else {
            $url = $_SERVER['HTTP_REFERER'];
        }
        return $url;
    }

    public static function GshowMsg($msg = '', $url = '-1') {
        header("Content-type:text/html;charset=utf-8");
        echo '<script language="javascript" charset="UTF-8">';
        echo "<!--\n";
        if ($msg != '') {
            echo 'alert("' . $msg . '");';
        }
        if ($url == '') {
            if ($_SERVER['HTTP_REFERER'] == '') {
                $url = $_SERVER['REQUEST_URI'];
            } else {
                $url = $_SERVER['HTTP_REFERER'];
            }
        }
        if ($url == -1) {
            echo 'javascript:history.go(-1);';
        } else {
            echo 'location.href="' . $url . '";';
        }
        echo "\n//-->";
        echo '</script>';
    }

    public static function FilterSomeChar($array) {
        if (empty($array)) {
            return array();
        }
        if (get_magic_quotes_gpc()) {
            return $array;
        }
        if (is_array($array)) {
            foreach ($array as $key => $value) {
                if (!is_array($value)) {
                    $array[$key] = addslashes($value);
                } else {
                    $array[$key] = self::FilterSomeChar($value);
                }
            }
        } else {
            $array = addslashes($array);
        }
        return $array;
    }

    public static function getValue($key, $defaultValue = false) {
        if (!isset($key) OR empty($key) OR !is_string($key))
            return false;
        $ret = (isset($_POST[$key]) ? $_POST[$key] : (isset($_GET[$key]) ? $_GET[$key] : $defaultValue));

        if (is_string($ret) === true)
            $ret = urldecode(preg_replace('/((\%5C0+)|(\%00+))/i', '', urlencode($ret)));
        return !is_string($ret) ? $ret : stripslashes($ret);
    }

    public static function creatOptions($array, $selected = "selected") {
        $strReturn = "";
        foreach ($array as $key => $value) {
            $strReturn .='<option value="' . $key . '"';
            if ($selected == $key) {
                $strReturn .= 'selected';
            }
            $strReturn .='>' . $value;
            $strReturn .= '</option>';
        }
        return $strReturn;
    }

    public static function get_citys($province_id) {
        $citys = array();
        foreach (Conf::$area_citys as $key => $val) {
            if ($key >= $province_id && $key < $province_id + 10000) {
                $citys[$key] = $val;
            }
        }
        return $citys;
    }

    public static function getImg($url) {
        return isset($url) ? Conf::$imgPath . $url : "images/noimg.jpg";
    }


}

