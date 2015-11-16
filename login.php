<?php
	if(isset($_POST['submit'])) {
		$errorMessage = "";

		$username = $_POST['username'];
		$password = $_POST['password'];
        
		if(empty($username)) {
			$errorMessage .= "username";
			header("location: index.php");
		}
		if(empty($password)) {
			$errorMessage .= "password";
			header("location: index.php");
		}
		
		

		
		if(empty($errorMessage)) {
			$db = mysql_connect("localhost","root",""); //connect to database
			if(!$db) die("Error connecting to MySQL database.");
			mysql_select_db("thenovaleague" ,$db);
			
			$sql = "SELECT * FROM user WHERE username=".
			PrepSQL($username) . " AND userpass=" .
			PrepSQL($password);
			$query = mysql_query($sql);
			$rows = mysql_num_rows($query);
			
			if ($rows == 1) {
				
	
				$cookie_name = "user";
				$cookie_value = $username;
				setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");



				$date = date('Y-m-d H:i:s');
				$datetostring = "'" . date('Y-m-d H:i:s') . "'";
				$expiry = "'" . date('Y-m-d H:i:s', strtotime( "$date + 30 day" )) . "'";
				$add_login = "INSERT INTO login (username,starttime,expiretime) VALUES (".
					PrepSQL($username) . ", " .
					$datetostring . ", " . 
					$expiry . ")";
				
				$login_exists = "SELECT * FROM login WHERE username=" . PrepSQL($username) . " AND expiretime > " . $datetostring;
		
				if (mysql_num_rows(mysql_query($login_exists)) < 1) {
					mysql_query($add_login);
				}

				header('refresh:3; url=profile.php');
		      
				
		} else {
            header("location: index.php");

        }
    }
	}

	
	// function: PrepSQL()
	// use stripslashes and mysql_real_escape_string PHP functions
	// to sanitize a string for use in an SQL query
	// also puts single quotes around the string
	//
	function PrepSQL($value) {
		// Stripslashes
		if(get_magic_quotes_gpc()) {
			$value = stripslashes($value);
		}
		
		// Quote
		$value = "'" . mysql_real_escape_string($value) . "'";
		
		return($value);
	}

	

?>