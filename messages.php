<?php
/* Displays user information and some useful messages */
session_start(); 

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else if ($_SESSION['role']!= 1) {
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
<html lang="en">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <title>Management</title>

    <!-- Favicons-->
    <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->
    <link href="css/widgets.css" rel="stylesheet">

    <!-- CORE CSS-->    
    <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- CSS style Horizontal Nav-->    
    <link href="css/layouts/style-horizontal.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <!-- <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection"> -->
     <!-- <link rel="stylesheet" href="css/font-awesome.min.css">  -->
  <!-- jQuery UI -->
  <link rel="stylesheet" href="css/jquery-ui.css"> 
  <link rel="stylesheet" href="css/jquery.cleditor.css"> 
  <!-- Data tables -->
  <link rel="stylesheet" href="css/jquery.dataTables.css"> 
  <!-- Bootstrap toggle -->
  <link rel="stylesheet" href="css/jquery.onoff.css">
  <!-- Main stylesheet -->
  <link href="css/style.css" rel="stylesheet">
  <!-- Widgets stylesheet -->
  <link href="css/widgets.css" rel="stylesheet">


    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="js/plugins/jvectormap/jquery-jvectormap.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">
     <style type="text/css">
         #display{
            display: none;
         }
         #no-display:hover #display{
            display: block;
         }
     </style>

</head>

<body id="layouts-horizontal" class="teal">
    <!-- Start Page Loading -->
    <!-- <div id="loader-wrapper">
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
            <nav class="navbar-color teal lighten-2">
                <div class="nav-wrapper">
                    <ul class="left">                      
                      <li><h1 class="logo-wrapper"><a href="#" class="brand-logo darken-1"><img src="images/logo.png" alt=""></a> <span class="logo-text">Mutai Food Services</span></h1></li>
                    </ul>
                    <div class="header-search-wrapper hide-on-med-and-down">
                        <i class="mdi-action-search"></i>
                        <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Search"/>
                    </div>
                    <ul class="right hide-on-med-and-down">
                       <!--  <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light translation-button"  data-activates="translation-dropdown"><img src="images/flag-icons/United-States.png" alt="USA" /></a> -->
                        </li>
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen"><i class="mdi-action-settings-overscan"></i></a>
                        </li>
                                               
                        <li><a href="#" data-activates="chat-out" class="waves-effect waves-block waves-light chat-collapse"><i class="mdi-communication-chat"></i></a>
                        </li>
                       <li><a href="logout.php" class="tooltipped" data-position="bottom" data-tooltip="logout"><i class="mdi-action-lock-outline"></i></a>
                       
                    </ul>

                       <!-- translation-button -->
                       <!-- <ul id="translation-dropdown" class="dropdown-content">
                      <li>
                        <a href="#!"><img src="images/flag-icons/United-States.png" alt="English" />  <span class="language-select">English</span></a>
                      </li>
                      <li>
                        <a href="#!"><img src="images/flag-icons/France.png" alt="French" />  <span class="language-select">French</span></a>
                      </li>
                      <li>
                        <a href="#!"><img src="images/flag-icons/China.png" alt="Chinese" />  <span class="language-select">Chinese</span></a>
                      </li>
                      <li>
                        <a href="#!"><img src="images/flag-icons/Germany.png" alt="German" />  <span class="language-select">German</span></a>
                      </li>
                      
                    </ul>
 -->                    <!-- notifications-dropdown -->
                    
                </div>
            </nav>

            <!-- HORIZONTL NAV START-->
             <nav id="horizontal-nav" class="white hide-on-med-and-down">
                <div class="nav-wrapper">                  
                  <ul id="ul-horizontal-nav" class="hide-on-med-and-down" style="margin-left: 450px;">
                    <li>
                        <a href="dash.php" class="teal-text">
                            <i class="mdi-action-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="messages.php" class="teal-text">
                            <i class="mdi-communication-email"></i>
                            <span>Mailbox</span>
                        </a>
                    </li>                    
                    <li>
                        <a class="dropdown-menu teal-text" href="#!" data-activates="eCommersdropdown">
                            <i class="mdi-action-shopping-cart"></i>
                            <span>Reservations<i class="mdi-navigation-arrow-drop-down right"></i></span>
                        </a>
                    </li>                    
                    <li>
                        <a class="dropdown-menu teal-text" href="#!" data-activates="Usersdropdown">
                            <i class="mdi-action-account-circle"></i>
                            <span>Users<i class="mdi-navigation-arrow-drop-down right"></i></span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-menu teal-text" href="#!" data-activates="Chartsdropdown">
                            <i class="mdi-editor-insert-chart"></i>
                            <span>Reports<i class="mdi-navigation-arrow-drop-down right"></i></span>
                        </a>
                    </li>
                    
                  </ul>
                </div>
              </nav>
                <!-- eCommers -->
                <ul id="eCommersdropdown" class="dropdown-content dropdown-horizontal-list">
                    <li><a href="eCommerce-products-page.html"  class="teal-text">Pending Reservations</a></li>
                    <li><a href="eCommerce-pricing.html"  class="teal-text">Approved researvations</a></li>
                    <li><a href="eCommerce-invoice.html"  class="teal-text">Finished Researvations</a></li>
                </ul>
                <!-- Usersdropdown -->
                <ul id="Usersdropdown" class="dropdown-content dropdown-horizontal-list">
                    <li><a href="user-profile-page.html"  class="teal-text">View teams</a></li>
                    <li><a href="user-login.html"  class="teal-text">Add user</a></li>
                    <li><a href="user-register.html" class="teal-text">View users</a></li>
                                        
                    <li><a href="user-lock-screen.html" class="teal-text">Lock Screen</a></li>
                    <li><a href="user-sesssion-timeout.html" class="teal-text">Session Timeout</a></li>
                </ul>

                <!-- Chartsdropdown -->
                <ul id="Chartsdropdown" class="dropdown-content dropdown-horizontal-list">
                    <li><a href="charts-chartjs.html" class="teal-text">Chart JS</a></li>
                    <li><a href="charts-chartist.html" class="teal-text">Chartist</a></li>
                    <li><a href="charts-morris.html" class="teal-text">Morris Charts</a></li>
                    <li><a href="charts-xcharts.html" class="teal-text">xCharts</a></li>
                    <li><a href="charts-flotcharts.html" class="teal-text">Flot Charts</a></li>
                    <li><a href="charts-sparklines.html" class="teal-text">Sparkline Charts</a></li>
                </ul>
            <!-- HORIZONTL NAV END-->
            
            

        </div>
        <!-- end header nav-->
    </header>
