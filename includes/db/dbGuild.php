<?php

require_once 'dbConnection.php';

function dbDisplayUserGuild($con, $status, $session_urid, $debug = false) { //cannot find where this function is used
    
    $resultArr = [];
    $sqlStr = "SELECT gu.* FROM guilds gu, users u WHERE gu.gu_id = u.gu_id AND u.ur_id = '{$session_urid}'";

    $result = mysqli_query($con, $sqlStr);

    if ($result) {
        while ($currentRecord = mysqli_fetch_array($result)) {
            $resultArr[] = $currentRecord;
        }
    }
    return $resultArr;
}

function dbUpdateGuild($con, $gu_id, $gu_name, $description, $gu_profile_filename, $updatedAt, $debug = false) {

    $message1 = "Guild Updated ";
    $message2 = "No Change Occurred.";

    $sqlStr = "UPDATE guilds " .
            "SET gu_name = '{$gu_name}', description = '{$description}' , gu_profile_filename = '{$gu_profile_filename}',updatedAt = '{$updatedAt}' " .
            "WHERE gu_id = '{$gu_id}'";
            
            mysqli_query($con, $sqlStr);
            
            if(mysqli_affected_rows($con) > 0) {
                echo "<script type='text/javascript'>alert('$message1');";
               header('Location: ../../users/userListGuildInfo.php?id=' . $gu_id);
            }else{
               echo "<script type='text/javascript'>alert('$message2');";
               header('Location: ../../users/userListGuildInfo.php?id=' . $gu_id);
            }
    $result = mysqli_query($con, $sqlStr);
}

function dbAdminUpdateGuild($con, $gu_id, $gu_name, $description, $gu_profile_filename, $updatedAt, $debug = false) {

    $message1 = "Guild Updated ";
    $message2 = "No Change Occurred.";

    $sqlStr = "UPDATE guilds " .
            "SET gu_name = '{$gu_name}', description = '{$description}' , gu_profile_filename = '{$gu_profile_filename}',updatedAt = '{$updatedAt}' " .
            "WHERE gu_id = '{$gu_id}'";
            
            mysqli_query($con, $sqlStr);
            
            if(mysqli_affected_rows($con) > 0) {
                echo "<script type='text/javascript'>alert('$message1');";
               header('Location: ../../admin/adminguilds.php?id=' . $gu_id);
            }else{
               echo "<script type='text/javascript'>alert('$message2');";
               header('Location: ../../admin/adminguilds.php?id=' . $gu_id);
            }
    $result = mysqli_query($con, $sqlStr);
}

function dbCreateNewGuild($con, $gu_name, $description, $gu_profile_filename, $session_urid, $createdAt, $updatedAt, $debug = false) {

    $uploadFilename01 = mysqli_real_escape_string($con, $gu_profile_filename);
    $guild = mysqli_real_escape_string($con, $gu_name); // it will escape from any illegal sign, eg: ' or delete statement
    $desc = mysqli_real_escape_string($con, $description);

    $sqlStr = "INSERT INTO guilds (gu_name,description,gu_profile_filename,createdAt,updatedAt) " .
            "VALUES ('{$gu_name}','{$description}','{$gu_profile_filename}','{$createdAt}','{$updatedAt}')";

    $result = mysqli_query($con, $sqlStr);

    if ($result) {
        echo "<pre>";
        print_r($sqlStr);
        echo "</pre>";
        $last_id = mysqli_insert_id($con);
        updateUser($con, $last_id, $session_urid);
    }
}

function dbGetUserGuild($con, $status, $session_urid, $debug = false) {

    $resultArr = [];
    $sqlStr = "SELECT gu.* FROM guilds gu, users u WHERE gu.gu_id = u.gu_id AND u.ur_id = '{$session_urid}'";

    $result = mysqli_query($con, $sqlStr);

    if ($result) {
        while ($currentRecord = mysqli_fetch_array($result)) {
            $resultArr[] = $currentRecord;
        }
    }
    return $resultArr;
}

function dbGetAllUsersGuild($con, $status, $gu_id, $debug = false) {

    $resultArr = [];
    $sqlStr = "SELECT gu.* FROM guilds gu WHERE gu.gu_id = '{$gu_id}'";

    $result = mysqli_query($con, $sqlStr);

    if ($result) {
        while ($currentRecord = mysqli_fetch_array($result)) {
            $resultArr[] = $currentRecord;
        }
    }
    return $resultArr;
}

function dbUpdateUser($con, $gu_id, $session_urid) {

    $sqlStr1 = "UPDATE users SET gu_id = '{$gu_id}', gu_status = '4' WHERE ur_id = '{$session_urid}'";

    $result1 = mysqli_query($con, $sqlStr1);

    if ($result1) {
//        echo"<pre>";
//        print_r($sqlStr1);
//        echo"</pre>";
        header('Location: ../../users/userListGuildInfo.php?id=' . $gu_id);
    }
}

