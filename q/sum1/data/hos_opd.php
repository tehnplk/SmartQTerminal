<?php

require "../../config/db.php";

$s = "SELECT count( DISTINCT hn ) cc FROM ovst WHERE vstdate = CURDATE( ) ;";
$res = mysqli_query($objCon, $s);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
echo $row['cc'];