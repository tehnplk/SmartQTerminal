<?php
require "../../config/kskdepartment_plk.php";
require "../../config/db.php";

$s = "
SELECT
	COUNT( DISTINCT q.vn ) AS cc 
FROM
	ovst_queue_server q 
WHERE
	q.date_visit = CURDATE() 
	AND q.opd_dep IN ( $dent )
";
$res = mysqli_query($objCon, $s);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
echo $row['cc'];