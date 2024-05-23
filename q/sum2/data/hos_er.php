<?php
require "../../config/db.php";
require "../../config/kskdepartment_plk.php";

$s = "
SELECT
	count( DISTINCT vn ) AS cc 
FROM
	er_regist 
WHERE
	vstdate = CURDATE()
";
$res = mysqli_query($objCon, $s);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
echo $row['cc'];