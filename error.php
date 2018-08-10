<?php
/* Displays all error messages */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Error page</title>

  <!-- Favicons-->
  <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  
  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">


  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="js/plugins/prism/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">
</head>
<body class="">
    <div class="navbar-fixed">
            <nav class="navbar-color teal lighten 1">
                <div class="nav-wrapper">
                    <ul class="left">                      
                      <li><h1 class="logo-wrapper"><a href="index-2.html" class="brand-logo darken-1"><img src="images/m" alt=""></a> <span class="logo-text"></span></h1></li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="row">
    
        <div class="col s12 m10 l9 offset-l3 offset-m2">
             <div class="card card-panel z-depth-4 teal white-text hoverable center lighten-1">
                <div class="card-content black-text">
                    <h1>Error</h1>
                        <p>
                           <?php 
                              if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ): 
                                  echo $_SESSION['message'];    
                                        else:
                                           // header( "location: index.php" );
                                                    endif;
                             ?>
                        </p>     
                        <a href="index.php"><button class="btn white black-text hoverable "/>Login</button></a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
 