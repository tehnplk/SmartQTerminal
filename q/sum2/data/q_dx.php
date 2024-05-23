<?php

require "../../config/db.php";
require "../../config/kskdepartment_plk.php";

$dx_time_s = "select SEC_TO_TIME(floor(sum(TIME_TO_SEC(TIMEDIFF(t.time_start,s.time_start)))/count(*))) total 
from ovst_queue_server_time t 
inner join
(select vn,time_start from ovst_queue_server_time 
where date_visit = CURDATE()
and dep IN ($screen)) s on t.vn = s.vn
where t.date_visit = CURDATE()
and t.dep IN ($doctor)";
$dx_time_q = mysqli_query($objCon, $dx_time_s);
$dx_time_r = mysqli_fetch_array($dx_time_q, MYSQLI_ASSOC);
$dx_wait = strtotime($dx_time_r['total']);
$dx_minutes = intval(date("i", $dx_wait));
echo $dx_minutes;