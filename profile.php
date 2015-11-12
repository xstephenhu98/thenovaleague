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
            
            <li><div class="btn-nav"><a type="button" class="btn btn-primary btn-sm navbar-btn" href="#">HELLO</a></div></li>
            <li><div class="btn-nav"><a type="button" class="btn btn-default btn-sm navbar-btn" href="#"><span class="glyphicon glyphicon-log-out"></span></a></div></li>
          </ul>
          
     
          
        </div><!--/.nav-collapse -->
      </div>
  </nav>

  

  <div class="container theme-showcase" role="main">
            <?php
              include 'login.php';

              if(!isset($_COOKIE[$cookie_name])) {
                  echo "Cookie named '" . $cookie_name . "' is not set!";
              } else {
                  echo "Cookie '" . $cookie_name . "' is set!<br>";
                  echo "Value is: " . $_COOKIE[$cookie_name];
              }
            ?>
  <div>
  <ul class="nav col-sm-2 nav-pills nav-stacked">
  <li class="active"><a data-toggle="pill" href="#home">Home</a></li>
  <li><a data-toggle="pill" href="#menu1">Menu 1</a></li>
  <li><a data-toggle="pill" href="#menu2">Menu 2</a></li>
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <h3>HOME</h3>
    <p>Some content.</p>
  </div>
  <div id="menu1" class="tab-pane fade">
    <h3>Menu 1</h3>
    <p>Some content in menu 1.</p>
  </div>
  <div id="menu2" class="tab-pane fade">
    <h3>Menu 2</h3>
    <p>Some content in menu 2.</p>
  </div>
</div>


        

      
    </div>


  
  <!-- Optional theme -->
  
  

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  
</body>
</html>
