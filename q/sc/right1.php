<?php
require "../config/db.php";
require "depcode.php";

$sql = "
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
	AND q2.dep IN $depcode3
	AND MOD ( t2.STATUS, 2 ) = 1 
	AND t2.stationno IS NOT NULL 
	) called,
IF
	( o.pt_priority IS NULL, '0', o.pt_priority ) dep_level,
	q.vn,
	q.time_visit,
	q.time_visit_opd,
	q.`status`,
	q.stationno,
	q.opd_dep,
	q.fullname,
	q.date_visit,
	q.depq,
	q.hn,
        CASE
            WHEN p.marrystatus = 6 THEN CONCAT(p.pname,p.fname,'  ',p.lname)
            ELSE q.fullname
	END AS newname,
	IF(o.vn=a.vn,1,2) oapp

FROM
	ovst o
	INNER JOIN ovst_queue_server q ON q.vn = o.vn
    LEFT OUTER JOIN patient p ON p.hn = q.hn
	LEFT OUTER JOIN oapp a ON a.vn = o.vn
WHERE
	q.STATUS = '1' 
	AND q.date_visit = CURDATE( ) 
	AND q.stationno IS NULL 
	AND o.cur_dep IN $depcode3
ORDER BY
	( IF ( o.pt_priority IS NULL, '0', o.pt_priority ) ) DESC,
	q.time_visit ASC
";

$query2 = mysqli_query($objCon, $sql);
?>

<?php
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
        return $hours . " ชม.+";
    } else {
        return $minutes . " นาที";
    }

    return "-";
}

$counter = 0;

while ($result2 = mysqli_fetch_array($query2, MYSQLI_ASSOC)) {
    $called = $result2["called"];
    $div = $counter / $dep;
    $x = floor($div);
    $sumtime = ((round($x) + $called)) * $time + $dateDiff;
    $level = $result2["dep_level"];
    $vn = $result2["vn"];
    $sqlupdate = "UPDATE ovst_queue_server
  SET wait_dep='$sumtime'
  WHERE vn='$vn'";
    $queryupdate = mysqli_query($objCon, $sqlupdate);
    ?>
    <div class="q-rows-green pad-5">
        <div class="rowlist text-center" style="flex:1.3;"><span class="bg-green padding-q em100"><?= $result2["depq"]; ?></span></div>
        <div class="rowlist text-left" style="flex:4.5;"><?= $result2["newname"]; ?></div>

		
    </div>
    <?php
    $counter++;
}

mysqli_close($objCon);
