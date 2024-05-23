<?php

require "../../config/db.php";

$s = "SELECT count(DISTINCT hn) as cc FROM oapp WHERE nextdate = curdate() and visit_vn is not null and visit_vn <> '';";
$res = mysqli_query($objCon, $s);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
echo $row['cc'];