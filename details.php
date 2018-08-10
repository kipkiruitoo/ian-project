<?php session_start();

?>

    
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Reservation</title>
  <script language="JavaScript"><!--
  javascript:window.history.forward(1);
  //--></script>
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
  <section id="contact">
    
                  <h1>Reservation Details</h1>
                  
                    <br>
                    <!-- Form starts.  -->

                    <div class="container">
                      <div class="row">
                        <div class="col s7 ">
                          <div class="card">
                                <form  action="details_save.php" method="post">
                                
                        <div class="row">
                          <div class="input-field col s6">
                            <input placeholder="Location of your event " id="venue" type="text" name="venue" required>
                            <label for="venue" class="active">Venue</label>
                          </div>
                          <div class="input-field col s6">
                            <input placeholder="Exact date of the event" id="date" type="date" name="date">
                            <label for="date" class="active">Date</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s6">
                            <input placeholder="Exact time of the event" id="date" type="time" name="time">
                            <label for="date" class="active">Time</label>
                          </div>
                          <div class="input-field col s6">
                            <input placeholder="Theme of the Event" id="date" type="text" name="motif">
                            <label for="date" class="active">Theme</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s6">
                                    <select >
                                      <option disabled selected>Baptism</option>
                                      <option>Birthday</option>
                                      <option>Christmas Party</option>
                                      <option>Funeral</option>
                                      <option>Wedding</option>
                                      <option>Others</option>
                                    </select>
                                    <label>Occassion</label>
                         </div>
                         <div class="input-field col s6">
                            <label for="pax">Population</label>
                                   <div class="input-field col s6">
                                    <input type="number"  placeholder="No. of People" id="pax" name="pax">
                                   </div>
                       </div>
                       </div>
                                
                                 
                                  
                                </div> 
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Type</label>
                                  <div class="col-lg-2">
                                    <input type="radio" class="form-radio" name="type" value="buffet"> Buffet
                                  </div>
                                  <div class="col-lg-2">
                                    <input type="radio" class="form-radio" name="type" value="plated"> Plated 
                                    </select>
                                  </div>
                                </div>  
                               <div class="form-group">
    <label class="col-lg-2 control-label"></label>
       <div class="col s4 offset-1">
<?php
require('db.php');

    $query=mysqli_query($mysqli,"select * from combo order by combo_name")or die(mysqli_error($mysqli));
      $count=mysqli_num_rows($query);
      while ($row=mysqli_fetch_array($query)){
        $id=$row['combo_id'];
        $name=$row['combo_name'];
        $price=$row['combo_price'];

       
?>     


          
                  <p>><?php echo $name;?> - P<?php echo $price;?></p>
                  
                  <!-- Widget content -->
                  
                  <table class="table striped bordered highlight">
                    <tbody>

<?php

    $query1=mysqli_query($mysqli,"select * from combo_details natural join menu where combo_id='$id'")or die(mysqli_error($mysqli));
      while ($row1=mysqli_fetch_array($query1)){
        $cid=$row1['combo_details_id'];
        $menu_id=$row1['menu_id'];
        $menu_name=$row1['menu_name'];
        
?>                        
                    <tr>
                      <td><?php echo $menu_name;?></td>
                    </tr> 
                   
                
<?php }?>                    
                    
                  </tbody></table>

                  </div>
                    <input type="radio" id="inlineCheckbox1" value="<?php echo $id;?>" name="combo_id">
                  
              <!--end widget-->
            <?php }?>  
         
                                
                                    <button type="reset" class="btn btn-sm btn-default">Clear</button>
                                    <button type="submit" class="btn btn-sm btn-primary">Next</button>
                                    
                                  
                              </form>
                
</section>
<script>
  $(function () {
  //Initialize Select2 Elements
    $(".select2").select2();
  })
$( "#datepicker" ).datepicker({ minDate: 0});


</script>
</body>
</html>



