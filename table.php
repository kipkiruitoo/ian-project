<?php
$connect = mysqli_connect("localhost", "root", "", "accounts");
$query = "SELECT * FROM orders";
$result = mysqli_query($connect, $query);
?>
<html>  
 <head>  
          <title>Live Table Data Edit Delete using Tabledit Plugin in PHP</title>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>            
    <script src="jquery.tabledit.min.js"></script>
    </head>  
    <body>  
  <div class="container">  
   <br />  
   <br />  
   <br />  
            <div class="table-responsive">  
    <h3 align="center">Live Table Data Edit Delete using Tabledit Plugin in PHP</h3><br />  
    <table id="editable_table" class="table table-bordered table-striped">
     <thead>
      <tr>
        <th>Order ID</th>
        <th>Customer Name</th>
        <th>Food Name</th>
        <th>Food Description</th>
        <th>Food Quantity</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while($row = mysqli_fetch_array($result))
     {
      echo '
      <tr>
       <td>'.$row["order_id"].'</td>
       <td>'.$row["customer_name"].'</td>
       <td>'.$row["food_name"].'</td>
       <td>'.$row["description"].'</td>
       <td>'.$row["quantity"].'</td>
      </tr>
      ';
     }
     ?>
     </tbody>
    </table>
   </div>  
  </div>  
 </body>  
</html>  
<script>  
$(document).ready(function(){  
     $('#editable_table').Tabledit({
      url:'action.php',
      columns:{
       identifier:[0, "id"],
       editable:[[1, 'first_name'], [2, 'last_name']]
      },
      restoreButton:false,
      onSuccess:function(data, textStatus, jqXHR)
      {
       if(data.action == 'delete')
       {
        $('#'+data.id).remove();
       }
      }
     });
 
});  
 </script>
