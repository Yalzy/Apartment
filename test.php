<?php

$k = "แจ้งค่าห้อง หมายเลขห้อง  จำนวนเงิน  บาท \r\nโดยมีการใช้น้ำเป็นจำนวน  หน่วย หน่วยละ  บาท \r\nใช้ไฟฟ้าเป็นจำนวน  หน่วย หน่วยละ  บาท \r\nค่าใช้อื่นๆ  บาท โดยมีรายละเอียดดังนี้ ";
send_ms("Uc0a3582697fe7dd5aa58bb397fe252fe", $k, "");

function send_ms($id, $m, $img) {

// Parse JSON
    $strAccessToken = "PPv2psVIO166J7ouwWrXVHVDBSpJmlajX6E2WIKHw0aXOGnZD1+UFLbXlfk5t9YV56hLZk3JvxIM4GBf7U3jExNolDBVRDk/2kXLsV6Wda5Pj4ecjRoR6vpSJ8Vp7q6KQLBDhEaVyaqtlrkqPJlAMwdB04t89/1O/w1cDnyilFU=";
// Get POST body content

    $strUrl = "https://api.line.me/v2/bot/message/push";

    $arrHeader = array();
    $arrHeader[] = "Content-Type: application/json";
    $arrHeader[] = "Authorization: Bearer {$strAccessToken}";

    $arrPostData = array();
    $arrPostData['to'] = $id;
    $i = 0;
    if (!empty($m)) {
        $arrPostData['messages'][$i]['type'] = "text";
        $arrPostData['messages'][$i]['text'] = $m;
        // $arrPostData['messages'][$i]['previewImageUrl'] = "https://www.w3schools.com/w3css/img_lights.jpg";
        $i++;
    }

    if (!empty($img)) {
        $arrPostData['messages'][$i]['type'] = "image";
        $arrPostData['messages'][$i]['originalContentUrl'] = $img;
        $arrPostData['messages'][$i]['previewImageUrl'] = $img;
    }

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $strUrl);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close($ch);
}
