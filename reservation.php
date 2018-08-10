<?php

/* Displays user information and some useful messages */
session_start();
 
// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing THIS  page!";
  header("location: error.php");    
}
// check if the user has permision to access the page
else if ($_SESSION['role']!= 0 && $_SESSION['role']!= 1 ) {
$_SESSION['message'] = "You are not authorized to view this page! if you think this is an error, please contact your administrator";
 header("location: error.php");
}
else {
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['Next'])) {

   require 'reservation_save.php';
 }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Reservation</title>

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
<link href="css/mdtimepicker.css" rel="stylesheet">


  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="js/plugins/prism/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link rel="stylesheet" type="text/css" href="css/animate.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.css" />
</head>

<body>
  <!-- Start Page Loading -->
 <!--  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div> -->
  <!-- End Page Loading -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START HEADER -->
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
                </div>
            </nav>
        </div>
        <!-- end header nav-->
  </header>
  <!-- END HEADER -->
 <section id="content">
        
        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper">
            <!-- Search for small screen -->
            <div class="header-search-wrapper grey hide-on-large-only">
                <i class="mdi-action-search active"></i>
                <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
            </div>
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">Mutai Food Services</h5>
                <ol class="breadcrumbs">
                    <li><a href="dash.php">Dashboard</a></li>
                    <li><a href="#">Pages</a></li>
                    <li class="active">Reservation</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->
        <div class="container">
          <div class="row">
            <div class="col s12">
          <a href="#custom" class="col s12" ><button type="button" class="btn waves-effect waves-light teal darken-1 animated infinite rubberBand">Make a reservation</button></a></div>
         </div>
        </div>

        <!--start container-->
        <div class="container">
           <h1 class="center">Below are the available food</h1>
          <div class="section">
            <!-- statr products list -->
            <div id="products">
                <div class="product-sizer"></div>
                <div class="row">
                  <div class="product col s12 m2 l2">
                       <div class="card ">
                        <div class="card-image waves-effect waves-block waves-light">
                            <a href="#" class="btn-floating btn-large btn-price waves-effect waves-light  pink accent-2">$10</a>
                            
                              <div class="materialboxed">
                            <img src="images/bbq.jpg" class=""  alt="product-img">
                            </div>
                        </div>
                        <ul class="card-action-buttons">
                            <li><a class="btn-floating waves-effect waves-light red accent-2"><i class="mdi-action-add-shopping-cart"></i></a>
                            </li>
                            <li><a class="btn-floating waves-effect waves-light light-blue"><i class="mdi-action-info activator"></i></a>
                            </li>
                        </ul>
                        <div class="card-content">

                            <div class="row">
                                <div class="col s8">
                                    <p class="card-title grey-text text-darken-4"><a href="#" class="grey-text text-darken-4">Barbaqued pork"</a>
                                    </p>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"><i class="mdi-navigation-close right"></i>Barbaqued pork</span>
                            <p>Best pork in town made by our own chefs.</p>
                        </div>
                    </div>
                </div>

                     <div class="product col s12 m2 l2">
                       <div class="card ">
                        <div class="card-image waves-effect waves-block waves-light">
                            <a href="#" class="btn-floating btn-large btn-price waves-effect waves-light  pink accent-2">$20</a>
                            

                            <img src="images/gla.jpg"  alt="product-img">
                          
                        </div>
                        <ul class="card-action-buttons">
                            
                            <li><a class="btn-floating waves-effect waves-light red accent-2"><i class="mdi-action-add-shopping-cart"></i></a>
                            </li>
                            <li><a class="btn-floating waves-effect waves-light light-blue"><i class="mdi-action-info activator"></i></a>
                            </li>
                        </ul>
                        <div class="card-content">

                            <div class="row">
                                <div class="col s8">
                                    <p class="card-title grey-text text-darken-4"><a href="#" class="grey-text text-darken-4">Glazed pork"</a>
                                    </p>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"><i class="mdi-navigation-close right"></i> Glazed pork"</span>
                            <p>Glazed pork good for family gatherings</p>
                        </div>
                    </div>
                </div>

                     <div class="product col s12 m2 l2">
                       <div class="card ">
                        <div class="card-image waves-effect waves-block waves-light">
                            <a href="#" class="btn-floating btn-large btn-price waves-effect waves-light  pink accent-2">$30</a>
                            

                            <img src="images/ch.jpg"  alt="product-img">
                            
                        </div>
                        <ul class="card-action-buttons">
                            
                            <li><a class="btn-floating waves-effect waves-light red accent-2"><i class="mdi-action-add-shopping-cart"></i></a>
                            </li>
                            <li><a class="btn-floating waves-effect waves-light light-blue"><i class="mdi-action-info activator"></i></a>
                            </li>
                        </ul>
                        <div class="card-content">

                            <div class="row">
                                <div class="col s8">
                                    <p class="card-title grey-text text-darken-4"><a href="#" class="grey-text text-darken-4">Chicken lollipop"</a>
                                    </p>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"><i class="mdi-navigation-close right"></i> Chicken lollipop"</span>
                            <p>If you love chicken this one's for you</p>
                        </div>
                    </div>
                </div>

                     <div class="product col s12 m2 l2">
                       <div class="card ">
                        <div class="card-image waves-effect waves-block waves-light">
                            <a href="#" class="btn-floating btn-large btn-price waves-effect waves-light  pink accent-2">$18</a>
                            

                            <img src="images/cp.jpg"  alt="product-img">
                            
                        </div>
                        <ul class="card-action-buttons">
                            
                            <li><a class="btn-floating waves-effect waves-light red accent-2"><i class="mdi-action-add-shopping-cart"></i></a>
                            </li>
                            <li><a class="btn-floating waves-effect waves-light light-blue"><i class="mdi-action-info activator"></i></a>
                            </li>
                        </ul>
                        <div class="card-content">

                            <div class="row">
                                <div class="col s8">
                                    <p class="card-title grey-text text-darken-4"><a href="#" class="grey-text text-darken-4">Thai Chicken in Pumpkin Currie"</a>
                                    </p>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"><i class="mdi-navigation-close right"></i> Thai Chicken in Pumpkin Curries"</span>
                            <p>Delicious and yummy chicken to interest your taste buds.</p>
                        </div>
                    </div>
                </div>

                     <div class="product col s12 m2 l2">
                       <div class="card ">
                        <div class="card-image waves-effect waves-block waves-light">
                            <a href="#" class="btn-floating btn-large btn-price waves-effect waves-light  pink accent-2">$18</a>
                            

                            <img src="images/cg.jpeg"  alt="product-img">
                            
                        </div>
                        <ul class="card-action-buttons">
                            
                            <li><a class="btn-floating waves-effect waves-light red accent-2"><i class="mdi-action-add-shopping-cart"></i></a>
                            </li>
                            <li><a class="btn-floating waves-effect waves-light light-blue"><i class="mdi-action-info activator"></i></a>
                            </li>
                        </ul>
                        <div class="card-content">

                            <div class="row">
                                <div class="col s8">
                                    <p class="card-title grey-text text-darken-4"><a href="#" class="grey-text text-darken-4">Chicken Galantina"</a>
                                    </p>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"><i class="mdi-navigation-close right"></i> Chicken Galantina"</span>
                            <p>Only chicken best enjoyed cold.</p>
                        </div>
                   </div>
                   </div>
                </div>
               <div class="row"></div>
                 <div class="row"> 
                    <div class="product col s12 m2 l2">
                       <div class="card ">
                        <div class="card-image waves-effect waves-block waves-light">
                            <a href="#" class="btn-floating btn-large btn-price waves-effect waves-light  pink accent-2">$5 each</a>
                            

                            <img src="images/pishori.jpg"  alt="product-img">
                            
                        </div>
                        <ul class="card-action-buttons">
                            
                            <li><a class="btn-floating waves-effect waves-light red accent-2"><i class="mdi-action-add-shopping-cart"></i></a>
                            </li>
                            <li><a class="btn-floating waves-effect waves-light light-blue"><i class="mdi-action-info activator"></i></a>
                            </li>
                        </ul>
                        <div class="card-content">

                            <div class="row">
                                <div class="col s8">
                                    <p class="card-title grey-text text-darken-4"><a href="#" class="grey-text text-darken-4">Pishori Rice"</a>
                                    </p>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"><i class="mdi-navigation-close right"></i> Pishori rice"</span>
                            <p>Best enjoyed with vegetable stew, beans stew or beef stew</p>
                        </div>
                    </div>
                </div>

                     <div class="product col s12 m2 l2">
                       <div class="card ">
                        <div class="card-image waves-effect waves-block waves-light">
                            <a href="#" class="btn-floating btn-large btn-price waves-effect waves-light  pink accent-2">$.99</a>
                            

                            <img src="images/tatar.jpg"  alt="product-img">
                            
                        </div>
                        <ul class="card-action-buttons">
                            
                            <li><a class="btn-floating waves-effect waves-light red accent-2"><i class="mdi-action-add-shopping-cart"></i></a>
                            </li>
                            <li><a class="btn-floating waves-effect waves-light light-blue"><i class="mdi-action-info activator"></i></a>
                            </li>
                        </ul>
                        <div class="card-content">

                            <div class="row">
                                <div class="col s8">
                                    <p class="card-title grey-text text-darken-4"><a href="#" class="grey-text text-darken-4">Fish Fillet in Tartar Sauce"</a>
                                    </p>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"><i class="mdi-navigation-close right"></i> Fish Fillet in Tartar Sauce"</span>
                            <p>Best enjoyed with ugali, for a true african experience.</p>
                        </div>
                    </div>
                </div>

                     <div class="product col s12 m2 l2">
                       <div class="card ">
                        <div class="card-image waves-effect waves-block waves-light">
                            <a href="#" class="btn-floating btn-large btn-price waves-effect waves-light  pink accent-2">$3.89</a>
                            

                            <img src="images/nyama.jpg"  alt="product-img">
                            
                        </div>
                        <ul class="card-action-buttons">
                            
                            <li><a class="btn-floating waves-effect waves-light red accent-2"><i class="mdi-action-add-shopping-cart"></i></a>
                            </li>
                            <li><a class="btn-floating waves-effect waves-light light-blue"><i class="mdi-action-info activator"></i></a>
                            </li>
                        </ul>
                        <div class="card-content">

                            <div class="row">
                                <div class="col s8">
                                    <p class="card-title grey-text text-darken-4"><a href="#" class="grey-text text-darken-4">Nyama Choma"</a>
                                    </p>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"><i class="mdi-navigation-close right"></i> Nyama choma"</span>
                            <p>Kenyan delicacy best for social gatherings.</p>
                        </div>
                    </div>
                </div>
              </div>
               <div class="row">
                    <div class="product col s12 m2 l2.5">
                       <div class="card ">
                        <div class="card-image waves-effect waves-block waves-light">
                            <a href="#" class="btn-floating btn-large btn-price waves-effect waves-light  pink accent-2">$1.89</a>
                            

                            <img src="images/pilau.jpg"  alt="product-img">
                            
                        </div>
                        <ul class="card-action-buttons">
                            
                            <li><a class="btn-floating waves-effect waves-light red accent-2"><i class="mdi-action-add-shopping-cart"></i></a>
                            </li>
                            <li><a class="btn-floating waves-effect waves-light light-blue"><i class="mdi-action-info activator"></i></a>
                            </li>
                        </ul>
                        <div class="card-content">

                            <div class="row">
                                <div class="col s8">
                                    <p class="card-title grey-text text-darken-4"><a href="#" class="grey-text text-darken-4">Pilau"</a>
                                    </p>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"><i class="mdi-navigation-close right"></i> Pilau"</span>
                            <p>Coastal rice with so much aroma.</p>
                        </div>
                    </div>
                </div>

                     <div class="product col s12 m2 l2">
                       <div class="card ">
                        <div class="card-image waves-effect waves-block waves-light">
                            <a href="#" class="btn-floating btn-large btn-price waves-effect waves-light  pink accent-2">$.89</a>
                            

                            <img src="images/ugali.jpg"  alt="product-img">
                            
                        </div>
                        <ul class="card-action-buttons">
                            
                            <li><a class="btn-floating waves-effect waves-light red accent-2"><i class="mdi-action-add-shopping-cart"></i></a>
                            </li>
                            <li><a class="btn-floating waves-effect waves-light light-blue"><i class="mdi-action-info activator"></i></a>
                            </li>
                        </ul>
                        <div class="card-content">

                            <div class="row">
                                <div class="col s8">
                                    <p class="card-title grey-text text-darken-4"><a href="#" class="grey-text text-darken-4">Ugali"</a>
                                    </p>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"><i class="mdi-navigation-close right"></i> Ugali"</span>
                            <p>Stable food in kenya</p>
                        </div>
                    </div>
                </div>

                     <div class="product col s12 m2 l2">
                       <div class="card ">
                        <div class="card-image waves-effect waves-block waves-light">
                            <a href="#" class="btn-floating btn-large btn-price waves-effect waves-light  pink accent-2">$1.0</a>
                            
                             <img src="images/chapati.jpg"  alt="product-img">
                            
                        </div>
                        <ul class="card-action-buttons">
                            
                            <li><a class="btn-floating waves-effect waves-light red accent-2"><i class="mdi-action-add-shopping-cart"></i></a>
                            </li>
                            <li><a class="btn-floating waves-effect waves-light light-blue"><i class="mdi-action-info activator"></i></a>
                            </li>
                        </ul>
                        <div class="card-content">

                            <div class="row">
                                <div class="col s8">
                                    <p class="card-title grey-text text-darken-4"><a href="#" class="grey-text text-darken-4">Chapati with saucy stew"</a>
                                    </p>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"><i class="mdi-navigation-close right"></i> Chapati with saucy stew"</span>
                            <p>Great for both lunch and dinner.</p>
                        </div>
                    </div>
                </div>

                     <div class="product col s12 m2 l2">
                       <div class="card ">
                        <div class="card-image waves-effect waves-block waves-light">
                            <a href="#" class="btn-floating btn-large btn-price waves-effect waves-light  pink accent-2">$1.89</a>
                            

                            <img src="images/mukimo.jpg"  alt="product-img">
                            
                        </div>
                        <ul class="card-action-buttons">
                            
                            <li><a class="btn-floating waves-effect waves-light red accent-2"><i class="mdi-action-add-shopping-cart"></i></a>
                            </li>
                            <li><a class="btn-floating waves-effect waves-light light-blue"><i class="mdi-action-info activator"></i></a>
                            </li>
                        </ul>
                        <div class="card-content">

                            <div class="row">
                                <div class="col s8">
                                    <p class="card-title grey-text text-darken-4"><a href="#" class="grey-text text-darken-4">Mukimo"</a>
                                    </p>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"><i class="mdi-navigation-close right"></i> Mukimo"</span>
                            <p>This traditional delicacy is made with potatoes, peas, corn and onions.</p>
                        </div>
                    </div>
                </div>

                     <div class="product col s12 m2 l2">
                       <div class="card ">
                        <div class="card-image waves-effect waves-block waves-light">
                            <a href="#" class="btn-floating btn-large btn-price waves-effect waves-light  pink accent-2">$1.69</a>
                            

                            <img src="images/Matoke.jpg"  alt="product-img">
                            
                        </div>
                        <ul class="card-action-buttons">
                            
                            <li><a class="btn-floating waves-effect waves-light red accent-2"><i class="mdi-action-add-shopping-cart"></i></a>
                            </li>
                            <li><a class="btn-floating waves-effect waves-light light-blue"><i class="mdi-action-info activator"></i></a>
                            </li>
                        </ul>
                        <div class="card-content">

                            <div class="row">
                                <div class="col s8">
                                    <p class="card-title grey-text text-darken-4"><a href="#" class="grey-text text-darken-4">Matoke"</a>
                                    </p>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"><i class="mdi-navigation-close right"></i> Matoke"</span>
                            <p> The meal is made with banana, which is cooked and mashed into a meal. It is served with flavoured sauce.</p>
                        </div>
                    </div>
                </div>
                     <div class="product col s12 m2 l2">
                       <div class="card ">
                        <div class="card-image waves-effect waves-block waves-light">
                            <a href="#" class="btn-floating btn-large btn-price waves-effect waves-light  pink accent-2">$1.49</a>
                            

                            <img src="images/irio.jpg"  alt="product-img">
                            
                        </div>
                        <ul class="card-action-buttons">
                            
                            <li><a class="btn-floating waves-effect waves-light red accent-2"><i class="mdi-action-add-shopping-cart"></i></a>
                            </li>
                            <li><a class="btn-floating waves-effect waves-light light-blue"><i class="mdi-action-info activator"></i></a>
                            </li>
                        </ul>
                        <div class="card-content">

                            <div class="row">
                                <div class="col s8">
                                    <p class="card-title grey-text text-darken-4"><a href="#" class="grey-text text-darken-4">Irio"</a>
                                    </p>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"><i class="mdi-navigation-close right"></i> Irio"</span>
                            <p>Irio is a delicious local dish, which consists of potatoes, peas and green vegetables.</p>
                        </div>
                    </div>
                </div>
                     <div class="product col s12 m2 l2">
                       <div class="card ">
                        <div class="card-image waves-effect waves-block waves-light">
                            <a href="#" class="btn-floating btn-large btn-price waves-effect waves-light  pink accent-2">$.49</a>
                            

                            <img src="images/githeri.jpg"  alt="product-img">
                            
                        </div>
                        <ul class="card-action-buttons">
                            
                            <li><a class="btn-floating waves-effect waves-light red accent-2"><i class="mdi-action-add-shopping-cart"></i></a>
                            </li>
                            <li><a class="btn-floating waves-effect waves-light light-blue"><i class="mdi-action-info activator"></i></a>
                            </li>
                        </ul>
                        <div class="card-content">

                            <div class="row">
                                <div class="col s8">
                                    <p class="card-title grey-text text-darken-4"><a href="#" class="grey-text text-darken-4">Githeri"</a>
                                    </p>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"><i class="mdi-navigation-close right"></i>Githeri"</span>
                            <p>Githeri is a common Kenyan dish which mainly consists of maize and kidney beans. Maize and kidney beans are usually boiled and stewed.</p>
                        </div>
                    </div>
                </div>
              </div>

            </div>
            <div class="divider"></div>
            <div class="divider"></div>
            <div class="divider"></div>
            <div id="custom">
              <div class="container">
                 <h1>Make a reservation</h1>
                 <div class="col s12 m6 l6">
                 <div class="card-panel">
                    <h4 class="header2">Key in your details</h4>
                    <div class="row">
                      <form  action="reservation_save.php" method="post">
                        <div class="row">
                          <div class="input-field col s6">
                            <input placeholder="John " id="name2" type="text" name="first">
                            <label for="first" class="active">First Name</label>
                          </div>
                          <div class="input-field col s6">
                            <input placeholder=" Doe" id="name2" type="text" name="last">
                            <label for="last" class="active">Last Name</label>
                          </div>
                        </div>
                        <div class="row">
                        <div class="formatter">
                        <div class="input-field col s6">
                          <input id="phone-code" type="text" placeholder="07...." class="" name="contact">
                          <label for="phone_code" class="active">Phone number</label>
                        </div>
                        </div>
                          <div class="input-field col s6">
                            <input placeholder="---@---.---" id="email" type="email" name="email">
                            <label for="email" class="active">Email</label>
                          </div>
                          <div class="row">
                            <div class="input-field col s6">
                            <input placeholder="Adress of event" class="validate" id="adress" type="text" name="address">
                            <label for="adress" class="active">Delivery adress</label>
                          </div>
                          </div>
                          <!-- <div class="row">
                            <div class="input-field col s6">
                              <input type="date" name="date" class="datepicker" id="date" placeholder="Date of Event">
                                <input type="date" name="prefix_date" class="datepicker hide" id="date" placeholder="Date of Event">
                            </div>
                             <div class="input-field col s6">
                                <label for="timepicker">Time</label>
                                <input id="timepicker" class="timepicker" type="text">
                           </div> -->
                            <input type="checkbox" id="test5" required="true" />
                         <label for="test5">I agree to the terms and conditions of Mutai Food Services</label>
                          </div>
                          <div class="row">
                            <div class="input-field col s6">
                               <button type="reset" class="btn red">Clear</button>
                               
                            </div>
                            <div class="input-field col s6"><input type="submit" name="Next" class="btn teal" value="Next"></input></div>
                          
                        </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--/ end items list -->
          
          <!-- Floating Action Button -->
            <div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
                <a class="btn-floating btn-large">
                  <i class="mdi-action-stars"></i>
                </a>
                <ul>
                  <li><a href="css-helpers.html" class="btn-floating red"><i class="large mdi-communication-live-help"></i></a></li>
                  <li><a href="app-widget.html" class="btn-floating yellow darken-1"><i class="large mdi-device-now-widgets"></i></a></li>
                  <li><a href="app-calendar.html" class="btn-floating green"><i class="large mdi-editor-insert-invitation"></i></a></li>
                  <li><a href="app-email.html" class="btn-floating blue"><i class="large mdi-communication-email"></i></a></li>
                </ul>
            </div>
            <!-- Floating Action Button -->
        </div>
        <!--end container-->
      </section>
      <!-- END CONTENT -->

      <!-- //////////////////////////////////////////////////////////////////////////// -->
      <!-- START RIGHT SIDEBAR NAV-->
      <aside id="right-sidebar-nav">
        <ul id="chat-out" class="side-nav rightside-navigation">
            <li class="li-hover">
            <a href="#" data-activates="chat-out" class="chat-close-collapse right"><i class="mdi-navigation-close"></i></a>
            <div id="right-search" class="row">
                <form class="col s12">
                    <div class="input-field">
                        <i class="mdi-action-search prefix"></i>
                        <input id="icon_prefix" type="text" class="validate">
                        <label for="icon_prefix">Search</label>
                    </div>
                </form>
            </div>
            </li>
            <li class="li-hover">
                <ul class="chat-collapsible" data-collapsible="expandable">
                <li>
                    <div class="collapsible-header teal white-text active"><i class="mdi-social-whatshot"></i>Recent Activity</div>
                    <div class="collapsible-body recent-activity">
                        <div class="recent-activity-list chat-out-list row">
                            <div class="col s3 recent-activity-list-icon"><i class="mdi-action-add-shopping-cart"></i>
                            </div>
                            <div class="col s9 recent-activity-list-text">
                                <a href="#">just now</a>
                                <p>Jim Doe Purchased new equipments for zonal office.</p>
                            </div>
                        </div>
                        <div class="recent-activity-list chat-out-list row">
                            <div class="col s3 recent-activity-list-icon"><i class="mdi-device-airplanemode-on"></i>
                            </div>
                            <div class="col s9 recent-activity-list-text">
                                <a href="#">Yesterday</a>
                                <p>Your Next flight for USA will be on 15th August 2015.</p>
                            </div>
                        </div>
                        <div class="recent-activity-list chat-out-list row">
                            <div class="col s3 recent-activity-list-icon"><i class="mdi-action-settings-voice"></i>
                            </div>
                            <div class="col s9 recent-activity-list-text">
                                <a href="#">5 Days Ago</a>
                                <p>Natalya Parker Send you a voice mail for next conference.</p>
                            </div>
                        </div>
                        <div class="recent-activity-list chat-out-list row">
                            <div class="col s3 recent-activity-list-icon"><i class="mdi-action-store"></i>
                            </div>
                            <div class="col s9 recent-activity-list-text">
                                <a href="#">Last Week</a>
                                <p>Jessy Jay open a new store at S.G Road.</p>
                            </div>
                        </div>
                        <div class="recent-activity-list chat-out-list row">
                            <div class="col s3 recent-activity-list-icon"><i class="mdi-action-settings-voice"></i>
                            </div>
                            <div class="col s9 recent-activity-list-text">
                                <a href="#">5 Days Ago</a>
                                <p>Natalya Parker Send you a voice mail for next conference.</p>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header light-blue white-text active"><i class="mdi-editor-attach-money"></i>Sales Repoart</div>
                    <div class="collapsible-body sales-repoart">
                        <div class="sales-repoart-list  chat-out-list row">
                            <div class="col s8">Target Salse</div>
                            <div class="col s4"><span id="sales-line-1"></span>
                            </div>
                        </div>
                        <div class="sales-repoart-list chat-out-list row">
                            <div class="col s8">Payment Due</div>
                            <div class="col s4"><span id="sales-bar-1"></span>
                            </div>
                        </div>
                        <div class="sales-repoart-list chat-out-list row">
                            <div class="col s8">Total Delivery</div>
                            <div class="col s4"><span id="sales-line-2"></span>
                            </div>
                        </div>
                        <div class="sales-repoart-list chat-out-list row">
                            <div class="col s8">Total Progress</div>
                            <div class="col s4"><span id="sales-bar-2"></span>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header red white-text"><i class="mdi-action-stars"></i>Favorite Associates</div>
                    <div class="collapsible-body favorite-associates">
                        <div class="favorite-associate-list chat-out-list row">
                            <div class="col s4"><img src="images/avatar.jpg" alt="" class="circle responsive-img online-user valign profile-image">
                            </div>
                            <div class="col s8">
                                <p>Eileen Sideways</p>
                                <p class="place">Los Angeles, CA</p>
                            </div>
                        </div>
                        <div class="favorite-associate-list chat-out-list row">
                            <div class="col s4"><img src="images/avatar.jpg" alt="" class="circle responsive-img online-user valign profile-image">
                            </div>
                            <div class="col s8">
                                <p>Zaham Sindil</p>
                                <p class="place">San Francisco, CA</p>
                            </div>
                        </div>
                        <div class="favorite-associate-list chat-out-list row">
                            <div class="col s4"><img src="images/avatar.jpg" alt="" class="circle responsive-img offline-user valign profile-image">
                            </div>
                            <div class="col s8">
                                <p>Renov Leongal</p>
                                <p class="place">Cebu City, Philippines</p>
                            </div>
                        </div>
                        <div class="favorite-associate-list chat-out-list row">
                            <div class="col s4"><img src="images/avatar.jpg" alt="" class="circle responsive-img online-user valign profile-image">
                            </div>
                            <div class="col s8">
                                <p>Weno Carasbong</p>
                                <p>Tokyo, Japan</p>
                            </div>
                        </div>
                        <div class="favorite-associate-list chat-out-list row">
                            <div class="col s4"><img src="images/avatar.jpg" alt="" class="circle responsive-img offline-user valign profile-image">
                            </div>
                            <div class="col s8">
                                <p>Nusja Nawancali</p>
                                <p class="place">Bangkok, Thailand</p>
                            </div>
                        </div>
                    </div>
                </li>
                </ul>
            </li>
        </ul>
      </aside>
      <!-- LEFT RIGHT SIDEBAR NAV-->

    </div>
    <!-- END WRAPPER -->

  </div>
  <!-- END MAIN -->



  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START FOOTER -->
  <footer class="page-footer teal">
    <div class="footer-copyright">
      <div class="container">
        <span>Copyright © 2017 <a class="grey-text text-lighten-4" >Strathmore University</a> All rights reserved.</span>
        <span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="http://itsdavis.me">Davis Too</a></span>
        </div>
    </div>
  </footer>
  <!-- END FOOTER -->



    <!-- ================================================
    Scripts
    ================================================ -->
  
    <!-- jQuery Library -->
    <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>    
    <!--materialize js-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script src="js/mdtimepicker.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
        $('#timepicker').mdtimepicker({
          theme: 'teal',
        }); 
        });

       Materialize.toast('You logged in sucessfuly', 2000) ;
    $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 1, // Creates a dropdown of 15 years to control year,
    today: 'Today',
    format: 'yyyy mmmm d',
    formatSubmit: 'yyyy/mm/dd',
    hiddenName: true,
    clear: 'clear selection',
    hiddenPrefix: 'prefix__date',
    close: 'Ok',
    color: 'teal',
    closeOnSelect: true // Close upon selecting a date,
  });
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

    <script type="text/javascript">
    /*
    * Masonry container for eCommerce page
    */
    var $containerProducts = $("#products");
    $containerProducts.imagesLoaded(function() {
      $containerProducts.masonry({
        itemSelector: ".product",
        columnWidth: ".product-sizer",
      });
    });
    </script>

    
</body>
</html>


