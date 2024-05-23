<?php
require "../../config/db.php";
require "../../config/kskdepartment_plk.php";

$s = "
SELECT
	count( q.vn ) AS cc 
FROM
	ovst_queue_server_drug q 
WHERE
	q.date_visit = CURDATE( )
	AND q.time_finish IS NOT NULL
";
$res = mysqli_query($objCon, $s);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
echo $row['cc'];