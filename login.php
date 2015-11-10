<!DOCTYPE HTML>

<html>
<head>
  <title>The Nova League</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://bootswatch.com/superhero/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>

 <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">The Nova League</span></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          
           <ul class="nav navbar-nav navbar-right">
            <li><div class="btn-nav"><a type="button" class="btn btn-primary btn-sm navbar-btn" href="signup.html">SIGN UP</a></div></li>
        
          </ul>
          <form name="login" class="navbar-form navbar-right" role="form" action="login.php" method="post">
                <div class="input-group input-group-sm">
                
                <input type="text" class="form-control" name="username" value="" placeholder="Username">                                        
                </div>
                <div class="input-group input-group-sm">
                
                <input type="password" class="form-control" name="password" value="" placeholder="Password">                                        
                </div>

                <button type="submit" class="btn btn-default btn-sm navbar-btn" name="submit" value="Submit" href="#">LOGIN</button>
            </form>
     
          
        </div><!--/.nav-collapse -->
      </div>
  </nav>

  

  <div class="container theme-showcase" role="main">
      

<?php
    if(isset($_POST['submit'])) {
		session_start();
		$errorMessage = "";

		$username = $_POST['username'];
		$password = $_POST['password'];
        
		if(empty($username)) {
			$errorMessage .= "username";
			echo "<div class='alert alert-dismissible alert-danger'>
  				<button type='button' class='close' data-dismiss='alert'>×</button><span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
  				<strong> Oops!</strong> You forgot to enter the username!
				</div>";
		}
		if(empty($password)) {
			$errorMessage .= "password";
			echo "<div class='alert alert-dismissible alert-danger'>
  				<button type='button' class='close' data-dismiss='alert'>×</button><span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
  				<strong> Oops!</strong> You forgot to enter the password.
				</div>";
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
				$_SESSION['login_user']=$username; // Initializing Session
				header("location: profile.php");
		      
			exit();
				
		} else {
            echo "<div class='alert alert-dismissible alert-danger'>
  <button type='button' class='close' data-dismiss='alert'>×</button><span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
  <strong> Oh snap!</strong> Username and password don't match or exist.
</div>";
	echo "<a href='index.html' class='btn btn-primary' role='button'>TRY AGAIN</a>";

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