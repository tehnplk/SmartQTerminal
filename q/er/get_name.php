<?php
require "../config/db.php";

$q = $_GET['q'];
if ($q == 's99999') {
    exit;
}

$sql = "
SELECT
	q.fullname,
	concat( p.pname, fname, ' ', lname ) AS hname,
	q.*,
	p.marrystatus AS marrystatus 
FROM
	ovst_queue_server q
	LEFT JOIN patient p ON p.hn = q.hn 
WHERE
	depq = '$q' 
	AND q.date_visit = CURDATE( ) 
	LIMIT 1
";

$result = mysqli_query($objCon, $sql);
$total = mysqli_num_rows($result);
if ($total < 1) {
    echo "-";
    exit;
}

$rows = mysqli_fetch_array($result, MYSQLI_ASSOC);

if ($rows['marrystatus'] != '6'){
    echo $rows['fullname'];
}else if ($rows['marrystatus'] == '6'){
    echo $rows["hname"];
}

mysqli_close($objCon);