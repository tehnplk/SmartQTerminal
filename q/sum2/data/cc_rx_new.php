<?php
require "../../config/db.php";
require "../../config/kskdepartment_plk.php";

$s_rx = "
SELECT
	count( q.vn ) cc 
FROM
	ovst_queue_server_drug q 
WHERE
	q.date_visit = CURDATE( )
	AND q.STATUS = '1'
	AND q.stationno IS NULL 
";
$q_rx = mysqli_query($objCon, $s_rx);
$r_rx = mysqli_fetch_array($q_rx, MYSQLI_ASSOC);
echo $r_rx['cc'];