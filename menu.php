
<?php
/* Database connection settings */
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'accounts';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

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
    if (isset($_POST['order'])) {

     $name= $_POST['name'];
     $phone_code = $_POST['phone-code'];
     $food_name = $_POST['food_name'];
     $quantity = $_POST['Quantity'];
     $description = $_POST['description'];
     $adress = $_POST['adress'];
     $event_date = $_POST['date'];

     $sql= " INSERT INTO orders (customer_name,phone_number,customer_adress,food_name,quantity,event_date,description) VALUES ('$name','$phone_code','$adress','$food_name','$quantity','$event_date','$description')";
       if ($mysqli->query($sql)== TRUE) {
         $_SESSION['message']= "Order was made Successfully";
         header('location: info.php');
       }
       else{
        $_SESSION['message']= "Order was not  Successfull, go back and make the order again $mysqli->error";
         header('location: error.php');       }    }
  }
?>
<!DOCTYPE html>
<html lang="en">
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
  <link rel="stylesheet" href="css/prettyPhoto.css">

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

<!-- Main content starts -->

<section id="content">
 <div class="container">
   <div class="row">
  	<div class="col s12 m8">
	    <!-- Matter -->

	    <h1>Menu</h1>
        
<?php
	include('db.php');
	$query=mysqli_query($mysqli,"select * from subcategory")or die(mysqli_error($con));
		while ($row=mysqli_fetch_array($query)){
			$subcat_id=$row['subcat_id'];
			$subcat_name=$row['subcat_name'];
?>   

                <div class="widget-content">
                  <div class="padd">
                    <h1><?php echo $subcat_name;?></h1>
                    <div class="gallery">
                      <!-- Full size image link in anchor tag. Thumbnail link in image tag. -->
<?php
						
							$querym=mysqli_query($mysqli,"select * from menu natural join subcategory where subcat_id='$subcat_id' order by menu_name")or die(mysqli_error($con));
							while ($rowm=mysqli_fetch_array($querym)){
								$mid=$rowm['menu_id'];
								$menu=$rowm['menu_name'];
								/* $cat=$rowm['cat_name']; */
								$subcat=$rowm['subcat_name'];
								$desc=$rowm['menu_desc'];
								$price=$rowm['menu_price'];
								$pic=$rowm['menu_pic'];
?>                        
                       
                      		<img src="images/<?php echo $pic;?>" class="materialboxed responsive-img thumbnail" title="<?php echo $menu." - P".$price;?>" alt="<?php echo $menu." - P".$price;?>" alt="<?php echo $menu." - P".$price;?>">
                      		
                      </a>
                     <?php }?>
                    </div>

                  </div><!--pad-->
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div><!--widget-->
<?php }?>                
              </div>  
              
            


            <div class="col s12 m4">
              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Combo</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
<?php
	include('db.php');
	$query=mysqli_query($mysqli,"select * from combo")or die(mysqli_error($con));
		while ($row=mysqli_fetch_array($query)){
			$combo_id=$row['combo_id'];
			$combo_name=$row['combo_name'];
			$price=$row['combo_price'];
?>   

                <div class="widget-content">
                  <div class="padd">
                    <h3><?php echo $combo_name." - <span class='label label-primary'>P".$price."</span>";?></h3>
                    
                      <!-- Full size image link in anchor tag. Thumbnail link in image tag. -->
<?php
						
							$querym=mysqli_query($mysqli,"select * from combo_details natural join menu where combo_id='$combo_id' group by cat_id")or die(mysqli_error($con));
							while ($rowm=mysqli_fetch_array($querym)){
								
								$menu_name=$rowm['menu_name'];
?>                        
                    <!-- Widget content -->
                  <!-- activity starts -->
                  <ul class="activity">

                    <li>
                      <!-- Icon with avtivity  -->
                      <?php echo $menu_name;?>
                    </li>

                  </ul> 

                     <?php }?>
                    

                  </div><!--pad-->
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div><!--widget-->
<?php }?>                
              </div>  
            </div>

</div></div>
          </div>
        </div>
		 
		<!-- Matter ends -->

    </div>

   <!-- Mainbar ends -->	    
   <div class="clearfix"></div>

</div>
</section>
<!-- Content ends -->

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
       Materialize.toast('This are some of our menu, you can also make a custom order', 7000) ;
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