        <!-- MVP + Latest User -->
        <div class="container">
            <div class="row">
                <!-- Winner of the last official game !-->
                <div class="col-xs-12 col-md-6 mvp">
                    <div class="panel-body fixed-panel">
                        <form action="userGuildResultHandle.php" method="get">
                            <div class="input-group add-on col-md-4">
                                <input type="text" class="form-control" name="search" style="color:black" placeholder="Search Guild">
                            
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                            </div></div>
                        </form>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Newest Guilds</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php
                        foreach($getguild as $guildData){
                            $guPic = $guildData['gu_profile_filename'];
                            $guName= $guildData['gu_name'];
                            $guid = $guildData['gu_id'];
                            echo "<tr><td><a href='../users/userListGuildInfo.php?id={$guid}'><img src='../img/".$guPic."'class='img-circle' width=30;/>".'   '.$guName."</a></td>";
                        }

                    ?>
                       </tbody>
                    </table>
                </div>
                </div>

                <div class="col-xs-12 col-md-6 latestuser">
                    <div class="panel-body fixed-panel">
                        <form action="usersearchResults.php" method="get">
                            <div class="input-group add-on col-md-4">
                                <input type="text" class="form-control" name="search" style="color:black" placeholder="Search User">
                            
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                            </div></div>
                        </form>
                        <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Newest Users</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($newUsers as $newUsersData){
                            $userPic = $newUsersData['picture'];
                            $userIgn= $newUsersData['in_game_name'];
                            $userid = $newUsersData['ur_id'];
                            echo "<tr><td><a href='showUserProfile.php?urid={$userid}'><img src='".$userPic."'class='img-circle' width=30;/>".'   '.$userIgn."</a></td>";
                        }
                        ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end !-->