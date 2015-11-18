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
          <a class="navbar-brand" href="index.php">The Nova League</span></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          
        <ul class="nav navbar-nav navbar-right">
            <li><div class="btn-nav"><a type="button" class="btn btn-default btn-sm navbar-btn" href="index.php">BACK TO HOME</a></div></li>
        
          </ul>
          
        </div><!--/.nav-collapse -->
      </div>
  </nav>

  

  <div class="container theme-showcase" role="main">
      <div class="jumbotron">
      
 
<?php
    if(isset($_POST['submit'])) {
		
		$errorMessage = "";
		$is_available = true;

		$username = $_POST['username'];
		$password = $_POST['password'];
		$password_repeat = $_POST['password-repeat'];
		$ogs_userid = $_POST['ogs-userid'];
		$rating = $_POST['rating'];
		$rank = $_POST['rank'];
		$about = $_POST['about'];

        
		if(empty($username)) {
			$errorMessage .= "username";
		}
		if(empty($password)) {
			$errorMessage .= "password";
		}
		if(empty($password_repeat)) {
			$errorMessage .= "password-repeat";
		}
		
		if(empty($ogs_userid)) {
			$errorMessage .= "ogs-userid";
		}
		

		
		if(empty($errorMessage)) {
			$db = mysql_connect("localhost","root",""); //connect to database
			if(!$db) die("Error connecting to MySQL database.");
			mysql_select_db("thenovaleague" ,$db);
			$username_check = "SELECT * FROM user WHERE username=".
		      PrepSQL($username);
		      
		    $rs = mysql_query($username_check);
		    $num = mysql_num_rows($rs);
		 
		    if($num == 1) {
		      $is_available = false;
		      echo "<div class='alert alert-dismissible alert-danger'>
  				<button type='button' class='close' data-dismiss='alert'>×</button><span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
  				<strong> Oops!</strong> Username has been taken.
				</div>";
			  echo "<a href='signup.html' class='btn btn-primary' role='button'>TRY AGAIN</a>";
			  exit();
		    }

		    if($num == 0) {
			$sql = "INSERT INTO user (username, userpass, ogs_userid, rating, rank, about) VALUES (".
			PrepSQL($username) . ", " .
			PrepSQL($password) . ", " .
			PrepSQL($ogs_userid) . ", " .
			PrepSQL($rating) . ", " .
			PrepSQL($rank) . ", " .
			PrepSQL($about) .")";
			mysql_query($sql);
			
		      

			echo "<div class='alert alert-dismissible alert-success'>
  <button type='butto' class='close' data-dismiss='alert'>×</button><span class='glyphicon glyphicon-ok-sign' aria-hidden='true'></span>
  <strong> Yay!</strong> Sign up successful! You'll be redirected to the homepage in 3 seconds.
		</div>";

		header('Refresh:3; url=index.php');
			exit();
			}
		} else {
            echo "<div class='alert alert-dismissible alert-danger'>
  <button type='button' class='close' data-dismiss='alert'>×</button><span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
  <strong> Oh snap!</strong> There has been a failure.
</div>";
	echo "<a href='signup.html' class='btn btn-primary' role='button'>TRY AGAIN</a>";

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
</div>

  
  <!-- Optional theme -->


  <!-- Latest compiled and minified JavaScript -->
  <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  
</body>
</html>