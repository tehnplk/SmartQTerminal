<?php
require "../config/db.php";
require "depcode.php";

$sql2 = "
SELECT
	(
SELECT
IF
	( count( t2.vn ) > 0, 1, 0 ) called 
FROM
	ovst_queue_server_time t2
	LEFT JOIN ovst_queue_server q2 ON q2.vn = t2.vn 
WHERE
	q2.date_visit = CURDATE( ) 
	AND q2.dep IN $depcode2 
	AND MOD ( t2.STATUS, 2 ) = 1 
	AND t2.stationno IS NOT NULL 
	) called,
	q.*,
	t.export_code,
        CASE
            WHEN p.marrystatus = 6 THEN CONCAT(p.pname,p.fname,'  ',p.lname)
            ELSE q.fullname
	END AS newname,
        CASE
            WHEN t.export_code = '1' THEN 'bg-red'
            WHEN t.export_code = '2' THEN 'bg-pink'
            WHEN t.export_code = '3' THEN 'bg-yellow'
            WHEN t.export_code = '4' THEN 'bg-green'
			WHEN t.export_code = '5' THEN 'bg-white'
            ELSE 'bg-white'
	END AS q_bg,
	        CASE
            WHEN t.export_code = '1' THEN 'red'
            WHEN t.export_code = '2' THEN 'pink'
            WHEN t.export_code = '3' THEN 'yellow'
            WHEN t.export_code = '4' THEN 'green'
			WHEN t.export_code = '5' THEN 'blue'
            ELSE 'blue'
	END AS bg,
	t.name er
FROM
	ovst o
	INNER JOIN ovst_queue_server q ON q.vn = o.vn
	LEFT JOIN er_regist e ON e.vn = q.vn
	LEFT JOIN er_emergency_type t ON t.er_emergency_type = e.er_emergency_type 
        LEFT OUTER JOIN patient p ON p.hn = q.hn
WHERE 
	q.STATUS = '1' 
	AND q.date_visit = CURDATE( ) 
	AND q.stationno IS NULL 
	AND o.cur_dep IN $depcode2 
	AND e.er_pt_type not in (1,2)
ORDER BY
	ifNull(t.export_code,9) ASC,
	q.time_visit ASC
";

$query2 = mysqli_query($objCon, $sql2);

$sqlminute = "SELECT time_wait,time_start,dep_station from kskdepartment_plk where depcode = '$depcode'";
$queryminute = mysqli_query($objCon, $sqlminute);
$resultminute = mysqli_fetch_array($queryminute, MYSQLI_ASSOC);
$time = $resultminute["time_wait"];
$workstart = $resultminute["time_start"];
date_default_timezone_set("Asia/Bangkok");
$now = date("H:i:s");
$dep = $resultminute["dep_station"];

$dateDiff = intval((strtotime($workstart) - strtotime($now)) / 60);

if ($dateDiff < 0) {
    $dateDiff = 0;
}

function convertToHoursMins($sumtime) {
    if ($sumtime < 1) {
        return "-";
    }
    $hours = floor($sumtime / 60);
    $minutes = ($sumtime % 60);
    $mod = fmod($sumtime, 60);

    if ($hours >= 1 && $mod == 0) {
        return $hours . " ชม.";
    }
    if ($hours >= 1) {
        return "<h2> " . $hours . " ชม. " . $minutes . " น.</h2>";
    } else {
        return $minutes . " นาที";
    }

    return "-";
}
?>


<?php
$counter = 1;

while ($result2 = mysqli_fetch_array($query2, MYSQLI_ASSOC)) {
    $called = $result2["called"];

    $div = $counter / $dep;
    $x = floor($div);
    $sumtime = ((round($x) + $called)) * $time + $dateDiff;
    $level = $result2["export_code"];
    $vn = $result2["vn"];
    $sqlupdate = "UPDATE ovst_queue_server
  SET wait_dep='$sumtime'
  WHERE vn='$vn'";
    $queryupdate = mysqli_query($objCon, $sqlupdate);
    ?>
    <div class="q-rows-gray <?= $result2["q_bg"]; ?> pad-5">
        <div class="rowlist text-center" style="flex:1.5;"><span class=" padding-q em100"><?= $result2["depq"]; ?></span></div>
        <div class="rowlist text-left" style="flex:4.5;"><?= $result2["newname"]; ?></div>
		<div class="rowlist text-left" style="flex:2;"><?= convertToHoursMins($sumtime) ?></div>
    </div>
    <?php
    $counter++;
}

mysqli_close($objCon);
?>