function dbGetGuild($con, $status) {

    $resultArr = [];
    $sqlStr = "SELECT * FROM guilds WHERE status = '{$status}'";

    $result = mysqli_query($con, $sqlStr);

    if ($result) {
        while ($currentRecord = mysqli_fetch_array($result)) {
            $resultArr[] = $currentRecord;
        }
    }
    return $resultArr;
}

function dbGetUsersGuild($con, $status, $gu_id) {

    $resultArr = [];
    $sqlStr = "SELECT * FROM guilds WHERE status = '{$status}' AND gu_id = '{$gu_id}'";

    $result = mysqli_query($con, $sqlStr);

    if ($result) {
        while ($currentRecord = mysqli_fetch_array($result)) {
            $resultArr[] = $currentRecord;
        }
    }
    return $resultArr;
}

function dbGetCurrentGuilds($con, $status, $gu_status, $debug = false) {

    $resultArr = [];

    $sqlStr = "SELECT gu.*, u.in_game_name, u.ur_id, u.gu_status " .
            "FROM guilds gu, users u " .
            "WHERE gu.gu_id = u.gu_id " .
            "AND gu.status='{$status}' AND u.gu_status='{$gu_status}' " .
            "ORDER BY createdAt DESC ";

    $result = mysqli_query($con, $sqlStr, $debug);

    if ($result) {
        while ($currentRecord = mysqli_fetch_array($result)) {
            $resultArr[] = $currentRecord;
        }
    }
    return $resultArr;
}

function dbJoinedGuild($con, $status, $ur_id, $debug = false) {

    $resultArr = [];

    $sqlStr = "SELECT gu.*, u.in_game_name, u.gu_status " .
            "FROM guilds gu, users u " .
            "WHERE gu.gu_id = u.gu_id " .
            "AND gu.status='{$status}' AND (u.gu_status=2 or 3 or 4) AND u.ur_id='{$ur_id}'" .
            "ORDER BY createdAt DESC ";

    $result = mysqli_query($con, $sqlStr, $debug);

    if ($result) {
        while ($currentRecord = mysqli_fetch_array($result)) {
            $resultArr[] = $currentRecord;
        }
    }
    return $resultArr;
}

function dbJoinedGuildLeader($con, $gu_id, $gu_status, $debug = false) {

    $resultArr = [];

    $sqlStr = "SELECT * " .
            "FROM users " .
            "WHERE gu_id = '{$gu_id}' AND gu_status='{$gu_status}'";

    $result = mysqli_query($con, $sqlStr, $debug);

    if ($result) {
        while ($currentRecord = mysqli_fetch_array($result)) {
            $resultArr[] = $currentRecord;
        }
    }
    return $resultArr;
}

function dbcountMember($con, $gu_id) {

    $sqlStr = "SELECT COUNT(gu_id) "
            . "AS no_attendance "
            . "FROM users "
            . "WHERE gu_id = '{$gu_id}' AND gu_status != '1' ";

    $resultArray = getBySql($con, $sqlStr);

    return $resultArray;
}

function dbGuildMember($con, $status, $gu_id, $debug = false) {

    $resultArr = [];

    $sqlStr = "SELECT * FROM users " .
            "WHERE gu_id = '{$gu_id}' AND status = '{$status}' AND gu_status != '1'";
    "ORDER BY gu_status DESC ";

    $result = mysqli_query($con, $sqlStr, $debug);
    if ($result) {
        while ($currentRecord = mysqli_fetch_array($result)) {
            $resultArr[] = $currentRecord;
        }
    }
    return $resultArr;
}

//for guildInfoHandle
function dbJoinGuild($con, $status, $gu_id, $session_urid, $debug = false) {

    $sqlStr = "UPDATE users SET gu_id = '{$gu_id}', gu_status = '1' WHERE ur_id = '{$session_urid}'"
            . " AND status = '{$status}'";

    $result = mysqli_query($con, $sqlStr);

    if ($result) {
        header('Location: ../../users/userListGuildInfo.php?id=' . $gu_id);
    }
}

function dbCancelPending($con, $status, $session_urid, $debug = false) {

    $sqlStr = "UPDATE users SET gu_id = null, gu_status = '0' WHERE ur_id = '{$session_urid}'"
            . " AND status = '{$status}'";

    $result = mysqli_query($con, $sqlStr);

    if ($result) {
        header('Location: ../../users/userguilds.php');
    }
}

function dbQuitGuild($con, $status, $session_urid, $debug = false) {

    global $session_urid;

    $sqlStr = "UPDATE users SET gu_id = null, gu_status = '0' WHERE ur_id = '{$session_urid}'"
            . " AND status = '{$status}'";

    $result = mysqli_query($con, $sqlStr);

    if ($result) {
        header('Location: ../../users/userguilds.php');
    }
}

