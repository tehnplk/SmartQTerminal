<?php

require "../../config/db.php";
require "../../config/kskdepartment_plk.php";

$s_med = "SELECT count(q.vn) cc from ovst_queue_server q inner join ovst o on o.vn = q.vn where q.date_visit = CURRENT_DATE() and o.cur_dep  IN $med  and q.status = '1'
AND q.stationno IS NULL";
$q_med = mysqli_query($objCon, $s_med);
$r_med = mysqli_fetch_array($q_med, MYSQLI_ASSOC);
echo $r_med['cc'];