<?php

require "../../config/db.php";
require "../../config/kskdepartment_plk.php";

$s_sc = "SELECT count(q.vn) cc from ovst_queue_server q inner join ovst o on o.vn = q.vn where q.date_visit = CURRENT_DATE() and o.cur_dep IN ($screen)  and q.status = '1'
AND q.stationno IS NULL";
$q_sc = mysqli_query($objCon, $s_sc);
$r_sc = mysqli_fetch_array($q_sc, MYSQLI_ASSOC);
echo $r_sc['cc'];