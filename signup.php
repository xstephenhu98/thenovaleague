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
            <li><div class="btn-nav"><a type="button" class="btn btn-default btn-sm navbar-btn" href="index.html">BACK TO HOME</a></div></li>
        
          </ul>
          
        </div><!--/.nav-collapse -->
      </div>
  </nav>

  

  <div class="container theme-showcase" role="main">
      <div class="row">
       <div class="panel panel-default col-md-3" style="margin: 0 auto">

<?php
    if($_POST['submit'] == "Submit") {
		
		$errorMessage = "";

		$username = $_POST['username'];
		$password = $_POST['password'];
		$password_repeat = $_POST['password-repeat'];
		$ogs_userid = $_POST['ogs-userid'];
		$rating = $_POST['rating'];
		$rank = $_POST['rank'];
		$about = $_POST['about'];

        
        //validation
		if(empty($username)) {
			$errorMessage .= "username";
  			echo "<div class='alert alert-dismissible alert-danger'>
  				<button type='button' class='close' data-dismiss='alert'>×</button><span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
  				<strong> Oh snap!</strong> You didn't choose a username!
				</div>";
		}
		if(empty($password)) {
			$errorMessage .= "username";
  			echo "<div class='alert alert-dismissible alert-danger'>
  				<button type='button' class='close' data-dismiss='alert'>×</button><span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
  				<strong> Oh snap!</strong> You didn't set a password!
				</div>";
		}
		if(empty($password_repeat)) {
			$errorMessage .= "username";
  			echo "<div class='alert alert-dismissible alert-danger'>
  				<button type='button' class='close' data-dismiss='alert'>×</button><span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
  				<strong> Oh snap!</strong> You didn't repeat the password!
				</div>";
		}
		if(empty($username)) {
			$errorMessage .= "username";
  			echo "<div class='alert alert-dismissible alert-danger'>
  				<button type='button' class='close' data-dismiss='alert'>×</button><span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
  				<strong> Oh snap!</strong> You haven't chosen a username!
				</div>";
		}
		if(empty($username)) {
			$errorMessage .= "username";
  			echo "<div class='alert alert-dismissible alert-danger'>
  				<button type='button' class='close' data-dismiss='alert'>×</button><span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
  				<strong> Oh snap!</strong> You haven't chosen a username!
				</div>";
		}
        if(0 == preg_match("/^\d\d?\.?\d?\d?$/", $price)){
            $errorMessage .= "price";
  			echo "<div class='alert alert-dismissible alert-danger'>
  <button type='button' class='close' data-dismiss='alert'>×</button><span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
  <strong> Oh snap!</strong> You haven't entered the item price!
</div>";
        }


		
		if(empty($errorMessage)) {
			$db = mysql_connect("localhost","root",""); //connect to database
			if(!$db) die("Error connecting to MySQL database.");
			mysql_select_db("delivery" ,$db);
			$sql = "INSERT INTO food (name, price) VALUES (".
			PrepSQL($name) . ", " .
			PrepSQL($price) . ")";
			mysql_query($sql);

			echo "<div class='alert alert-dismissible alert-success'>
  <button type='butto' class='close' data-dismiss='alert'>×</button><span class='glyphicon glyphicon-ok-sign' aria-hidden='true'></span>
  <strong> Yay!</strong> Item successfully inserted!
		</div>";

		echo "<a href='admin.html' class='btn btn-primary' role='button'><span class='glyphicon glyphicon-repeat' aria-hidden='true'></span> Go back</a>";
			exit();
		} else {
            echo "<div class='alert alert-dismissible alert-danger'>
  <button type='button' class='close' data-dismiss='alert'>×</button><span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
  <strong> Oh snap!</strong> There has been a failure.
</div>";
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