<?php

require "../../config/db.php";
require "../../config/kskdepartment_plk.php";

$s_dt = "SELECT count(q.vn) cc from ovst_queue_server q inner join ovst o on o.vn = q.vn where q.date_visit = CURRENT_DATE() and o.cur_dep  IN $dents  and q.status = '1'
AND q.stationno IS NULL";
$q_dt = mysqli_query($objCon, $s_dt);
$r_dt = mysqli_fetch_array($q_dt, MYSQLI_ASSOC);
echo $r_dt['cc'];