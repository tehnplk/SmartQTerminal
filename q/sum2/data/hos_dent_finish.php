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
                        o.cur_dep IN ( $dent ) 
                        AND o.vstdate = curdate()
                        AND q.stationno IS NULL
	) > (
		SELECT
			COUNT( DISTINCT q.vn ) AS cc 
		FROM
			ovst_queue_server q 
		WHERE
			q.date_visit = CURDATE() 
			AND q.opd_dep IN ( $dent )
	),
	0,
	(
		SELECT
			COUNT( DISTINCT q.vn ) AS cc 
		FROM
			ovst_queue_server q 
		WHERE
			q.date_visit = CURDATE() 
			AND q.opd_dep IN ( $dent )
	) - (
                SELECT
                        count( DISTINCT o.vn ) AS cc 
                FROM
                        ovst o
                        INNER JOIN ovst_queue_server q ON q.vn = o.vn
                WHERE
                        o.cur_dep IN ( $dent ) 
                        AND o.vstdate = curdate()
                        AND q.stationno IS NULL
	)
) AS cc
";
$res = mysqli_query($objCon, $s);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
echo $row['cc'];

