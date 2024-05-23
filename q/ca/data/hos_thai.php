<?php

require "../../config/db.php";

$s = "SELECT count(vn) as cc from health_med_service where service_date = curdate();";
$res = mysqli_query($objCon, $s);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
echo $row['cc'];