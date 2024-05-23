<?php

require "../../config/db.php";
require "../../config/kskdepartment_plk.php";

$s_ncd = "SELECT count(q.vn) cc from ovst_queue_server q inner join ovst o on o.vn = q.vn where q.date_visit = CURRENT_DATE() and o.cur_dep IN ($ncd)  and q.status = '1'
AND q.stationno IS NULL";
$q_ncd = mysqli_query($objCon, $s_ncd);
$r_ncd = mysqli_fetch_array($q_ncd, MYSQLI_ASSOC);
echo $r_ncd['cc'];