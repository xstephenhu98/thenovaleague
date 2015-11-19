

<!DOCTYPE HTML>


<?php
  
?>
<html>
<head>
  <title>The Nova League</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://bootswatch.com/superhero/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link href="bootstrap-switch.min.css" rel="stylesheet">
  <script src="bootstrap-switch.js"></script>
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
            
            <li><div class="btn-nav"><a type="button" class="btn btn-primary btn-sm navbar-btn" href="#">
              <?php 
                echo $_COOKIE['user'];
              ?>
        </a></div></li>

              <li><div class="btn-nav">
                <form action="logout.php" method="post"><button name="logout" value="logout" class="btn btn-default btn-sm navbar-btn" ><span class="glyphicon glyphicon-log-out"></span></button></form>
              </div></li>

          </ul>
          
     
          
        </div><!--/.nav-collapse -->
      </div>
  </nav>

  

  <div class="container-fluid theme-showcase" role="main">
            
  <div>
  <ul class="nav col-sm-2 nav-pills nav-stacked">
  <li class="active"><a data-toggle="pill" href="#home">HOME</a></li>
  <li><a data-toggle="pill" href="#menu1">GAMES</a></li>
  
</ul></div>

<div class="col-sm-10 tab-content">
  <div id="home" class="tab-pane panel fade in active">
    <table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>#</th>
      <th>Description</th>
      <th>Starts</th>
      <th>Ends</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $db = mysql_connect("localhost","root",""); //connect to database
      if(!$db) die("Error connecting to MySQL database.");
      mysql_select_db("thenovaleague" ,$db);
      
      $result = mysql_query("SELECT * FROM cycle");
      while($row= mysql_fetch_array($result)){
        echo("<tr><td>".
          $row['cycle_id']."</td><td>".
          $row['description']."</td><td>".
          $row['start_time']."</td><td>".
          $row['end_time']."</td><td>");
      $status = mysql_query("SELECT * FROM enrollment WHERE username =" . "'" . $_COOKIE['user'] . "' AND cycle_id=" . $row['cycle_id']);
        if(mysql_num_rows($status) < 1) {
        echo("<form action='' method='post'><button value='join' name='join-" . $row['cycle_id'] . "' class='btn btn-success btn-xs'>JOIN</button></form></td></tr>");

        
        if(isset($_POST['join-' . $row['cycle_id']])){
          mysql_query("INSERT INTO enrollment (username, cycle_id) VALUES (" . "'" . $_COOKIE['user'] . "', " . $row['cycle_id'] . ")");
          echo("<p>You've got new games to play! Go to the Games tab to check them out.</p>");
        }

        } else {
          echo("<form action='' method='post'><button value='leave' name='leave-" . $row['cycle_id'] . "' class='btn btn-danger btn-xs'>LEAVE</button></form></td></tr>");
          if(isset($_POST['leave-' . $row['cycle_id']])){
          mysql_query("DELETE FROM enrollment WHERE username = " . "'" . $_COOKIE['user'] . "' AND cycle_id = " . $row['cycle_id']);

          }
        }
      }
    ?>
  </tbody>
</table> 
  </div>

  <div id="menu1" class="tab-pane fade">
    <h3>Games</h3>
            <!-- <form action="" method="post">
            <input id="TheCheckBox" name="status" type="checkbox" data-off-text="Leave" data-on-text="Join" checked="false" class="switch">
        <label>This Switch is Set to
            <label id="CheckBoxValue" value="None"></label>
        </label>
      </form> -->

     <table class="table table-striped table-hover ">
        <thead>
        <tr>
        <th>Username</th>
        <th>Rating</th>
        <th>Rank</th>
        <th>Game (if applicable)</th>
      </tr>
      </thead>
      <tbody>
        <?php
          $db = mysql_connect("localhost","root",""); //connect to database
          if(!$db) die("Error connecting to MySQL database.");
          mysql_select_db("thenovaleague" ,$db);


        $active_cycle = mysql_query("SELECT * FROM cycle C WHERE C.start_time < now() AND C.end_time > now()");
        if (mysql_num_rows($active_cycle) > 0) {
          while($active_cycle_row= mysql_fetch_array($active_cycle)){
          
          
          $a = $active_cycle_row['cycle_id'];

          $sort = "SELECT E.username, U.rating, U.rank FROM enrollment E, user U WHERE U.username = E.username AND E.cycle_id = " . $a . " ORDER BY rating DESC";
          $rank_sort = mysql_query($sort);
          
         

          while($sort_row= mysql_fetch_array($rank_sort)){
            $find_my_rating = "SELECT U.rating FROM enrollment E, user U WHERE U.username = E.username AND U.username = '" . $_COOKIE['user'] . "' AND E.cycle_id = " . $a;
          
            $my_rating = mysql_fetch_array(mysql_query($find_my_rating))['rating'];

            $find_neighbors = "(SELECT E.username FROM enrollment E, user U WHERE U.username = E.username AND U.rating > " . $my_rating . " ORDER BY rating ASC LIMIT 2) UNION 
                (SELECT E.username FROM enrollment E, user U WHERE U.username = E.username AND U.rating < " . $my_rating . " ORDER BY rating DESC LIMIT 2)";
            $arr = array();

            $neighbors = mysql_query($find_neighbors);
            while($neighbornames = mysql_fetch_array($neighbors)){
              array_push($arr,$neighbornames['username']);
            } 
            
            echo("<tr");
            if ($sort_row['username'] == $_COOKIE['user']){
                echo(" class='info'><td>".
                $sort_row['username']."</td><td>".
                $sort_row['rating']."</td><td>".
                $sort_row['rank']."</td><td></td></tr>");
            } 
            
            else for ($i = 0; $i < sizeof($arr); $i++) {
              if ($sort_row['username'] == $arr[$i]) {
                echo(" class='warning'><td>".
                $sort_row['username']."</td><td>".
                $sort_row['rating']."</td><td>".
                $sort_row['rank']."</td><td></td></tr>");
              }
            }
            
          }
        }
      }
        ?>
      </tbody>
    </table>




  </div>
  
</div>


        

      
    </div>


  
  <!-- Optional theme -->
  
  

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="bootstrap-switch.min.js"></script>
  <script src="switch.js"></script>
  
</body>
</html>