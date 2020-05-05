<?php

$link = mysqli_connect("localhost", "root", "", "Apartment") or die("Error " . mysqli_error($link));
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$link->set_charset('utf8');
date_default_timezone_set("Asia/Bangkok");

$url = 'https' . '://' . $_SERVER['HTTP_HOST'] . "/" . explode('/', $_SERVER['REQUEST_URI'])[1] . "/";
?>