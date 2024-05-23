<?php
require "../../config/db.php";
require "../../config/kskdepartment_plk.php";

$s = "SELECT count(q.vn) as cc FROM
ovst_queue_server_dep q
WHERE
q.date_visit = CURDATE()
and q.time_finish is  not null
and q.dep_visit like 'bill%'";
$res = mysqli_query($objCon, $s);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
echo $row['cc'];