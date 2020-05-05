<?php

include "dbconnect.php";

if (!empty($_POST['key'])) {
    $key = $_POST['key'];
    if ($key == "update_material") {
        if (!empty($_POST['mid'])) {
            $mid = $_POST['mid'];
            $d = date("Y-m-d H:i:s");
            $sql = "update material set Status = 2,Date_recive = '$d' where ID = '$mid'";
            $qu = mysqli_query($link, $sql);
            if ($qu) {
                echo '<script>swal("รับพัสดุสำเร็จ", {icon: "success"});</script>';
            } else {
                echo '<script>swal("รับพัสดุไม่สำเร็จ", {icon: "error"});</script>';
            }
        }
    }
}