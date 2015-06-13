<?php

function sendmail_for_report($mailTo, $subject, $body) {
    //Author ：XuLiang
    //WebSite：http://www.sunchis.com 
    //$mailTo：是一个数组，表示收件人地址 和收件人姓名，格式为array('邮箱地址','姓名')
    //$subject 表示邮件标题
    //$body  ：表示邮件正文
    //$AddAttachment 附件地址
    //error_reporting(E_ALL);
    if (count($mailTo) == 0) {
        echo "收件人不能为空！已退出发送邮件……";
        exit();
    }

    error_reporting(E_STRICT);
    date_default_timezone_set("Asia/Shanghai"); //设定时区东八区
    require_once('class.phpmailer.php');
    include("class.smtp.php");

    $mailConf = Conf::$mail;
    
    $mail = new PHPMailer();   //new一个PHPMailer对象出来
    $body = eregi_replace("[\]", '', $body); //对邮件内容进行必要的过滤
    $mail->CharSet = "UTF-8";    //设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置，否则乱码
    $mail->IsSMTP();        // 设定使用SMTP服务
    $mail->SMTPDebug = 1;                      // 启用SMTP调试功能
    $mail->Host = $mailConf['host'];
    $mail->SMTPAuth = true;
    $mail->Username = $mailConf['user'];
    $mail->Password = $mailConf['pwd'];
    $mail->Port = 25;                                         // 1 = errors and messages
    $mail->From = $mailConf['user'];
    $mail->FromName = $mailConf['usermame'];

    $mail->Subject = $subject;
    $mail->AltBody = "To view the message, please use an HTML compatible email viewer! - From www.sunchis.com"; // optional, comment out and test
    $mail->MsgHTML($body);

    foreach ($mailTo as $k => $v) {
        $mail->AddAddress($mailTo[$k][0], $mailTo[$k][1]);
    }

    if (!$mail->Send()) {
        echo "邮件发送出错：" . $mail->ErrorInfo;
    } else {
        echo "恭喜，邮件发送成功！";
    }
}

