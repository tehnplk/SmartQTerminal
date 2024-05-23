<?php
require "../../config/db.php";
require "../../config/kskdepartment_plk.php";

$s = "        
SELECT
	count( DISTINCT o.vn ) AS cc 
FROM
	ovst o
	INNER JOIN ovst_queue_server q ON q.vn = o.vn
WHERE
	o.cur_dep IN ( $dent ) 
	AND o.vstdate = curdate()
	AND q.stationno IS NULL
";
$res = mysqli_query($objCon, $s);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
echo $row['cc'];