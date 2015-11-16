

<!DOCTYPE HTML>


<?php
  
?>
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
            
            <li><div class="btn-nav"><a type="button" class="btn btn-primary btn-sm navbar-btn" href="#">
              HELLO, <?php 
                echo $_COOKIE['user'];
              ?>
        </a></div></li>
            <li><div class="btn-nav"><a type="button" class="btn btn-default btn-sm navbar-btn" href="#"><span class="glyphicon glyphicon-log-out"></span></a></div></li>
          </ul>
          
     
          
        </div><!--/.nav-collapse -->
      </div>
  </nav>

  

  <div class="container-fluid theme-showcase" role="main">
            
  <div>
  <ul class="nav col-sm-2 nav-pills nav-stacked">
  <li class="active"><a data-toggle="pill" href="#home">HOME</a></li>
  <li><a data-toggle="pill" href="#menu1">GAMES</a></li>
  
</ul>

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
      $status = 0;
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
        echo("<button value='join' class='btn btn-success btn-xs'>JOIN</button></td></tr>");
        
      }
    ?>
  </tbody>
</table> 
  </div>
  <div id="menu1" class="tab-pane fade">
    <h3>Games</h3>
    <p>Some content in menu 1.</p>
  </div>
  
</div>


        

      
    </div>


  
  <!-- Optional theme -->
  
  

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  
</body>
</html>
