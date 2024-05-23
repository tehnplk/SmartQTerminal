<?php
$db_config = array(
    "host" => "192.168.99.3", // กำหนด host
    "dbname" => "hosxelablae", // กำหนดชื่อฐานข้อมูล
    "user" => "sa", // กำหนดชื่อ user
    "pass" => "lablae11164p", // กำหนดรหัสผ่าน
    "charset" => "utf8", // กำหนด charset
);
$objCon = @new mysqli($db_config["host"], $db_config["user"], $db_config["pass"], $db_config["dbname"]);

if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
    exit;
}

$objCon->set_charset("utf8");


$db2_config = array(
    "host" => "192.168.99.3", // กำหนด host
    "dbname" => "smartq", // กำหนดชื่อฐานข้อมูล
    "user" => "sa", // กำหนดชื่อ user
    "pass" => "lablae11164p", // กำหนดรหัสผ่าน
    "charset" => "utf8", // กำหนด charset
);
$objCon2 = @new mysqli($db2_config["host"], $db2_config["user"], $db2_config["pass"], $db2_config["dbname"]);

if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
    exit;
}

$objCon2->set_charset("utf8");