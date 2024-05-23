<?php
require "../config/db.php";
require "depcode.php";

$sql = "
SELECT
	* 
FROM
	ovst_queue_server_mini qc 
WHERE
	DATE_FORMAT( qc.queue_datetime, '%Y-%c-%d' ) = CURDATE( ) 
	AND qc.STATUS = '1' 
	AND qc.station_no IS NULL 
ORDER BY
	qc.queue_starttime DESC
";
/*
$sql = "
SELECT * FROM
ovst_queue_server_mini qc
WHERE
DATE_FORMAT( qc.queue_datetime, '%Y-%c-%d' ) = CURDATE( )
AND qc.STATUS = '1'
and qc.queue_dep = '$depcode'
AND qc.station_no IS NULL
ORDER BY qc.queue_starttime asc
";
*/
$query2 = mysqli_query($objCon, $sql);

$counter = 0;

while ($result2 = mysqli_fetch_array($query2, MYSQLI_ASSOC)) {
    ?>
    <div class="q-rows-green pad-5">
        <div class="rowlist text-center" style="flex:1;"><?= $counter + 1; ?></div>
        <div class="rowlist text-center" style="flex:1;"><span class="padding-q bg-green em100"><?= $result2["queue_no"]; ?></span></div>
    </div>
    <?php
    $counter++;
}
