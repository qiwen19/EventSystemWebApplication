<?php

$updatedAt = date("Y-m-d H:i:s");
$createdAt = date("Y-m-d H:i:s");
//added guildID value in userListGuildInfo.php
require_once 'guildCtrl.php';
$con = open_connection();

if (isset($_POST['delete_admin_guild'])) {
    $guild_id = $_POST['delete_admin_guild'];
    adminDeleteGuild($con, 1, $guild_id, $updatedAt);
}
?>