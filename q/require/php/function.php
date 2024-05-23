<?php
function DateThai($strDate)
{
    if (empty($strDate)) {
        return "";
    } else {
        $strYear = date("Y", strtotime($strDate)) + 543;
        $strMonth = date("n", strtotime($strDate));
        $strDay = date("j", strtotime($strDate));
        $strHour = date("H", strtotime($strDate));
        $strMinute = date("i", strtotime($strDate));
        $strSeconds = date("s", strtotime($strDate));
        $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
        $strMonthThai = $strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear เวลา $strHour:$strMinute น.";
    }
}

function convertToHoursMins($sumtime)
{
    if ($sumtime < 1) {
        return "<h2 class='text-center'>-</h2>";
    }
    $hours = floor($sumtime / 60);
    $minutes = ($sumtime % 60);
    $mod = fmod($sumtime, 60);

    if ($hours >= 1 && $mod == 0) {
        return "<h2 class='text-center'>" . $hours . " ชม.</h2>";
    }
    if ($hours >= 1) {
        return "<h2 class='text-center'> " . $hours . " ชม. " . $minutes . " น.</h2>";
    } else {
        return "<h2 class='text-center'>" . $minutes . " นาที</h2>";
    }

    return "<h2 class='text-center'>-</h2>";
}
?>