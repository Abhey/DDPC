
            <ul class="nav">
                <?php

                    if(! strcmp($currentTab, "dashboard"))
                        echo "<li class=\"active\">";
                    else
                        echo "<li>";

                ?>
                    <a href="dashboard.php">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <?php

                    if(! strcmp($currentTab, "user"))
                        echo "<li class=\"active\">";
                    else
                        echo "<li>";

                ?>
                    <a href="user.php">
                        <i class="ti-user"></i>
                        <p>Edit Profile</p>
                    </a>
                </li>
                 <?php

                    if(! strcmp($currentTab, "uploadDocument"))
                        echo "<li class=\"active\">";
                    else
                        echo "<li>";

                ?>
                    <a href="uploadDocument.php">
                        <i class="ti-user"></i>
                        <p>upload Document</p>
                    </a>
                </li>
                 <?php
                        if(! strcmp($currentTab, "applyLeave"))
                           echo "<li class=\"active\">";
                        else
                            echo "<li>";
                ?>
                    <a href="applyLeave.php">
                        <i class="ti-user"></i>
                        <p>Apply Leave</p>
                    </a>
                </li>
                <?php

                    if($is_admin == 1)
                    {

                        if(!strcmp($currentTab, "viewStudents"))
                            echo "<li class=\"active\">";
                        else
                            echo "<li>";

                ?>
                        <a href="viewStudents.php">
                            <i class="ti-view-list-alt"></i>
                            <p>View Students</p>
                        </a>
                    </li>
                <?php
                        if(!strcmp($currentTab, "makeNotification"))
                            echo "<li class=\"active\">";
                        else
                            echo "<li>";
                ?>
                        <a href="makeNotification.php">
                            <i class="ti-pencil-alt2"></i>
                            <p>Make Notification</p>
                        </a>
                    </li>
                <?php
                        if(!strcmp($currentTab, "createMeeting"))
                            echo "<li class=\"active\">";
                        else
                            echo "<li>";
                ?>
                        <a href="createMeeting.php">
                            <i class="ti-pencil-alt2"></i>
                            <p>Create Meeting</p>
                        </a>
                    </li>
                <?php
                        if(!strcmp($currentTab, "meetingAttendance"))
                            echo "<li class=\"active\">";
                        else
                            echo "<li>";
                ?>
                        <a href="meetingAttendance.php">
                            <i class="ti-pencil-alt2"></i>
                            <p>Meeting Attendance</p>
                        </a>
                    </li>
                 <?php
                        if(!strcmp($currentTab, "studentLeave"))
                            echo "<li class=\"active\">";
                        else
                            echo "<li>";
                ?>
                        <a href="studentLeave.php">
                            <i class="ti-layout-list-thumb"></i>
                            <p>Student Leave</p>
                        </a>
                    </li>
                <?php
                        if(!strcmp($currentTab, "members"))
                            echo "<li class=\"active\">";
                        else
                            echo "<li>";
                ?>
                        <a href="members.php">
                            <i class="ti-layout-list-thumb"></i>
                            <p>DDPC Members</p>
                        </a>
                    </li>
                <!-- <?php

                        if(!strcmp($currentTab, "typography"))
                            echo "<li class=\"active\">";
                        else
                            echo "<li>";

                ?>
                        <a href="typography.php">
                            <i class="ti-text"></i>
                            <p>Typography</p>
                        </a>
                    </li>
                <?php

                        if(!strcmp($currentTab, "icons"))
                            echo "<li class=\"active\">";
                        else
                            echo "<li>";

                ?>
                        <a href="icons.php">
                            <i class="ti-pencil-alt2"></i>
                            <p>Icons</p>
                        </a>
                    </li>
                <?php

                        if(!strcmp($currentTab, "maps"))
                            echo "<li class=\"active\">";
                        else
                            echo "<li>";

                ?>
                        <a href="maps.php">
                            <i class="ti-map"></i>
                            <p>Maps</p>
                        </a>
                    </li>
                <?php

                        if(!strcmp($currentTab, "notifications"))
                            echo "<li class=\"active\">";
                        else
                            echo "<li>";

                ?>
                        <a href="notifications.php">
                            <i class="ti-bell"></i>
                            <p>Notifications</p>
                        </a>
                    </li>-->
                <?php
                    }
                ?> 
            </ul>
