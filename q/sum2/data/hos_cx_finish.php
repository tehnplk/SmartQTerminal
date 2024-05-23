<?php
require "../../config/db.php";
require "../../config/kskdepartment_plk.php";

$s = "SELECT count(p.vn) as cc from ptdepart p
left outer join vn_stat v on v.vn = p.vn
where v.vstdate = curdate() and p.depcode IN ($clinic) and outtime is not null";
$res = mysqli_query($objCon, $s);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
echo $row['cc'];