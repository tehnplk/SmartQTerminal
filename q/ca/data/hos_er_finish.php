<?php
require "../../config/db.php";
require "../../config/kskdepartment_plk.php";

$s = "
SELECT

IF (
	(
		SELECT
			count( DISTINCT o.vn ) AS cc 
		FROM
			ovst o
			INNER JOIN ovst_queue_server q ON q.vn = o.vn
		WHERE
			o.cur_dep IN ( $er ) 
			AND o.vstdate = curdate()
			AND q.stationno IS NULL
	) > (
		SELECT
			count( DISTINCT vn ) AS cc 
		FROM
			er_regist 
		WHERE
			vstdate = CURDATE()
	),
	0,
	(
		SELECT
			count( DISTINCT vn ) AS cc 
		FROM
			er_regist 
		WHERE
			vstdate = CURDATE()
	) - (
		SELECT
			count( DISTINCT o.vn ) AS cc 
		FROM
			ovst o
			INNER JOIN ovst_queue_server q ON q.vn = o.vn
		WHERE
			o.cur_dep IN ( $er ) 
			AND o.vstdate = curdate()
			AND q.stationno IS NULL
	)
) AS cc
";
$res = mysqli_query($objCon, $s);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
echo $row['cc'];