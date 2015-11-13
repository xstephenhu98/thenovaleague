<?php
	
    if(isset($_POST['submit'])) {
		
		$errorMessage = "";

		$username = $_POST['username'];
		$password = $_POST['password'];
        
		if(empty($username)) {
			$errorMessage .= "username";
			header("location: index.html");
		}
		if(empty($password)) {
			$errorMessage .= "password";
			header("location: index.html");
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
				$cookie_name = $username;
				
				setcookie($cookie_name, time() + (86400 * 30), "/");

				echo($cookie_name);
         		

				header('Refresh: 3;url=profile.php');
		      
			exit();
				
		} else {
            header("location: index.html");

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