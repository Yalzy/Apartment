<?php

require '../dbconnect.php';

if(!empty($_GET['type'])){
    $type = $_GET['type'];
    if($type == "room"){
       if(!empty($_GET['id'])){
           $id = $_GET['id'];
           $sql = "delete from room where ID_room='$id'";
           $q = mysqli_query($link, $sql);
           if($q){
               echo "<script>alert('ลบข้อมูลสำเร็จ');location.href='../aroom.php';</script>";
           } else {
             echo "<script>alert('ลบข้อมูลไม่สำเร็จ');location.href='../aroom.php';</script>";    
           }
       }
        
    }
}