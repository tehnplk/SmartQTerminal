<?php

require "../../config/db.php";

$s = "SELECT

IF (
	(
		SELECT count(DISTINCT hn) as cc FROM oapp WHERE nextdate = curdate() and visit_vn is not null and visit_vn <> ''
	) > (
		select (SELECT count(DISTINCT hn) FROM oapp WHERE nextdate = curdate())

	),
	0,
	(
		select (SELECT count(DISTINCT hn) FROM oapp WHERE nextdate = curdate())
	) - (
		SELECT count(DISTINCT hn) as cc FROM oapp WHERE nextdate = curdate() and visit_vn is not null and visit_vn <> ''
	)

) AS cc";
$res = mysqli_query($objCon, $s);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
echo $row['cc'];