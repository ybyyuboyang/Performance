<?php

class page {

    static function getPageHtml($page, $page_size, $recode_num) {
        $html = "";
        if ($recode_num == 0) {
            return $html;
        }
        $page_count = ceil($recode_num / $page_size);
        $html = "";
        $html.='<span>' . $page . '/' . $page_count . '页&nbsp;共' . $recode_num . '条记录</span>';
        if ($page > 1) {
            $html.='<a class="LinkPage btn" href="javascript:gotoPage(1)">首页</a>';
            $html.='<a class="LinkPage btn" href="javascript:gotoPage(' . ($page - 1) . ')">上一页</a>';
        }
        $html.=self::getNavPage($page, $page_count);
        if ($page < $page_count) {
            $html.='<a class="LinkPage btn" href="javascript:gotoPage(' . ($page + 1) . ')">下一页</a>';
            $html.='<a class="LinkPage btn" href="javascript:gotoPage(' . $page_count . ')">末页</a>';
        }
        $html.='跳转到：<input type="text" id="PageID" style="width: 20px" value="" />&nbsp;';
        $html.='<a class="LinkPage btn" href="javascript:goto()">GO</a>';
        return $html;
    }

    static function get_turn_array($p, $g) {
        $x = array(0, $p - 4, $p - 3, $p - 2, $p - 1, $p, $p + 1, $p + 2, $p + 3, $p + 4, 0);
        if ($g > 0)
            $x[0] = 1;

        if ($g > 1)
            $x[10] = $g;

        for ($i = 1; $i < 10; $i++)
            if ($x[$i] < 2 || $x[$i] > $g - 1)
                $x[$i] = 0;

        if ($x[1] != 0)
            $x[1] = -1;

        if ($x[9] != 0)
            $x[9] = -1;

        return $x;
    }

    function getNavPage($page, $page_count) {

        $turn_array = self::get_turn_array($page, $page_count);
        $html = "";
        $len = count($turn_array);
        for ($i = 0; $i < $len; $i++) {
            $j = $turn_array[$i];
            if ($j == 0)
                continue;
            else {
                if ($j == -1)
                    $html.= '<span>…</span>';
                else {
                    if ($j == $page)
                        $html.= '<a class="cur">' . $j . '</a>&nbsp;';
                    else
                        $html.= '<a class="LinkPage btn" href="javascript:gotoPage(' . $j . ')">' . $j . '</a>&nbsp;';
                }
            }
        }
        return $html;
    }

}

?>