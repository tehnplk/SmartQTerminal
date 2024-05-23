<?php
require "../config/db.php";
require "depcode.php";

$sql = "
SELECT
	q.depq,
	q.fullname,
	d.NAME er,
	et.export_code,
        CASE
            WHEN p.marrystatus = 6 THEN CONCAT(p.pname,p.fname,'  ',p.lname)
            ELSE q.fullname
	END AS newname,
        CASE
            WHEN et.export_code = '1' THEN 'bg-red'
            WHEN et.export_code = '2' THEN 'bg-pink'
            WHEN et.export_code = '3' THEN 'bg-yellow'
            WHEN et.export_code = '4' THEN 'bg-green'
            ELSE 'bg-white'
	END AS q_bg,
	t.`name` er
FROM
	ovst_queue_server q
	INNER JOIN ovst o ON o.vn = q.vn
	INNER JOIN ovst_queue_server_time t ON t.vn = q.vn
	LEFT JOIN er_regist e ON e.vn = q.vn
	LEFT JOIN er_emergency_type et ON et.er_emergency_type = e.er_emergency_type
	LEFT JOIN er_dch_type d ON d.er_dch_type = e.er_dch_type 
        LEFT OUTER JOIN patient p ON p.hn = q.hn
WHERE
	q.dep = '$depcode' 
	AND t.STATUS = '1' 
	AND o.cur_dep = '$depcode' 
	AND t.dep = '$depcode' 
	AND q.date_visit = CURDATE( ) 
	AND t.stationno IS NOT NULL 
	AND e.er_dch_type IN (5)
GROUP BY
	q.vn 
ORDER BY
	ifNull(et.export_code,9) ASC,
	q.time_visit ASC
";

$query = mysqli_query($objCon, $sql);
?>


<?php
while ($result2 = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
    $level = $result2["export_code"];
    //echo $level;
    ?>
    <div class="q-rows-gray <?= $result2["q_bg"]; ?> pad-5">
        <div class="rowlist text-center" style="flex:1.5;"><span class=" padding-q em100"><?= $result2["depq"]; ?></span></div>
        <div class="rowlist text-left" style="flex:4.5;"><?= $result2["newname"]; ?></div>

    </div>

    <?php
}


mysqli_close($objCon);
?>