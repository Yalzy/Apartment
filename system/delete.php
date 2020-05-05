

<?php

require '../dbconnect.php';

if (!empty($_GET['type'])) {
    $type = $_GET['type'];
    if ($type == "member") {
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "delete from member where Id='$id'";
            $q = mysqli_query($link, $sql);
            if ($q) {
                echo '<script>swal("สำเร็จ!", "คุณแก้ไขสำเร็จ", "success");location.href="amember.php";</script>';
            } else {
                echo "<script>swal('เตือน', 'ข้อมูลไม่ถูกต้อง', 'warning');</script>";
            }
        }
    }
    if ($type == "room") {
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "delete from room where ID_room=$id";
            $q = mysqli_query($link, $sql);
            if ($q) {
                echo '<script>swal("สำเร็จ!", "คุณแก้ไขสำเร็จ", "success");location.href="amember.php";</script>';
            } else {
                echo "<script>swal('เตือน', 'ข้อมูลไม่ถูกต้อง', 'warning');</script>";
            }
        }
    }
    if ($type == "material") {
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "delete from material where ID='$id'";
            $q = mysqli_query($link, $sql);
            if ($q) {
                echo '<script>swal("สำเร็จ!", "คุณแก้ไขสำเร็จ", "success");location.href="amaterial.php";</script>';
            } else {
                echo "<script>swal('เตือน', 'ข้อมูลไม่ถูกต้อง', 'warning');</script>";
            }
        }
    }
    if ($type == "typeroom") {
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "delete from typeroom where ID_type='$id'";
            $q = mysqli_query($link, $sql);
            if ($q) {
                echo '<script>swal("สำเร็จ!", "คุณแก้ไขสำเร็จ", "success");location.href="atype.php";</script>';
            } else {
                echo "<script>swal('เตือน', 'ข้อมูลไม่ถูกต้อง', 'warning');</script>";
            }
        }
    }
}