function dbcountLeader($con, $gu_id, $debug = false) {

    $resultArr = [];

    $sqlStr = "SELECT COUNT(gu_status) "
            . "AS no_of_guildLeader "
            . "FROM users "
            . "WHERE gu_id = '{$gu_id}' AND gu_status = '4'";

    $result = mysqli_query($con, $sqlStr, $debug);

    if ($result) {

        while ($currentRecord = mysqli_fetch_array($result)) {

            $resultArr[] = $currentRecord;
        }
    }
    return $resultArr;
}

function dbPromoLeader($con, $status, $ur_id, $gu_id, $debug = false) {

    $sqlStr = "UPDATE users SET gu_status = '4' WHERE ur_id = '{$ur_id}' AND status = '{$status}'";

    $result = mysqli_query($con, $sqlStr);

    if ($result) {
        header('Location: ../../users/userListGuildInfo.php?id=' . $gu_id);
    }
}

function dbPromoCoLeader($con, $status, $ur_id, $gu_id, $debug = false) {

    $sqlStr = "UPDATE users SET gu_status = '3' WHERE ur_id = '{$ur_id}' AND status = '{$status}'";

    $result = mysqli_query($con, $sqlStr);

    if ($result) {
        header('Location: ../../users/userListGuildInfo.php?id=' . $gu_id);
    }
}

function dbKickMember($con, $status, $ur_id, $gu_id, $debug = false) {

    $sqlStr = "UPDATE users SET gu_id = null, gu_status = '0' WHERE ur_id = '{$ur_id}'"
            . " AND status = '{$status}' AND gu_id = '{$gu_id}'";

    $result = mysqli_query($con, $sqlStr);

    if ($result) {
        header('Location: ../../users/userListGuildInfo.php?id=' . $gu_id);
    }
}

//kick member or cancel their pending request!

function dbDeleteGuild($con, $status, $gu_id, $updatedAt, $debug = false) {

    $sqlStr = "UPDATE guilds gu, users u " .
            "SET gu.status = '{$status}', gu.updatedAt = '{$updatedAt}', " .
            "u.gu_id = null, u.gu_status = '0' " .
            "WHERE gu.gu_id = '{$gu_id}' AND u.gu_id = gu.gu_id";

    $result = mysqli_query($con, $sqlStr);

    if ($result) {
        header('Location: ../../users/userguilds.php');
    } 
}

function dbAdminDeleteGuild($con, $status, $gu_id, $updatedAt, $debug = false) {

    $sqlStr = "UPDATE guilds gu, users u " .
            "SET gu.status = '{$status}', gu.updatedAt = '{$updatedAt}', " .
            "u.gu_id = null, u.gu_status = '0' " .
            "WHERE gu.gu_id = '{$gu_id}' AND u.gu_id = gu.gu_id";

    $result = mysqli_query($con, $sqlStr);

    if ($result) {
        header('Location: ../../admin/adminguilds.php');
    } else {
        print_r($sqlStr);
    }
}

function dbDisplayPendingReq($con, $status, $gu_id, $debug = false) {

    $resultArr = [];

    $sqlStr = "SELECT * FROM users WHERE gu_id = '{$gu_id}' AND gu_status = '1' AND status = '{$status}'";

    $result = mysqli_query($con, $sqlStr, $debug);
    if ($result) {
        while ($currentRecord = mysqli_fetch_array($result)) {
            $resultArr[] = $currentRecord;
        }
    }
    return $resultArr;
}

function dbAcceptPendingReq($con, $status, $ur_id, $gu_id, $debug = false) {

    $sqlStr = "UPDATE users SET gu_status = '2' WHERE ur_id = '{$ur_id}'"
            . " AND status = '{$status}'";

    $result = mysqli_query($con, $sqlStr);

    if ($result) {
        header('Location: ../../users/userListGuildInfo.php?id=' . $gu_id);
    }
}

//new start
function dbGetGuildByName($con, $gu_name, $debug = false) {

    $resultArr = [];
    $sqlStr = "SELECT * FROM guilds " .
              "WHERE gu_name = '{$gu_name}'";

    $result = mysqli_query($con, $sqlStr);

    if ($result) {
        while ($currentRecord = mysqli_fetch_array($result)) {
            $resultArr[] = $currentRecord;
        }
    }
    return $resultArr;
}

function dbGetAllGuild($con, $status, $debug = false) {

    $resultArr = [];
    $sqlStr = "SELECT * FROM guilds " .
              "WHERE status = '{$status}'".
              "ORDER BY createdAt DESC ".
              "LIMIT 10";

    $result = mysqli_query($con, $sqlStr);

    if ($result) {
        while ($currentRecord = mysqli_fetch_array($result)) {
            $resultArr[] = $currentRecord;
        }
    }
    return $resultArr;
}

//end
?>