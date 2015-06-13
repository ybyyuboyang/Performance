<?php

function importCss($cssList){
    if(!empty($cssList)){
        foreach($cssList as $item){
            echo '<link rel="stylesheet" href="/resources/css/' . $item. '">';
        }
    }
}

function importJs($jsList){
    if(!empty($jsList)){
        foreach($jsList as $item){
            echo '<script type="text/javascript" src="/resources/js/' . $item . '"></script>';
        }
    }
}

function callApi($url, $type, $data){
    $data_string = json_encode($data);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type:application/x-zc-object',
            'Content-Length: ' . strlen($data_string))
    );

    $result = curl_exec($ch);

    return $result;
}