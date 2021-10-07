<?php

$guild = $_POST['guild'];
$desc = $_POST['desc'];
$guild_id = $_POST['guild_id'];
$imgFile = $_FILES["myFile"];
$updatedAt = date("Y-m-d H:i:s");
require_once 'guildCtrl.php';


$con = open_connection();

echo $guild_id;

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

if ($guild != "" && $desc != "") {
    adminUpdateGuild($con, $guild_id, $guild, $desc, $uploadFilename, $updatedAt);
}
?>

<?php ?>