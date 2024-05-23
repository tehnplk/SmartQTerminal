<?php

require "../../config/db.php";
require "../../config/kskdepartment_plk.php";

$s_cx = "SELECT count(q.vn) cc from ovst_queue_server q inner join ovst o on o.vn = q.vn where q.date_visit = CURRENT_DATE() and o.cur_dep IN ($clinic)  and q.status = '1'
AND q.stationno IS NULL";
$q_cx = mysqli_query($objCon, $s_cx);
$r_cx = mysqli_fetch_array($q_cx, MYSQLI_ASSOC);
echo $r_cx['cc'];