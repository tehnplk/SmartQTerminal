<?php
$db_config = array(
    "host" => "192.168.1.254", // กำหนด host
    "dbname" => "hos", // กำหนดชื่อฐานข้อมูล
    "user" => "thasae", // กำหนดชื่อ user
    "pass" => "admin", // กำหนดรหัสผ่าน
    "charset" => "utf8", // กำหนด charset
);
$objCon = @new mysqli($db_config["host"], $db_config["user"], $db_config["pass"], $db_config["dbname"]);

if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
    exit;
}

$objCon->set_charset("utf8");
