<?php

require "../../config/db.php";
require "../../config/kskdepartment_plk.php";

$s_phy = "SELECT count(q.vn) cc from ovst_queue_server q inner join ovst o on o.vn = q.vn where q.date_visit = CURRENT_DATE() and o.cur_dep  IN $phy  and q.status = '1'
AND q.stationno IS NULL";
$q_phy = mysqli_query($objCon, $s_phy);
$r_phy = mysqli_fetch_array($q_phy, MYSQLI_ASSOC);
echo $r_phy['cc'];