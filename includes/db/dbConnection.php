<?php

require_once 'dbconfig.php';

function open_connection() {
    $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

    if (mysqli_connect_errno()) {
        return_false;
    } else {
        return $con;
    }
}

function close_connection() {
    if (isset($con)) {
        mysqli_close($con);
    }
}

function query($con, $sql = "", $debug = false) {
    if ($debug) {
        echo "Y";
        echo "In Debug: query<br /><br />";
        echo "SQL Statement : <br /><br />";
        echo "{$sql}<br /><br />";
        echo "Connection : <br /><br />";
        echo "<pre>";
        print_r($con);
        echo "</pre>";
        die();
    }

    $result = mysqli_query($con, $sql);
    return $result;
}

function getBySql($con, $sql = "", $debug = false) {
        
    $resultSet = query($con, $sql, $debug);

    $resultArray = [];
    while ($row = mysqli_fetch_assoc($resultSet)) {
        $resultArray[] = $row;
    }
    return $resultArray;
}