<section id="content">
<div class="divider"></div>
      
      <div class="container">
        <div class="row">
          <div class="card hoverable">
          <div class="col s12 ">
            
                    
                 
                    
              <!-- Table Page -->
            
                <!-- Table -->
               
              
                  <table class="table bordered striped highlight">
                    <thead>
                      <tr>
                        <th>Full Name</th>
                        <th>Contact</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Date Sent</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

<?php
include('db.php');

    $query=mysqli_query($mysqli,"select * from message order by date desc")or die(mysqli_error());
      while ($row=mysqli_fetch_array($query)){
        $id=$row['message_id'];
        $fullname=$row['fullname'];
        $email=$row['email'];
        $subject=$row['subject'];
		$message=$row['message'];
        $date=$row['date'];
      

?>                      
                      <tr>
                        <td><?php echo $fullname;?></td>
                        <td><?php echo $email;?></td>
                        <td><?php echo $subject;?></td>
                        <td><?php echo $message;?></td>
                        <td><?php echo date("F d, Y", strtotime($row['date'])); ?></td>
                        <td>
                            
                              <a href="#delete" class="btn red" data-target="#update<?php echo $id;?>" >
                                <i class="mdi-action-delete"></i>
                              </a>
                            
                            
                        </td>
                      </tr>
<!-- Modal -->
<!-- Modal Structure -->
  <div id="delete" class="modal bottom-sheet">
    <div class="modal-content">
      <h4>Modal Header</h4>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>
          
<!--end modal-->                      
<?php }?>
                    </tbody>
                    <tfoot>
                     
                    </tfoot>
                  </table>
                  
</div></div></div>
    <!-- Matter ends -->


   

   <!-- Mainbar ends -->
  
<!-- Content ends -->

<!-- Footer starts -->


<!-- Footer ends -->

<!-- Scroll to top -->
 
<?php
    if (isset($_POST['del']))
    {
    $id=$_POST['id'];

  // sending query
  mysqli_query($con,"delete from message WHERE message_id='$id'")
  or die(mysqli_error());
  echo "<script>document.location='messages.php'</script>";
    }
    ?>
<footer class=" teal darkken-1">
        <div class="footer-copyright">
            <div class="container">
                Copyright © 2017 <a class="grey-text text-lighten-4" >Strathmore University</a> All rights reserved.
                <span class="right"> Design and Developed by <a class=" text-lighten-4" href="http://itsdavis.me/">Davis Too</a></span>
            </div>
        </div>
    </footer>
</section>

<!-- JS -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
   <script src="js/materialize.js"></script>
   <script type="text/javascript">
     $(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });
       
   </script>
</body>
</html>