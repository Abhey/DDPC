                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" onclick="">
                                    <?php
                                        // session_start();
                                        $countNotifications = 0;
                                        $thisRole = $_SESSION['role'];
                                        $thisUniqueId = $_SESSION['reg_no'];
                                        $query = "SELECT * FROM notifications WHERE (target_group='$thisRole' OR target_member='$thisUniqueId') AND `read`='0' ORDER BY issue_date DESC";
                                         //echo $query;
                                        // die();
                                        $allNotifications = mysqli_query($connection, $query);
                                        // $count = mysqli_num_rows($allNotifications);

                                        while($notification = mysqli_fetch_array($allNotifications) )
                                        {
                                            $countNotifications += 1;
                                        }
                                        // echo $countNotifications;
                                    ?>
                                    <i class="ti-bell"></i>
                                    <p class="notification notificationAlert" id="notificationsCount"><?php echo $countNotifications; ?></p>
									<p>Notifications</p>
									<b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <?php
                                    $lastNot = 0;
                                    $thisRole = $_SESSION['role'];
                                    $thisUniqueId = $_SESSION['reg_no'];
                                    $query = "SELECT * FROM notifications WHERE (target_group='$thisRole' OR target_member='$thisUniqueId') AND `read`='0' ORDER BY issue_date DESC";
                                    // echo $query;
                                    $allNotifications = mysqli_query($connection, $query);
				
                                    while( $notification = mysqli_fetch_array($allNotifications) )
                                    {
                                        if($lastNot < $notification['id'])
                                            $lastNot = $notification['id'];
                                        /*if(isset($_COOKIE[(string)$_SESSION['reg_no'].(string)$notification['id']]))
                                            continue;*/
                                        
                                ?>
              <li id="<?php echo $notification['id']; ?>" onclick="markAsDone(<?php echo $notification['id']; ?>)"><a href="#"><?php echo $notification['description']; ?></a></li>
                                    
                                <?php } ?>
                                <span style="display: none;" id = "notid"><?php echo $lastNot; ?> </span>
                              </ul>
                        </li>


                        <script type="text/javascript">
                            function markAsDone(notificationId)
                            {
                                var urltosend = "set_cookie.php?notid="+notificationId;
                                // alert(urltosend);
                                // console.log(el);
                                xmldata = new XMLHttpRequest();
                                xmldata.open("GET", urltosend, false);
                                xmldata.send(null);
                                // alert(xmldata.responseText);
                                if(xmldata.responseText != ""){
                                    toPrint = xmldata.responseText;
                                }

                                document.getElementById("notificationsCount").innerHTML = xmldata.responseText;
                                document.getElementById(notificationId).style.display = 'none';
                            }
                        </script>
