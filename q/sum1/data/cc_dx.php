<?php

require "../../config/db.php";
require "../../config/kskdepartment_plk.php";

$s_dx = "SELECT count(q.vn) cc from ovst_queue_server q inner join ovst o on o.vn = q.vn where q.date_visit = CURRENT_DATE() and o.cur_dep IN ($front) and q.status = '1'
AND q.stationno IS NULL";
$q_dx = mysqli_query($objCon, $s_dx);
$r_dx = mysqli_fetch_array($q_dx, MYSQLI_ASSOC);
echo $r_dx['cc'];