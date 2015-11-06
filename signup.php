<?php
    if($_POST['submit'] == "Submit") {
		
		$errorMessage = "";

		$name = $_POST['item_name'];
		$price = $_POST['item_price'];

        
        //make sure all fields are complete
		if(empty($name)) {
			$errorMessage .= "name";
  			echo "<div class='alert alert-dismissible alert-danger'>
  <button type='button' class='close' data-dismiss='alert'>×</button><span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
  <strong> Oh snap!</strong> You haven't entered the item name!
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