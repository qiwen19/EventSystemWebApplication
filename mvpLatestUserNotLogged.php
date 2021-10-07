        <!-- MVP + Latest User -->
        <div class="container">
            <div class="row">
                <!-- Winner of the last official game !-->
                <div class="col-xs-12 col-md-6 mvp">
                    <div class="panel-body fixed-panel">
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
                            echo "<tr><td><img src='img/".$guPic."'class='img-circle' width=30;/>".'   '.$guName."</td>";
                        }

                    ?>
                       </tbody>
                    </table>
                </div>
                </div>

                <div class="col-xs-12 col-md-6 latestuser">
                    <div class="panel-body fixed-panel">
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
                            echo "<tr><td><img src='".$userPic."'class='img-circle' width=30;/>".'   '.$userIgn."</td>";
                            echo "</tr>";
                        }
                        
                        ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end !-->