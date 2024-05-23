<?php
require "../config/db.php";
require "depcode.php";

$sql = "SELECT dep_inform FROM kskdepartment_plk where depcode = '$depcode'";

$query = mysqli_query($objCon, $sql);
$result = mysqli_fetch_array($query, MYSQLI_ASSOC);

echo $result['dep_inform'];

mysqli_close($objCon); 
?>