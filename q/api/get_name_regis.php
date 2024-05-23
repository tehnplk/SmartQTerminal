<?php
require "../config/db.php";

$q = strtoupper($_GET['q']);

$sql = "SELECT
p.pname,p.fname,p.lname,p.occupation,q.fullname,p.marrystatus as marrystatus
FROM
ovst_queue_server_dep q
left outer join patient p on p.hn = q.hn
left outer join marrystatus m on m.nhso_marriage_code = p.marrystatus
WHERE
q.date_visit = CURDATE() and q.depq = '$q'  LIMIT 1";

$res = mysqli_query($objCon, $sql);
$numrow = mysqli_num_rows($res);

function newNameFormat($pname, $fname, $lname, $occu ,$fullname,$marrystatus,$db)
{

    $fsql = "SELECT tts FROM smartq_fname where id = '$fname'";
    $fquery = mysqli_query($db,$fsql);
    $fresult = mysqli_fetch_array($fquery, MYSQLI_ASSOC);
    
    $lsql = "SELECT tts FROM smartq_lname where id = '$lname'";
    $lquery = mysqli_query($db,$lsql);
    $lresult = mysqli_fetch_array($lquery, MYSQLI_ASSOC);
	
    $split = explode(" ", $fullname);
    $fnamefull = $split[0];
    // $lnamefull = $split[2];

    $arr_fname = $fresult['tts'];
    $arr_lname = $lresult['tts'];
	//echo $fresult['tts'].$lresult['tts']."<br>";
    //fname replace
    if ($arr_fname){
        $lower_fname = strtolower($arr_fname);
        $new_fname = ucfirst($lower_fname);
		//echo "change fname<br>";
    }else {
        $lower_fname = strtolower($fname);
        $new_fname = ucfirst($lower_fname);
		//echo "not change fname<br>";
    }


    //lname replace
    if ($arr_lname){
        $lower_lname = strtolower($arr_lname);
        $new_lname = ucfirst($lower_lname);
		//echo "change lname<br>";
    }else {
        $lower_lname = strtolower($lname);
        $new_lname = ucfirst($lower_lname);
		//echo "not change lname<br>";
    }

    //convert to new fullname format
    if ($occu == '203') {
        include "data/203Sailor.php";
        $arr_pname = $pnamedata[$pname];

        if ($arr_pname){
            $new_pname = $arr_pname;
            $name_format = " '$new_pname$new_fname '$new_lname";
        }else {
            $name_format = " '$pname$new_fname '$new_lname";
        }

    }elseif ($occu == '205') {
        include "data/205Police.php";
        $arr_pname = $pnamedata[$pname];

        if ($arr_pname){
            $new_pname = $arr_pname;
            $name_format = " '$new_pname$new_fname '$new_lname";
        }else {
            $name_format = " '$pname$new_fname '$new_lname";
        }
    }elseif ($occu == '202') {
        include "data/202Army.php";
        $arr_pname = $pnamedata[$pname];

        if ($arr_pname){
            $new_pname = $arr_pname;
            $name_format = " '$new_pname$new_fname '$new_lname";
        }else {
            $name_format = " '$pname$new_fname '$new_lname";
        }
    } elseif ($occu == '204') {
        include "data/204Air.php";
        $arr_pname = $pnamedata[$pname];

        if ($arr_pname){
            $new_pname = $arr_pname;
            $name_format = " '$new_pname$new_fname '$new_lname";
        }else {
            $name_format = " '$pname$new_fname '$new_lname";
        }
    } elseif ($occu == '208') {
        include "data/208pension.php";
        $arr_pname = $pnamedata[$pname];

        if ($arr_pname){
            $new_pname = $arr_pname;
            $name_format = " '$new_pname$new_fname '$new_lname";
        }else {
            $name_format = " '$pname$new_fname '$new_lname";
        }
    } else{
        include "data/general.php";
        $arr_pname = $pnamedata[$pname];
        $str_subpname = mb_substr($fnamefull,0,3);

        if ($arr_pname){
            $new_pname = $arr_pname;
			//echo "change pname<br>";
            $name_format = " '$new_pname$new_fname '$new_lname";
        }elseif ($marrystatus == '6') {
            $new_pname = $pname;
            $name_format = " '$new_pname$new_fname '$new_lname";
        }else {
            if ($str_subpname == 'คุณ'){
				$khun = "คุณ";
                $name_format = " '$khun$new_fname '$new_lname";

            }else {
				$name_format = " '$pname$new_fname '$new_lname";

			}
            
        }
    }


    return  $name_format;
}




if ($numrow > 0) {
    //get from database
    $result = mysqli_fetch_array($res, MYSQLI_ASSOC);
    $pname = $result['pname'];
    $fname = $result['fname'];
    $lname = $result['lname'];
    $occu = $result['occupation'];
    $fullname = $result['fullname'];
    $marrystatus = $result['marrystatus'];
    
    //new fullname
    $newfullname = newNameFormat($pname, $fname, $lname, $occu ,$fullname,$marrystatus,$objCon2);
    

    echo $newfullname;
} else {
    echo "";
}
//$data = ['name' => $new_name];
//echo json_encode($data);
