<?php
	function checkUser($email){
		$user = mysql_fetch_assoc(mysql_query("SELECT * FROM client where Email='$email'"));
		if(strlen($user['Address']) == 0)
			return false;
		if(strlen($user['ContactNo']) == 0)
			return false;

		return true;
	}

	// Post variables.

?>