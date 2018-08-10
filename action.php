<?php

$mysqli = new mysqli('localhost', 'root', '', 'accounts');

if (mysqli_connect_errno()) {
  echo json_encode(array('mysqli' => 'Failed to connect to MySQL: ' . mysqli_connect_error()));
  exit;
}
$page = isset($_GET['p'])? $_GET['p'] :'' ;
if ($page=='view') {
	$result = $mysqli->query("SELECT * FROM orders");
	while ($row=$result->fetch_assoc()) {
		if ($row['order_status']==1) {
			$status= 'Done';
		}
		else{
			$status = 'Pending';
		}
		?>
		<tr>
			<td><?php echo $row['order_id']; ?></td>
			<td><?php echo $row['food_name']; ?></td>
			<td><?php echo $row['quantity']; ?></td>
			<td><?php echo $row['description']; ?></td>
			<td><?php echo $row['event_date']; ?></td>
			<td><?php echo $status; ?></td>

		</tr>
		<?php 
	}

} else{

	// Basic example of PHP script to handle with jQuery-Tabledit plug-in.

header('Content-Type: application/json');
$input = filter_input_array(INPUT_POST);
if ( $input['order_status']==1){
$val == 1;

}
else if ($input['order_status']==0) {
	$val == 0;
}
    $idval= $input['order_id'];
	if ($input['action'] == 'edit') {
		$sql="UPDATE orders SET order_status= $val WHERE order_id= $idval";
	    $mysqli->query($sql);
	// } else if ($input['action'] == 'delete') {
	//     $mysqli->query("UPDATE users SET deleted=1 WHERE id='" . $input['id'] . "'");
	// } else if ($input['action'] == 'restore') {
	//     $mysqli->query("UPDATE users SET deleted=0 WHERE id='" . $input['id'] . "'");
	// }
}
    else{
    	echo "Not sucessful";
    	header('location: error.php');
    }
	mysqli_close($mysqli);

	echo json_encode($input);
}
?>