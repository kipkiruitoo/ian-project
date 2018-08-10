<?php 
session_start();
require('db.php');
	
	$id = $_SESSION['id'];
	$venue = $_POST['venue'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$motif = $_POST['motif'];
	$pax = $_POST['pax'];
	$type = $_POST['type'];
	$ocassion = $_POST['ocassion'];
	$cid = $_POST['combo_id'];
	$date=date("Y-m-d",strtotime($date));

	$query =mysqli_query($mysqli, "SELECT * FROM `reservation` WHERE r_date='".$date."' AND r_status = 'Approved'");
			if(mysqli_num_rows($query) > 0)
			{

					echo "<script>alert ('Date is already reserved');
					window.history.back(); </script>";
			}
			else{
    // do something
			if (!mysqli_query($mysqli,$query))
			{
		$query =mysqli_query($mysqli, "SELECT * FROM combo WHERE combo_id='$cid'");
			$row=mysqli_fetch_array($query);
				$price=$row['combo_price'];
				$payable=$pax*$price;

		mysqli_query($mysqli,"UPDATE reservation SET payable='$payable',balance='$payable',r_venue='$venue',r_date='$date',r_time='$time',r_motif='$motif'
		,r_ocassion='$ocassion',r_type='$type',pax='$pax',combo_id='$cid',price='$price' where rid='$id'")or die(mysqli_error($mysqli)); 

			$_SESSION['id']=$id;

			
			echo "<script>document.location='payment.php'</script>";   
	}}
	
?>