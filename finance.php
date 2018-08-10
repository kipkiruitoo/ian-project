<?php
/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else if ($_SESSION['role']!= 3 && $_SESSION['role']!= 1) {
$_SESSION['message'] = "You are not authorized to view this page!";
 header("location: error.php");
}
else {
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
    
}
?>
<!DOCTYPE html>  
<html>
<head>
	 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Products</title>

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
  <link rel="stylesheet" type="text/css" href="css/animate.css">
  <style type="text/css">
    .result {
   border: 3px solid teal;
   text-align: right;
   
   word-wrap: break-word;



  </style>
</head>
<body onload="welcome()">
  <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="navbar-color teal lighten 1">
                <div class="nav-wrapper">
                    <ul class="left">                      
                      <li><h1 class="logo-wrapper"><a href="index-2.html" class="brand-logo darken-1"><img src="images/m" alt=""></a> <span class="logo-text"></span></h1></li>
                    </ul>
                    <div class="header-search-wrapper hide-on-med-and-down">
                        <i class="mdi-action-search"></i>
                        <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="search"/>
                    </div>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen"><i class="mdi-action-settings-overscan"></i></a>
                        </li>
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light notification-button" data-activates="notifications-dropdown"><i class="mdi-social-notifications"><small class="notification-badge">5</small></i>
                        
                        </a>
                        </li>                        
                        <li><a href="#" data-activates="chat-out" class="waves-effect waves-block waves-light chat-collapse"><i class="mdi-communication-chat"></i></a>
                        </li>
                        <li><a href="logout.php" class="tooltipped" data-position="bottom" data-tooltip="logout"><i class="mdi-action-lock-outline"></i></a>
                       
                    </ul>
                    <!-- translation-button -->
                    <!-- notifications-dropdown -->
                    <ul id="notifications-dropdown" class="dropdown-content">
                      <li>
                        <h5>NOTIFICATIONS <span class="new badge">5</span></h5>
                      </li>
                      <li class="divider"></li>
                      <li>
                        <a href="#!"><i class="mdi-action-add-shopping-cart"></i> A new order has been placed!</a>
                        <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">2 hours ago</time>
                      </li>
                      <li>
                        <a href="#!"><i class="mdi-action-stars"></i> Completed the task</a>
                        <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">3 days ago</time>
                      </li>
                      <li>
                        <a href="#!"><i class="mdi-action-settings"></i> Settings updated</a>
                        <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">4 days ago</time>
                      </li>
                      <li>
                        <a href="#!"><i class="mdi-editor-insert-invitation"></i> Director meeting started</a>
                        <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">6 days ago</time>
                      </li>
                      <li>
                        <a href="#!"><i class="mdi-action-trending-up"></i> Generate monthly report</a>
                        <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">1 week ago</time>
                      </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- end header nav-->
  </header>
  <div class="container">
    <div class="row">
      <div class="col s12 m9">
        <p></p>
      </div>
      <div class="col s12 m3">
  <!-- Calculator -->
<div id="calculator" class="container flow-text">
      <div class="row">
         <p class="animated pulse infinite " style="color: teal;">Here is your calculator</p>
         <div class="result">0</div>
      </div>
      <div class="row">
         <div class="col s6">
            <button class="waves-effect waves-light btn hoverable teal c-btn ">clear</button>
         </div>
         <div class="col s3 offset-s2">
            <button class="waves-effect waves-light btn hoverable teal b-btn" data-value="back">&larr;</button>
         </div>
      </div>
      <div class="row">
         <div class="col s3">
            <button class="waves-effect waves-light btn hoverable teal">7</button>
         </div>
         <div class="col s3">
            <button class="waves-effect waves-light btn hoverable teal">8</button>
         </div>
         <div class="col s3">
            <button class="waves-effect waves-light btn hoverable teal">9</button>
         </div>
         <div class="col s3">
            <button class="waves-effect waves-light btn hoverable teal calculation">/</button>
         </div>
      </div>
      <div class="row">
         <div class="col s3">
            <button class="waves-effect waves-light btn hoverable teal">4</button>
         </div>
         <div class="col s3">
            <button class="waves-effect waves-light btn hoverable teal">5</button>
         </div>
         <div class="col s3">
            <button class="waves-effect waves-light btn hoverable teal">6</button>
         </div>
         <div class="col s3">
            <button class="waves-effect waves-light btn hoverable teal calculation" data-value="*">x</button>
         </div>
      </div>
      <div class="row">
         <div class="col s3">
            <button class="waves-effect waves-light btn hoverable teal">1</button>
         </div>
         <div class="col s3">
            <button class="waves-effect waves-light btn hoverable teal">2</button>
         </div>
         <div class="col s3">
            <button class="waves-effect waves-light btn hoverable teal">3</button>
         </div>
         <div class="col s3">
            <button class="waves-effect waves-light btn hoverable teal calculation" data-value="-">&ndash;</button>
         </div>
      </div>
      <div class="row">
         <div class="col s3">
            <button class="waves-effect waves-light btn hoverable teal">0</button>
         </div>
         <div class="col s3">
            <button class="waves-effect waves-light btn hoverable teal">.</button>
         </div>
         <div class="col s3">
            <button class="waves-effect waves-light btn hoverable teal equals">=</button>
         </div>
         <div class="col s3">
            <button class="waves-effect waves-light btn hoverable teal calculation">+</button>
         </div>
      </div>
      </div>
   </div>
   </div>
   </div>
   <!-- End of calculator -->
  <!-- jQuery Library -->
    <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>    
    <!--materialize js-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mathjs/3.2.1/math.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mathjs/3.2.1/math.map"></script>
    <script type="text/javascript" src="js/calc.js"></script>
    <script type="text/javascript">
       Materialize.toast('Welcome back', 1000) 
    </script>
    <!--prism-->
    <script type="text/javascript" src="js/plugins/prism/prism.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!-- chartist -->
    <script type="text/javascript" src="js/plugins/chartist-js/chartist.min.js"></script>   
    <!-- chartist -->
    <script type="text/javascript" src="js/plugins/chartist-js/chartist.min.js"></script>   

    <!-- masonry -->
    <script src="js/plugins/masonry.pkgd.min.js"></script>
    <!-- imagesloaded -->
    <script src="js/plugins/imagesloaded.pkgd.min.js"></script>    
    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>

    <script type="text/javascript"/>
</body>
</html>