function getemailHTML($userdata, $usercsdata, $workdata, $photodata, $ngphotodata, $visitCount, $outInfo) {
    $userdata[10000] = intval($userdata[10000]);
    $userdata[20000] = intval($userdata[20000]);
    $userdata[30000] = intval($userdata[30000]);
    $userdata[50000] = intval($userdata[50000]);
    $userdata["total"] = intval($userdata["total"]);
    $userdata["prcount"] = intval($userdata["prcount"]);
    $userdata["xhcount"] = intval($userdata["xhcount"]);

    $usercsdata[10000] = intval($usercsdata[10000]);
    $usercsdata[10001] = intval($usercsdata[10001]);
    $usercsdata[10002] = intval($usercsdata[10002]);
    $usercsdata[10003] = intval($usercsdata[10003]);
    $usercsdata[20000] = intval($usercsdata[20000]);
    $usercsdata[30000] = intval($usercsdata[30000]);
    $usercsdata[50001] = intval($usercsdata[50001]);

    $workdata[10000] = intval($workdata[10000]);
    $workdata[10001] = intval($workdata[10001]);
    $workdata[10002] = intval($workdata[10002]);
    $workdata[10003] = intval($workdata[10003]);
    $workdata[20000] = intval($workdata[20000]);
    $workdata[30000] = intval($workdata[30000]);
    $workdata[50001] = intval($userdata[50001]);
    $workdata["tgoodnum"] = intval($workdata["tgoodnum"]);
    $workdata["prcount"] = intval($workdata["prcount"]);

    $photodata[10000] = intval($photodata[10000]);
    $photodata[10001] = intval($photodata[10001]);
    $photodata[10002] = intval($photodata[10002]);
    $photodata[10003] = intval($photodata[10003]);
    $photodata[20000] = intval($photodata[20000]);
    $photodata[30000] = intval($photodata[30000]);
    $photodata[50001] = intval($photodata[50001]);
    $photodata["total"] = intval($photodata["total"]);
    $photodata["prcount"] = intval($photodata["prcount"]);
    $photodata["xhcount"] = intval($photodata["xhcount"]);

    $ngphotodata[10000] = intval($ngphotodata[10000]);
    $ngphotodata[10001] = intval($ngphotodata[10001]);
    $ngphotodata[10002] = intval($ngphotodata[10002]);
    $ngphotodata[10003] = intval($ngphotodata[10003]);
    $ngphotodata[20000] = intval($ngphotodata[20000]);
    $ngphotodata[30000] = intval($ngphotodata[30000]);
    $ngphotodata[50001] = intval($ngphotodata[50001]);
    $ngphotodata["total"] = intval($ngphotodata["total"]);
    $ngphotodata["prcount"] = intval($ngphotodata["prcount"]);
    $visitCount = intval($visitCount);

    return <<<EOF
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <h3>比赛数据统计</h3>
    <table border="1px" aling="center" style="width:1000px; border-collapse:collapse; border-spacing:1px;">
        <tr>
            <th width="12%"></th>
            <th width="12%">专业组(新闻)</th>
            <th width="13%">人文/生态/风景</th>
            <th width="12%">专业组(人文)</th>
            <th width="12%">专业组(生态)</th>
            <th width="12%">专业组(风景)</th>
            <th width="12%"> 高校专业组</th>
            <th width="12%">青少专业组</th>
        </tr>                
        <tr>
            <td>注册人数</td>
            <td>{$userdata[50000]}</td> 
            <td>{$userdata[10000] }</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>{$userdata[20000]}</td>
            <td>{$userdata[30000]}</td>
        </tr>
        <tr>
            <td>参赛用户数</td>
            <td>{$usercsdata[50001]}</td>
            <td>{$usercsdata[10000]}</td>
            <td>{$usercsdata[10001]}</td>
            <td>{$usercsdata[10002]}</td>
            <td>{$usercsdata[10003]}</td>
            <td>{$usercsdata[20000]}</td>
            <td>{$usercsdata[30000]}</td>
        </tr>
        <tr>
            <td>照片数量</td>
            <td>{$photodata[50001]}</td>
            <td>{$photodata[10000]}</td>
            <td>{$photodata[10001]}</td>
            <td>{$photodata[10002]}</td>
            <td>{$photodata[10003]}</td>
            <td>{$photodata[20000]}</td>
            <td>{$photodata[30000]}</td>
        </tr>
        <tr>
            <td>NG照片数</td>
            <td>{$ngphotodata[50001]}</td>
            <td>{$ngphotodata[10000]}</td>
            <td>{$ngphotodata[10001]}</td>
            <td>{$ngphotodata[10002]}</td>
            <td>{$ngphotodata[10003]}</td>
            <td>{$ngphotodata[20000]}</td>
            <td>{$ngphotodata[30000]}</td>
        </tr>
    </table>
    <h3>网站数据统计</span></h3>
    <table border="1px"  style="width:250px; border-collapse:collapse; border-spacing:0;">
        <tr>
            <th width="33%">注册人数</th>
            <th width="33%">照片数量</th>
            <th width="33%">赞数</th>
        </tr>
        <tr>
            <td>{$userdata["total"]}</td>
            <td>{$photodata["total"]}</td>
            <td>{$workdata["tgoodnum"]}</td>
        </tr>
    </table>
    <h3>PR数据统计</span></h3>
    <table border="1px" style="width:600px; border-collapse:collapse; border-spacing:0;">
        <tr>
            <th width="25%">PR引导访问次数</th>
            <th width="25%">PR引导用户注册数</th>
            <th width="25%">PR引导作品数</th>
            <th width="25%">PR引导照片数</th>
        </tr>
        <tr>
            <td>{$visitCount}</td>
            <td>{$userdata["prcount"]}</td>
            <td>{$workdata["prcount"]}</td>
            <td>{$photodata["prcount"]}</td>
        </tr>
    </table>
      <!-- <h3>协会数据统计</span></h3>
    <table border="1px" style="width:200px; border-collapse:collapse; border-spacing:0;">
        <tr>
            <th width="50%">注册人数</th>
            <th width="50%">照片数量</th>
        </tr>
        <tr>
            <td>{$userdata["xhcount"]}</td>
            <td>{$photodata["xhcount"]}</td>
        </tr>
    </table>-->
     <h3>协会数据统计</span></h3>
    <table border="1px" style="width:600px; border-collapse:collapse; border-spacing:0;">
        <tr>
            <th width="20%">&nbsp;</th>
            <th width="20%">人文/生态/风景</th>
            <th width="20%">专业组(人文)</th>
            <th width="20%">专业组(生态)</th>
            <th width="20%">专业组(风景)</th>
        </tr>
        <tr>
            <td>注册人数</td>
            <td>{$outInfo['regInfo']['total']}</td>
            <td>{$outInfo['regInfo']['10001']}</td>
            <td>{$outInfo['regInfo']['10002']}</td>
            <td>{$outInfo['regInfo']['10003']}</td>
        </tr>
        <tr>
            <td>参赛用户数</td>
            <td>{$outInfo['joinUserInfo']['total']}</td>
            <td>{$outInfo['joinUserInfo']['10001']}</td>
            <td>{$outInfo['joinUserInfo']['10002']}</td>
            <td>{$outInfo['joinUserInfo']['10003']}</td>
        </tr>
        <tr>
            <td>照片数量</td>
            <td>{$outInfo['PhotoNums']['total']}</td>
            <td>{$outInfo['PhotoNums']['10001']}</td>
            <td>{$outInfo['PhotoNums']['10002']}</td>
            <td>{$outInfo['PhotoNums']['10003']}</td>
        </tr>
        <tr>
            <td>NG照片数</td>
            <td>{$outInfo['NgPhotoNums']['total']}</td>
            <td>{$outInfo['NgPhotoNums']['10001']}</td>
            <td>{$outInfo['NgPhotoNums']['10002']}</td>
            <td>{$outInfo['NgPhotoNums']['10003']}</td>
        </tr>
    </table>
    <br/>
    <div>*统计数据为次日13：00系统自动推送，可能由于事务局在13：00前未审核完毕全部作品，或未确认NG造成NG数量有出入。</div>
</body>
</html>


EOF;
}

?>
