<?php

include '../dbconnect.php';

if (!empty($_POST['token'])) {
    if (!empty($_POST['photo'])) {
        if (!empty($_POST['line_id'])) {
            $line_id = $_POST['line_id'];
            $token = $_POST['token'];
            $data = $_POST['photo'];
            list($type, $data) = explode(';', $data);
            list(, $data) = explode(',', $data);
            $data = base64_decode($data);
            $file = 'images/material_qr/' . $token . '.png';
            $c = file_put_contents('../' . $file, $data);

            $u = $url . $file;
            // echo $u;
            // send_ms($line_id, "มีพัสดุเข้า กรุณาไปรับได้ที่ เคาเตอร์ พร้อมนำคิวอาร์โค้ดที่ได้รับไปแสดง", $url . $file);
            send_ms($line_id, "มีพัสดุเข้า กรุณาไปรับได้ที่ เคาเตอร์ พร้อมนำคิวอาร์โค้ดที่ได้รับไปแสดง", $u);
        }
    }
}

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
