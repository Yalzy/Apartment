
<?php

include '../dbconnect.php';

$type = $_POST['type'];
if ($type == "addmaterial") {

    if (!empty($_POST['ID_owner'])) {
        // echo "<script>swal('ปัญหา','กหดฟกด','error');</script>";
        $id = random_string(10);
        $date = date("Y-m-d H:i:s");
        $ID_owner = $_POST['ID_owner'];
        // $Date_Import = $_POST['Date_Import'];
        $img = $url . 'images/material_qr/$id.png';
        $sql = "insert into material value('$id','$ID_owner','$date',1,null,'$img')";
        $q = mysqli_query($link, $sql);
        if ($q) {
            echo "<script>swal('สำเร็จ','บันทึกข้อมูลไม่สำเร็จ ขั้นตอนต่อไปเพิ่มรูปได้','success');$('#token_m').val('$id');</script>";
        } else {
            echo "<script>swal('ปัญหา','บันทึกข้อมูลไม่สำเร็จ กรุณาลองใหม่อีกครั้ง','error');</script>";
        }
    }
}

if ($type == "insert_payment") {


//    echo "<script>swal('สำเร็จ','บันทึกข้อมูลไม่สำเร็จ " . $_POST['line_id'] . " ','success');</script>";
    $idroom = $_POST['idroom'];
    $w = $_POST['water_used'];
    $e = $_POST['electric_used'];
    $w_p = $_POST['water_price'];
    $e_p = $_POST['electric_price'];
    $o = $_POST['other'];
    $t = $_POST['total'];
    $idcard = $_POST['idcard'];
    $etc = $_POST['etc'];
    $id = random_string(30);
    $line_id = $_POST['line_id'];
    $date = date("Y-m-d H:i:s");

    //echo $id . $idcard . $t . $date . $w . $w_p . $e . $e_p . $etc1 . $o;
    try {
        // $Date_Import = $_POST['Date_Import'];
        $sql = "insert into transection value('$id','$idcard',$t,'$date',1,$w,$w_p,$e,$e_p,'$etc',$o,'$idroom')";
        $q = mysqli_query($link, $sql);
        if ($q) {
            echo "<script>swal('สำเร็จ','บันทึกข้อมูลสำเร็จ ','success');";
            $k = "แจ้งค่าห้อง หมายเลขห้อง $idroom จำนวนเงิน $t บาท \r\nโดยมีการใช้น้ำเป็นจำนวน $w หน่วย หน่วยละ $w_p บาท \r\nใช้ไฟฟ้าเป็นจำนวน $e หน่วย หน่วยละ $e_p บาท \r\nค่าใช้อื่นๆ $o บาท โดยมีรายละเอียดดังนี้ $etc";
            send_ms($line_id, $k, "");
        } else {
            echo "<script>swal('ปัญหา','บันทึกข้อมูลไม่สำเร็จ กรุณาลองใหม่อีกครั้ง','error');</script>";
        }
    } catch (Exception $ex) {
        echo "<script>swal('ปัญหา','$ex','error');</script>";
    }
}

function random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
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
