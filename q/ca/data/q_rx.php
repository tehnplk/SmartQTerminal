<?php

require "../../config/db.php";
require "../../config/kskdepartment_plk.php";

$rx_time_s = "select SEC_TO_TIME(floor(sum(TIME_TO_SEC(TIMEDIFF(time_start,service6)))/count(*))) total 
from ovst_queue_server_time t 
INNER JOIN service_time s on t.vn = s.vn and s.service6_dep IN ($drug)
where t.date_visit = CURDATE()
and t.dep IN ($drug)";
$rx_time_q = mysqli_query($objCon, $rx_time_s);
$rx_time_r = mysqli_fetch_array($rx_time_q, MYSQLI_ASSOC);
$rx_wait = strtotime($rx_time_r['total']);
$rx_minutes = intval(date("i", $rx_wait));
echo $rx_minutes;