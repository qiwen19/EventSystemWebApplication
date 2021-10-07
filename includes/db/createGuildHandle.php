<?php

////require_once 'dbfunction.php';
//require_once 'checkLoginStatus.php';

$guild = $_POST['guild'];
$desc = $_POST['desc'];
$createdAt = date("Y-m-d H:i:s");
$updatedAt = date("Y-m-d H:i:s");

include_once 'checkLoginStatus.php';
$session_urid = $userData['ur_id'];


require_once 'guildCtrl.php';
$con = open_connection();

if ($_FILES["myFile"]["error"] == 0) {
    $uploadFilename = uploadFileHandle($_FILES["myFile"], 1);
    //echo "First File uploaded: {$uploadFilename01} <br/>";
    uploadFileHandle($currFile = null, $id = 0, $disDir = null);
}

function uploadFileHandle($currFile = null, $id = 0, $disDir = null) {
    if ($currFile == null) {
        return false;
    } else if ($currFile["error"] > 0) {
        return false;
    } else {

        // now process the file
        //now process the file
        $allowedExts = ["jpg", "jpeg", "gif", "png"];
        $filenameStrArr = explode(".", $currFile["name"]); //line 20 and 21 is to extract the extension of the uploaded file
        $extension = strtolower(end($filenameStrArr)); //give me the last value in the array

        $allowedTypes = ["image/gif", "image/jpeg", "image/png", "image/pjpeg"];
        $fileType = $currFile["type"];

        $sizeLimit = 1600; //limit the file size
        $fileSize = $currFile["size"] / 1024;

        if (in_array($extension, $allowedExts) &&
                in_array($fileType, $allowedTypes) &&
                ($fileSize <= $sizeLimit)) {
            $disFileName = $id . "_" . time() . ".{$extension}";

            $disDir = "img"; // file will be store in this folder
            if (file_exists($disDir)) {
                $disFinal = "../../" . $disDir . "/" . $disFileName;
            } else {
                //alert("error");
                $disFinal = "../../" . $disFileName;
            }

            move_uploaded_file($currFile["tmp_name"], $disFinal);
            return $disFileName;
        } else {
            return false;
        }
    }
}

$getUserGuildArr = getUserGuild($con, 0, $session_urid);
foreach ($getUserGuildArr as $UserGuildInfo) {
    $gu_id = $UserGuildInfo['gu_id'];
}

$existingGu_id = ($userData['gu_id']);

if ($existingGu_id != null) {
    $message = "You can only join one guild at a time. Please quit existing guild before proceeding";
    echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<script>setTimeout(\"location.href = '../../users/userguilds.php';\",50);</script>";
    return false;
    
} else
if ($guild != "" && $desc != "") {
    createNewGuild($con, $guild, $desc, $uploadFilename, $session_urid, $createdAt, $updatedAt);
    //updateUser($con, $gu_id, $session_urid);
}
?>

