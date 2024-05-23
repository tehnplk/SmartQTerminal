<?php

require "../../config/db.php";
require "../../config/kskdepartment_plk.php";

$s_all_cx = "
SELECT
	(
		(
			SELECT
				count(q.vn) cc
			FROM
				ovst_queue_server q
			INNER JOIN ovst o ON o.vn = q.vn
			WHERE
				q.date_visit = CURRENT_DATE ()
			AND o.cur_dep IN ($clinic)
			AND q. STATUS = '1'
			AND q.stationno IS NULL
		) + (
			SELECT
				count(p.vn) AS cc
			FROM
				ptdepart p
			LEFT OUTER JOIN vn_stat v ON v.vn = p.vn
			WHERE
				v.vstdate = curdate()
			AND p.depcode IN ($clinic)
			AND outtime IS NOT NULL
		)
	) AS cc
";
$q_all_cx = mysqli_query($objCon, $s_all_cx);
$r_all_cx = mysqli_fetch_array($q_all_cx, MYSQLI_ASSOC);
echo $r_all_cx['cc'];