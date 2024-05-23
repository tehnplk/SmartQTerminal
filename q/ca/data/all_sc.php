<?php

require "../../config/db.php";
require "../../config/kskdepartment_plk.php";

$s_all_sc = "
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
			AND o.cur_dep IN ($screen)
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
			AND p.depcode IN ($screen)
			AND outtime IS NOT NULL
		)
	) AS cc
";
$q_all_sc = mysqli_query($objCon, $s_all_sc);
$r_all_sc = mysqli_fetch_array($q_all_sc, MYSQLI_ASSOC);
echo $r_all_sc['cc'];