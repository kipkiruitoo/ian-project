<?php 
session_start();
require ('db.php');
	
	$id = $_SESSION['id'];
	$mode = $_POST['mode'];

		mysqli_query($mysqli,"UPDATE reservation SET modeofpayment='$mode',r_status='pending' where rid='$id'")or die(mysqli_error($mysqli)); 

$query = mysqli_query($mysqli, "SELECT * FROM reservation natural join combo WHERE rid='$id'");
      $row=mysqli_fetch_array($query);
        $rcode=$row['r_code'];
        $first=$row['r_first'];
        $last=$row['r_last'];
        $mysqlitact=$row['r_mysqlitact'];
        $address=$row['r_address'];
        $date=$row['r_date'];
        $venue=$row['r_venue'];
        $balance=$row['balance'];
        $payable=$row['payable'];
        $ocassion=$row['r_ocassion'];
        $team=$row['team_name'];
        $status=$row['r_status'];
        $motif=$row['r_motif'];
        $time=$row['r_time'];
        $time=$row['r_time'];
        $type=$row['r_type'];
        $cid=$row['combo_id'];
        $combo=$row['combo_name'];

    ini_set( 'display_errors', 1 );
    
    error_reporting( E_ALL );
    
    $from = "info@chimney.com";
    
    $to = "emoblazz@gmail.com";
    
    $subject = "Reservation Details";
    
    $message = "Dear $first $last. Below are your reservation details to Chimney's Catering<br>
    	Reservation Code: $rcode
    	Event Date: $date
    	Event Time: $time
    	Venue: $venue
    	Motif: $motif
    	Ocassion: $ocassion
    	Total Payable: $payable
    	Package: $combo
    	
    ";
    
    $headers = "From:" . $from;
    
    mail($to,$subject,$message, $headers);
    
    echo "<script>
		alert('Check Your Email Inbox for the details');		
	</script>";

			
			echo "<script>document.location='summary.php'</script>";   
	
?>