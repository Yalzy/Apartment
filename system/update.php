
<?php

require '../dbconnect.php';
if (!empty($_POST['type'])) {
    $type = $_POST['type'];
    if ($type == "member") {
        if (!empty($_POST['user'])) {
            if (!empty($_POST['idcard'])) {
                if (!empty($_POST['fname'])) {
                    if (!empty($_POST['lname'])) {
                        if (!empty($_POST['age'])) {
                            if (!empty($_POST['address'])) {
                                if (!empty($_POST['phone'])) {
                                    if (!empty($_POST['level'])) {
                                        if (!empty($_POST['Line_ID'])) {
                                            $user = $_POST['user'];
                                            $idcard = $_POST['idcard'];
                                            $fname = $_POST['fname'];
                                            $lname = $_POST['lname'];
                                            $age = $_POST['age'];
                                            $phone = $_POST['phone'];
                                            $level = $_POST['level'];
                                            $address = $_POST['address'];
                                            $Line_ID = $_POST['Line_ID'];
                                            $sql = "update member set Name='$fname',Lastname='$lname',Age='$age',Phone='$phone',Address='$address',ID_Card='$idcard',Level='$level',Line_ID='$Line_ID' where User ='$user'";
                                            $q = mysqli_query($link, $sql);
                                            if ($q) {
                                                echo '<script>swal("สำเร็จ!", "คุณแก้ไขสำเร็จ", "success");location.href="amember.php";</script>';
                                            } else {
                                                echo "<script>swal('เตือน', 'ข้อมูลไม่ถูกต้อง', 'warning');</script>";
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    if ($type == "room") {
        if (!empty($_POST['id_room'])) {

            if (!empty($_POST['type1'])) {
                if (!empty($_POST['price'])) {
                    if (!empty($_POST['status1'])) {
                        // echo "<script>swal('เตือน', 'ข้อมูลไม่ถูกต้อง', 'warning');</script>";
                        $id_room = $_POST['id_room'];

                        $type1 = $_POST['type1'];
                        $price = $_POST['price'];
                        $status1 = $_POST['status1'];
                        try {
                            $sql = "update room set ID_room='$id_room',Type=$type1,Price=$price,Status=$status1 where ID_room = '$id_room'";
                            $q = mysqli_query($link, $sql);
                            if ($q) {
                                echo '<script>swal("สำเร็จ!", "คุณแก้ไขสำเร็จ", "success");location.href="aroom.php";</script>';
                            } else {
                                echo "<script>swal('เตือน', 'ข้อมูลไม่ถูกต้อง', 'warning');</script>";
                            }
                        } catch (Exception $e) {
                            echo "<script>alert('$e');</script>";
                        }
                    }
                }
            }
        }
    }
    if ($type == "material") {
        if (!empty($_POST['ID'])) {
            if (!empty($_POST['ID_owner'])) {
                if (!empty($_POST['Date_Import'])) {
                    if (!empty($_POST['Status'])) {

                        $ID = $_POST['ID'];
                        $ID_owner = $_POST['ID_owner'];
                        $Date_Import = $_POST['Date_Import'];
                        $Status = $_POST['Status'];

                        if (!empty($_POST['Date_recive'])) {
                            $Date_recive = $_POST['Date_recive'];
                            $sql = "update material set ID_owner='$ID_owner',Date_Import='$Date_Import',Status=$Status,Date_recive='$Date_recive' where ID = $ID";
                        } else {

                            $sql = "update material set ID_owner='$ID_owner',Date_Import='$Date_Import',Status=$Status where ID = $ID";
                        }
                        try {

                            $q = mysqli_query($link, $sql);
                            if ($q) {
                                echo "<script>alert('แก้ไขข้อมูลสำเร็จ');location.href='../amaterial.php'</script>";
                            } else {
                                echo "<script>alert('แก้ไขข้อมูลไม่สำเร็จ');</script>";
                            }
                        } catch (Exception $e) {
                            echo "<script>alert('$e');</script>";
                        }
                    }
                }
            }
        }
    }
    if ($type == "roomtype") {
        if (!empty($_POST['ID_type'])) {
            if (!empty($_POST['Name_type'])) {
                $ID_type = $_POST['ID_type'];
                $Name_type = $_POST['Name_type'];
                try {
                    $sql = "update typeroom set Name_type='$Name_type' Where ID_type=$ID_type";
                    $q = mysqli_query($link, $sql);
                    if ($q) {
                        echo '<script>swal("สำเร็จ!", "คุณแก้ไขสำเร็จ", "success");location.href="atype.php";</script>';
                    } else {
                        echo "<script>swal('เตือน', 'ข้อมูลไม่ถูกต้อง', 'warning');</script>";
                    }
                } catch (Exception $e) {
                    echo "<script>alert('$e');</script>";
                }
            }
        }
    }
}