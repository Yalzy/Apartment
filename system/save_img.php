<?php

//$upload_dir = somehow_get_upload_dir();  //implement this function yourself
include '../dbconnect.php';

if (!empty($_POST['token'])) {
    if (!empty($_POST['photo'])) {

        $token = $_POST['token'];
        $data = $_POST['photo'];
        list($type, $data) = explode(';', $data);
        list(, $data) = explode(',', $data);
        $data = base64_decode($data);
        $file = 'images/material/' . time() . '.png';
        $c = file_put_contents('../' . $file, $data);
        if ($c) {
            $sql = "insert into material_image value('$token','$file');";
            $query = mysqli_query($link, $sql);
            if ($query) {
                echo "<script>swal('สำเร็จ','บันทึกรูปสำเร็จ คุณสามารถบันทึกรูปได้อีก','success');";
            } else {
                echo "<script>swal('ปัญหา','ไม่สามารถบันทึกรูปได้ กรุณาลองใหม่','error');";
            }
        } else {
            echo "<script>swal('ปัญหา','ไม่สามารถบันทึกรูปได้ กรุณาลองใหม่','error');";
        }
    }
}
//
//if (!empty($_POST['token'])) {
//    if (!empty($_POST['url'])) {
//        $url = $_POST['url'];
//        $token = $_POST['token'];
//        $sql = "insert into material_image value('$token','$url');";
//        $query = mysqli_query($link, $sql);
//        if ($query) {
//            echo "<script>swal('สำเร็จ','บันทึกรูปสำเร็จ คุณสามารถบันทึกรูปได้อีก','success');";
//        } else {
//            echo "<script>swal('ปัญหา','ไม่สามารถบันทึกรูปได้ กรุณาลองใหม่','error');";
//        }
//    }
//}
?>