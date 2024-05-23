<?php

require "../../config/db.php";
require "../../config/kskdepartment_plk.php";

$sc_time_s = "select SEC_TO_TIME(floor(sum(TIME_TO_SEC(TIMEDIFF(time_start,time_visit_opd)))/count(*))) total 
from ovst_queue_server_time t 
INNER JOIN ovst_queue_server o on t.vn = o.vn
where o.date_visit = CURDATE()
and t.dep IN ($screen) ";
$sc_time_q = mysqli_query($objCon, $sc_time_s);
$sc_time_r = mysqli_fetch_array($sc_time_q, MYSQLI_ASSOC);
$sc_wait = strtotime($sc_time_r['total']);
$sc_minutes = intval(date("i", $sc_wait));
echo $sc_minutes;