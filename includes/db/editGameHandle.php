<?php
//require_once 'dbfunction.php';
include_once 'checkLoginStatus.php';
require_once 'gameCtrl.php';
$con = open_connection();

$ga_name = $_POST['title'];
$ga_type = $_POST['ga_type'];
$date = $_POST['datetime'];
$start = date("H:i", strtotime($_POST['start']));
$end = date("H:i", strtotime($_POST['end']));
$location = $_POST['location'];
$min_attendance = $_POST['min'];
$description = $_POST['desc'];
$ga_id = $_POST['game_id'];
$updatedAt = date("Y-m-d H:i:s");
//$all_ga_name = getNewGames($con);

$session_urid = $userData['ur_id'];

    
function uploadFileHandle($currFile = null, $id = 0, $ga_type,$disDir = null) {
    if ($currFile == null) {
        return false;
    } else if ($currFile["error"] > 0) {
        return false;
    } else {

        // now process the file
        //now process the file
        $allowedExts = ["pdf"];
        $filenameStrArr = explode(".", $currFile["name"]); //line 20 and 21 is to extract the extension of the uploaded file
        $extension = strtolower(end($filenameStrArr)); //give me the last value in the array

        $allowedTypes = ["application/pdf"];
        $fileType = $currFile["type"];

        $sizeLimit = 1600; //limit the file size
        $fileSize = $currFile["size"] / 1024;

        if (in_array($extension, $allowedExts) &&
                in_array($fileType, $allowedTypes) &&
                ($fileSize <= $sizeLimit)) {
            $disFileName = $id . "_" . $ga_type . ".{$extension}";

            $disDir = "rules"; // file will be store in this folder
            $disFinal = "../../" . $disDir . "/" . $disFileName;

            move_uploaded_file($currFile["tmp_name"], $disFinal);
            return $disFileName;
        } else {
            return false;
        }
    }
}

if ($_FILES["myRules"]["error"] == 0) {
    $uploadFilename = uploadFileHandle($_FILES["myRules"], $session_urid,$ga_type);
    //echo "First File uploaded: {$uploadFilename01} <br/>";
    //uploadFileHandle($currFile = null, $id = 0, $disDir = null);
    $rules_pdf = $uploadFilename;
    updateGamesInfo($con,$ga_id,$ga_name,$ga_type,$date,$start,$end,$location,$description,$min_attendance,$rules_pdf,$updatedAt,$debug =false);
} else {
    updateGamesInfoNoPdf($con,$ga_id,$ga_name,$ga_type,$date,$start,$end,$location,$description,$min_attendance,$updatedAt);
}
?>
