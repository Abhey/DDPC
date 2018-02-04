<?php
session_start();
for($i = 1; $i <= $_GET['notid']; $i++)
{
	$cookie_name = (string)$_SESSION['reg_no'].(string)$i;
	echo $cookie_name;
	$cookie_value = "read";
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
}
	
echo "done!";
?>